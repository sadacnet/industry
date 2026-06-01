<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <!-- Logo -->
      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/industry-logo-20.png" alt="industry.co.zw Logo">
      </a>

      <!-- Mobile Toggle -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

      <!-- Desktop Navigation -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="<?php echo ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index.php') ? 'active' : ''; ?>">Home</a></li>

          <!-- Networking Dropdown -->
          <li class="dropdown">
            <a href="find-suppliers"><span>Networking</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="membership-directory">CZI eDirectory</a></li>
              <li><a href="membership-directory">CIFOZ eDirectory</a></li>
              <li><a href="find-suppliers">Supplier Discovery</a></li>
              <li><a href="browse-supplier-category">Browse Supplier Categories</a></li>
            </ul>
          </li>

          <!-- Industry Dropdown -->
          <li class="dropdown">
            <a href="/"><span>Industry</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="add-listing">List Your Business</a></li>
              <li><a href="/">Displaying Your Advert</a></li>
              <li><a href="/">Email Marketing Your Advert</a></li>
            </ul>
          </li>

          <!-- Exports Dropdown -->
          <li class="dropdown">
            <a href="/"><span>Exports</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="/">Search Engine Optimization</a></li>
              <li><a href="/">eCommerce Website Development</a></li>
              <li><a href="/">Online Payment Integration</a></li>
              <li><a href="/">Mobile Apps Development</a></li>
            </ul>
          </li>

          <!-- Regions Dropdown -->
          <li class="dropdown">
            <a href="regions"><span>Regions</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="add-listing">Vendor Registration</a></li>
              <li><a href="/">Vendor Dashboard</a></li>
            </ul>
          </li>

          <!-- AI Dropdown -->
          <li class="dropdown">
            <a href="/"><span>AI</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="membership-directory">CZI e-Directory</a></li>
              <li><a href="/">IfindZimbabwe eCatalogue</a></li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- User Auth -->
      <div class="header-auth d-none d-sm-flex align-items-center ms-auto">
        <a href="my-account" class="login">Sign in</a>
        <span class="sep">or</span>
        <a href="my-account?register" class="register">Register</a>
      </div>

    </div>
</header><!-- End Header -->

<style>
.header {
    background: #fff;
    transition: all 0.5s;
    z-index: 997;
    height: 80px;
    box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.1);
}
.header .logo img {
    max-height: 50px;
}
.navmenu ul {
    margin: 0;
    padding: 0;
    display: flex;
    list-style: none;
    align-items: center;
}
.navmenu li {
    position: relative;
}
.navmenu a, .navmenu a:focus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0 10px 30px;
    font-size: 15px;
    font-weight: 500;
    color: #222;
    white-space: nowrap;
    transition: 0.3s;
}
.navmenu a i, .navmenu a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
}
.navmenu a:hover, .navmenu .active, .navmenu .active:focus, .navmenu li:hover>a {
    color: #5cb85c;
}
.header-auth {
    padding-left: 30px;
}
.header-auth a {
    font-size: 14px;
    font-weight: 600;
}
.header-auth .login {
    color: #444;
}
.header-auth .register {
    background: #5cb85c;
    color: #fff;
    padding: 8px 20px;
    border-radius: 4px;
    margin-left: 15px;
}
.header-auth .sep {
    margin: 0 10px;
    color: #999;
}

/* Dropdown */
.navmenu .dropdown ul {
    display: block;
    position: absolute;
    left: 14px;
    top: calc(100% + 30px);
    margin: 0;
    padding: 10px 0;
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: 0.3s;
    border-radius: 4px;
}
.navmenu .dropdown ul li {
    min-width: 200px;
}
.navmenu .dropdown ul a {
    padding: 10px 20px;
    font-size: 14px;
    text-transform: none;
    color: #222;
}
.navmenu .dropdown ul a:hover, .navmenu .dropdown ul .active:hover, .navmenu .dropdown ul li:hover>a {
    color: #5cb85c;
}
.navmenu .dropdown:hover>ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
}
</style>
