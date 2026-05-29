<?php
$pageTitle = "CZI Member Directory - industry.co.zw";
$pageDescription = "Browse CZI member companies across various industries and sectors";
require_once __DIR__ . '/includes/head.php';
?>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main" style="background: #f5f5f5; padding: 40px 0;">

    <!-- Member Directory Section -->
    <section id="member-directory" class="member-directory section">
      <div class="container">
        
        <div class="row" id="directoryContent">
          <div class="col-12 text-center py-5">
            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;"></div>
            <p class="mt-3 text-muted">Loading directory...</p>
          </div>
        </div>

      </div>
    </section>

  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <style>
    .directory-column {
      margin-bottom: 30px;
    }
    
    .category-section {
      margin-bottom: 35px;
    }
    
    .category-title {
      display: flex;
      align-items: center;
      font-size: 1.15rem;
      font-weight: 700;
      color: #28a745;
      margin-bottom: 12px;
      padding-bottom: 8px;
    }
    
    .category-icon {
      width: 20px;
      height: 20px;
      margin-right: 10px;
      color: #1e5a8e;
    }
    
    .category-count {
      color: #28a745;
      margin-left: 5px;
    }
    
    .directory-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .directory-item {
      display: flex;
      align-items: center;
      padding: 6px 0;
      color: #28a745;
      text-decoration: none;
      font-size: 0.95rem;
      transition: all 0.2s ease;
    }
    
    .directory-item:hover {
      color: #1e7e34;
      padding-left: 5px;
    }
    
    .item-icon {
      width: 24px;
      height: 24px;
      background: #a8d5a0;
      border-radius: 3px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      color: #fff;
      font-size: 0.75rem;
    }
    
    .item-icon.dark {
      background: #5a9e52;
    }
    
    .item-text {
      flex: 1;
    }
    
    .item-count {
      color: #28a745;
      font-weight: 500;
    }
  </style>

  <script>
    const API = '/industry.co.zw/api/public';
    
    // Directory data matching the screenshot exactly
    const directoryData = [
      {
        name: 'Construction',
        count: 15,
        icon: 'bi bi-globe',
        items: [
          { name: 'Abrasives', icon: 'bi bi-box' },
          { name: 'Air Conditioning', icon: 'bi bi-snow' },
          { name: 'Brick Manufacturing', icon: 'bi bi-building' },
          { name: 'Building', icon: 'bi bi-building-check' },
          { name: 'Cements', icon: 'bi bi-droplet' },
          { name: 'Concrete Products', icon: 'bi bi-square' },
          { name: 'Landscaping', icon: 'bi bi-tree' },
          { name: 'Painting', count: 2, icon: 'bi bi-palette' },
          { name: 'Real Estate', icon: 'bi bi-house' },
          { name: 'Shopfitters', count: 8, icon: 'bi bi-shop' }
        ]
      },
      {
        name: 'CZI Member Directory',
        count: 17,
        icon: 'bi bi-globe',
        items: [
          { name: 'Accommodation', icon: 'bi bi-hotel' },
          { name: 'Arts and Culture', icon: 'bi bi-palette' },
          { name: 'Associations', icon: 'bi bi-people' },
          { name: 'Consulting', icon: 'bi bi-briefcase' },
          { name: 'CZI', icon: 'bi bi-building' },
          { name: 'Education', count: 1, icon: 'bi bi-mortarboard' },
          { name: 'Fire Places', icon: 'bi bi-fire' },
          { name: 'Fuel Technology', count: 1, icon: 'bi bi-fuel-pump' },
          { name: 'Handling Services', icon: 'bi bi-truck' },
          { name: 'homeware', count: 2, icon: 'bi bi-house-heart' },
          { name: 'ICT', count: 4, icon: 'bi bi-pc' },
          { name: 'Printing', count: 3, icon: 'bi bi-printer' },
          { name: 'Security', count: 4, icon: 'bi bi-shield-check' },
          { name: 'SPORT', count: 1, icon: 'bi bi-trophy' },
          { name: 'Supermarket', count: 1, icon: 'bi bi-cart' },
          { name: 'Wedding and Accessories', icon: 'bi bi-heart' }
        ]
      },
      {
        name: 'Industry',
        count: 54,
        icon: 'bi bi-globe',
        items: [
          { name: 'Agriculture', count: 3, icon: 'bi bi-flower1' },
          { name: 'Airlines', icon: 'bi bi-airplane' },
          { name: 'Aluminium', count: 3, icon: 'bi bi-square' },
          { name: 'Auctions', count: 1, icon: 'bi bi-hand-thumbs-up' },
          { name: 'Auto Mobile', count: 27, icon: 'bi bi-car-front' },
          { name: 'Car Hiring', icon: 'bi bi-car-front-fill' },
          { name: 'Entertainment', count: 1, icon: 'bi bi-film' },
          { name: 'Events Management', icon: 'bi bi-calendar-event' },
          { name: 'Finance', count: 1, icon: 'bi bi-cash-stack' },
          { name: 'Food', count: 5, icon: 'bi bi-cup-hot' },
          { name: 'Health and Hygien', count: 6, icon: 'bi bi-heart-pulse' },
          { name: 'Laundry', count: 2, icon: 'bi bi-droplet' },
          { name: 'Media', count: 1, icon: 'bi bi-camera-video' },
          { name: 'Shipping, Forwarding and Custom Clearing', count: 1, icon: 'bi bi-ship' },
          { name: 'Tenders', count: 1, icon: 'bi bi-clipboard-check' },
          { name: 'Transport', count: 2, icon: 'bi bi-truck' },
          { name: 'Travel and Tourism', icon: 'bi bi-suitcase' }
        ]
      },
      {
        name: 'Manufacturing',
        count: 32,
        icon: 'bi bi-globe',
        items: [
          { name: 'Beauty and Cosmetics', icon: 'bi bi-handbag', dark: true },
          { name: 'Chemicals', count: 1, icon: 'bi bi-flask', dark: true },
          { name: 'Electrical', count: 3, icon: 'bi bi-lightning', dark: true },
          { name: 'Engineering', count: 12, icon: 'bi bi-tools', dark: true },
          { name: 'Foams and Beds', icon: 'bi bi-bed', dark: true },
          { name: 'Hardware', count: 6, icon: 'bi bi-hammer', dark: true },
          { name: 'Leather Products', icon: 'bi bi-bag', dark: true },
          { name: 'Metal Works', icon: 'bi bi-wrench', dark: true },
          { name: 'Packaging', icon: 'bi bi-box-seam', dark: true },
          { name: 'Phamaceuticals', count: 4, icon: 'bi bi-capsule', dark: true },
          { name: 'Plastics', count: 4, icon: 'bi bi-file-earmark', dark: true },
          { name: 'Stationery', count: 4, icon: 'bi bi-journal', dark: true }
        ]
      },
      {
        name: 'Msasa',
        count: 13,
        icon: 'bi bi-globe',
        items: [
          { name: 'Citroen', count: 6, icon: 'bi bi-car-front' },
          { name: 'Streets', icon: 'bi bi-signpost' },
          { name: 'Whites Way', count: 7, icon: 'bi bi-signpost-split' }
        ]
      }
    ];

    function renderDirectory() {
      const container = document.getElementById('directoryContent');
      
      let html = '<div class="row">';
      
      // Create 3 columns
      const col1 = [directoryData[0], directoryData[1]]; // Construction, CZI
      const col2 = [directoryData[2]]; // Industry
      const col3 = [directoryData[3], directoryData[4]]; // Manufacturing, Msasa
      
      const columns = [col1, col2, col3];
      
      columns.forEach((col, colIndex) => {
        html += '<div class="col-lg-4 col-md-6 directory-column">';
        
        col.forEach(category => {
          html += `
            <div class="category-section">
              <div class="category-title">
                <i class="${category.icon} category-icon"></i>
                <span>${category.name}</span>
                <span class="category-count">(${category.count})</span>
              </div>
              <ul class="directory-list">
                ${category.items.map(item => `
                  <li>
                    <a href="companies.php?category=${encodeURIComponent(item.name)}" class="directory-item">
                      <div class="item-icon ${item.dark ? 'dark' : ''}">
                        <i class="${item.icon}"></i>
                      </div>
                      <span class="item-text">${item.name}</span>
                      ${item.count ? `<span class="item-count">(${item.count})</span>` : ''}
                    </a>
                  </li>
                `).join('')}
              </ul>
            </div>
          `;
        });
        
        html += '</div>';
      });
      
      html += '</div>';
      container.innerHTML = html;
    }

    // Load directory on page load
    document.addEventListener('DOMContentLoaded', function() {
      renderDirectory();
    });
  </script>

</body>
</html>