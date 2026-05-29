<?php
$pageTitle = "Tenders";
$pageDescription = "Active tenders and business opportunities across Zimbabwe";
require_once __DIR__ . '/includes/head.php';
?>
<style>
    .tender-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 3px 20px rgba(0,0,0,0.08);
        padding: 25px;
        margin-bottom: 20px;
        border-left: 5px solid #006400;
        transition: all 0.3s ease;
    }
    .tender-card:hover {
        box-shadow: 0 8px 30px rgba(0,100,0,0.12);
        transform: translateX(3px);
    }
    .tender-card.urgent {
        border-left-color: #C62828;
    }
    .tender-card.closed {
        border-left-color: #999;
        opacity: 0.7;
    }
    .tender-card .tender-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 12px;
    }
    .tender-card .tender-header h4 {
        font-size: 20px;
        font-weight: 700;
        margin: 0;
        color: #111;
    }
    .tender-card .meta-badges {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 10px;
    }
    .tender-card .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }
    .tender-card .info-item {
        font-size: 14px;
    }
    .tender-card .info-item strong {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
        color: #888;
        letter-spacing: 0.5px;
        margin-bottom: 3px;
    }
    .tender-card .info-item span {
        color: #333;
        font-weight: 500;
    }
    .tender-card .closing-box {
        background: #f9f9f9;
        padding: 12px 15px;
        border-radius: 8px;
        text-align: center;
        min-width: 120px;
    }
    .tender-card .closing-box .days {
        font-size: 28px;
        font-weight: 700;
        color: #006400;
        line-height: 1;
    }
    .tender-card .closing-box .days.urgent {
        color: #C62828;
    }
    .tender-card .closing-box .label {
        font-size: 11px;
        color: #888;
        text-transform: uppercase;
        margin-top: 4px;
    }
    .filter-bar {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }
    .btn-view-details {
        background: #006400;
        color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-view-details:hover {
        background: #004d00;
    }
</style>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main">

    <section class="page-title section dark-background" style="background: url('assets/img/hero-section2.jpg') center center; background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center" data-aos="fade-up">
            <h1>Tenders</h1>
            <p style="color: rgba(255,255,255,0.9);">Active tenders and business opportunities across Zimbabwe</p>
          </div>
        </div>
      </div>
    </section>

    <section class="services section light-background">
      <div class="container">

        <!-- Filter Bar -->
        <div class="filter-bar" data-aos="fade-up">
          <div class="row align-items-end">
            <div class="col-md-3 mb-2">
              <label class="fw-bold small text-uppercase">Status</label>
              <select class="form-select" id="statusFilter" onchange="applyFilters()">
                <option value="all">All Tenders</option>
                <option value="active" selected>Active Only</option>
                <option value="expired">Expired</option>
              </select>
            </div>
            <div class="col-md-3 mb-2">
              <label class="fw-bold small text-uppercase">Category</label>
              <select class="form-select" id="categoryFilter" onchange="applyFilters()">
                <option value="">All Categories</option>
              </select>
            </div>
            <div class="col-md-4 mb-2">
              <label class="fw-bold small text-uppercase">Search</label>
              <input type="text" class="form-control" id="searchInput" placeholder="Search by title, organization, or description..." onkeyup="applyFilters()">
            </div>
            <div class="col-md-2 mb-2">
              <button class="btn btn-outline-success w-100" onclick="resetFilters()">
                <i class="bi bi-arrow-repeat"></i> Reset
              </button>
            </div>
          </div>
        </div>

        <p class="mb-3" data-aos="fade-up">
          <span id="resultCount" class="fw-bold" style="color:#006400;">0</span> tenders found
        </p>

        <div id="tendersContainer">
          <div class="text-center py-5">
            <div class="spinner-border text-success"></div>
            <p class="mt-3">Loading tenders...</p>
          </div>
        </div>

      </div>
    </section>

    <section class="call-to-action section dark-background">
      <img src="assets/img/bg/bg-8.webp" alt="">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Have a Tender to Post?</h3>
            <p>Submit your tender on industry.co.zw and reach qualified businesses across Zimbabwe.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="contact.php">Submit Tender</a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- Tender Detail Modal -->
  <div class="modal fade" id="tenderDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background:#006400;color:#fff;">
          <h5 class="modal-title" id="modalTitle">Tender Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" id="modalBody"></div>
      </div>
    </div>
  </div>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script>
    const API = '/industry.co.zw/api/public';
    let allTenders = [];

    fetch(API + '/tenders.php')
      .then(r => r.json())
      .then(d => {
        if (d.status === 'success') {
          allTenders = d.data;
          populateCategoryFilter();
        }
        show();
      })
      .catch(() => {
        document.getElementById('tendersContainer').innerHTML = '<div class="text-center py-5"><h4>Could not load tenders</h4></div>';
      });

    function populateCategoryFilter() {
      const categories = [...new Set(allTenders.map(t => t.category).filter(Boolean))];
      const select = document.getElementById('categoryFilter');
      categories.sort().forEach(cat => {
        select.innerHTML += `<option value="${cat}">${cat}</option>`;
      });
    }

    function getFiltered() {
      const status = document.getElementById('statusFilter').value;
      const category = document.getElementById('categoryFilter').value;
      const search = document.getElementById('searchInput').value.toLowerCase();
      return allTenders.filter(t => {
        if (status === 'active' && t.is_expired) return false;
        if (status === 'expired' && !t.is_expired) return false;
        if (category && t.category !== category) return false;
        if (search && !t.title.toLowerCase().includes(search) && 
            !t.description.toLowerCase().includes(search) &&
            !t.issuing_organization.toLowerCase().includes(search) &&
            !t.tender_number.toLowerCase().includes(search)) return false;
        return true;
      });
    }

    function show() {
      const filtered = getFiltered();
      document.getElementById('resultCount').textContent = filtered.length;
      const container = document.getElementById('tendersContainer');

      if (filtered.length === 0) {
        container.innerHTML = '<div class="text-center py-5"><i class="bi bi-file-earmark-x" style="font-size:48px;color:#ccc;"></i><h4 class="mt-3">No tenders found</h4><button class="btn btn-success mt-2" onclick="resetFilters()">Reset Filters</button></div>';
        return;
      }

      container.innerHTML = filtered.map(t => {
        const closingDate = new Date(t.closing_date);
        const today = new Date();
        const daysLeft = Math.ceil((closingDate - today) / (1000 * 60 * 60 * 24));
        const isExpired = t.is_expired;
        const isUrgent = !isExpired && daysLeft <= 7;

        let statusClass = '';
        let statusLabel = '';
        if (isExpired) { statusClass = 'closed'; statusLabel = '<span class="badge bg-secondary">Closed</span>'; }
        else if (isUrgent) { statusClass = 'urgent'; statusLabel = '<span class="badge bg-danger">Closing Soon</span>'; }
        else { statusLabel = '<span class="badge bg-success">Open</span>'; }

        let daysClass = isExpired ? '' : (isUrgent ? 'urgent' : '');
        let daysDisplay = isExpired ? 'Closed' : daysLeft;

        return `
          <div class="tender-card ${statusClass}" data-aos="fade-up">
            <div class="row">
              <div class="col-md-9">
                <div class="tender-header">
                  <h4>${t.title}</h4>
                </div>
                <div class="meta-badges">
                  ${statusLabel}
                  ${t.tender_number ? '<span class="badge bg-dark">' + t.tender_number + '</span>' : ''}
                  ${t.category ? '<span class="badge bg-info">' + t.category + '</span>' : ''}
                  ${t.budget ? '<span class="badge bg-warning text-dark">Budget: $' + parseFloat(t.budget).toLocaleString() + '</span>' : ''}
                </div>
                <p style="color:#555;margin-bottom:0;">${t.description ? t.description.substring(0, 250) + (t.description.length > 250 ? '...' : '') : 'No description available'}</p>
                
                <div class="info-grid">
                  ${t.issuing_organization ? '<div class="info-item"><strong>Issuing Organization</strong><span>' + t.issuing_organization + '</span></div>' : ''}
                  ${t.location ? '<div class="info-item"><strong>Location</strong><span><i class="bi bi-geo-alt"></i> ' + t.location + '</span></div>' : ''}
                  ${t.contact_email ? '<div class="info-item"><strong>Contact Email</strong><span><i class="bi bi-envelope"></i> ' + t.contact_email + '</span></div>' : ''}
                  ${t.contact_phone ? '<div class="info-item"><strong>Contact Phone</strong><span><i class="bi bi-telephone"></i> ' + t.contact_phone + '</span></div>' : ''}
                  ${t.bid_opening_date ? '<div class="info-item"><strong>Bid Opening Date</strong><span><i class="bi bi-calendar-check"></i> ' + new Date(t.bid_opening_date).toLocaleDateString('en-ZA', {day:'numeric', month:'short', year:'numeric'}) + '</span></div>' : ''}
                </div>
              </div>
              <div class="col-md-3 text-center">
                <div class="closing-box">
                  <div class="days ${daysClass}">${daysDisplay}</div>
                  <div class="label">${isExpired ? 'Tender Closed' : 'Days Remaining'}</div>
                  <div style="font-size:13px;font-weight:600;color:#333;margin-top:5px;">
                    ${closingDate.toLocaleDateString('en-ZA', {day:'numeric', month:'short', year:'numeric'})}
                  </div>
                </div>
                <button class="btn-view-details mt-3 w-100" onclick="viewDetails(${t.id})">
                  <i class="bi bi-eye"></i> View Details
                </button>
                ${t.document_url ? '<a href="/industry.co.zw/' + t.document_url + '" target="_blank" class="btn btn-outline-success btn-sm mt-2 w-100"><i class="bi bi-download"></i> Download</a>' : ''}
              </div>
            </div>
          </div>`;
      }).join('');
    }

    function viewDetails(id) {
      const t = allTenders.find(x => x.id == id);
      if (!t) return;
      
      document.getElementById('modalTitle').textContent = t.title;
      document.getElementById('modalBody').innerHTML = `
        <div class="row">
          <div class="col-md-8">
            ${t.tender_number ? '<p><strong>Tender Number:</strong> ' + t.tender_number + '</p>' : ''}
            ${t.issuing_organization ? '<p><strong>Issuing Organization:</strong> ' + t.issuing_organization + '</p>' : ''}
            ${t.category ? '<p><strong>Category:</strong> <span class="badge bg-info">' + t.category + '</span></p>' : ''}
            ${t.budget ? '<p><strong>Budget:</strong> $' + parseFloat(t.budget).toLocaleString() + '</p>' : ''}
            ${t.location ? '<p><strong>Location:</strong> ' + t.location + '</p>' : ''}
            <hr>
            <h6>Description</h6>
            <p>${t.description || 'No description provided'}</p>
            ${t.submission_requirements ? '<h6>Submission Requirements</h6><p>' + t.submission_requirements + '</p>' : ''}
            ${t.eligibility_criteria ? '<h6>Eligibility Criteria</h6><p>' + t.eligibility_criteria + '</p>' : ''}
          </div>
          <div class="col-md-4">
            <div style="background:#f9f9f9;padding:15px;border-radius:8px;">
              <p><strong><i class="bi bi-calendar-x"></i> Closing Date:</strong><br>${new Date(t.closing_date).toLocaleDateString('en-ZA', {weekday:'long', day:'numeric', month:'long', year:'numeric'})}</p>
              ${t.bid_opening_date ? '<p><strong><i class="bi bi-calendar-check"></i> Bid Opening:</strong><br>' + new Date(t.bid_opening_date).toLocaleDateString('en-ZA', {weekday:'long', day:'numeric', month:'long', year:'numeric'}) + '</p>' : ''}
              ${t.contact_email ? '<p><strong><i class="bi bi-envelope"></i> Email:</strong><br>' + t.contact_email + '</p>' : ''}
              ${t.contact_phone ? '<p><strong><i class="bi bi-telephone"></i> Phone:</strong><br>' + t.contact_phone + '</p>' : ''}
            </div>
            <div class="mt-3">
              ${t.document_url ? '<a href="/industry.co.zw/' + t.document_url + '" target="_blank" class="btn btn-success btn-sm w-100 mb-2"><i class="bi bi-download"></i> Download Document 1</a>' : ''}
              ${t.document_url2 ? '<a href="/industry.co.zw/' + t.document_url2 + '" target="_blank" class="btn btn-outline-success btn-sm w-100 mb-2"><i class="bi bi-download"></i> Download Document 2</a>' : ''}
              ${t.document_url3 ? '<a href="/industry.co.zw/' + t.document_url3 + '" target="_blank" class="btn btn-outline-success btn-sm w-100"><i class="bi bi-download"></i> Download Document 3</a>' : ''}
            </div>
          </div>
        </div>`;
      
      new bootstrap.Modal(document.getElementById('tenderDetailModal')).show();
    }

    function applyFilters() { show(); }
    function resetFilters() {
      document.getElementById('statusFilter').value = 'all';
      document.getElementById('categoryFilter').value = '';
      document.getElementById('searchInput').value = '';
      show();
    }
  </script>

</body>
</html>