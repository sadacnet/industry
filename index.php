<?php
$pageTitle = "Home";
$pageDescription = "The industry Hub of all industries in Zimbabwe";
require_once __DIR__ . '/includes/head.php';
?>
<style>
  #hero {
    position: relative;
    width: 100%;
    min-height: 80vh;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('assets/img/hero-section.jpg') center center;
    background-size: cover;
  }
  .hero-content h1 {
    font-size: 4rem;
    font-weight: 800;
    color: #fff;
    line-height: 1.1;
    margin-bottom: 2rem;
  }
  .hero-buttons {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
  }
  .btn-custom {
    min-width: 280px;
    padding: 12px 30px;
    border-radius: 4px;
    font-weight: 600;
    text-transform: uppercase;
    transition: 0.3s;
    text-decoration: none;
    display: inline-block;
  }
  .btn-find { background: #5cb85c; color: #fff; border: 2px solid #5cb85c; }
  .btn-czi { background: #fff; color: #333; border: 2px solid #fff; }
  .btn-list { background: #dc3545; color: #fff; border: 2px solid #dc3545; }

  .section-header { text-align: center; margin-bottom: 40px; }
  .section-header h1 { color: #28a745; font-weight: 700; font-size: 2.5rem; }
  .section-header h2 { color: #dc3545; font-style: italic; font-size: 1.5rem; }

  .industry-item {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    text-align: center;
    transition: 0.3s;
    height: 100%;
    border: 1px solid #eee;
  }
  .industry-item:hover { transform: translateY(-5px); border-color: #5cb85c; }
  .industry-item h3 { font-size: 1.2rem; font-weight: 700; margin: 0; color: #333; }

  .featured-logos img {
    max-height: 60px;
    margin: 20px;
    filter: grayscale(100%);
    opacity: 0.7;
    transition: 0.3s;
  }
  .featured-logos img:hover { filter: grayscale(0%); opacity: 1; }
</style>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main">

    <!-- Hero -->
    <section id="hero">
      <div class="container text-center hero-content">
        <h1>Technology &<br>Artificial Intelligence (AI)<br>Shaping The Industry</h1>
        <div class="hero-buttons">
          <a href="find-suppliers" class="btn-custom btn-find">Find Suppliers</a>
          <a href="membership-directory" class="btn-custom btn-czi">CZI eDirectory</a>
          <a href="add-listing" class="btn-custom btn-list">List Your Business Here!!</a>
        </div>
      </div>
    </section>

    <!-- Discover Industries -->
    <section class="py-5">
      <div class="container">
        <div class="section-header">
          <h1>Discover Industries In Zimbabwe</h1>
          <h2>Featured Companies</h2>
        </div>
        <div class="row g-4" id="industries-list">
          <!-- Loaded via API -->
        </div>
      </div>
    </section>

    <!-- Featured Sliders -->
    <section class="py-5 bg-light">
      <div class="container text-center">
        <h2 class="mb-5" style="color: #28a745; font-weight:700;">Featured Companies</h2>
        <div class="featured-logos d-flex flex-wrap justify-content-center align-items-center">
           <img src="assets/img/cloned/amc-n.png" alt="AMC">
           <img src="assets/img/cloned/kwblasting-logo.png" alt="KW Blasting">
           <img src="assets/img/cloned/speartec-logo.png" alt="Speartec">
           <!-- More can be added -->
        </div>
      </div>
    </section>

    <!-- Tenders & Events -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
             <h3 class="mb-4" style="color: #28a745;">Latest Tenders</h3>
             <div id="tenders-container"></div>
          </div>
          <div class="col-md-6">
             <h3 class="mb-4" style="color: #28a745;">Upcoming Events</h3>
             <div id="events-container"></div>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch Industries
        fetch('api/public/industries.php')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const list = document.getElementById('industries-list');
                    list.innerHTML = data.data.slice(0, 6).map(ind => `
                        <div class="col-lg-2 col-md-4 col-6">
                            <a href="find-suppliers?type=${ind.slug}" class="text-decoration-none">
                                <div class="industry-item">
                                    <h3>${ind.name}</h3>
                                </div>
                            </a>
                        </div>
                    `).join('');
                }
            });

        // Fetch Tenders
        fetch('api/public/tenders.php?limit=3')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('tenders-container').innerHTML = data.data.map(t => `
                        <div class="p-3 border-bottom">
                            <strong>${t.title}</strong><br>
                            <small class="text-muted">Closes: ${t.closing_date}</small>
                        </div>
                    `).join('');
                }
            });

        // Fetch Events
        fetch('api/public/events.php?limit=3')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('events-container').innerHTML = data.data.map(e => `
                        <div class="p-3 border-bottom">
                            <strong>${e.title}</strong><br>
                            <small class="text-muted">${e.event_date} @ ${e.location}</small>
                        </div>
                    `).join('');
                }
            });
    });
  </script>
</body>
</html>
