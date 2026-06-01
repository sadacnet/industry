<?php
/**
 * Public API: Companies
 * GET /api/public/companies.php - List all companies with filters
 * Parameters:
 *   - featured=1 (boolean)
 *   - industry=[slug] (string)
 *   - industry_id=[id] (integer)
 *   - province=[slug] (string)
 *   - stakeholder=[slug] (string)
 *   - search=[term] (string)
 */

ini_set('display_errors', '0');
error_reporting(0);

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT c.*, i.name as industry_name, i.slug as industry_slug
              FROM companies c
              LEFT JOIN industries i ON c.industry_id = i.id";

    $conditions = ["c.is_active = 1"];
    $params = [];

    // Featured filter
    if (isset($_GET['featured']) && $_GET['featured'] == 1) {
        $conditions[] = "c.is_featured = 1";
    }

    // Industry Filter (ID)
    if (isset($_GET['industry_id'])) {
        $conditions[] = "c.industry_id = :ind_id";
        $params[':ind_id'] = $_GET['industry_id'];
    }

    // Industry Filter (Slug)
    if (isset($_GET['industry'])) {
        $conditions[] = "i.slug = :ind_slug";
        $params[':ind_slug'] = $_GET['industry'];
    }

    // Province Filter (Slug) - Assuming companies has a province_id linked to a provinces table
    if (isset($_GET['province'])) {
        $query .= " LEFT JOIN provinces p ON c.province_id = p.id";
        $conditions[] = "p.slug = :prov_slug";
        $params[':prov_slug'] = $_GET['province'];
    }

    // Search Filter
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = "%" . $_GET['search'] . "%";
        $conditions[] = "(c.name LIKE :search OR c.description LIKE :search2)";
        $params[':search'] = $searchTerm;
        $params[':search2'] = $searchTerm;
    }

    $where = count($conditions) > 0 ? " WHERE " . implode(" AND ", $conditions) : "";
    $query .= $where . " ORDER BY c.name ASC";

    $stmt = $db->prepare($query);
    foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
    }
    $stmt->execute();

    $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "count" => count($companies),
        "data" => $companies
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    // Sanitize error message for production
    echo json_encode(["status" => "error", "message" => "An internal database error occurred."]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "An unexpected error occurred."]);
}
?>