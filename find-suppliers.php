<?php
$pageTitle = "Find Suppliers";
$pageDescription = "Search for verified suppliers and companies across Zimbabwe";
require_once __DIR__ . '/includes/head.php';
?>
<style>
  .search-section {
    background: #28a745;
    padding: 60px 0;
    color: #fff;
  }
  .search-box {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  }
  .company-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 8px;
    overflow: hidden;
    transition: 0.3s;
    height: 100%;
  }
  .company-card:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }
  .company-logo {
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    padding: 20px;
  }
  .company-logo img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
  }
  .company-info {
    padding: 20px;
  }
  .company-info h3 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 5px;
    color: #333;
  }
</style>
</head>

<body>
  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main>
    <section class="search-section">
      <div class="container text-center">
        <h1 class="mb-4">Find Suppliers</h1>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="search-box">
              <form id="search-form" class="row g-3">
                <div class="col-md-9">
                  <input type="text" id="search-input" class="form-control form-control-lg" placeholder="Search by name, category, or service...">
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-success btn-lg w-100">Search</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div id="results-count" class="mb-4 fw-bold"></div>
        <div class="row g-4" id="companies-grid">
           <!-- Populated via API -->
           <div class="text-center py-5">
              <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
           </div>
        </div>
      </div>
    </section>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const categoryId = urlParams.get('category');
        const typeSlug = urlParams.get('type');

        let apiUrl = 'api/public/companies.php';
        if (categoryId) apiUrl += `?industry_id=${categoryId}`;
        if (typeSlug) apiUrl += `?industry=${typeSlug}`;

        function loadCompanies(url) {
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        const grid = document.getElementById('companies-grid');
                        document.getElementById('results-count').innerText = `${data.data.length} Suppliers Found`;

                        if (data.data.length === 0) {
                            grid.innerHTML = '<div class="col-12 text-center py-5"><h3>No suppliers found.</h3></div>';
                            return;
                        }

                        grid.innerHTML = data.data.map(c => `
                            <div class="col-lg-3 col-md-4">
                                <div class="company-card">
                                    <div class="company-logo">
                                        <img src="${c.logo || 'assets/img/industry-logo-20.png'}" alt="${c.name}">
                                    </div>
                                    <div class="company-info">
                                        <h3>${c.name}</h3>
                                        <a href="#" class="btn btn-sm btn-outline-success mt-2 w-100">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        `).join('');
                    }
                });
        }

        loadCompanies(apiUrl);

        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const term = document.getElementById('search-input').value;
            loadCompanies(`api/public/companies.php?search=${encodeURIComponent(term)}`);
        });
    });
  </script>
</body>
</html>
