<?php
require_once __DIR__ . '/includes/header.php';
?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3>📤 Upload Files</h3>
        <a href="dashboard.php" class="btn btn-info">← Back to Dashboard</a>
    </div>

    <div id="alertArea"></div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="uploadTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#companyUpload" type="button">
                <i class="bi bi-building"></i> Company Logo
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#productUpload" type="button">
                <i class="bi bi-box-seam"></i> Product Image
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#galleryUpload" type="button">
                <i class="bi bi-images"></i> Gallery
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#documentUpload" type="button">
                <i class="bi bi-file-earmark-pdf"></i> Documents
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#adUpload" type="button">
                <i class="bi bi-megaphone"></i> Advertisement
            </button>
        </li>
    </ul>

    <div class="tab-content">

        <!-- Company Logo Upload -->
        <div class="tab-pane fade show active" id="companyUpload">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card" style="border:1px solid #e0e0e0;">
                        <div class="card-body">
                            <h5><i class="bi bi-building"></i> Upload Company Logo</h5>
                            <form id="companyUploadForm" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Select Company *</label>
                                    <select class="form-select" id="companySelect" required>
                                        <option value="">Loading companies...</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Company Logo *</label>
                                    <input type="file" class="form-control" id="companyLogo" accept="image/*" required>
                                    <small class="text-muted">Recommended: 200x200px, PNG or JPG</small>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-upload"></i> Upload Logo
                                </button>
                            </form>
                            <div id="companyPreview" class="text-center mt-3"></div>
                            <div id="companyResult" class="mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="border:1px solid #e0e0e0;">
                        <div class="card-body">
                            <h5><i class="bi bi-info-circle"></i> Selected Company Info</h5>
                            <div id="companyInfo">
                                <p class="text-muted">Select a company to see details</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Image Upload -->
        <div class="tab-pane fade" id="productUpload">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card" style="border:1px solid #e0e0e0;">
                        <div class="card-body">
                            <h5><i class="bi bi-box-seam"></i> Upload Product Image</h5>
                            <form id="productUploadForm" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Select Product *</label>
                                    <select class="form-select" id="productSelect" required>
                                        <option value="">Loading products...</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Product Image *</label>
                                    <input type="file" class="form-control" id="productImage" accept="image/*" required>
                                    <small class="text-muted">Max: 10MB | JPG, PNG, WebP</small>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-upload"></i> Upload Product Image
                                </button>
                            </form>
                            <div id="productPreview" class="text-center mt-3"></div>
                            <div id="productResult" class="mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="border:1px solid #e0e0e0;">
                        <div class="card-body">
                            <h5><i class="bi bi-info-circle"></i> Selected Product Info</h5>
                            <div id="productInfo">
                                <p class="text-muted">Select a product to see details</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Upload -->
        <div class="tab-pane fade" id="galleryUpload">
            <div class="card" style="border:1px solid #e0e0e0;">
                <div class="card-body">
                    <h5><i class="bi bi-images"></i> Upload to Gallery</h5>
                    <form id="galleryUploadForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Image Title</label>
                                    <input type="text" class="form-control" id="galleryTitle" placeholder="e.g., CZI Conference 2026">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Category/Album</label>
                                    <select class="form-select" id="galleryCategory">
                                        <option value="events">Events</option>
                                        <option value="industry">Industry</option>
                                        <option value="tourism">Tourism</option>
                                        <option value="general">General</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Image *</label>
                                    <input type="file" class="form-control" id="galleryImage" accept="image/*" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-upload"></i> Upload to Gallery
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="galleryPreview" class="text-center mt-3"></div>
                    <div id="galleryResult" class="mt-3"></div>
                </div>
            </div>
        </div>

        <!-- Document Upload - NEW TAB -->
        <div class="tab-pane fade" id="documentUpload">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card" style="border:1px solid #e0e0e0;">
                        <div class="card-body">
                            <h5><i class="bi bi-file-earmark-pdf"></i> Upload Document</h5>
                            <p class="text-muted small">Upload PDF, Word, or other documents for tenders and downloads</p>
                            <form id="documentUploadForm" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Document Title</label>
                                    <input type="text" class="form-control" id="docTitle" placeholder="e.g., Tender Specifications - Mining Equipment">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Document Category</label>
                                    <select class="form-select" id="docCategory">
                                        <option value="tender">Tender Document</option>
                                        <option value="report">Report</option>
                                        <option value="brochure">Brochure</option>
                                        <option value="form">Application Form</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Select File *</label>
                                    <input type="file" class="form-control" id="documentFile" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" required>
                                    <small class="text-muted">Allowed: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX | Max: 10MB</small>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-upload"></i> Upload Document
                                </button>
                            </form>
                            <div id="documentResult" class="mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="border:1px solid #e0e0e0;">
                        <div class="card-body">
                            <h5><i class="bi bi-info-circle"></i> Upload Guidelines</h5>
                            <table class="table table-sm">
                                <thead><tr><th>File Type</th><th>Max Size</th><th>Use For</th></tr></thead>
                                <tbody>
                                    <tr><td>PDF</td><td>10MB</td><td>Tender documents, official forms</td></tr>
                                    <tr><td>DOC/DOCX</td><td>10MB</td><td>Word documents, applications</td></tr>
                                    <tr><td>XLS/XLSX</td><td>10MB</td><td>Spreadsheets, pricing sheets</td></tr>
                                    <tr><td>PPT/PPTX</td><td>10MB</td><td>Presentations, proposals</td></tr>
                                </tbody>
                            </table>
                            <div class="alert alert-info mt-3">
                                <i class="bi bi-lightbulb"></i>
                                <strong>Tip:</strong> After uploading, copy the file path and paste it into the Tender's Document URL field.
                            </div>
                            <div class="alert alert-warning mt-2">
                                <i class="bi bi-shield-lock"></i>
                                <strong>Security:</strong> All uploaded documents are scanned for malware before saving.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advertisement Upload -->
        <div class="tab-pane fade" id="adUpload">
            <div class="card" style="border:1px solid #e0e0e0;">
                <div class="card-body">
                    <h5><i class="bi bi-megaphone"></i> Upload Advertisement</h5>
                    <form id="adUploadForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Stakeholder *</label>
                                    <select class="form-select" id="adStakeholder" required>
                                        <option value="CZI">CZI</option>
                                        <option value="CIFOZ">CIFOZ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Ad Type *</label>
                                    <select class="form-select" id="adType" required>
                                        <option value="banner">Banner</option>
                                        <option value="logo">Logo</option>
                                        <option value="poster">Poster</option>
                                        <option value="flyer">Flyer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Title</label>
                                    <input type="text" class="form-control" id="adTitle" placeholder="Ad title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">File *</label>
                                    <input type="file" class="form-control" id="adFile" accept="image/*,.pdf" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-upload"></i> Upload Advertisement
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="adPreview" class="text-center mt-3"></div>
                    <div id="adResult" class="mt-3"></div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Recently Uploaded Files -->
<div class="card mt-4">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3>🖼️ Recently Uploaded Files</h3>
        <button class="btn btn-info" onclick="loadRecentUploads()">
            <i class="bi bi-arrow-clockwise"></i> Refresh
        </button>
    </div>
    <div id="recentUploads" class="row">
        <div class="col-12 text-center py-4">
            <div class="spinner-border text-success"></div>
            <p class="text-muted mt-2">Loading...</p>
        </div>
    </div>
</div>

<script>
    const API_BASE = '/industry.co.zw';

    // Load Companies
    async function loadCompanies() {
        try {
            const response = await fetch(API_BASE + '/api/public/companies.php');
            const data = await response.json();
            if (data.status === 'success') {
                const select = document.getElementById('companySelect');
                select.innerHTML = '<option value="">Select a company...</option>' +
                    data.data.map(c => `<option value="${c.id}">${c.name} (${c.industry_name})</option>`).join('');
            }
        } catch (error) { console.error('Error:', error); }
    }

    // Load Products
    async function loadProducts() {
        try {
            const response = await fetch(API_BASE + '/api/public/exports.php');
            const data = await response.json();
            if (data.status === 'success') {
                const select = document.getElementById('productSelect');
                if (data.data.length === 0) {
                    select.innerHTML = '<option value="">No products found</option>';
                } else {
                    select.innerHTML = '<option value="">Select a product...</option>' +
                        data.data.map(p => `<option value="${p.id}" data-name="${p.product_name}" data-category="${p.category || 'General'}" data-image="${p.image || ''}">${p.product_name} (${p.category || 'General'})</option>`).join('');
                }
            }
        } catch (error) { console.error('Error:', error); }
    }

    // Company Info
    document.getElementById('companySelect').addEventListener('change', async function() {
        const id = this.value;
        if (!id) { document.getElementById('companyInfo').innerHTML = '<p class="text-muted">Select a company to see details</p>'; return; }
        try {
            const response = await fetch(API_BASE + '/admin/api/members.php?id=' + id);
            const data = await response.json();
            if (data.status === 'success' && data.data) {
                const c = data.data;
                document.getElementById('companyInfo').innerHTML = `
                    <table class="table table-sm">
                        <tr><td><strong>Name:</strong></td><td>${c.name}</td></tr>
                        <tr><td><strong>Industry:</strong></td><td>${c.industry_name}</td></tr>
                        <tr><td><strong>Province:</strong></td><td>${c.province_name}</td></tr>
                        <tr><td><strong>Phone:</strong></td><td>${c.phone || 'N/A'}</td></tr>
                        <tr><td><strong>Email:</strong></td><td>${c.email || 'N/A'}</td></tr>
                        <tr><td><strong>Current Logo:</strong></td>
                            <td>${c.logo ? `<img src="${API_BASE}/${c.logo}" style="max-height:50px; border-radius:4px;">` : '<span class="badge bg-secondary">No logo</span>'}</td></tr>
                    </table>`;
            }
        } catch (error) { console.error('Error:', error); }
    });

    // Product Info
    document.getElementById('productSelect').addEventListener('change', function() {
        const opt = this.options[this.selectedIndex];
        const id = this.value;
        if (!id) { document.getElementById('productInfo').innerHTML = '<p class="text-muted">Select a product</p>'; return; }
        document.getElementById('productInfo').innerHTML = `
            <table class="table table-sm">
                <tr><td><strong>Product:</strong></td><td>${opt.getAttribute('data-name')}</td></tr>
                <tr><td><strong>Category:</strong></td><td><span class="badge bg-success">${opt.getAttribute('data-category')}</span></td></tr>
                <tr><td><strong>Current Image:</strong></td>
                    <td>${opt.getAttribute('data-image') ? `<img src="${API_BASE}/${opt.getAttribute('data-image')}" style="max-height:60px; border-radius:4px;">` : '<span class="badge bg-secondary">No image</span>'}</td></tr>
            </table>`;
    });

    // Preview functions
    function setupPreview(inputId, previewId) {
        document.getElementById(inputId).addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(previewId).innerHTML = `<p class="text-muted mb-1">Preview:</p><img src="${e.target.result}" style="max-width:200px; max-height:200px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">`;
                    };
                    reader.readAsDataURL(file);
                } else {
                    document.getElementById(previewId).innerHTML = `<div class="alert alert-info"><i class="bi bi-file-earmark"></i> ${file.name} (${(file.size/1024).toFixed(1)} KB)</div>`;
                }
            }
        });
    }

    setupPreview('companyLogo', 'companyPreview');
    setupPreview('productImage', 'productPreview');
    setupPreview('galleryImage', 'galleryPreview');
    setupPreview('documentFile', 'galleryPreview');
    setupPreview('adFile', 'adPreview');

    // Upload function
    async function handleUpload(formData, resultId) {
        const resultDiv = document.getElementById(resultId);
        resultDiv.innerHTML = '<div class="alert alert-info"><div class="spinner-border spinner-border-sm"></div> Uploading...</div>';
        try {
            const response = await fetch(API_BASE + '/admin/api/upload.php', { method: 'POST', body: formData });
            const data = await response.json();
            if (data.status === 'success') {
                resultDiv.innerHTML = `
                    <div class="alert alert-success">
                        <strong><i class="bi bi-check-circle"></i> Uploaded!</strong><br>
                        Path: <code style="background:#e8f5e9;padding:2px 6px;border-radius:3px;">${data.data.file_path}</code>
                        ${data.data.file_type && ['jpg','jpeg','png','gif','webp'].includes(data.data.file_type.toLowerCase()) ?
                            `<br><img src="${data.data.full_url}" style="max-width:100px;margin-top:5px;border-radius:4px;">` : ''}
                        <br><button class="btn btn-sm btn-outline-success mt-1" onclick="copyPath('${data.data.file_path}')"><i class="bi bi-clipboard"></i> Copy Path</button>
                    </div>`;
                showAlert('File uploaded successfully!', 'success');
                loadRecentUploads();
                return data.data;
            } else {
                resultDiv.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                return null;
            }
        } catch (error) {
            resultDiv.innerHTML = `<div class="alert alert-danger">${error.message}</div>`;
            return null;
        }
    }

    // Company Logo
    document.getElementById('companyUploadForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const companyId = document.getElementById('companySelect').value;
        const file = document.getElementById('companyLogo').files[0];
        if (!companyId || !file) { showAlert('Select company and file', 'error'); return; }
        const formData = new FormData(); formData.append('file', file); formData.append('type', 'logo');
        const result = await handleUpload(formData, 'companyResult');
        if (result) {
            await fetch(API_BASE + '/admin/api/members.php?id=' + companyId, {
                method: 'PUT', headers: {'Content-Type':'application/json'}, body: JSON.stringify({logo: result.file_path})
            });
            showAlert('Company logo updated!', 'success');
            document.getElementById('companyLogo').value = '';
            document.getElementById('companyPreview').innerHTML = '';
        }
    });

    // Product Image
    document.getElementById('productUploadForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const productId = document.getElementById('productSelect').value;
        const file = document.getElementById('productImage').files[0];
        if (!productId || !file) { showAlert('Select product and file', 'error'); return; }
        const formData = new FormData(); formData.append('file', file); formData.append('type', 'gallery');
        const result = await handleUpload(formData, 'productResult');
        if (result) {
            await fetch(API_BASE + '/admin/api/exports.php?id=' + productId, {
                method: 'PUT', headers: {'Content-Type':'application/json'}, body: JSON.stringify({image: result.file_path})
            });
            showAlert('Product image updated!', 'success');
            loadProducts();
            document.getElementById('productImage').value = '';
            document.getElementById('productPreview').innerHTML = '';
        }
    });

    // Gallery
    document.getElementById('galleryUploadForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const file = document.getElementById('galleryImage').files[0];
        if (!file) { showAlert('Select a file', 'error'); return; }
        const formData = new FormData(); formData.append('file', file); formData.append('type', 'gallery');
        const result = await handleUpload(formData, 'galleryResult');
        if (result) { document.getElementById('galleryImage').value = ''; document.getElementById('galleryPreview').innerHTML = ''; document.getElementById('galleryTitle').value = ''; }
    });

    // Document Upload - NEW
    document.getElementById('documentUploadForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const file = document.getElementById('documentFile').files[0];
        if (!file) { showAlert('Select a file', 'error'); return; }
        const formData = new FormData();
        formData.append('file', file);
        formData.append('type', 'document');
        formData.append('title', document.getElementById('docTitle').value);
        const result = await handleUpload(formData, 'documentResult');
        if (result) {
            document.getElementById('documentFile').value = '';
            document.getElementById('docTitle').value = '';
        }
    });

    // Advertisement
    document.getElementById('adUploadForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const file = document.getElementById('adFile').files[0];
        const adType = document.getElementById('adType').value;
        if (!file) { showAlert('Select a file', 'error'); return; }
        const formData = new FormData(); formData.append('file', file); formData.append('type', adType);
        const result = await handleUpload(formData, 'adResult');
        if (result) { document.getElementById('adFile').value = ''; document.getElementById('adPreview').innerHTML = ''; document.getElementById('adTitle').value = ''; }
    });

    // Recent Uploads
    async function loadRecentUploads() {
        try {
            const response = await fetch(API_BASE + '/api/public/gallery.php');
            const data = await response.json();
            const container = document.getElementById('recentUploads');
            if (data.status === 'success' && data.data.length > 0) {
                container.innerHTML = data.data.slice(0, 8).map(img => `
                    <div class="col-xl-3 col-md-4 col-6 mb-3">
                        <div class="card h-100">
                            <img src="${API_BASE}/${img.file_path}" class="card-img-top" style="height:100px;object-fit:cover;cursor:pointer;" onclick="window.open('${API_BASE}/${img.file_path}','_blank')" onerror="this.style.display='none'">
                            <div class="card-body p-2">
                                <small class="text-truncate d-block">${img.title || 'Untitled'}</small>
                                <code class="text-truncate d-block" style="font-size:10px;">${img.file_path}</code>
                                <button class="btn btn-sm btn-outline-info mt-1 w-100" onclick="copyPath('${img.file_path}')" style="font-size:11px;"><i class="bi bi-clipboard"></i> Copy</button>
                            </div>
                        </div>
                    </div>`).join('');
            } else {
                container.innerHTML = '<div class="col-12 text-center py-4"><i class="bi bi-cloud-upload" style="font-size:48px;color:#ccc;"></i><h5 class="mt-2">No files uploaded yet</h5></div>';
            }
        } catch (error) { console.error('Error:', error); }
    }

    function copyPath(path) {
        if (navigator.clipboard) { navigator.clipboard.writeText(path).then(() => showAlert('Copied!','success')); }
        else { prompt('Copy:', path); }
    }

    loadCompanies();
    loadProducts();
    loadRecentUploads();
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>