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

  /* Logo Slider Styles */
  .logo-slider {
    overflow: hidden;
    padding: 40px 0;
    position: relative;
  }
  .logo-track {
    display: flex;
    width: calc(250px * 10);
    animation: scroll 40s linear infinite;
  }
  .logo-track:hover { animation-play-state: paused; }
  @keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-250px * 5)); }
  }
  .logo-slide {
    width: 250px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .logo-slide img {
    max-height: 80px;
    max-width: 180px;
    object-fit: contain;
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
  <script src="assets/js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch Industries (Top level)
        fetch('api/public/industries.php')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const list = document.getElementById('industries-list');
                    list.innerHTML = data.data.slice(0, 6).map(ind => `
                        <div class="col-lg-4 col-md-6">
                            <a href="find-suppliers?type=${ind.slug}" class="text-decoration-none">
                                <div class="industry-item">
                                    <h3>${ind.name}</h3>
                                </div>
                            </a>
                        </div>
                    `).join('');
                }
            });

        // Fetch Featured Companies for Slider
        fetch('api/public/companies.php?featured=1')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const track = document.getElementById('featured-slider');
                    // Duplicate logos for smooth infinite scroll
                    const items = [...data.data, ...data.data];
                    track.innerHTML = items.map(c => `
                        <div class="logo-slide">
                            <img src="${c.logo || 'assets/img/industry-logo-20.png'}" alt="${c.name}">
                        </div>
                    `).join('');
                }
            });

        // Tenders
        fetch('api/public/tenders.php?limit=5')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('tenders-container').innerHTML = data.data.map(t => `
                        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                            <div>
                                <strong>${t.title}</strong><br>
                                <small class="text-muted">Closing: ${t.closing_date}</small>
                            </div>
                            <a href="#" class="btn btn-sm btn-outline-success">View</a>
                        </div>
                    `).join('');
                }
            });

        // Events
        fetch('api/public/events.php?limit=5')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('events-container').innerHTML = data.data.map(e => `
                        <div class="p-3 border-bottom">
                            <div class="d-flex justify-content-between">
                                <strong>${e.title}</strong>
                                <span class="badge bg-success">${e.event_date}</span>
                            </div>
                            <small class="text-muted">${e.location}</small>
                        </div>
                    `).join('');
                }
            });
    });
  </script>
</body>
</html>
