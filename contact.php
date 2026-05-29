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

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>69 Samora Machel Avenue, Bard House</h3>
                  <p>Harare, Zimbabwe</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+263 242 123456</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@industry.co.zw</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121797.794414345!2d30.96413195!3d-17.82516625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1931a4a0b7ffdb8d%3A0xca02492e2f2b1c1b!2sHarare%2C%20Zimbabwe!5e0!3m2!1sen!2sus!4v1697000000000!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form id="contactForm" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name *</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email *</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-6">
                  <label for="phone-field" class="pb-2">Phone Number</label>
                  <input type="text" class="form-control" name="phone" id="phone-field" placeholder="+263...">
                </div>

                <div class="col-md-6">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <select class="form-control" name="subject" id="subject-field">
                    <option value="">Select a subject...</option>
                    <option value="List My Business">List My Business</option>
                    <option value="Advertising Inquiry">Advertising Inquiry</option>
                    <option value="CZI Membership">CZI Membership</option>
                    <option value="CIFOZ Membership">CIFOZ Membership</option>
                    <option value="Tender Information">Tender Information</option>
                    <option value="General Inquiry">General Inquiry</option>
                    <option value="Technical Support">Technical Support</option>
                  </select>
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message *</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required="" placeholder="Tell us how we can help you..."></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading" style="display:none;">Sending your message...</div>
                  <div class="error-message" style="display:none;"></div>
                  <div class="sent-message" style="display:none;">Your message has been sent. Thank you! We'll get back to you soon.</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

    <!-- ======= Why Contact Us Section ======= -->
    <section id="why-contact" class="services section light-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>Why Get Listed on industry.co.zw?</h2>
        <p>Benefits of joining Zimbabwe's leading industrial portal</p>
      </div>

      <div class="container">
        <div class="row gy-4">

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative w-100">
              <div class="icon"><i class="bi bi-eye icon"></i></div>
              <h4>Visibility</h4>
              <p>Get your business seen by thousands of potential customers, partners, and stakeholders across Zimbabwe and beyond.</p>
            </div>
          </div>

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative w-100">
              <div class="icon"><i class="bi bi-people icon"></i></div>
              <h4>Networking</h4>
              <p>Connect with CZI and CIFOZ members, attend industry events, and build valuable business relationships.</p>
            </div>
          </div>

          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative w-100">
              <div class="icon"><i class="bi bi-file-text icon"></i></div>
              <h4>Tender Access</h4>
              <p>Stay informed about active tenders and business opportunities across all industries in Zimbabwe.</p>
            </div>
          </div>

        </div>
      </div>

    </section><!-- /Why Contact Section -->

    <!-- ======= FAQ Section ======= -->
    <section id="faq" class="faq-2 section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Common questions about listing your business</p>
      </div>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">

            <div class="faq-container">

              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>How do I list my company on Industry?</h3>
                <div class="faq-content">
                  <p>Simply fill out the contact form above with your company details, or email us directly at info@industry.co.zw. Our team will add your company to the appropriate industry and province categories.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Is there a cost to list my business?</h3>
                <div class="faq-content">
                  <p>Basic listings are free. For enhanced listings with advertising options, logos, banners, and priority placement, please contact us for our advertising packages tailored for CZI and CIFOZ members.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>How long does it take to get listed?</h3>
                <div class="faq-content">
                  <p>Most listings are processed within 24-48 hours. Once your company is added, it will appear in the relevant industry and province pages, searchable by all visitors to the portal.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Can I update my company information later?</h3>
                <div class="faq-content">
                  <p>Yes! Just contact us with your updated information and we'll make the changes. We recommend keeping your listing up to date with current contact details, logos, and descriptions.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>How do I advertise on industry.co.zw?</h3>
                <div class="faq-content">
                  <p>We offer various advertising options including banner ads, company logos, downloadable flyers, and event posters. Contact us through the form above or email info@industry.co.zw for our advertising rate card.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>

            </div>

          </div>
        </div>
      </div>

    </section><!-- /FAQ Section -->

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

  <!-- Contact Form AJAX -->
  <script>
    const API_BASE = 'api/public';

    document.getElementById('contactForm').addEventListener('submit', async function(e) {
      e.preventDefault();

      const loading = this.querySelector('.loading');
      const errorMsg = this.querySelector('.error-message');
      const sentMsg = this.querySelector('.sent-message');
      const submitBtn = this.querySelector('button[type="submit"]');

      // Show loading
      loading.style.display = 'block';
      errorMsg.style.display = 'none';
      sentMsg.style.display = 'none';
      submitBtn.disabled = true;

      // Get form data
      const formData = {
        name: document.getElementById('name-field').value,
        email: document.getElementById('email-field').value,
        phone: document.getElementById('phone-field').value,
        subject: document.getElementById('subject-field').value,
        message: document.getElementById('message-field').value,
        recaptcha_score: 0.9
      };

      try {
        const response = await fetch(API_BASE + '/contact.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(formData)
        });

        const data = await response.json();

        loading.style.display = 'none';
        submitBtn.disabled = false;

        if (data.status === 'success') {
          sentMsg.style.display = 'block';
          this.reset();
          // Scroll to success message
          sentMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
          // Hide success message after 5 seconds
          setTimeout(() => {
            sentMsg.style.display = 'none';
          }, 5000);
        } else {
          errorMsg.textContent = data.message || 'Failed to send message. Please try again.';
          errorMsg.style.display = 'block';
        }
      } catch (error) {
        loading.style.display = 'none';
        submitBtn.disabled = false;
        errorMsg.textContent = 'Network error. Please check your connection and try again.';
        errorMsg.style.display = 'block';
      }
    });
  </script>

</body>
</html>