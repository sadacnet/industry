<?php
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
if (empty($slug)) { header('Location: provinces.php'); exit; }

$pageTitle = "Province Details - industry.co.zw";
require_once __DIR__ . '/includes/head.php';
?>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main">

    <!-- Page Title -->
    <section class="page-title section dark-background" style="background: url('assets/img/hero-section2.jpg') center center; background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center" data-aos="fade-up">
            <h1 id="provinceName">Loading...</h1>
            <p style="color: rgba(255,255,255,0.9);" id="provinceDesc"></p>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center mt-2">
                <li class="breadcrumb-item"><a href="index.php" style="color: #FFD700;">Home</a></li>
                <li class="breadcrumb-item"><a href="provinces.php" style="color: #FFD700;">Provinces</a></li>
                <li class="breadcrumb-item active" style="color: #fff;" id="breadcrumbName"></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <!-- Province Overview -->
    <section id="overview" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Province Overview</h2>
        <p id="overviewText">Loading province information...</p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>About This Province</h3>
            <p id="aboutText">Loading...</p>
            <div id="keyHighlights"></div>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card" style="border:1px solid #e0e0e0; border-radius:10px; padding:20px;">
              <h4 style="font-weight:700; margin-bottom:15px;">Key Economic Facts</h4>
              <div id="keyFacts">
                <p class="text-muted">Loading data...</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Key Industries Section -->
    <section id="industries" class="services section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Key Industries</h2>
        <p>Major industrial sectors active in this province</p>
      </div>
      <div class="container">
        <div class="row gy-4" id="industriesList">
          <div class="col-12 text-center"><p class="text-muted">Loading industries...</p></div>
        </div>
      </div>
    </section>

    <!-- Investment Opportunities -->
    <section id="opportunities" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Investment Opportunities</h2>
        <p>Growth areas and investment potential in this province</p>
      </div>
      <div class="container">
        <div class="row gy-4" id="opportunitiesList">
          <div class="col-12 text-center"><p class="text-muted">Loading opportunities...</p></div>
        </div>
      </div>
    </section>

    <!-- Infrastructure & Development -->
    <section id="infrastructure" class="about section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Infrastructure & Development</h2>
        <p>Key infrastructure, industrial parks, and development zones</p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item text-center">
              <div class="icon"><i class="bi bi-truck icon"></i></div>
              <h4>Transport Links</h4>
              <p id="transportInfo">Loading...</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item text-center">
              <div class="icon"><i class="bi bi-building icon"></i></div>
              <h4>Industrial Parks</h4>
              <p id="industrialParks">Loading...</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item text-center">
              <div class="icon"><i class="bi bi-lightning-charge icon"></i></div>
              <h4>Power & Utilities</h4>
              <p id="utilitiesInfo">Loading...</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Companies Section -->
    <section id="companies" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Companies in This Province</h2>
        <p>Registered businesses operating in this region</p>
      </div>
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <select class="form-select" id="industryFilter" onchange="filterCompanies()">
              <option value="">All Industries</option>
            </select>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" id="searchInput" placeholder="Search companies..." onkeyup="filterCompanies()">
          </div>
        </div>
        <div class="row gy-4" id="companiesContainer">
          <div class="col-12 text-center py-4">
            <div class="spinner-border text-success"></div>
            <p class="mt-2 text-muted">Loading companies...</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a href="contact.php" class="btn-get-started">Add Your Company</a>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="call-to-action section dark-background">
      <img src="assets/img/bg/bg-8.webp" alt="">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Invest in This Province</h3>
            <p>Join the growing business community and take advantage of the opportunities available.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="contact.php">Get Started</a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script>
    const slug = '<?php echo $slug; ?>';
    const API = '/industry.co.zw/api/public';
    let allCompanies = [];

    // Rich provincial data (IBEF/ZIDA style)
    const provinceData = {
      'harare': {
        overview: "Harare is Zimbabwe's capital and largest city, serving as the country's financial, commercial, and industrial hub. The province attracted US$439.90 million in projected investment in Q4 2025, accounting for 37% of national investment.",
        about: "Harare Province is the economic heartbeat of Zimbabwe, hosting the Zimbabwe Stock Exchange, Reserve Bank headquarters, and major corporate offices. The province benefits from well-developed infrastructure including Robert Gabriel Mugabe International Airport, major highways, and industrial areas like Msasa, Graniteside, and Southerton. Key sectors include financial services, manufacturing, ICT, construction, and real estate.",
        keyHighlights: [
          "Zimbabwe's capital and largest city",
          "37% of national investment (Q4 2025)",
          "Hosts Zimbabwe Stock Exchange and Reserve Bank",
          "Well-developed industrial and commercial infrastructure"
        ],
        keyFacts: [
          { label: "Investment Q4 2025", value: "US$439.90 million" },
          { label: "New Licenses", value: "103 (43.83% of national)" },
          { label: "Key Sectors", value: "Finance, Manufacturing, ICT, Real Estate" },
          { label: "Population", value: "2.4 million+ (metro)" },
          { label: "Industrial Areas", value: "Msasa, Graniteside, Southerton, Willowvale" },
          { label: "Airport", value: "Robert Gabriel Mugabe International" }
        ],
        industries: [
          { name: "Banking & Finance", desc: "Headquarters of major banks, insurance companies, and the Zimbabwe Stock Exchange.", slug: "banking-finance" },
          { name: "Manufacturing", desc: "Food processing, textiles, chemicals, and consumer goods production.", slug: "manufacturing" },
          { name: "Technology & ICT", desc: "Growing tech hub with software companies, data centers, and innovation spaces.", slug: "technology-ict" },
          { name: "Construction", desc: "Major infrastructure projects, commercial buildings, and housing developments.", slug: "construction" }
        ],
        opportunities: [
          { title: "Commercial Real Estate", desc: "Growing demand for office space, shopping malls, and mixed-use developments in the capital." },
          { title: "Financial Technology", desc: "Opportunities in mobile banking, payment solutions, and insurance technology for urban and peri-urban populations." },
          { title: "Light Manufacturing", desc: "Import substitution opportunities in packaging, plastics, furniture, and consumer goods." },
          { title: "ICT Services", desc: "Software development, data centers, and business process outsourcing for local and regional markets." }
        ],
        transportInfo: "Well-connected by road to all major cities. Robert Gabriel Mugabe International Airport offers direct flights to Johannesburg, Nairobi, Addis Ababa, and Dubai.",
        industrialParks: "Msasa Industrial Area, Graniteside, Southerton, Willowvale, and Sunway City technology park under development.",
        utilitiesInfo: "Reliable electricity supply with backup systems. Municipal water supply and fiber optic connectivity across commercial areas."
      },
      'bulawayo': {
        overview: "Bulawayo is Zimbabwe's second-largest city and traditional industrial heartland. The province is known for its strong manufacturing base, educational institutions, and cultural heritage.",
        about: "Bulawayo has historically been Zimbabwe's industrial powerhouse, with a strong manufacturing sector including textiles, food processing, and engineering. The city is home to the National University of Science and Technology (NUST) and hosts the Zimbabwe International Trade Fair (ZITF) annually. The province offers lower operational costs compared to Harare and excellent rail connections to South Africa and Botswana.",
        keyHighlights: [
          "Zimbabwe's traditional industrial heartland",
          "Hosts Zimbabwe International Trade Fair annually",
          "Strong manufacturing and engineering base",
          "Excellent rail links to South Africa and Botswana"
        ],
        keyFacts: [
          { label: "Investment Q4 2025", value: "US$53 million" },
          { label: "New Licenses", value: "4" },
          { label: "Key Sectors", value: "Manufacturing, Education, Tourism, Transport" },
          { label: "Population", value: "650,000+ (city)" },
          { label: "University", value: "NUST & Bulawayo Polytechnic" },
          { label: "Trade Show", value: "ZITF (Annual International Fair)" }
        ],
        industries: [
          { name: "Manufacturing", desc: "Textiles, food processing, steel fabrication, and consumer goods.", slug: "manufacturing" },
          { name: "Education", desc: "Major universities and technical colleges serving national and regional students.", slug: "education" },
          { name: "Tourism & Hospitality", desc: "Cultural tourism, Matobo Hills UNESCO site, and hotels.", slug: "tourism-hospitality" },
          { name: "Transport & Logistics", desc: "Strategic location for cross-border trade with South Africa and Botswana.", slug: "transport-logistics" }
        ],
        opportunities: [
          { title: "Manufacturing Revival", desc: "Reactivate dormant factories and modernize production for domestic and export markets." },
          { title: "Cultural Tourism", desc: "Develop tourism infrastructure around Matobo Hills, Khami Ruins, and cultural heritage sites." },
          { title: "Education Services", desc: "Expand student accommodation and services for growing university population." },
          { title: "Cross-Border Trade", desc: "Logistics and warehousing for trade with South Africa and Botswana via Plumtree border." }
        ],
        transportInfo: "Major railway hub connecting to South Africa, Botswana, and Zambia. Beitbridge-Bulawayo-Victoria Falls highway provides regional connectivity.",
        industrialParks: "Belmont Industrial Area, Kelvin Industrial Area, and Donnington Industrial Area with existing factory shells available.",
        utilitiesInfo: "Reliable municipal services. Industrial areas have three-phase power. Water supply from dams in Matabeleland South."
      },
      'midlands': {
        overview: "Midlands Province is Zimbabwe's mining and manufacturing powerhouse, leading the country in actual investment inflows at US$610 million. The province is home to Gweru (provincial capital), Kwekwe, and Zvishavane.",
        about: "Midlands Province recorded the highest actual investment inflows in recent data at US$610 million, driven largely by mining activities including gold, chrome, and platinum operations. The province hosts major mining companies like Zimplats, Mimosa, and Unki Mines. Gweru is a significant manufacturing center with ferrochrome smelting, steel production, and engineering works.",
        keyHighlights: [
          "Highest actual investment inflows (US$610 million)",
          "Major mining operations (platinum, gold, chrome)",
          "Strong manufacturing base in Gweru and Kwekwe",
          "Central geographic location with excellent road/rail links"
        ],
        keyFacts: [
          { label: "Actual Investment", value: "US$610 million (highest nationally)" },
          { label: "New Licenses Q4", value: "40" },
          { label: "Projected Investment", value: "US$262.18 million" },
          { label: "Key Sectors", value: "Mining, Manufacturing, Education" },
          { label: "Major Towns", value: "Gweru, Kwekwe, Zvishavane, Shurugwi" },
          { label: "Minerals", value: "Platinum, Gold, Chrome, Iron Ore" }
        ],
        industries: [
          { name: "Mining", desc: "Platinum, gold, chrome, and iron ore extraction and processing.", slug: "mining" },
          { name: "Manufacturing", desc: "Ferrochrome smelting, steel production, engineering, and food processing.", slug: "manufacturing" },
          { name: "Education", desc: "Midlands State University and technical colleges.", slug: "education" },
          { name: "Agriculture", desc: "Commercial farming, cattle ranching, and agro-processing.", slug: "agriculture" }
        ],
        opportunities: [
          { title: "Mineral Beneficiation", desc: "Chrome smelting, platinum processing, and gold refining facilities for value addition." },
          { title: "Mining Services", desc: "Equipment supply, drilling services, safety technology, and mine support services." },
          { title: "Steel & Engineering", desc: "Revival of ZISCO steelworks and downstream engineering industries." },
          { title: "Agro-Processing", desc: "Food processing, abattoirs, and cold storage facilities serving the region." }
        ],
        transportInfo: "Centrally located on the Harare-Bulawayo highway and railway line. Excellent road connections to all major cities and mining areas.",
        industrialParks: "Gweru Industrial Area, Kwekwe Industrial Area, ZISCO Steelworks complex, and Zimplats Selous mining complex.",
        utilitiesInfo: "Industrial power supply available. Water from Gwenoro Dam, Sebakwe Dam, and other sources. Fiber connectivity in major towns."
      }
    };

    // Default data for any province
    const defaultData = {
      overview: "This province contributes significantly to Zimbabwe's economy with growing investment and diverse industrial activities.",
      about: "This province offers a range of opportunities for investors, businesses, and workers across multiple sectors. The provincial administration supports business development and investment facilitation.",
      keyHighlights: ["Growing provincial economy", "Diverse industrial base", "Investment incentives available", "Strategic location"],
      keyFacts: [
        { label: "Sector Status", value: "Active & Growing" },
        { label: "Investment Climate", value: "Welcoming" },
        { label: "Key Advantage", value: "Strategic Location" },
        { label: "Workforce", value: "Available & Skilled" }
      ],
      industries: [
        { name: "Agriculture", desc: "Farming and agro-processing activities.", slug: "agriculture" },
        { name: "Mining", desc: "Mineral extraction and processing.", slug: "mining" },
        { name: "Manufacturing", desc: "Local production and value addition.", slug: "manufacturing" }
      ],
      opportunities: [
        { title: "Business Development", desc: "Start or expand your business in this growing province with access to regional markets." },
        { title: "Infrastructure Projects", desc: "Opportunities in construction, roads, water, and energy infrastructure development." },
        { title: "Value Addition", desc: "Processing and manufacturing opportunities using locally available resources." },
        { title: "Services Sector", desc: "Growing demand for financial, educational, healthcare, and professional services." }
      ],
      transportInfo: "Connected by road to major cities and towns. Public transport and freight services available.",
      industrialParks: "Designated industrial areas available for manufacturing and processing businesses.",
      utilitiesInfo: "Electricity and water supply available. Telecommunications coverage across major towns."
    };

    // Load province details from API
    fetch(API + '/provinces.php?slug=' + slug)
      .then(r => r.json())
      .then(d => {
        if (d.status === 'success' && d.data) {
          const prov = d.data;
          document.getElementById('provinceName').textContent = '📍 ' + prov.name;
          document.getElementById('provinceDesc').textContent = prov.opportunities || '';
          document.getElementById('breadcrumbName').textContent = prov.name;
          document.title = prov.name + ' - industry.co.zw';

          // Get rich data
          const data = provinceData[slug] || defaultData;
          
          document.getElementById('overviewText').textContent = data.overview;
          document.getElementById('aboutText').textContent = data.about;
          
          // Key Highlights
          document.getElementById('keyHighlights').innerHTML = '<ul>' + 
            data.keyHighlights.map(h => `<li><i class="bi bi-check2-circle"></i> <span>${h}</span></li>`).join('') + '</ul>';
          
          // Key Facts
          document.getElementById('keyFacts').innerHTML = data.keyFacts.map(f => 
            `<p style="margin-bottom:10px;border-bottom:1px solid #f0f0f0;padding-bottom:10px;"><strong>${f.label}:</strong><br><span style="color:#006400;font-weight:600;">${f.value}</span></p>`
          ).join('');
          
          // Industries
          document.getElementById('industriesList').innerHTML = data.industries.map((ind, i) => `
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="${i * 100}">
              <div class="service-item position-relative w-100">
                <div class="icon"><i class="bi bi-building icon"></i></div>
                <h4><a href="industry.php?slug=${ind.slug}" class="stretched-link">${ind.name}</a></h4>
                <p>${ind.desc}</p>
              </div>
            </div>
          `).join('');
          
          // Opportunities
          document.getElementById('opportunitiesList').innerHTML = data.opportunities.map((o, i) => `
            <div class="col-xl-6 d-flex" data-aos="fade-up" data-aos-delay="${i * 100}">
              <div class="service-item position-relative w-100">
                <div class="icon"><i class="bi bi-lightbulb icon"></i></div>
                <h4>${o.title}</h4>
                <p>${o.desc}</p>
              </div>
            </div>
          `).join('');
          
          // Infrastructure
          document.getElementById('transportInfo').textContent = data.transportInfo;
          document.getElementById('industrialParks').textContent = data.industrialParks;
          document.getElementById('utilitiesInfo').textContent = data.utilitiesInfo;
        }
      });

    // Load companies
    fetch(API + '/companies.php?province=' + slug)
      .then(r => r.json())
      .then(d => {
        allCompanies = d.data || [];
        displayCompanies(allCompanies);
        
        // Populate industry filter
        const industries = [...new Set(allCompanies.map(c => c.industry_name))];
        const select = document.getElementById('industryFilter');
        industries.forEach(ind => {
          const opt = document.createElement('option');
          opt.value = ind;
          opt.textContent = ind;
          select.appendChild(opt);
        });
      });

    function displayCompanies(companies) {
      const container = document.getElementById('companiesContainer');
      if (companies.length === 0) {
        container.innerHTML = '<div class="col-12 text-center"><p>No companies listed in this province yet.</p></div>';
        return;
      }
      container.innerHTML = companies.map((c, i) => `
        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="${i * 100}">
          <div class="service-item position-relative w-100">
            ${c.logo ? `<div class="text-center mb-3"><img src="/industry.co.zw/${c.logo}" style="max-height:60px;"></div>` : `<div class="icon"><i class="bi bi-building icon"></i></div>`}
            <h4>${c.name}</h4>
            <p><span class="badge bg-success">${c.industry_name}</span></p>
            ${c.stakeholder ? `<span class="badge bg-warning text-dark">${c.stakeholder}</span>` : ''}
            ${c.phone ? `<p class="mt-2"><small><i class="bi bi-telephone"></i> ${c.phone}</small></p>` : ''}
            ${c.email ? `<p><small><i class="bi bi-envelope"></i> ${c.email}</small></p>` : ''}
          </div>
        </div>
      `).join('');
    }

    function filterCompanies() {
      const industry = document.getElementById('industryFilter').value;
      const search = document.getElementById('searchInput').value.toLowerCase();
      let filtered = allCompanies;
      if (industry) filtered = filtered.filter(c => c.industry_name === industry);
      if (search) filtered = filtered.filter(c => c.name.toLowerCase().includes(search));
      displayCompanies(filtered);
    }
  </script>

</body>
</html>