<?php
$pageTitle = "Home";
$pageDescription = "The industry Hub of all industries";
require_once __DIR__ . '/includes/head.php';
?>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main">

  <!-- Hero Section -->
<section id="hero" class="hero section" style="position: relative; width: 100%; min-height: 100vh; padding: 0; margin: 0; overflow: hidden;">
  <div class="hero-background" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(rgba(10, 30, 60, 0.7), rgba(10, 30, 60, 0.7)), url('assets/img/hero-section.jpg') center center; background-size: cover; z-index: 0;"></div>
  
  <div class="container" style="position: relative; z-index: 1; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="row justify-content-center w-100">
      <div class="col-lg-10 text-center" data-aos="zoom-out">
        
        <h1 style="font-size: 3.5rem; font-weight: 700; margin-bottom: 2rem; line-height: 1.2; color: #fff; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">
          Technology &<br>
          Artificial Intelligence (AI)<br>
          Shaping The Industry
        </h1>
        
        <div class="d-flex flex-column align-items-center gap-3 mt-5">
          <a href="suppliers.php" class="btn-hero-primary" style="background: #5cb85c; color: #fff; padding: 12px 35px; border-radius: 5px; text-decoration: none; font-weight: 600; display: inline-block; min-width: 250px; transition: all 0.3s ease; border: 2px solid #5cb85c; font-size: 1rem;">
            Find Suppliers
          </a>
          
          <a href="czi-directory.php" class="btn-hero-primary" style="background: #5cb85c; color: #fff; padding: 12px 35px; border-radius: 5px; text-decoration: none; font-weight: 600; display: inline-block; min-width: 250px; transition: all 0.3s ease; border: 2px solid #5cb85c; font-size: 1rem;">
            CZI eDirectory
          </a>
          
          <a href="list-business.php" class="btn-hero-primary" style="background: #5cb85c; color: #fff; padding: 12px 35px; border-radius: 5px; text-decoration: none; font-weight: 600; display: inline-block; min-width: 250px; transition: all 0.3s ease; border: 2px solid #5cb85c; font-size: 1rem;">
            List Your Business Here!!
          </a>
        </div>
        
      </div>
    </div>
  </div>

</section><!-- /Hero Section -->

<style>
  .btn-hero-primary:hover {
    background: transparent !important;
    color: #5cb85c !important;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(92, 184, 92, 0.4);
  }
  
  @media (max-width: 991px) {
    #hero h1 {
      font-size: 2.5rem !important;
    }
    
    .btn-hero-primary {
      min-width: 100% !important;
      max-width: 350px;
    }
  }
  
  @media (max-width: 768px) {
    #hero h1 {
      font-size: 2rem !important;
    }
  }
  
  @media (max-width: 576px) {
    #hero h1 {
      font-size: 1.6rem !important;
    }
    
    .btn-hero-primary {
      padding: 10px 25px !important;
      font-size: 0.9rem !important;
    }
  }
</style>

    <!-- Discover Industries Section -->
    <section id="discover-industries" class="discover-industries section" style="padding: 60px 0 40px 0; background: #ffffff;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center" data-aos="fade-up">
            
            <h1 style="color: #28a745; font-size: 2.2rem; font-weight: 700; margin-bottom: 15px; line-height: 1.3;">
              Discover Industries In Zimbabwe
            </h1>
            
            <h2 style="color: #dc3545; font-size: 1.6rem; font-style: italic; font-weight: 600; margin-bottom: 40px;">
              Featured Companies
            </h2>
            
          </div>
        </div>
      </div>
    </section>

    <!-- Industry Categories List - White Background -->
    <section id="industry-list-white" class="industry-list section" style="padding: 10px 0; background: #ffffff;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            
            <div class="category-item text-center" style="padding: 10px 0; margin: 3px 0;">
              <h3 style="color: #000; font-size: 1.2rem; font-weight: 600; margin: 0;">Engineering</h3>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    <!-- Industry Categories List - Light Gray Background -->
    <section id="industry-list-gray" class="industry-list section" style="padding: 10px 0; background: #f8f9fa;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            
            <div class="category-item text-center" style="padding: 10px 0; margin: 3px 0;">
              <h3 style="color: #000; font-size: 1.2rem; font-weight: 600; margin: 0;">Shop Fitters</h3>
            </div>
            
            <div class="category-item text-center" style="padding: 10px 0; margin: 3px 0;">
              <h3 style="color: #000; font-size: 1.2rem; font-weight: 600; margin: 0;">Auto Mobile</h3>
            </div>
            
            <div class="category-item text-center" style="padding: 10px 0; margin: 3px 0;">
              <h3 style="color: #000; font-size: 1.2rem; font-weight: 600; margin: 0;">Concrete Products</h3>
            </div>
            
            <div class="category-item text-center" style="padding: 10px 0; margin: 3px 0;">
              <h3 style="color: #000; font-size: 1.2rem; font-weight: 600; margin: 0;">Security</h3>
            </div>
            
            <div class="category-item text-center" style="padding: 10px 0; margin: 3px 0;">
              <h3 style="color: #000; font-size: 1.2rem; font-weight: 600; margin: 0;">Packaging</h3>
            </div>
            
            <div class="category-item text-center" style="padding: 10px 0; margin: 3px 0;">
              <h3 style="color: #000; font-size: 1.2rem; font-weight: 600; margin: 0;">Featured Companies</h3>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Companies Carousel -->
    <section id="featured-companies-carousel" class="featured-companies section" style="padding: 40px 0 60px 0; background: #f8f9fa;">
      <div class="container" data-aos="fade-up" data-aos-delay="200">
        
        <div class="swiper init-swiper featured-companies-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 3000
              },
              "slidesPerView": "auto",
              "spaceBetween": 30,
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 20
                },
                "640": {
                  "slidesPerView": 2,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 3,
                  "spaceBetween": 40
                }
              }
            }
          </script>
          
          <div class="swiper-wrapper align-items-center">
            
            <div class="swiper-slide">
              <div class="company-logo-wrapper text-center" style="background: #fff; padding: 40px 30px; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.08);">
                <img src="assets/img/clients/prosec-logo.png" alt="PROSEC" class="img-fluid" style="max-height: 100px; width: auto;">
              </div>
            </div>
            
            <div class="swiper-slide">
              <div class="company-logo-wrapper text-center" style="background: #fff; padding: 40px 30px; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.08);">
                <img src="assets/img/clients/amc-nissan-logo.png" alt="AMC Nissan" class="img-fluid" style="max-height: 100px; width: auto;">
              </div>
            </div>
            
            <div class="swiper-slide">
              <div class="company-logo-wrapper text-center" style="background: #fff; padding: 40px 30px; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.08);">
                <img src="assets/img/clients/mike-harris-toyota-logo.png" alt="Mike Harris Toyota" class="img-fluid" style="max-height: 100px; width: auto;">
              </div>
            </div>
            
            <div class="swiper-slide">
              <div class="company-logo-wrapper text-center" style="background: #fff; padding: 40px 30px; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.08);">
                <img src="assets/img/clients/turnall-logo.jpg" alt="Turnall" class="img-fluid" style="max-height: 100px; width: auto;">
              </div>
            </div>
            
            <div class="swiper-slide">
              <div class="company-logo-wrapper text-center" style="background: #fff; padding: 40px 30px; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.08);">
                <img src="assets/img/clients/earthwave.jpg" alt="Earthwave" class="img-fluid" style="max-height: 100px; width: auto;">
              </div>
            </div>
            
          </div>
          
          <!-- Navigation Buttons -->
          <div class="swiper-button-prev" style="color: #000; background: rgba(255,255,255,0.9); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); cursor: pointer;">
            <i class="bi bi-chevron-left" style="font-size: 1.2rem;"></i>
          </div>
          <div class="swiper-button-next" style="color: #000; background: rgba(255,255,255,0.9); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); cursor: pointer;">
            <i class="bi bi-chevron-right" style="font-size: 1.2rem;"></i>
          </div>
          
        </div>
        
      </div>
    </section>

    <style>
      .category-item {
        transition: all 0.3s ease;
        border-bottom: 1px solid #eee;
      }
      
      .category-item:last-child {
        border-bottom: none;
      }
      
      .category-item:hover {
        transform: translateX(10px);
        background: #e9ecef;
        border-radius: 5px;
      }
      
      .company-logo-wrapper {
        transition: all 0.3s ease;
        min-height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      .company-logo-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 25px rgba(0,0,0,0.15);
      }
      
      .swiper-button-prev::after,
      .swiper-button-next::after {
        content: '';
        display: none;
      }
      
      @media (max-width: 768px) {
        #discover-industries h1 {
          font-size: 1.6rem !important;
        }
        
        #discover-industries h2 {
          font-size: 1.2rem !important;
        }
        
        .category-item h3 {
          font-size: 1.1rem !important;
        }
        
        .company-logo-wrapper {
          min-height: 150px;
          padding: 30px 20px !important;
        }
        
        .swiper-button-prev,
        .swiper-button-next {
          width: 35px !important;
          height: 35px !important;
        }
      }
    </style>

  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
  
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
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