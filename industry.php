<?php
$pageTitle = "CZI eDirectory";
$pageDescription = "Confederation of Zimbabwe Industries Electronic Directory";
require_once __DIR__ . '/includes/head.php';
?>
<style>
  .directory-header {
    background: #f8f9fa;
    padding: 60px 0;
    border-bottom: 1px solid #eee;
    margin-bottom: 40px;
  }
  .category-section {
    margin-bottom: 40px;
  }
  .category-title {
    color: #28a745;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .sub-category-list {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
    margin: 0 -10px;
  }
  .sub-category-item {
    width: 33.33%;
    padding: 10px;
  }
  @media (max-width: 992px) { .sub-category-item { width: 33.33%; } }
  @media (max-width: 768px) { .sub-category-item { width: 50%; } }
  @media (max-width: 576px) { .sub-category-item { width: 100%; } }

  .sub-category-link {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: #444;
    padding: 8px;
    border-radius: 4px;
    transition: 0.2s;
  }
  .sub-category-link:hover {
    background: #e9ecef;
    color: #28a745;
  }
  .sub-category-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    background: #eee;
    border-radius: 4px;
  }
  .count-badge {
    font-size: 0.85rem;
    color: #666;
    margin-left: auto;
  }
</style>
</head>

<body>
  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main>
    <section class="directory-header">
      <div class="container text-center">
        <h1 class="display-4 fw-bold" style="color: #28a745;">CZI eDirectory</h1>
        <p class="lead">Find suppliers and members across all industry sectors in Zimbabwe</p>
      </div>
    </section>

    <div class="container pb-5">
      <div id="directory-container">
        <!-- Categories and Sub-categories loaded via API -->
        <div class="text-center py-5">
          <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('api/public/industries.php')
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const container = document.getElementById('directory-container');
                    container.innerHTML = '';

                    data.data.forEach(category => {
                        const section = document.createElement('div');
                        section.className = 'category-section';

                        const title = `
                            <div class="category-title">
                                <span class="sub-category-icon">${category.icon || '📁'}</span>
                                ${category.name} (${category.total_company_count})
                            </div>
                        `;

                        const subList = document.createElement('div');
                        subList.className = 'sub-category-list';

                        category.sub_categories.forEach(sub => {
                            subList.innerHTML += `
                                <div class="sub-category-item">
                                    <a href="find-suppliers?category=${sub.id}" class="sub-category-link">
                                        <span class="sub-category-icon">${sub.icon || '📄'}</span>
                                        <span class="name">${sub.name}</span>
                                        <span class="count-badge">(${sub.direct_company_count})</span>
                                    </a>
                                </div>
                            `;
                        });

                        section.innerHTML = title;
                        section.appendChild(subList);
                        container.appendChild(section);
                    });
                }
            });
    });
  </script>
</body>
</html>
