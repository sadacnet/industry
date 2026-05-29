<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <!-- Logo -->
      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/industry-logo-20.png" alt="industry.co.zw Logo" style="max-height: 55px;">
      </a>

      <!-- Mobile Toggle -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list" style="font-size:28px;cursor:pointer;"></i>

      <!-- Desktop Navigation -->
      <nav id="navmenu" class="navmenu d-none d-xl-flex">
        <ul>
          <li><a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>Home</a></li>
          
          <!-- Networking Dropdown -->
          <li class="dropdown">
            <a href="#"><span>Networking</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="stakeholder.php?org=CZI&section=directory">CZI eDirectory</a></li>
              <li><a href="stakeholder.php?org=CIFOZ&section=directory">CIFOZ eDirectory</a></li>
              <li><a href="stakeholder.php?org=CZI&section=directory">Supplier Discovery</a></li>
              <li><a href="industries.php">Browse Supplier Categories</a></li>
            </ul>
          </li>
          
          <!-- Industry Dropdown -->
          <li class="dropdown">
            <a href="#"><span>Industry</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="contact.php">List Your Business</a></li>
              <li><a href="stakeholder.php?org=CZI&section=advertising">Display Your Advert</a></li>
              <li><a href="stakeholder.php?org=CZI&section=advertising">Email Marketing Your Advert</a></li>
            </ul>
          </li>
          
          <!-- Exports Dropdown -->
          <li class="dropdown">
            <a href="#"><span>Exports</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="exports.php">Export Products</a></li>
              <li><a href="exports.php?category=Minerals">Minerals</a></li>
              <li><a href="exports.php?category=Agriculture">Agriculture</a></li>
              <li><a href="exports.php?category=Manufacturing">Manufacturing</a></li>
            </ul>
          </li>
          
          <!-- Regions Dropdown -->
          <li class="dropdown">
            <a href="#"><span>Regions</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="province.php?slug=harare">Harare</a></li>
              <li><a href="province.php?slug=bulawayo">Bulawayo</a></li>
              <li><a href="province.php?slug=manicaland">Manicaland</a></li>
              <li><a href="province.php?slug=midlands">Midlands</a></li>
              <li><a href="provinces.php">All Provinces →</a></li>
            </ul>
          </li>
          
          <!-- More Dropdown -->
          <li class="dropdown">
            <a href="#"><span>More</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="tenders.php">Tenders</a></li>
              <li><a href="events.php">Events</a></li>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="videos.php">Videos</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- Right Side Actions -->
      <div class="header-actions d-flex align-items-center ms-3">
        <a href="contact.php" class="btn btn-sm" style="background:#FFD700;color:#000;font-weight:600;border-radius:5px;padding:8px 16px;">
          <i class="bi bi-person"></i> Sign in
        </a>
        <span style="margin:0 8px;color:#888;">or</span>
        <a href="contact.php" class="btn btn-sm" style="background:#006400;color:#fff;font-weight:600;border-radius:5px;padding:8px 16px;">
          Register
        </a>
      </div>

    </div>
  </header><!-- End Header -->