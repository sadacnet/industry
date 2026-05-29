<?php
$pageTitle = "Page Title Here";
$pageDescription = "Page description for SEO";
require_once __DIR__ . '/includes/head.php';
?>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main">

    <!-- ======= Page Title Section ======= -->
    <section id="page-title" class="page-title section dark-background" style="background: url('assets/img/hero-section2.jpg') center center; background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center" data-aos="fade-up">
          </div>
        </div>
      </div>
    </section><!-- /Page Title Section -->

    <!-- ======= Industries Grid Section ======= -->
    <section id="industries-grid" class="services section light-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>All Industrial Sectors</h2>
        <p>Click on any industry to view member companies and details</p>
      </div>

      <div class="container">

        <div class="row gy-4">

          <!-- 1. Auto -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <a href="industry.php?slug=auto" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-car-front icon"></i></div>
              <h4>Auto</h4>
              <p>Automotive industry including vehicle sales, repairs, and parts manufacturing</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 2. Accommodation -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="industry.php?slug=accommodation" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-building icon"></i></div>
              <h4>Accommodation</h4>
              <p>Hotels, lodges, and accommodation services across Zimbabwe</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 3. Agriculture -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <a href="industry.php?slug=agriculture" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-leaf icon"></i></div>
              <h4>Agriculture</h4>
              <p>Farming, crop production, livestock, and agricultural services</p>
              <span class="badge bg-success mt-2">3 Companies</span>
            </a>
          </div>

          <!-- 4. Banking & Finance -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <a href="industry.php?slug=banking-finance" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-bank icon"></i></div>
              <h4>Banking & Finance</h4>
              <p>Banks, microfinance, insurance, and financial services</p>
              <span class="badge bg-success mt-2">2 Companies</span>
            </a>
          </div>

          <!-- 5. Biotechnology -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <a href="industry.php?slug=biotechnology" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-cpu icon"></i></div>
              <h4>Biotechnology</h4>
              <p>Biotech research, development, and applications</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 6. Construction -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="industry.php?slug=construction" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-cone-striped icon"></i></div>
              <h4>Construction</h4>
              <p>Building, civil engineering, and construction services</p>
              <span class="badge bg-success mt-2">2 Companies</span>
            </a>
          </div>

          <!-- 7. Education -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <a href="industry.php?slug=education" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-book icon"></i></div>
              <h4>Education</h4>
              <p>Schools, universities, colleges, and educational services</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 8. Energy & Power -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <a href="industry.php?slug=energy-power" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-lightning-charge icon"></i></div>
              <h4>Energy & Power</h4>
              <p>Electricity generation, distribution, and renewable energy</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 9. Healthcare -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <a href="industry.php?slug=healthcare" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-heart-pulse icon"></i></div>
              <h4>Healthcare</h4>
              <p>Hospitals, clinics, pharmaceutical, and medical services</p>
              <span class="badge bg-success mt-2">2 Companies</span>
            </a>
          </div>

          <!-- 10. Manufacturing -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="industry.php?slug=manufacturing" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-gear icon"></i></div>
              <h4>Manufacturing</h4>
              <p>Industrial manufacturing and production</p>
              <span class="badge bg-success mt-2">2 Companies</span>
            </a>
          </div>

          <!-- 11. Mining -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <a href="industry.php?slug=mining" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-minecart-loaded icon"></i></div>
              <h4>Mining</h4>
              <p>Mineral extraction, mining operations, and quarrying</p>
              <span class="badge bg-success mt-2">3 Companies</span>
            </a>
          </div>

          <!-- 12. Technology & ICT -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <a href="industry.php?slug=technology-ict" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-laptop icon"></i></div>
              <h4>Technology & ICT</h4>
              <p>Information technology, software, and telecommunications</p>
              <span class="badge bg-success mt-2">1 Company</span>
            </a>
          </div>

          <!-- 13. Tourism & Hospitality -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <a href="industry.php?slug=tourism-hospitality" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-compass icon"></i></div>
              <h4>Tourism & Hospitality</h4>
              <p>Tourism operators, travel agencies, and hospitality services</p>
              <span class="badge bg-success mt-2">2 Companies</span>
            </a>
          </div>

          <!-- 14. Transport & Logistics -->
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="industry.php?slug=transport-logistics" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-truck icon"></i></div>
              <h4>Transport & Logistics</h4>
              <p>Transportation, logistics, and supply chain services</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

        </div>

      </div>

    </section><!-- /Industries Grid Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="assets/img/bg/bg-8.webp" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Don't See Your Industry Listed?</h3>
            <p>Contact us to get your company listed in the appropriate industry sector and connect with thousands of potential business partners across Zimbabwe.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="contact.php">Get Listed Today</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to receive the latest industry news, tenders, and events from industry.co.zw</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.php" class="d-flex align-items-center">
            <img src="assets/img/industry-logo-20.png" alt="industry.co.zw Logo">
          </a>
          <div class="footer-contact pt-3">
            <p>Harare, Zimbabwe</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+263 242 123456</span></p>
            <p><strong>Email:</strong> <span>info@industry.co.zw</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Quick Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="industries.php">Industries</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="provinces.php">Provinces</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="stakeholders.php">Stakeholders</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Resources</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="tenders.php">Tenders</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="events.php">Events</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="exports.php">Exports</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="gallery.php">Gallery</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Stay connected with Zimbabwe's industrial community</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">industry.co.zw</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Developed by <a href="https://sadacnet.com/">SADACNET</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>