<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="footer-contact-info" style="padding: 30px 0;">
            <h4 style="color: #28a745; font-size: 1rem; font-weight: 600; margin-bottom: 15px;">Contact Info</h4>
            <p style="color: #28a745; margin-bottom: 5px; line-height: 1.6;">
              Address: 69 Samora Machel Avenue, Bard House 11th Floor, Harare, Zimbabwe
            </p>
            <p style="color: #28a745; margin-bottom: 5px;">
              Phone number: +263 242 795502, 799331
            </p>
            <p style="color: #28a745; margin-bottom: 5px;">
              Mobile: +263 776 004490
            </p>
            <p style="color: #28a745; margin-bottom: 0;">
              E-mail: marketing@sadacnet.com
            </p>
          </div>
          
          <hr style="border: none; border-top: 1px solid #eee; margin: 30px 0;">
          
          <div class="footer-bottom text-center" style="padding: 20px 0;">
            <div class="social-links mb-3">
              <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #f8f9fa; border-radius: 50%; margin: 0 5px; color: #666; transition: all 0.3s ease;">
                <i class="bi bi-facebook"></i>
              </a>
              <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #f8f9fa; border-radius: 50%; margin: 0 5px; color: #666; transition: all 0.3s ease;">
                <i class="bi bi-youtube"></i>
              </a>
              <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #f8f9fa; border-radius: 50%; margin: 0 5px; color: #666; transition: all 0.3s ease;">
                <i class="bi bi-twitter"></i>
              </a>
            </div>
            <p style="color: #28a745; margin: 0; font-size: 0.95rem;">
              Copyright © 2023 developed by <a href="https://sadacnet.com/" style="color: #666; text-decoration: none;">Sadacnet</a>
            </p>
          </div>
        </div>
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

  <!-- ========== MEGA DROPDOWN CSS ========== -->
  <style>
    .has-mega { position: static !important; }

    .has-mega .mega-sub {
        width: 100vw !important;
        left: 0 !important;
        right: 0 !important;
        padding: 0 !important;
        background: #fff !important;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15) !important;
        border-radius: 0 !important;
        border-top: 3px solid #006400 !important;
        display: block !important;
        visibility: hidden;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.25s ease;
    }

    .has-mega:hover .mega-sub {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
    }

    .has-mega .mega-wrap {
        padding: 0 !important;
        white-space: normal !important;
    }

    .has-mega .mega-grid {
        max-width: 1200px;
        margin: 0 auto;
        padding: 35px 40px;
        display: flex;
        gap: 30px;
    }

    .has-mega .mega-group {
        flex: 1;
        min-width: 0;
    }

    .has-mega .mega-group h6 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 700;
        color: #999;
        margin: 0 0 14px 0;
        padding-bottom: 10px;
        border-bottom: 2px solid #006400;
    }

    .has-mega .mega-group a {
        display: block !important;
        padding: 10px 12px !important;
        color: #333 !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        text-decoration: none !important;
        border-bottom: 1px solid #f5f5f5 !important;
        transition: all 0.2s !important;
        white-space: nowrap !important;
    }

    .has-mega .mega-group a:last-child {
        border-bottom: none !important;
    }

    .has-mega .mega-group a:hover {
        background: #f5faf5 !important;
        color: #006400 !important;
        padding-left: 18px !important;
    }

    @media (max-width: 1199px) {
        .has-mega { position: relative !important; }
        .has-mega .mega-sub {
            width: 100% !important;
            position: static !important;
            box-shadow: none !important;
            border-top: none !important;
            visibility: visible;
            opacity: 1;
            transform: none;
            display: none !important;
        }
        .has-mega:hover .mega-sub,
        .has-mega.active .mega-sub {
            display: block !important;
        }
        .has-mega .mega-grid {
            flex-direction: column;
            gap: 5px;
            padding: 10px 20px;
        }
        .has-mega .mega-group h6 {
            margin-top: 12px;
            font-size: 10px;
        }
        .has-mega .mega-group a {
            padding: 10px !important;
            font-size: 13px !important;
        }
    }
    
    /* Footer hover effects */
    .social-links a:hover {
        background: #28a745 !important;
        color: #fff !important;
        transform: translateY(-3px);
    }
  </style>

  <!-- ========== MEGA DROPDOWN MOBILE JS ========== -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.innerWidth <= 1199) {
            document.querySelectorAll('.has-mega > a').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.parentElement.classList.toggle('active');
                });
            });
        }
    });
  </script>

  <!-- ========== FORCE REMOVE PRELOADER ========== -->
  <script>
    (function() {
        var preloader = document.getElementById('preloader');
        if (preloader) {
            window.addEventListener('load', function() {
                preloader.style.opacity = '0';
                preloader.style.transition = 'opacity 0.3s';
                setTimeout(function() { preloader.style.display = 'none'; }, 400);
            });
            setTimeout(function() { preloader.style.display = 'none'; }, 4000);
        }
    })();
  </script>

</body>
</html>