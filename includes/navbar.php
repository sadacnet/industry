<?php
/**
 * Navbar component for industry.co.zw
 */
?>
<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="index" class="logo d-flex align-items-center text-decoration-none">
      <img src="assets/img/industry-logo-20.png" alt="Industry.co.zw" style="max-height: 50px;">
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index" class="active">Home</a></li>

        <li class="dropdown"><a href="#"><span>Networking</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="events">Events</a></li>
            <li><a href="tenders">Tenders</a></li>
          </ul>
        </li>

        <li class="dropdown"><a href="membership-directory"><span>Industry</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul id="nav-industry-dropdown">
            <li><a href="membership-directory">CZI eDirectory</a></li>
            <li><a href="browse-supplier-category">Industrial Sectors</a></li>
            <hr class="dropdown-divider">
            <!-- Dynamic sectors will be loaded here -->
          </ul>
        </li>

        <li class="dropdown"><a href="exports"><span>Exports</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="exporters">Exporters Directory</a></li>
            <li><a href="exports">Product Categories</a></li>
          </ul>
        </li>

        <li class="dropdown"><a href="provinces"><span>Regions</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul id="nav-regions-dropdown">
            <!-- Dynamic regions will be loaded here -->
          </ul>
        </li>

        <li><a href="contact">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <div class="d-flex gap-2">
      <a class="btn-getstarted" href="my-account">Sign In</a>
      <a class="btn-getstarted bg-danger" href="contact">Join Now</a>
    </div>

  </div>

  <script>
    // Dynamic Navbar items
    document.addEventListener('DOMContentLoaded', function() {
        // Load Industries into Navbar
        fetch('api/public/industries.php')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const dropdown = document.getElementById('nav-industry-dropdown');
                    data.data.slice(0, 8).forEach(ind => {
                        const li = document.createElement('li');
                        li.innerHTML = `<a href="find-suppliers?type=${ind.slug}">${ind.name}</a>`;
                        dropdown.appendChild(li);
                    });
                }
            });

        // Load Regions into Navbar
        fetch('api/public/provinces.php')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const dropdown = document.getElementById('nav-regions-dropdown');
                    data.data.forEach(reg => {
                        const li = document.createElement('li');
                        li.innerHTML = `<a href="province?id=${reg.slug}">${reg.name}</a>`;
                        dropdown.appendChild(li);
                    });
                }
            });
    });
  </script>
</header>
