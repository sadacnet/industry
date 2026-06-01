<?php
$pageTitle = "Browse Industries";
$pageDescription = "Discover and connect with industries across Zimbabwe";
require_once __DIR__ . '/includes/head.php';
?>
<style>
  .page-header {
    background: #f8f9fa;
    padding: 60px 0;
    text-align: center;
    border-bottom: 1px solid #eee;
  }
  .page-header h1 { font-weight: 700; color: #222; }

  .category-card {
    background: #fff;
    border: 1px solid #eee;
    padding: 30px 20px;
    border-radius: 10px;
    text-align: center;
    transition: 0.3s;
    height: 100%;
    display: block;
    text-decoration: none;
    color: inherit;
  }
  .category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-color: #5cb85c;
  }
  .category-card i {
    font-size: 3rem;
    color: #5cb85c;
    margin-bottom: 20px;
    display: block;
  }
  .category-card h3 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 10px;
  }
  .category-card .count {
    color: #777;
    font-size: 0.9rem;
  }
</style>
</head>

<body class="industries-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main">

    <div class="page-header">
      <div class="container">
        <h1>Industrial Sectors</h1>
        <p class="lead">Select a category to find verified suppliers</p>
      </div>
    </div>

    <section class="py-5">
      <div class="container">
        <div class="row g-4" id="industries-grid">
           <!-- Loaded via API -->
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('api/public/industries.php')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const grid = document.getElementById('industries-grid');
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
                        'abrasives': 'bi bi-gem',
                        'air-conditioning': 'bi bi-wind'
                    };
                    grid.innerHTML = data.data.map(ind => `
                        <div class="col-lg-3 col-md-4 col-6">
                            <a href="find-suppliers?type=${ind.slug}" class="category-card">
                                <i class="${icons[ind.slug] || 'bi bi-box-seam'}"></i>
                                <h3>${ind.name}</h3>
                                <span class="count">Explore Listings</span>
                            </a>
                        </div>
                    `).join('');
                }
            });
    });
  </script>
</body>
</html>
