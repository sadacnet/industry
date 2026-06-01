<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Exports - industry.co.zw</title>
  <meta name="description" content="Browse Zimbabwean export products, connect with verified exporters, and request quotes for the best prices">
  <meta name="keywords" content="Zimbabwe exports, verified exporters, B2B, product sourcing, Zimbabwe products, trade">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    .product-card {
      background: #fff; border-radius: 10px; box-shadow: 0 3px 20px rgba(0,0,0,0.08);
      padding: 20px; transition: all 0.3s ease; height: 100%; position: relative;
      border: 1px solid #e8e8e8; display: flex; flex-direction: column;
    }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,100,0,0.12); border-color: #006400; }
    .product-card .verified-badge {
      position: absolute; top: 12px; right: 12px; background: #006400; color: white;
      padding: 5px 12px; border-radius: 25px; font-size: 11px; font-weight: 600; z-index: 2;
    }
    .product-card .product-img {
      text-align: center; margin-bottom: 15px; height: 160px; display: flex;
      align-items: center; justify-content: center; background: #f9f9f9; border-radius: 8px; overflow: hidden;
    }
    .product-card .product-img img { max-height: 100%; max-width: 100%; object-fit: contain; padding: 10px; }
    .product-card .product-img .default-icon { font-size: 56px; color: #006400; opacity: 0.4; }
    .product-card .category-badge {
      display: inline-block; font-size: 11px; padding: 4px 10px; border-radius: 15px;
      background: #E8F5E9; color: #006400; font-weight: 600; margin-bottom: 8px;
    }
    .product-card .product-name { font-size: 16px; font-weight: 600; color: #1a1a1a; margin-bottom: 4px; line-height: 1.3; }
    .product-card .product-specs { font-size: 12px; color: #777; margin-bottom: 6px; }
    .product-card .price { font-size: 22px; font-weight: 700; color: #006400; margin-bottom: 2px; }
    .product-card .price small { font-size: 12px; color: #999; font-weight: 400; }
    .product-card .moq { font-size: 12px; color: #C62828; font-weight: 600; margin-bottom: 6px; }
    .product-card .company-name { font-size: 13px; color: #555; margin-bottom: 4px; font-weight: 500; }
    .product-card .company-name i { color: #006400; margin-right: 4px; }
    .product-card .rating { margin-bottom: 6px; display: flex; align-items: center; gap: 5px; }
    .product-card .rating .stars { color: #FFD700; font-size: 14px; }
    .product-card .rating .count { font-size: 12px; color: #999; }
    .product-card .exports-to { font-size: 11px; color: #999; margin-bottom: 6px; }
    .product-card .exports-to i { color: #006400; font-size: 10px; margin-right: 3px; }
    .product-card .certifications { margin-bottom: 10px; display: flex; gap: 6px; flex-wrap: wrap; }
    .product-card .cert-badge {
      font-size: 10px; padding: 4px 10px; border-radius: 4px; background: #FFF8E1;
      color: #F57F17; font-weight: 600; border: 1px solid #FFE082;
    }
    .product-card .btn-get-price {
      display: block; width: 100%; padding: 12px; background: #FFD700; color: #1a1a1a;
      border: none; border-radius: 8px; font-weight: 700; font-size: 14px; cursor: pointer;
      transition: all 0.3s; margin-top: auto;
    }
    .product-card .btn-get-price:hover { background: #FFC107; box-shadow: 0 4px 15px rgba(255,215,0,0.4); }

    .filter-sidebar { background: #fff; border-radius: 10px; padding: 25px; box-shadow: 0 3px 20px rgba(0,0,0,0.08); position: sticky; top: 100px; }
    .filter-sidebar h5 { font-weight: 700; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 3px solid #006400; font-size: 18px; }
    .filter-group { margin-bottom: 20px; }
    .filter-group label { font-weight: 700; font-size: 13px; color: #333; margin-bottom: 8px; display: block; text-transform: uppercase; }
    .filter-group .form-select, .filter-group .form-control { border-radius: 8px; border: 1px solid #ddd; padding: 10px 12px; font-size: 14px; }
    .filter-group .form-check { margin-bottom: 8px; }
    .filter-group .form-check-label { font-size: 13px; color: #555; }
    .filter-group .form-check-input:checked { background-color: #006400; border-color: #006400; }

    .result-bar { background: #fff; padding: 15px 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
    .result-bar .count span { color: #006400; font-weight: 700; }

    .rfq-modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 9999; justify-content: center; align-items: center; }
    .rfq-modal.show { display: flex; }
    .rfq-modal-content { background: #fff; border-radius: 16px; padding: 35px; width: 92%; max-width: 520px; position: relative; animation: slideUp 0.3s ease; }
    @keyframes slideUp { from { transform: translateY(60px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    .rfq-modal-content .close-modal { position: absolute; top: 15px; right: 20px; font-size: 28px; cursor: pointer; color: #999; }

    .trade-info-card { background: #fff; border-radius: 10px; padding: 30px 20px; text-align: center; box-shadow: 0 3px 20px rgba(0,0,0,0.06); transition: all 0.3s; height: 100%; }
    .trade-info-card:hover { transform: translateY(-5px); }
    .trade-info-card .icon { font-size: 42px; color: #006400; margin-bottom: 15px; }
    .trade-info-card h4 { font-weight: 700; margin-bottom: 10px; }
    .trade-info-card p { color: #666; font-size: 14px; }

    .pagination .page-link { color: #006400; border-radius: 8px; margin: 0 3px; }
    .pagination .active .page-link { background: #006400; border-color: #006400; color: #fff; }
    .pagination .page-link:hover { background: #E8F5E9; color: #006400; }

    @media (max-width: 991px) { .filter-sidebar { position: static; margin-bottom: 20px; } }
  </style>
</head>

<body class="index-page">

  <?php
$pageTitle = "Page Title Here";
$pageDescription = "Page description for SEO";
require_once __DIR__ . '/includes/head.php';
?>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main">

    <section class="page-title section dark-background" style="background: url('assets/img/hero-section2.jpg') center center; background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center" data-aos="fade-up">
            <h1>Zimbabwe Exports</h1>
            <p style="color: rgba(255,255,255,0.9);">Browse products, connect with verified exporters, and get the best prices</p>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center mt-2">
                <li class="breadcrumb-item"><a href="index.php" style="color: #FFD700;">Home</a></li>
                <li class="breadcrumb-item active" style="color: #fff;">Exports</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="services section light-background">
      <div class="container">
        <div class="row">
          <div class="col-lg-3" data-aos="fade-right">
            <div class="filter-sidebar">
              <h5><i class="bi bi-funnel-fill"></i> Filters</h5>
              <div class="filter-group">
                <label>Product Category</label>
                <select class="form-select" id="categoryFilter" onchange="applyFilters()">
                  <option value="">All Categories</option>
                </select>
              </div>
              <div class="filter-group">
                <label>Export Destination</label>
                <select class="form-select" id="destinationFilter" onchange="applyFilters()">
                  <option value="">All Destinations</option>
                </select>
              </div>
              <div class="filter-group">
                <label>Certification</label>
                <div class="form-check"><input class="form-check-input" type="checkbox" value="iso" id="certISO" onchange="applyFilters()"><label class="form-check-label" for="certISO">ISO Certified</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" value="gst" id="certGST" onchange="applyFilters()"><label class="form-check-label" for="certGST">GST Verified</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" value="trustseal" id="certTrust" onchange="applyFilters()"><label class="form-check-label" for="certTrust">TrustSEAL Verified</label></div>
              </div>
              <div class="filter-group">
                <label>Price Range (USD)</label>
                <input type="range" class="form-range" min="0" max="50000" step="100" id="priceRange" onchange="updatePriceLabel()">
                <small>Up to $<span id="priceValue">50,000</span></small>
              </div>
              <button class="btn btn-outline-success w-100 mt-3" onclick="resetFilters()">
                <i class="bi bi-arrow-repeat"></i> Reset All Filters
              </button>
            </div>
          </div>

          <div class="col-lg-9">
            <div class="result-bar" data-aos="fade-up">
              <div class="count"><span id="resultCount">0</span> products found</div>
              <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <input type="text" class="form-control" id="searchInput" placeholder="Search products..." onkeyup="applyFilters()" style="width:200px;">
                <select class="form-select" id="sortBy" onchange="applyFilters()" style="width:180px;">
                  <option value="relevance">Sort: Relevance</option>
                  <option value="price-low">Price: Low to High</option>
                  <option value="price-high">Price: High to Low</option>
                  <option value="rating">Rating: Highest</option>
                  <option value="name">Name: A-Z</option>
                </select>
              </div>
            </div>

            <div class="row gy-4" id="productsContainer">
              <div class="col-12 text-center py-5">
                <div class="spinner-border text-success" role="status"></div>
                <p class="mt-3 text-muted">Loading products from database...</p>
              </div>
            </div>

            <nav class="mt-4" data-aos="fade-up">
              <ul class="pagination justify-content-center" id="pagination"></ul>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Zimbabwe Trade Information</h2>
        <p>Key facts about Zimbabwe's export sector</p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="trade-info-card"><div class="icon"><i class="bi bi-box-seam"></i></div><h4>Major Exports</h4><p>Tobacco, gold, platinum, diamonds, ferrochrome, nickel, cotton, sugar, and horticultural products</p></div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="trade-info-card"><div class="icon"><i class="bi bi-globe-americas"></i></div><h4>Export Markets</h4><p>South Africa, China, UAE, Mozambique, Zambia, Botswana, United Kingdom, and European Union</p></div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="trade-info-card"><div class="icon"><i class="bi bi-graph-up-arrow"></i></div><h4>Key Sectors</h4><p>Agriculture, mining, and manufacturing form the backbone of Zimbabwe's export economy</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="call-to-action section dark-background">
      <img src="assets/img/bg/bg-8.webp" alt="">
      <div class="container">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Are You a Zimbabwean Exporter?</h3>
            <p>Join industry.co.zw and connect with international buyers. Get verified, list your products, and grow your exports.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="contact.php">Get Verified Today</a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <div class="rfq-modal" id="rfqModal">
    <div class="rfq-modal-content">
      <span class="close-modal" onclick="closeRFQ()">&times;</span>
      <h4><i class="bi bi-chat-dots"></i> Get Latest Price</h4>
      <div class="product-summary" id="rfqProductSummary" style="background:#f5f5f5;padding:15px;border-radius:10px;margin-bottom:20px;border-left:4px solid #006400;"></div>
      <form id="rfqForm" onsubmit="submitRFQ(event)">
        <div class="mb-3"><label class="form-label">Your Name *</label><input type="text" class="form-control" id="rfqName" required placeholder="Enter your full name"></div>
        <div class="mb-3"><label class="form-label">Email or Phone *</label><input type="text" class="form-control" id="rfqContact" required placeholder="Email address or phone number"></div>
        <div class="mb-3"><label class="form-label">Your Country</label><input type="text" class="form-control" id="rfqCountry" value="South Africa" readonly></div>
        <div class="mb-3"><label class="form-label">Quantity Required</label><input type="number" class="form-control" id="rfqQuantity" placeholder="Enter quantity needed" min="1"></div>
        <div class="mb-3"><label class="form-label">Additional Requirements</label><textarea class="form-control" id="rfqMessage" rows="2" placeholder="Specifications, delivery timeline, etc."></textarea></div>
        <button type="submit" class="btn btn-success w-100 py-2 fw-bold"><i class="bi bi-send"></i> Submit Enquiry</button>
      </form>
      <div class="alert alert-success mt-3 fw-bold" id="rfqSuccess" style="display:none;"><i class="bi bi-check-circle"></i> Enquiry sent successfully!</div>
    </div>
  </div>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.php" class="d-flex align-items-center"><img src="assets/img/industry-logo-20.png" alt="industry.co.zw Logo"></a>
          <div class="footer-contact pt-3"><p>Harare, Zimbabwe</p><p class="mt-3"><strong>Phone:</strong> <span>+263 242 123456</span></p><p><strong>Email:</strong> <span>info@industry.co.zw</span></p></div>
        </div>
        <div class="col-lg-2 col-md-3 footer-links"><h4>Quick Links</h4><ul><li><i class="bi bi-chevron-right"></i> <a href="index.php">Home</a></li><li><i class="bi bi-chevron-right"></i> <a href="industries.php">Industries</a></li><li><i class="bi bi-chevron-right"></i> <a href="provinces.php">Provinces</a></li><li><i class="bi bi-chevron-right"></i> <a href="stakeholders.php">Stakeholders</a></li></ul></div>
        <div class="col-lg-2 col-md-3 footer-links"><h4>Resources</h4><ul><li><i class="bi bi-chevron-right"></i> <a href="tenders.php">Tenders</a></li><li><i class="bi bi-chevron-right"></i> <a href="events.php">Events</a></li><li><i class="bi bi-chevron-right"></i> <a href="exports.php">Exports</a></li><li><i class="bi bi-chevron-right"></i> <a href="gallery.php">Gallery</a></li></ul></div>
        <div class="col-lg-4 col-md-12"><h4>Follow Us</h4><p>Stay connected with Zimbabwe's industrial community</p><div class="social-links d-flex"><a href=""><i class="bi bi-twitter-x"></i></a><a href=""><i class="bi bi-facebook"></i></a><a href=""><i class="bi bi-instagram"></i></a><a href=""><i class="bi bi-linkedin"></i></a></div></div>
      </div>
    </div>
    <div class="container copyright text-center mt-4"><p>© <span>Copyright</span> <strong class="px-1 sitename">industry.co.zw</strong> <span>All Rights Reserved</span></p><div class="credits">Developed by <a href="https://sadacnet.com/">SADACNET</a></div></div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/js/main.js"></script>

  <script>
    const API_BASE = '/industry.co.zw/api/public';
    let allProducts = [];
    let allDestinations = [];
    let currentPage = 1;
    const itemsPerPage = 6;

    document.addEventListener('DOMContentLoaded', loadProducts);

    // ========== LOAD FROM DATABASE ==========
    async function loadProducts() {
      try {
        const response = await fetch(API_BASE + '/exports.php');
        const data = await response.json();

        if (data.status === 'success' && data.data.length > 0) {
          // USE ACTUAL DATABASE VALUES - no random generation!
          allProducts = data.data.map(item => ({
            id: item.id,
            name: item.product_name,
            category: item.category || 'General',
            specs: item.specs || '',
            description: item.description || '',
            price: parseFloat(item.price) || 0,
            moq: parseInt(item.moq) || 1,
            company: item.company || 'Zimbabwe Exporter',
            rating: parseFloat(item.rating) || 0,
            reviews: parseInt(item.reviews) || 0,
            exportsTo: Array.isArray(item.exports_to) ? item.exports_to : (item.exports_to ? item.exports_to.split(',') : []),
            certifications: Array.isArray(item.certifications) ? item.certifications : (item.certifications ? item.certifications.split(',') : []),
            verified: item.verified == 1 || item.verified === true,
            image: item.image || null
          }));
        } else {
          allProducts = [];
        }

        populateFilters();
        displayProducts();
      } catch (error) {
        console.error('Error:', error);
        document.getElementById('productsContainer').innerHTML = '<div class="col-12 text-center py-5"><h4>Could not load products</h4></div>';
      }
    }

    function populateFilters() {
      // Category filter
      const categories = [...new Set(allProducts.map(p => p.category))];
      const catSelect = document.getElementById('categoryFilter');
      catSelect.innerHTML = '<option value="">All Categories</option>';
      categories.sort().forEach(cat => {
        catSelect.innerHTML += `<option value="${cat}">${cat}</option>`;
      });

      // Destination filter
      const destinations = [...new Set(allProducts.flatMap(p => p.exportsTo))];
      const destSelect = document.getElementById('destinationFilter');
      destSelect.innerHTML = '<option value="">All Destinations</option>';
      destinations.sort().forEach(dest => {
        if (dest.trim()) {
          destSelect.innerHTML += `<option value="${dest.trim()}">${dest.trim()}</option>`;
        }
      });
    }

    function getFilteredProducts() {
      const category = document.getElementById('categoryFilter').value;
      const destination = document.getElementById('destinationFilter').value;
      const search = document.getElementById('searchInput').value.toLowerCase();
      const priceMax = parseInt(document.getElementById('priceRange').value);
      const certISO = document.getElementById('certISO').checked;
      const certGST = document.getElementById('certGST').checked;
      const certTrust = document.getElementById('certTrust').checked;

      return allProducts.filter(p => {
        if (category && p.category !== category) return false;
        if (destination && !p.exportsTo.some(d => d.trim() === destination)) return false;
        if (search && !p.name.toLowerCase().includes(search) && !p.company.toLowerCase().includes(search) && !p.specs.toLowerCase().includes(search) && !p.category.toLowerCase().includes(search)) return false;
        if (p.price > priceMax) return false;
        if (certISO && !p.certifications.includes('iso')) return false;
        if (certGST && !p.certifications.includes('gst')) return false;
        if (certTrust && !p.certifications.includes('trustseal')) return false;
        return true;
      });
    }

    function sortProducts(products) {
      const sortBy = document.getElementById('sortBy').value;
      const sorted = [...products];
      switch(sortBy) {
        case 'price-low': return sorted.sort((a, b) => a.price - b.price);
        case 'price-high': return sorted.sort((a, b) => b.price - a.price);
        case 'rating': return sorted.sort((a, b) => b.rating - a.rating);
        case 'name': return sorted.sort((a, b) => a.name.localeCompare(b.name));
        default: return sorted;
      }
    }

    function paginate(products) {
      const start = (currentPage - 1) * itemsPerPage;
      return products.slice(start, start + itemsPerPage);
    }

    function displayProducts() {
      const filtered = getFilteredProducts();
      const sorted = sortProducts(filtered);
      const paginated = paginate(sorted);

      document.getElementById('resultCount').textContent = filtered.length;
      renderProducts(paginated);
      renderPagination(filtered.length);
    }

    function renderProducts(products) {
      const container = document.getElementById('productsContainer');

      if (products.length === 0) {
        container.innerHTML = `<div class="col-12 text-center py-5"><i class="bi bi-search" style="font-size:48px;color:#ccc;"></i><h4 class="mt-3">No products found</h4><button class="btn btn-success mt-2" onclick="resetFilters()">Reset Filters</button></div>`;
        return;
      }

      container.innerHTML = products.map((p, i) => `
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="${i * 100}">
          <div class="product-card">
            ${p.verified ? '<span class="verified-badge"><i class="bi bi-patch-check-fill"></i> Verified</span>' : ''}
            <div class="product-img">
              ${p.image ? `<img src="/industry.co.zw/${p.image}" alt="${p.name}" onerror="this.parentElement.innerHTML='<i class=\\'bi bi-box-seam default-icon\\'></i>'">` : getCategoryIcon(p.category)}
            </div>
            <span class="category-badge">${p.category}</span>
            <div class="product-name">${p.name}</div>
            ${p.specs ? `<div class="product-specs">${p.specs}</div>` : ''}
            ${p.price > 0 ? `<div class="price">$ ${p.price.toLocaleString()} <small>/ Unit</small></div>` : ''}
            ${p.moq > 1 ? `<div class="moq"><i class="bi bi-box"></i> MOQ: ${p.moq} Units</div>` : ''}
            <div class="company-name"><i class="bi bi-building"></i> ${p.company}</div>
            ${p.rating > 0 ? `<div class="rating"><span class="stars">${'★'.repeat(Math.floor(p.rating))}${p.rating % 1 >= 0.5 ? '½' : ''}</span><span class="count">${p.rating} (${p.reviews} reviews)</span></div>` : ''}
            ${p.exportsTo.length > 0 ? `<div class="exports-to"><i class="bi bi-globe2"></i> Exports To: ${p.exportsTo.join(', ')}</div>` : ''}
            ${p.certifications.length > 0 ? `<div class="certifications">${p.certifications.map(c => `<span class="cert-badge"><i class="bi bi-shield-check"></i> ${c.toUpperCase()}</span>`).join(' ')}</div>` : ''}
            <button class="btn-get-price" onclick="openRFQ(${p.id}, '${p.name.replace(/'/g, "\\'")}', '${p.company.replace(/'/g, "\\'")}', ${p.price})">
              <i class="bi bi-chat-dots"></i> Get Latest Price
            </button>
          </div>
        </div>
      `).join('');
    }

    function getCategoryIcon(category) {
      const icons = {
        'Agriculture': '<i class="bi bi-flower1 default-icon"></i>',
        'Minerals': '<i class="bi bi-gem default-icon"></i>',
        'Manufacturing': '<i class="bi bi-gear default-icon"></i>',
        'Textiles': '<i class="bi bi-basket default-icon"></i>',
        'Horticulture': '<i class="bi bi-flower2 default-icon"></i>',
        'General': '<i class="bi bi-box-seam default-icon"></i>'
      };
      return icons[category] || '<i class="bi bi-box-seam default-icon"></i>';
    }

    function renderPagination(totalItems) {
      const totalPages = Math.ceil(totalItems / itemsPerPage);
      const pagination = document.getElementById('pagination');
      if (totalPages <= 1) { pagination.innerHTML = ''; return; }
      let html = '';
      for (let i = 1; i <= totalPages; i++) {
        html += `<li class="page-item ${i === currentPage ? 'active' : ''}"><a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a></li>`;
      }
      pagination.innerHTML = html;
    }

    function changePage(page) { currentPage = page; displayProducts(); window.scrollTo({ top: 400, behavior: 'smooth' }); }
    function applyFilters() { currentPage = 1; displayProducts(); }

    function resetFilters() {
      document.getElementById('categoryFilter').value = '';
      document.getElementById('destinationFilter').value = '';
      document.getElementById('searchInput').value = '';
      document.getElementById('priceRange').value = 50000;
      document.getElementById('priceValue').textContent = '50,000';
      document.getElementById('certISO').checked = false;
      document.getElementById('certGST').checked = false;
      document.getElementById('certTrust').checked = false;
      document.getElementById('sortBy').value = 'relevance';
      currentPage = 1;
      displayProducts();
    }

    function updatePriceLabel() {
      document.getElementById('priceValue').textContent = parseInt(document.getElementById('priceRange').value).toLocaleString();
      applyFilters();
    }

    function openRFQ(productId, productName, company, price) {
      document.getElementById('rfqProductSummary').innerHTML = `<strong>${productName}</strong><br><small class="text-muted">${company} | $${price.toLocaleString()}/Unit</small>`;
      document.getElementById('rfqModal').classList.add('show');
      document.body.style.overflow = 'hidden';
    }

    function closeRFQ() {
      document.getElementById('rfqModal').classList.remove('show');
      document.getElementById('rfqSuccess').style.display = 'none';
      document.getElementById('rfqForm').style.display = 'block';
      document.body.style.overflow = '';
    }

    function submitRFQ(event) {
      event.preventDefault();
      document.getElementById('rfqForm').style.display = 'none';
      document.getElementById('rfqSuccess').style.display = 'block';
      setTimeout(() => { closeRFQ(); document.getElementById('rfqForm').style.display = 'block'; document.getElementById('rfqForm').reset(); }, 3000);
    }

    window.onclick = function(event) { if (event.target == document.getElementById('rfqModal')) closeRFQ(); }
  </script>

</body>
</html>