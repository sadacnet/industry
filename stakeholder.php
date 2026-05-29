<?php
$org = isset($_GET['org']) ? strtoupper($_GET['org']) : 'CZI';
$section = isset($_GET['section']) ? $_GET['section'] : 'directory';

if (!in_array($org, ['CZI', 'CIFOZ'])) { $org = 'CZI'; }
if (!in_array($section, ['directory', 'advertising', 'events', 'networking'])) { $section = 'directory'; }

$pageTitle = $org . " - " . ucfirst($section);
$orgFullName = $org === 'CZI' ? 'Confederation of Zimbabwe Industries' : 'Construction Industry Federation of Zimbabwe';
$orgDesc = $org === 'CZI' ? 'Representing Zimbabwe\'s industrial sector' : 'Leading Zimbabwe\'s construction industry';
$orgColor = $org === 'CZI' ? '#1565C0' : '#7B1FA2';
$orgColorDark = $org === 'CZI' ? '#0D47A1' : '#4A148C';
$orgIcon = $org === 'CZI' ? 'bi-building' : 'bi-cone-striped';

require_once __DIR__ . '/includes/head.php';
?>
<style>
    .stakeholder-banner {
        background: linear-gradient(135deg, <?php echo $orgColor; ?>, <?php echo $orgColorDark; ?>);
        color: #fff; padding: 60px 0 30px; text-align: center;
    }
    .stakeholder-banner h1 { color: #fff; font-size: 32px; font-weight: 700; margin-bottom: 5px; }
    .stakeholder-banner p { color: rgba(255,255,255,0.85); margin: 0; font-size: 16px; }
    
    .section-nav {
        background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        position: sticky; top: 70px; z-index: 99;
    }
    .section-nav a {
        display: inline-block; padding: 15px 20px; font-weight: 600;
        color: #555; text-decoration: none; border-bottom: 3px solid transparent;
        transition: all 0.2s;
    }
    .section-nav a.active { color: <?php echo $orgColor; ?>; border-bottom-color: <?php echo $orgColor; ?>; }
    .section-nav a:hover { color: <?php echo $orgColor; ?>; }
    
    .company-card {
        background: #fff; border-radius: 10px; padding: 20px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.06); height: 100%; border: 1px solid #eee;
        transition: all 0.3s;
    }
    .company-card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
    .company-card h5 { font-weight: 700; margin-bottom: 4px; font-size: 16px; color: #111; }
    .company-card .info { font-size: 13px; color: #666; margin-bottom: 3px; }
    .company-card .info i { color: <?php echo $orgColor; ?>; margin-right: 5px; width: 15px; }
    
    .ad-card {
        background: #fff; border-radius: 10px; overflow: hidden;
        box-shadow: 0 2px 15px rgba(0,0,0,0.06); margin-bottom: 20px; cursor: pointer;
        transition: all 0.3s;
    }
    .ad-card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
    .ad-card img { width: 100%; height: 180px; object-fit: cover; }
    .ad-card .ad-body { padding: 15px; }
    .ad-card .ad-type {
        font-size: 11px; text-transform: uppercase; font-weight: 700;
        color: <?php echo $orgColor; ?>;
    }
    
    .logo-slider-card {
        background: #fff; border-radius: 10px; border: 1px solid #e0e0e0;
        box-shadow: 0 2px 15px rgba(0,0,0,0.06); margin-bottom: 30px;
    }
    .logo-slider-card .card-header {
        background: <?php echo $orgColor; ?>; color: #fff; padding: 15px 20px;
        border-radius: 10px 10px 0 0; font-weight: 700;
    }
    .logo-slider-card .swiper { padding: 20px 10px 40px; }
    .logo-slider-card .swiper-slide { 
        text-align: center; cursor: pointer;
        transition: transform 0.3s;
    }
    .logo-slider-card .swiper-slide:hover { transform: scale(1.1); }
    .logo-slider-card .swiper-slide img {
        max-height: 80px; max-width: 150px; object-fit: contain;
        filter: grayscale(20%); transition: filter 0.3s;
        display: inline-block;
    }
    .logo-slider-card .swiper-slide:hover img { filter: grayscale(0%); }
    
    .event-item {
        background: #fff; border-radius: 10px; padding: 20px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.06); margin-bottom: 15px;
        border-left: 4px solid <?php echo $orgColor; ?>;
        transition: all 0.3s;
    }
    .event-item:hover { transform: translateX(3px); }
    
    .empty-state { text-align: center; padding: 60px 20px; color: #999; }
    .empty-state i { font-size: 64px; display: block; margin-bottom: 15px; opacity: 0.3; }
    
    .logo-img { width: 60px; height: 60px; border-radius: 8px; object-fit: contain; background: #f9f9f9; margin-bottom: 10px; }
    .logo-placeholder {
        width: 60px; height: 60px; border-radius: 8px; background: #f0f0f0;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px; color: <?php echo $orgColor; ?>; margin-bottom: 10px;
    }

    .result-count {
        display: inline-block;
        background: #e8f5e9;
        color: #006400;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .section-nav a { padding: 12px 10px; font-size: 12px; }
        .logo-slider-card .swiper-slide img { max-height: 60px; max-width: 120px; }
    }
</style>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main">

    <!-- Banner -->
    <section class="stakeholder-banner">
      <div class="container">
        <h1><i class="bi <?php echo $orgIcon; ?>"></i> <?php echo $orgFullName; ?></h1>
        <p><?php echo $orgDesc; ?></p>
      </div>
    </section>

    <!-- Section Tabs -->
    <div class="section-nav">
      <div class="container">
        <a href="?org=<?php echo $org; ?>&section=directory" class="<?php echo $section == 'directory' ? 'active' : ''; ?>">
          <i class="bi bi-people"></i> Member Directory
        </a>
        <a href="?org=<?php echo $org; ?>&section=advertising" class="<?php echo $section == 'advertising' ? 'active' : ''; ?>">
          <i class="bi bi-megaphone"></i> Advertising
        </a>
        <a href="?org=<?php echo $org; ?>&section=events" class="<?php echo $section == 'events' ? 'active' : ''; ?>">
          <i class="bi bi-calendar-event"></i> Events Calendar
        </a>
        <a href="?org=<?php echo $org; ?>&section=networking" class="<?php echo $section == 'networking' ? 'active' : ''; ?>">
          <i class="bi bi-diagram-3"></i> Networking
        </a>
      </div>
    </div>

    <!-- Content -->
    <section class="services section light-background">
      <div class="container">

        <!-- ========== MEMBER DIRECTORY ========== -->
        <?php if ($section == 'directory'): ?>
        <div data-aos="fade-up">
          <h4 style="margin-bottom:5px;"><i class="bi bi-people"></i> <?php echo $org; ?> Member Directory</h4>
          <span class="result-count" id="memberCount">Loading...</span>
          <input type="text" class="form-control mb-3 mt-2" id="memberSearch" placeholder="Search members by name, industry, or province..." style="max-width:400px;">
          <div class="row" id="membersList">
            <div class="col-12 text-center py-4"><div class="spinner-border" style="color:<?php echo $orgColor; ?>;"></div><p class="mt-2 text-muted">Loading members...</p></div>
          </div>
        </div>
        <?php endif; ?>

        <!-- ========== ADVERTISING ========== -->
        <?php if ($section == 'advertising'): ?>
        <div data-aos="fade-up">
          <h4 style="margin-bottom:20px;"><i class="bi bi-megaphone"></i> <?php echo $org; ?> Advertising</h4>
          
          <!-- Logo Swiper Slider -->
          <div class="logo-slider-card">
            <div class="card-header"><i class="bi bi-building"></i> Member Company Logos</div>
            <div class="swiper init-swiper" id="logoSlider">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true, "speed": 600,
                  "autoplay": { "delay": 3000, "disableOnInteraction": false },
                  "slidesPerView": "auto",
                  "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                  "breakpoints": {
                    "320": { "slidesPerView": 2, "spaceBetween": 20 },
                    "480": { "slidesPerView": 3, "spaceBetween": 30 },
                    "768": { "slidesPerView": 4, "spaceBetween": 40 },
                    "992": { "slidesPerView": 5, "spaceBetween": 50 },
                    "1200": { "slidesPerView": 6, "spaceBetween": 60 }
                  }
                }
              </script>
              <div class="swiper-wrapper align-items-center" id="logoSliderWrapper">
                <div class="swiper-slide text-center"><div class="spinner-border spinner-border-sm" style="color:<?php echo $orgColor; ?>;"></div></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <!-- Filter for other ads -->
          <select class="form-select mb-3" id="adTypeFilter" style="max-width:200px;">
            <option value="">All Types</option>
            <option value="banner">Banners</option>
            <option value="flyer">Flyers</option>
            <option value="poster">Posters</option>
          </select>
          <div class="row" id="adsList">
            <div class="col-12 text-center py-4"><div class="spinner-border" style="color:<?php echo $orgColor; ?>;"></div><p class="mt-2 text-muted">Loading advertisements...</p></div>
          </div>
        </div>
        <?php endif; ?>

        <!-- ========== EVENTS CALENDAR ========== -->
        <?php if ($section == 'events'): ?>
        <div data-aos="fade-up">
          <h4 style="margin-bottom:20px;"><i class="bi bi-calendar-event"></i> <?php echo $org; ?> Events Calendar</h4>
          <div id="eventsList">
            <div class="col-12 text-center py-4"><div class="spinner-border" style="color:<?php echo $orgColor; ?>;"></div><p class="mt-2 text-muted">Loading events...</p></div>
          </div>
        </div>
        <?php endif; ?>

        <!-- ========== NETWORKING ========== -->
        <?php if ($section == 'networking'): ?>
        <div data-aos="fade-up">
          <h4 style="margin-bottom:20px;"><i class="bi bi-diagram-3"></i> <?php echo $org; ?> Networking</h4>
          <div class="row">
            <div class="col-lg-6 mb-4">
              <div class="company-card">
                <h5><i class="bi bi-info-circle"></i> About <?php echo $org; ?> Networking</h5>
                <p style="color:#666;">Connect with fellow <?php echo $org; ?> members, share business opportunities, and build lasting relationships across Zimbabwe's <?php echo $org === 'CZI' ? 'industrial' : 'construction'; ?> sector.</p>
                <hr>
                <p class="info"><i class="bi bi-envelope"></i> info@<?php echo strtolower($org); ?>.co.zw</p>
                <p class="info"><i class="bi bi-telephone"></i> +263 242 123456</p>
                <p class="info"><i class="bi bi-globe"></i> www.<?php echo strtolower($org); ?>.co.zw</p>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="company-card">
                <h5><i class="bi bi-people"></i> Member-to-Member Connection</h5>
                <p style="color:#666;">Use the Member Directory to find and connect with other <?php echo $org; ?> members. Filter by industry, province, or search by company name to find potential business partners and collaborators.</p>
                <a href="?org=<?php echo $org; ?>&section=directory" class="btn mt-2" style="background:<?php echo $orgColor; ?>;color:#fff;border:none;">
                  <i class="bi bi-search"></i> Browse Member Directory
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

      </div>
    </section>

    <!-- CTA -->
    <section class="call-to-action section dark-background">
      <img src="assets/img/bg/bg-8.webp" alt="">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Join <?php echo $org; ?> Today</h3>
            <p>Become a member of <?php echo $orgFullName; ?> and get listed on Zimbabwe's leading industrial portal.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="contact.php">Get Listed</a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script>
    const org = '<?php echo $org; ?>';
    const section = '<?php echo $section; ?>';
    const orgColor = '<?php echo $orgColor; ?>';
    const API = '/industry.co.zw/api/public';

    document.addEventListener('DOMContentLoaded', function() {
      
      // ========== DIRECTORY ==========
      if (section === 'directory') {
        // FIXED: Added &limit=500 to load all companies
        fetch(API + '/companies.php?stakeholder=' + org + '&limit=500')
          .then(r => r.json())
          .then(d => {
            const container = document.getElementById('membersList');
            if (d.status === 'success' && d.data.length > 0) {
              let members = d.data;
              document.getElementById('memberCount').textContent = members.length + ' members found';
              renderMembers(members);
              document.getElementById('memberSearch').addEventListener('keyup', function() {
                const s = this.value.toLowerCase();
                const filtered = members.filter(m => 
                  m.name.toLowerCase().includes(s) || 
                  m.industry_name.toLowerCase().includes(s) ||
                  m.province_name.toLowerCase().includes(s)
                );
                document.getElementById('memberCount').textContent = filtered.length + ' members found';
                renderMembers(filtered);
              });
            } else {
              document.getElementById('memberCount').textContent = '0 members';
              container.innerHTML = '<div class="col-12 empty-state"><i class="bi bi-people"></i><h4>No members yet</h4><p>Members will appear here once added.</p></div>';
            }
          })
          .catch(() => {
            document.getElementById('membersList').innerHTML = '<div class="col-12 empty-state"><i class="bi bi-exclamation-triangle"></i><h4>Error loading</h4></div>';
          });
      }

      // ========== ADVERTISING ==========
      if (section === 'advertising') {
        let logos = getDemoLogos();
        let otherAds = [];
        
        renderLogos(logos);
        
        fetch(API + '/advertisements.php?stakeholder=' + org)
          .then(r => r.json())
          .then(d => {
            if (d.status === 'success' && d.data.length > 0) {
              let dbLogos = d.data.filter(a => a.type === 'logo');
              otherAds = d.data.filter(a => a.type !== 'logo');
              
              if (dbLogos.length > 0) {
                logos = dbLogos.map(a => ({
                  title: a.title || '',
                  file_path: '/industry.co.zw/' + a.file_path,
                  link_url: a.link_url || ''
                }));
                renderLogos(logos);
              }
            }
            
            renderAds(otherAds);
            
            document.getElementById('adTypeFilter').addEventListener('change', function() {
              const t = this.value;
              renderAds(t ? otherAds.filter(a => a.type === t) : otherAds);
            });
            
            if (otherAds.length === 0) {
              document.getElementById('adsList').innerHTML = '<div class="col-12 text-center py-4"><p class="text-muted">No banners, flyers, or posters yet</p></div>';
            }
          })
          .catch(() => {
            document.getElementById('adsList').innerHTML = '<div class="col-12 empty-state"><i class="bi bi-megaphone"></i><h4>No advertisements</h4></div>';
          });
      }

      // ========== EVENTS ==========
      if (section === 'events') {
        fetch(API + '/events.php?organizer=' + org)
          .then(r => r.json())
          .then(d => {
            const container = document.getElementById('eventsList');
            if (d.status === 'success' && d.data.length > 0) {
              container.innerHTML = d.data.map(e => {
                const ed = new Date(e.event_date);
                return `
                  <div class="event-item">
                    <div class="row align-items-center">
                      <div class="col-md-2 text-center mb-2 mb-md-0">
                        <div style="font-size:32px;font-weight:700;color:${orgColor};line-height:1;">${ed.getDate()}</div>
                        <div style="font-size:14px;text-transform:uppercase;font-weight:600;">${ed.toLocaleString('default',{month:'short'})}</div>
                        <div style="font-size:12px;color:#999;">${ed.getFullYear()}</div>
                        ${e.end_date ? '<div style="font-size:11px;color:#999;">to ' + new Date(e.end_date).toLocaleDateString('en-ZA',{day:'numeric',month:'short'}) + '</div>' : ''}
                      </div>
                      <div class="col-md-10">
                        <h5 style="margin-bottom:5px;">${e.title}</h5>
                        <p style="color:#666;margin:0 0 5px 0;"><i class="bi bi-geo-alt"></i> ${e.location || 'TBA'}</p>
                        ${e.description ? '<p style="color:#888;margin:0;font-size:13px;">' + e.description.substring(0,180) + (e.description.length > 180 ? '...' : '') + '</p>' : ''}
                      </div>
                    </div>
                  </div>`;
              }).join('');
            } else {
              container.innerHTML = '<div class="empty-state"><i class="bi bi-calendar-event"></i><h4>No upcoming events</h4><p>Events will be posted here when available.</p></div>';
            }
          })
          .catch(() => {
            document.getElementById('eventsList').innerHTML = '<div class="empty-state"><i class="bi bi-exclamation-triangle"></i><h4>Error loading</h4></div>';
          });
      }
    });

    // ========== RENDER LOGOS ==========
    function renderLogos(logos) {
      document.getElementById('logoSliderWrapper').innerHTML = logos.map(a => `
        <div class="swiper-slide" style="cursor:pointer; padding:10px;" ${a.link_url ? `onclick="window.open('${a.link_url}','_blank')"` : ''}>
          <img src="${a.file_path}" class="img-fluid" alt="${a.title || org + ' Logo'}" 
               style="max-height:80px; max-width:150px; object-fit:contain;"
               onerror="this.parentElement.innerHTML='<div style=padding:20px;color:#999;font-size:12px;>' + (a.title||'Logo') + '</div>'">
          ${a.title ? '<div style="font-size:11px;color:#888;margin-top:5px;">' + a.title + '</div>' : ''}
        </div>`).join('');
      
      setTimeout(() => {
        const swiperEl = document.querySelector('#logoSlider');
        if (swiperEl && window.Swiper) {
          if (swiperEl.swiper) swiperEl.swiper.destroy();
          const config = JSON.parse(swiperEl.querySelector('.swiper-config').textContent);
          new Swiper(swiperEl, config);
        }
      }, 300);
    }

    function getDemoLogos() {
      if (org === 'CZI') {
        return [
          { title: 'Turnall', file_path: 'assets/img/clients/turnall-logo.jpg' },
          { title: 'Earthwave', file_path: 'assets/img/clients/earthwave.jpg' },
          { title: 'Fueltec', file_path: 'assets/img/clients/fueltec.jpg' },
          { title: 'Masimba', file_path: 'assets/img/clients/masimba.jpg' },
          { title: 'Edenvine Mobile', file_path: 'assets/img/clients/edenvine-mobile-logo.jpg' },
          { title: 'Asphalt', file_path: 'assets/img/clients/asphalt-logo.jpg' },
          { title: 'Industry Logo', file_path: 'assets/img/clients/logo.jpg' }
        ];
      } else {
        return [
          { title: 'Essar CIFOZ', file_path: 'assets/img/clients/essar-cifoz.jpg' },
          { title: 'Turnall', file_path: 'assets/img/clients/turnall-logo.jpg' },
          { title: 'Asphalt', file_path: 'assets/img/clients/asphalt-logo.jpg' },
          { title: 'Masimba', file_path: 'assets/img/clients/masimba.jpg' },
          { title: 'Earthwave', file_path: 'assets/img/clients/earthwave.jpg' },
          { title: 'Fueltec', file_path: 'assets/img/clients/fueltec.jpg' },
          { title: 'Industry Logo', file_path: 'assets/img/clients/logo.jpg' }
        ];
      }
    }

    function renderMembers(members) {
      document.getElementById('membersList').innerHTML = members.map(m => `
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="company-card">
            ${m.logo ? `<img src="/industry.co.zw/${m.logo}" class="logo-img" alt="${m.name}">` : `<div class="logo-placeholder"><i class="bi bi-building"></i></div>`}
            <h5>${m.name}</h5>
            <p class="info"><i class="bi bi-gear"></i> ${m.industry_name}</p>
            <p class="info"><i class="bi bi-geo-alt"></i> ${m.province_name}</p>
            ${m.phone ? '<p class="info"><i class="bi bi-telephone"></i> ' + m.phone + '</p>' : ''}
            ${m.email ? '<p class="info"><i class="bi bi-envelope"></i> ' + m.email + '</p>' : ''}
            ${m.website ? '<p class="info"><i class="bi bi-globe"></i> <a href="https://' + m.website + '" target="_blank">Website</a></p>' : ''}
          </div>
        </div>`).join('');
    }

    function renderAds(ads) {
      if (ads.length === 0) {
        document.getElementById('adsList').innerHTML = '<div class="col-12 text-center py-4"><p class="text-muted">No items to display</p></div>';
        return;
      }
      document.getElementById('adsList').innerHTML = ads.map(a => `
        <div class="col-lg-3 col-md-4 col-6 mb-3">
          <div class="ad-card" onclick="${a.link_url ? "window.open('https://"+a.link_url+"','_blank')" : "window.open('/industry.co.zw/"+a.file_path+"','_blank')"}">
            <img src="/industry.co.zw/${a.file_path}" alt="${a.title || 'Ad'}" onerror="this.parentElement.style.display='none'">
            <div class="ad-body">
              <span class="ad-type">${a.type}</span>
              ${a.title ? '<p class="mb-0 mt-1" style="font-size:13px;font-weight:600;">' + a.title + '</p>' : ''}
            </div>
          </div>
        </div>`).join('');
    }
  </script>

</body>
</html>