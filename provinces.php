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

    <!-- ======= Provinces Grid Section ======= -->
    <section id="provinces-grid" class="services section light-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>All Provinces</h2>
        <p>Click on any province to view companies and opportunities</p>
      </div>

      <div class="container">

        <div class="row gy-4" id="provincesContainer">

          <!-- 1. Harare -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <a href="province.php?slug=harare" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-building icon"></i></div>
              <h4>Harare</h4>
              <p>Capital city with diverse business opportunities, financial services hub, and growing tech sector</p>
              <span class="badge bg-success mt-2">6 Companies</span>
            </a>
          </div>

          <!-- 2. Bulawayo -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="province.php?slug=bulawayo" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-gear icon"></i></div>
              <h4>Bulawayo</h4>
              <p>Industrial hub with strong manufacturing base, cultural tourism, and educational institutions</p>
              <span class="badge bg-success mt-2">2 Companies</span>
            </a>
          </div>

          <!-- 3. Manicaland -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <a href="province.php?slug=manicaland" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-tree icon"></i></div>
              <h4>Manicaland</h4>
              <p>Agricultural heartland with timber, tea, coffee production, and tourism potential</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 4. Mashonaland Central -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <a href="province.php?slug=mashonaland-central" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-minecart-loaded icon"></i></div>
              <h4>Mashonaland Central</h4>
              <p>Mining region with agricultural potential, tobacco farming, and mineral deposits</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 5. Mashonaland East -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="province.php?slug=mashonaland-east" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-leaf icon"></i></div>
              <h4>Mashonaland East</h4>
              <p>Agricultural production, horticulture, and proximity to Harare markets</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 6. Mashonaland West -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <a href="province.php?slug=mashonaland-west" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-water icon"></i></div>
              <h4>Mashonaland West</h4>
              <p>Tourism attractions, Lake Kariba, mining operations, and commercial farming</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 7. Masvingo -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <a href="province.php?slug=masvingo" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-bank icon"></i></div>
              <h4>Masvingo</h4>
              <p>Great Zimbabwe heritage site, agriculture, and growing industrial base</p>
              <span class="badge bg-success mt-2">0 Companies</span>
            </a>
          </div>

          <!-- 8. Matabeleland North -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="province.php?slug=matabeleland-north" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-compass icon"></i></div>
              <h4>Matabeleland North</h4>
              <p>Victoria Falls tourism, wildlife conservation, coal mining, and timber</p>
              <span class="badge bg-success mt-2">3 Companies</span>
            </a>
          </div>

          <!-- 9. Matabeleland South -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <a href="province.php?slug=matabeleland-south" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-truck icon"></i></div>
              <h4>Matabeleland South</h4>
              <p>Ranching, mining, border trade with South Africa and Botswana</p>
              <span class="badge bg-success mt-2">1 Company</span>
            </a>
          </div>

          <!-- 10. Midlands -->
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <a href="province.php?slug=midlands" class="service-item position-relative d-block text-decoration-none w-100">
              <div class="icon"><i class="bi bi-geo-alt icon"></i></div>
              <h4>Midlands</h4>
              <p>Central location advantage, mining, manufacturing, and educational institutions</p>
              <span class="badge bg-success mt-2">1 Company</span>
            </a>
          </div>

        </div>

      </div>

    </section><!-- /Provinces Grid Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="assets/img/bg/bg-8.webp" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>List Your Company in Your Province</h3>
            <p>Get your business listed in your province and connect with customers, suppliers, and partners across Zimbabwe.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="contact.php">Add Your Business</a>
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