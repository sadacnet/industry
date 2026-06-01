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
    transition: 0.3s;
  }
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
          <!-- Top 6 sectors loaded via API -->
        </div>
      </div>
    </section>

    <!-- Featured Logo Slider -->
    <section class="py-5 bg-light">
      <div class="container text-center">
        <h2 class="mb-5" style="color: #28a745; font-weight:700;">Featured Companies</h2>
        <div class="logo-slider">
          <div class="logo-track" id="featured-slider">
             <!-- Populated from API -->
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
