<?php
$pageTitle = "Industry Directory - industry.co.zw";
$pageDescription = "Browse member companies across various industries and sectors in Zimbabwe";
require_once __DIR__ . '/includes/head.php';
?>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main" style="background: #f5f5f5; padding: 40px 0;">

    <div class="container mb-4">
      <h2 style="color: #28a745; font-weight: 700;">Industry Directory</h2>
      <p class="text-muted">Explore categories and find suppliers</p>
    </div>

    <!-- Member Directory Section -->
    <section id="member-directory" class="member-directory section">
      <div class="container">

        <div class="row" id="directoryContent">
          <div class="col-12 text-center py-5">
            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;"></div>
            <p class="mt-3 text-muted">Loading directory...</p>
          </div>
        </div>

      </div>
    </section>

  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/js/main.js"></script>

  <style>
    .directory-column {
      margin-bottom: 30px;
    }

    .category-section {
      margin-bottom: 35px;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .category-title {
      display: flex;
      align-items: center;
      font-size: 1.25rem;
      font-weight: 700;
      color: #28a745;
      margin-bottom: 15px;
      border-bottom: 2px solid #f0f0f0;
      padding-bottom: 10px;
    }

    .category-icon {
      margin-right: 10px;
    }

    .directory-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 10px;
    }

    .directory-item {
      display: flex;
      align-items: center;
      padding: 8px 12px;
      color: #444;
      text-decoration: none;
      font-size: 0.95rem;
      transition: all 0.2s ease;
      background: #f9f9f9;
      border-radius: 4px;
    }

    .directory-item:hover {
      color: #fff;
      background: #28a745;
      padding-left: 15px;
    }

    .item-icon {
      margin-right: 10px;
      font-size: 1.1rem;
    }

    .item-text {
      flex: 1;
    }

    .item-count {
      font-size: 0.8rem;
      opacity: 0.7;
      margin-left: 5px;
    }
  </style>

  <script>
    const API = 'api/public';

    async function fetchAndRenderDirectory() {
      try {
        const response = await fetch(`${API}/industries.php`);
        const data = await response.json();

        if (data.status === 'success') {
          renderDirectory(data.data);
        } else {
          throw new Exception(data.message);
        }
      } catch (error) {
        document.getElementById('directoryContent').innerHTML = `
          <div class="col-12 text-center py-5">
            <div class="alert alert-danger">Failed to load directory. Please try again later.</div>
          </div>
        `;
      }
    }

    function renderDirectory(industries) {
      const container = document.getElementById('directoryContent');

      const icons = {
          'auto': 'bi bi-car-front',
          'agriculture': 'bi bi-flower1',
          'banking-finance': 'bi bi-bank',
          'construction': 'bi bi-building-gear',
          'manufacturing': 'bi bi-factory',
          'mining': 'bi bi-hammer',
          'technology-ict': 'bi bi-cpu',
          'tourism-hospitality': 'bi bi-piazza',
          'transport-logistics': 'bi bi-truck',
          'chemicals': 'bi bi-flask',
          'consulting': 'bi bi-briefcase',
          'electrical': 'bi bi-lightning',
          'metal-works': 'bi bi-wrench',
          'plastics': 'bi bi-file-earmark',
          'real-estate': 'bi bi-house',
          'pharmaceuticals': 'bi bi-capsule',
          'beauty-and-cosmetics': 'bi bi-handbag',
          'events-management': 'bi bi-calendar-event',
          'wedding-and-accessories': 'bi bi-heart',
          'fuel-technology': 'bi bi-fuel-pump',
          'media': 'bi bi-camera-video',
          'cements': 'bi bi-droplet',
          'air-conditioning': 'bi bi-snow',
          'brick-manufacturing': 'bi bi-building',
          'concrete-products': 'bi bi-square',
          'car-hiring': 'bi bi-car-front-fill',
          'fireplaces': 'bi bi-fire',
          'security': 'bi bi-shield-check',
          'food-and-nutrition': 'bi bi-cup-hot',
          'stationery': 'bi bi-journal',
          'health-and-hygiene': 'bi bi-heart-pulse',
          'hardware': 'bi bi-hammer',
          'printing': 'bi bi-printer',
          'fashion': 'bi bi-handbag'
      };

      let html = `
        <div class="col-12">
          <div class="category-section">
            <div class="category-title">
              <i class="bi bi-grid category-icon"></i>
              <span>All Industries</span>
              <span class="ms-2 badge bg-success">${industries.length}</span>
            </div>
            <ul class="directory-list">
              ${industries.map(ind => `
                <li>
                  <a href="companies.php?industry=${ind.slug}" class="directory-item">
                    <div class="item-icon">
                      <i class="${icons[ind.slug] || 'bi bi-box-seam'}"></i>
                    </div>
                    <span class="item-text">${ind.name}</span>
                    <span class="item-count">(${ind.company_count || 0})</span>
                  </a>
                </li>
              `).join('')}
            </ul>
          </div>
        </div>
      `;

      container.innerHTML = html;
    }

    // Load directory on page load
    document.addEventListener('DOMContentLoaded', function() {
      fetchAndRenderDirectory();
    });
  </script>

</body>
</html>
