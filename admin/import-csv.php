<?php
require_once __DIR__ . '/includes/header.php';

$imported = 0;
$skipped = 0;
$errors = [];
$previewData = [];
$importStakeholder = 'CZI';

if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === 0) {
    $file = $_FILES['csv_file']['tmp_name'];

    // Detect delimiter (tab or comma)
    $sample = fread(fopen($file, 'r'), 500);
    $delimiter = (substr_count($sample, "\t") > substr_count($sample, ',')) ? "\t" : ",";

    $handle = fopen($file, 'r');

    // Get headers
    $headers = fgetcsv($handle, 0, $delimiter);
    $headers = array_map('strtolower', $headers);
    $headers = array_map('trim', $headers);

    $importStakeholder = $_POST['import_stakeholder'] ?? 'CZI';

    require_once __DIR__ . '/../api/config/database.php';
    $database = new Database();
    $db = $database->getConnection();

    $preview = isset($_POST['preview']);

    while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
        if (count($row) < 3) continue;
        if (count($row) > count($headers)) $row = array_slice($row, 0, count($headers));

        $data = array_combine($headers, array_pad($row, count($headers), ''));

        // Company name
        $companyName = trim($data['content_post_title'] ?? '');
        if (empty($companyName)) continue;

        // Industry
        $categoryRaw = trim($data['directory_category'] ?? '');
        $categoryParts = explode(';', $categoryRaw);
        $industryName = trim($categoryParts[0]);
        $industrySlug = mapIndustry($industryName);
        $industryId = getIndustryId($db, $industrySlug);

        // Phone
        $phone = trim($data['directory_contact__phone'] ?? '');
        if (empty($phone)) $phone = trim($data['directory_contact__mobile'] ?? '');

        // Email
        $email = trim($data['directory_contact__email'] ?? '');

        // Website
        $website = trim($data['directory_contact__website'] ?? '');

        // Description - contains address, city, province
        $rawDescription = trim($data['content_body'] ?? '');
        $description = strip_tags($rawDescription);
        $description = str_replace('&nbsp;', ' ', $description);
        $description = preg_replace('/\s+/', ' ', $description);
        $description = trim($description);

        // EXTRACT address, city, province from description
        $extracted = extractLocationInfo($description);

        // Logo
        $logo = trim($data['directory_photos'] ?? '');
        if (strpos($logo, '|') !== false) {
            $logoParts = explode('|', $logo);
            foreach ($logoParts as $part) {
                if (preg_match('/\.(jpg|jpeg|png|gif|webp)/i', $part)) {
                    $logo = trim($part);
                    break;
                }
            }
        }

        $provinceSlug = mapProvince($extracted['province']);
        $provinceId = getProvinceId($db, $provinceSlug);

        $companyData = [
            'name' => $companyName,
            'industry_id' => $industryId,
            'industry_name' => getIndustryName($db, $industryId),
            'province_id' => $provinceId,
            'province_name' => getProvinceName($db, $provinceId),
            'phone' => $phone,
            'email' => $email,
            'website' => $website,
            'description' => $description,
            'address' => $extracted['address'],
            'city' => $extracted['city'],
            'stakeholder' => $importStakeholder,
            'logo' => $logo,
            'is_active' => 1
        ];

        if ($preview) {
            $previewData[] = $companyData;
        } else {
            $checkStmt = $db->prepare("SELECT id FROM companies WHERE name = :name");
            $checkStmt->execute([':name' => $companyData['name']]);
            if ($checkStmt->fetch()) { $skipped++; continue; }

            try {
                $stmt = $db->prepare("
                    INSERT INTO companies (name, industry_id, province_id, stakeholder, phone, email, website, logo, description, is_active)
                    VALUES (:name, :industry_id, :province_id, :stakeholder, :phone, :email, :website, :logo, :description, :is_active)
                ");
                $stmt->execute([
                    ':name' => $companyData['name'],
                    ':industry_id' => $companyData['industry_id'],
                    ':province_id' => $companyData['province_id'],
                    ':stakeholder' => $companyData['stakeholder'],
                    ':phone' => $companyData['phone'],
                    ':email' => $companyData['email'],
                    ':website' => $companyData['website'],
                    ':logo' => $companyData['logo'],
                    ':description' => $companyData['description'],
                    ':is_active' => $companyData['is_active']
                ]);
                $imported++;
            } catch (Exception $e) {
                $errors[] = $companyData['name'] . ': ' . $e->getMessage();
            }
        }
    }

    fclose($handle);
}

// ========== EXTRACT LOCATION FROM DESCRIPTION ==========
function extractLocationInfo($text) {
    $result = [
        'address' => $text,
        'city' => '',
        'province' => ''
    ];

    $textLower = strtolower($text);

    $cities = [
        'harare' => 'Harare', 'bulawayo' => 'Bulawayo', 'masvingo' => 'Masvingo',
        'gweru' => 'Gweru', 'mutare' => 'Mutare', 'kwekwe' => 'Kwekwe',
        'chinhoyi' => 'Chinhoyi', 'marondera' => 'Marondera', 'kadoma' => 'Kadoma',
    ];

    foreach ($cities as $key => $name) {
        if (strpos($textLower, $key) !== false) {
            $result['city'] = $name;
            break;
        }
    }

    $provinces = [
        'harare' => 'harare', 'bulawayo' => 'bulawayo', 'masvingo' => 'masvingo',
        'midlands' => 'midlands', 'manicaland' => 'manicaland',
        'gweru' => 'midlands', 'mutare' => 'manicaland', 'kwekwe' => 'midlands',
        'chinhoyi' => 'mashonaland-west', 'marondera' => 'mashonaland-east',
    ];

    foreach ($provinces as $key => $slug) {
        if (strpos($textLower, $key) !== false) {
            $result['province'] = $slug;
            break;
        }
    }

    if (empty($result['province']) && !empty($result['city'])) {
        $cityLower = strtolower($result['city']);
        if (isset($provinces[$cityLower])) {
            $result['province'] = $provinces[$cityLower];
        }
    }

    return $result;
}

// ========== MAP FUNCTIONS ==========
function mapProvince($name) {
    $name = strtolower(trim($name));
    if (empty($name)) return 'harare';
    $map = [
        'harare' => 'harare', 'bulawayo' => 'bulawayo', 'manicaland' => 'manicaland',
        'masvingo' => 'masvingo', 'midlands' => 'midlands', 'gweru' => 'midlands',
        'mutare' => 'manicaland', 'kwekwe' => 'midlands',
        'mashonaland central' => 'mashonaland-central', 'mashonaland east' => 'mashonaland-east',
        'mashonaland west' => 'mashonaland-west', 'matabeleland north' => 'matabeleland-north',
        'matabeleland south' => 'matabeleland-south',
    ];
    if (isset($map[$name])) return $map[$name];
    foreach ($map as $key => $val) { if (strpos($name, $key) !== false) return $val; }
    return 'harare';
}

function mapIndustry($name) {
    $name = strtolower(trim($name));
    if (empty($name)) return 'construction';
    $map = [
        'general-contractors' => 'construction', 'building' => 'construction',
        'contractors' => 'construction', 'construction' => 'construction',
        'engineering' => 'construction', 'mining' => 'mining',
        'manufacturing' => 'manufacturing', 'agriculture' => 'agriculture',
        'transport' => 'transport-logistics', 'logistics' => 'transport-logistics',
    ];
    if (isset($map[$name])) return $map[$name];
    foreach ($map as $key => $val) { if (strpos($name, $key) !== false) return $val; }
    return 'construction';
}

function getProvinceId($db, $slug) {
    $stmt = $db->prepare("SELECT id FROM provinces WHERE slug = :slug");
    $stmt->execute([':slug' => $slug]);
    $result = $stmt->fetch();
    return $result ? $result['id'] : 1;
}

function getProvinceName($db, $id) {
    $stmt = $db->prepare("SELECT name FROM provinces WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetch();
    return $result ? $result['name'] : 'Harare';
}

function getIndustryId($db, $slug) {
    $stmt = $db->prepare("SELECT id FROM industries WHERE slug = :slug");
    $stmt->execute([':slug' => $slug]);
    $result = $stmt->fetch();
    return $result ? $result['id'] : 6;
}

function getIndustryName($db, $id) {
    $stmt = $db->prepare("SELECT name FROM industries WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetch();
    return $result ? $result['name'] : 'Construction';
}
?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3>📥 Import Companies from CSV</h3>
        <a href="members.php" class="btn btn-info">← View Members</a>
    </div>

    <?php if (!empty($previewData)): ?>
    <!-- ========== PREVIEW MODE ========== -->
    <div class="alert alert-info">
        <h5><i class="bi bi-eye"></i> Preview - <?php echo count($previewData); ?> companies as <strong><?php echo $importStakeholder; ?></strong></h5>
        <p>Addresses are extracted from the description field. Click <strong>"Confirm Import"</strong> to save to database.</p>
    </div>
    <div style="overflow-x:auto;">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Industry</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($previewData as $i => $c): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><strong><?php echo htmlspecialchars($c['name']); ?></strong></td>
                    <td><span class="badge bg-success"><?php echo $c['industry_name']; ?></span></td>
                    <td><small style="color:#555;"><?php echo htmlspecialchars($c['address']); ?></small></td>
                    <td><?php echo $c['city']; ?></td>
                    <td><?php echo $c['province_name']; ?></td>
                    <td><small><?php echo htmlspecialchars($c['phone']); ?></small></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <form method="POST" enctype="multipart/form-data" class="mt-3 d-flex gap-2">
        <input type="hidden" name="confirm" value="1">
        <input type="hidden" name="csv_data" value="<?php echo base64_encode(serialize($previewData)); ?>">
        <input type="hidden" name="import_stakeholder" value="<?php echo $importStakeholder; ?>">
        <button type="submit" class="btn btn-success btn-lg">
            <i class="bi bi-check-circle"></i> Confirm Import (<?php echo count($previewData); ?> companies)
        </button>
        <a href="import-csv.php" class="btn btn-secondary btn-lg">Cancel</a>
    </form>

    <?php elseif (isset($_POST['confirm']) && isset($_POST['csv_data'])): ?>
    <!-- ========== IMPORT RESULTS ========== -->
    <?php
    $previewData = unserialize(base64_decode($_POST['csv_data']));
    $importStakeholder = $_POST['import_stakeholder'] ?? 'CZI';
    require_once __DIR__ . '/../api/config/database.php';
    $database = new Database();
    $db = $database->getConnection();

    foreach ($previewData as $c) {
        $checkStmt = $db->prepare("SELECT id FROM companies WHERE name = :name");
        $checkStmt->execute([':name' => $c['name']]);
        if ($checkStmt->fetch()) { $skipped++; continue; }

        try {
            $stmt = $db->prepare("
                INSERT INTO companies (name, industry_id, province_id, stakeholder, phone, email, website, logo, description, is_active)
                VALUES (:name, :industry_id, :province_id, :stakeholder, :phone, :email, :website, :logo, :description, :is_active)
            ");
            $stmt->execute([
                ':name' => $c['name'], ':industry_id' => $c['industry_id'],
                ':province_id' => $c['province_id'], ':stakeholder' => $c['stakeholder'],
                ':phone' => $c['phone'], ':email' => $c['email'],
                ':website' => $c['website'], ':logo' => $c['logo'],
                ':description' => $c['description'], ':is_active' => $c['is_active']
            ]);
            $imported++;
        } catch (Exception $e) { $errors[] = $c['name'] . ': ' . $e->getMessage(); }
    }
    ?>

    <div class="alert alert-success">
        <h5><i class="bi bi-check-circle"></i> Import Complete! (<?php echo $importStakeholder; ?>)</h5>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card text-center p-3" style="background:#e8f5e9;">
                    <h2 style="color:#006400;"><?php echo $imported; ?></h2>
                    <p class="mb-0">Imported</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-3" style="background:#fff3e0;">
                    <h2 style="color:#e65100;"><?php echo $skipped; ?></h2>
                    <p class="mb-0">Skipped (Duplicates)</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-3" style="background:#ffebee;">
                    <h2 style="color:#c62828;"><?php echo count($errors); ?></h2>
                    <p class="mb-0">Errors</p>
                </div>
            </div>
        </div>

        <?php if (!empty($errors)): ?>
        <div class="mt-3"><h6>Errors:</h6><ul><?php foreach($errors as $e) echo "<li>$e</li>"; ?></ul></div>
        <?php endif; ?>

        <div class="mt-3">
            <a href="members.php" class="btn btn-primary">View Imported Companies</a>
            <a href="import-csv.php" class="btn btn-secondary">Import Another File</a>
            <a href="stakeholder.php?org=<?php echo $importStakeholder; ?>&section=directory" class="btn btn-info">View <?php echo $importStakeholder; ?> Directory</a>
        </div>
    </div>

    <?php else: ?>
    <!-- ========== UPLOAD FORM ========== -->
    <div class="card" style="border:1px solid #e0e0e0;">
        <div class="card-body">
            <h5><i class="bi bi-upload"></i> Upload Directory CSV</h5>
            <p class="text-muted">Works with both CZI and CIFOZ Sabai directory exports. Addresses are auto-extracted from descriptions.</p>
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="fw-bold">Select Stakeholder *</label>
                            <select name="import_stakeholder" class="form-select" required>
                                <option value="CZI">CZI - Confederation of Zimbabwe Industries</option>
                                <option value="CIFOZ">CIFOZ - Construction Industry Federation</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="fw-bold">Select CSV File *</label>
                            <input type="file" name="csv_file" class="form-control" accept=".csv,.tsv,.txt" required>
                        </div>
                    </div>
                </div>
                <button type="submit" name="preview" value="1" class="btn btn-info btn-lg">
                    <i class="bi bi-eye"></i> Preview Before Import
                </button>
            </form>
        </div>
    </div>

    <div class="card mt-4" style="border:1px solid #e0e0e0;">
        <div class="card-body">
            <h5>📋 How It Works</h5>
            <table class="table table-sm table-bordered">
                <thead><tr><th>Data</th><th>Source Column</th></tr></thead>
                <tbody>
                    <tr><td><strong>Company Name</strong></td><td><code>content_post_title</code></td></tr>
                    <tr><td><strong>Industry</strong></td><td><code>directory_category</code> (auto-mapped)</td></tr>
                    <tr><td><strong>Address</strong></td><td><code>content_body</code> (description field)</td></tr>
                    <tr><td><strong>City & Province</strong></td><td>Auto-extracted from address</td></tr>
                    <tr><td><strong>Phone</strong></td><td><code>directory_contact__phone</code> or <code>directory_contact__mobile</code></td></tr>
                    <tr><td><strong>Email</strong></td><td><code>directory_contact__email</code></td></tr>
                    <tr><td><strong>Website</strong></td><td><code>directory_contact__website</code></td></tr>
                    <tr><td><strong>Logo</strong></td><td><code>directory_photos</code></td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>