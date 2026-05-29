<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Events - industry.co.zw</title>
  <meta name="description" content="Upcoming industry events, conferences, and networking opportunities in Zimbabwe">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    /* Popup Modal */
    .popup-modal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.85);
      z-index: 99999;
      justify-content: center;
      align-items: center;
    }
    .popup-modal.show {
      display: flex;
    }
    .popup-modal .popup-content {
      position: relative;
      max-width: 500px;
      width: 90%;
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0,0,0,0.4);
      animation: popIn 0.3s ease;
    }
    @keyframes popIn {
      from { transform: scale(0.8); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
    .popup-modal .close-popup {
      position: absolute;
      top: 10px; right: 15px;
      color: #fff;
      font-size: 30px;
      cursor: pointer;
      z-index: 10;
      text-shadow: 0 2px 5px rgba(0,0,0,0.5);
    }
    .popup-modal .popup-image {
      width: 100%;
      display: block;
    }
    .popup-modal .popup-info {
      padding: 20px;
    }
    .popup-modal .popup-info h4 {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 5px;
    }
    .popup-modal .popup-info p {
      font-size: 13px;
      color: #666;
      margin-bottom: 3px;
    }
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
        </div>
      </div>
    </section>
    
<div class="container section-title" data-aos="fade-up">
        <h2>All Provinces</h2>
        <p>Click on any province to view companies and opportunities</p>
      </div>

    <section class="services section light-background">
      <div class="container">
        <div class="row" id="eventsContainer">
          <div class="col-12 text-center py-5">
            <div class="spinner-border text-success"></div>
            <p class="mt-3">Loading events...</p>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- POPUP MODAL -->
  <div class="popup-modal" id="popupModal" onclick="closePopup()">
    <div class="popup-content" onclick="event.stopPropagation()">
      <span class="close-popup" onclick="closePopup()">&times;</span>
      <img id="popupImage" src="" alt="Event Poster" class="popup-image">
      <div class="popup-info" id="popupInfo"></div>
    </div>
  </div>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.php"><img src="assets/img/industry-logo-20.png" alt="Logo"></a>
          <div class="footer-contact pt-3"><p>Harare, Zimbabwe</p><p><strong>Phone:</strong> +263 242 123456</p><p><strong>Email:</strong> info@industry.co.zw</p></div>
        </div>
        <div class="col-lg-2 col-md-3 footer-links"><h4>Quick Links</h4><ul><li><a href="index.php">Home</a></li><li><a href="industries.php">Industries</a></li><li><a href="provinces.php">Provinces</a></li><li><a href="stakeholders.php">Stakeholders</a></li></ul></div>
        <div class="col-lg-2 col-md-3 footer-links"><h4>Resources</h4><ul><li><a href="tenders.php">Tenders</a></li><li><a href="events.php">Events</a></li><li><a href="exports.php">Exports</a></li><li><a href="gallery.php">Gallery</a></li></ul></div>
        <div class="col-lg-4 col-md-12"><h4>Follow Us</h4><div class="social-links d-flex"><a href=""><i class="bi bi-twitter-x"></i></a><a href=""><i class="bi bi-facebook"></i></a><a href=""><i class="bi bi-instagram"></i></a><a href=""><i class="bi bi-linkedin"></i></a></div></div>
      </div>
    </div>
    <div class="container copyright text-center mt-4"><p>© <strong>industry.co.zw</strong> All Rights Reserved</p><div class="credits">Developed by <a href="https://sadacnet.com/">SADACNET</a></div></div>
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
    // Store events for popup use
    let eventsData = [];

    fetch('/industry.co.zw/api/public/events.php')
      .then(r => r.json())
      .then(d => {
        if (d.status === 'success' && d.data.length > 0) {
          eventsData = d.data;
          const container = document.getElementById('eventsContainer');

          container.innerHTML = d.data.map(event => {
            const eventDate = new Date(event.event_date);
            const month = eventDate.toLocaleString('default', { month: 'short' });
            const day = eventDate.getDate();
            const year = eventDate.getFullYear();
            const endDate = event.end_date ? ' - ' + new Date(event.end_date).toLocaleDateString('en-ZA', {day:'numeric', month:'short', year:'numeric'}) : '';
            const isUpcoming = event.is_upcoming;
            const daysUntil = event.days_until;
            
            let daysBadge = '';
            if (!isUpcoming) {
              daysBadge = '<span class="badge bg-secondary">Past Event</span>';
            } else if (daysUntil <= 7) {
              daysBadge = '<span class="badge bg-warning text-dark">⏰ ' + daysUntil + ' days left!</span>';
            } else {
              daysBadge = '<span class="badge bg-success">' + daysUntil + ' days away</span>';
            }

            const orgBadge = event.organizer === 'CZI' ? 
              '<span class="badge" style="background:#1565C0;">CZI</span>' : 
              '<span class="badge" style="background:#7B1FA2;">CIFOZ</span>';

            const imageHtml = event.poster ? 
              `<img src="/industry.co.zw/${event.poster}" alt="${event.title}" style="width:100%;height:100%;object-fit:cover;">` :
              `<div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#006400,#001a00);color:rgba(255,255,255,0.5);">
                <div style="text-align:center;"><i class="bi bi-calendar-event" style="font-size:50px;display:block;margin-bottom:8px;"></i>${event.organizer} Event</div>
              </div>`;

            return `
              <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                <div style="background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 3px 20px rgba(0,0,0,0.08);height:100%;">
                  
                  <!-- IMAGE - CLICK TO OPEN POPUP -->
                  <div style="height:350px;overflow:hidden;background:#1a1a1a;cursor:pointer;position:relative;" onclick="openPopup(${event.id})">
                    ${imageHtml}
                    <div style="position:absolute;bottom:10px;right:10px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 10px;border-radius:5px;font-size:11px;">
                      <i class="bi bi-zoom-in"></i> Click to view
                    </div>
                  </div>
                  
                  <!-- DETAILS -->
                  <div style="padding:20px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
                      ${orgBadge} ${daysBadge}
                    </div>
                    <p style="color:#006400;font-weight:600;font-size:13px;margin-bottom:6px;">
                      <i class="bi bi-calendar3"></i> ${month} ${day}, ${year}${endDate}
                    </p>
                    <h4 style="font-size:18px;font-weight:700;margin-bottom:6px;color:#111;">${event.title}</h4>
                    ${event.location ? '<p style="font-size:13px;color:#666;margin-bottom:6px;"><i class="bi bi-geo-alt"></i> ' + event.location + '</p>' : ''}
                    ${event.description ? '<p style="font-size:13px;color:#888;line-height:1.5;">' + event.description.substring(0, 100) + (event.description.length > 100 ? '...' : '') + '</p>' : ''}
                  </div>
                  
                </div>
              </div>`;
          }).join('');
        } else {
          document.getElementById('eventsContainer').innerHTML = '<div class="col-12 text-center py-5"><h4>No events found</h4></div>';
        }
      })
      .catch(() => {
        document.getElementById('eventsContainer').innerHTML = '<div class="col-12 text-center py-5"><h4>Could not load events</h4></div>';
      });

    // POPUP FUNCTIONS
    function openPopup(eventId) {
      const event = eventsData.find(e => e.id == eventId);
      if (!event) return;
      
      const imgSrc = event.poster ? '/industry.co.zw/' + event.poster : '';
      
      if (imgSrc) {
        document.getElementById('popupImage').src = imgSrc;
        document.getElementById('popupImage').style.display = 'block';
      } else {
        document.getElementById('popupImage').style.display = 'none';
      }
      
      document.getElementById('popupInfo').innerHTML = `
        <h4>${event.title}</h4>
        <p><i class="bi bi-building"></i> ${event.organizer}</p>
        <p><i class="bi bi-calendar3"></i> ${new Date(event.event_date).toLocaleDateString('en-ZA', {weekday:'long', day:'numeric', month:'long', year:'numeric'})}</p>
        ${event.location ? '<p><i class="bi bi-geo-alt"></i> ' + event.location + '</p>' : ''}
        ${event.description ? '<p style="margin-top:8px;">' + event.description + '</p>' : ''}
      `;
      
      document.getElementById('popupModal').classList.add('show');
      document.body.style.overflow = 'hidden';
    }

    function closePopup() {
      document.getElementById('popupModal').classList.remove('show');
      document.body.style.overflow = '';
    }

    // Close with ESC key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closePopup();
    });
  </script>

</body>
</html>