/**
 * Mock Data Layer for industry.co.zw
 * Intercepts fetch calls and returns sample data if the backend is unavailable or during development.
 */

(function() {
    const MOCK_DATA = {
        'api/public/industries.php': {
            status: 'success',
            data: [
                {
                    id: 1, name: "Construction", slug: "construction", icon: "🏗️", total_company_count: 15,
                    sub_categories: [
                        { id: 10, name: "Abrasives", icon: "💎", direct_company_count: 2 },
                        { id: 11, name: "Air Conditioning", icon: "🌬️", direct_company_count: 5 },
                        { id: 12, name: "Asphalt & Tar Services", icon: "🛣️", direct_company_count: 3 },
                        { id: 13, name: "Bricklayers", icon: "🧱", direct_company_count: 5 }
                    ]
                },
                {
                    id: 2, name: "Manufacturing", slug: "manufacturing", icon: "🏭", total_company_count: 32,
                    sub_categories: [
                        { id: 20, name: "Chemicals", icon: "🧪", direct_company_count: 12 },
                        { id: 21, name: "Engineering", icon: "⚙️", direct_company_count: 8 },
                        { id: 22, name: "Food & Beverages", icon: "🥤", direct_company_count: 12 }
                    ]
                },
                {
                    id: 3, name: "Mining", slug: "mining", icon: "⛏️", total_company_count: 24,
                    sub_categories: [
                        { id: 30, name: "Gold Mining", icon: "🥇", direct_company_count: 10 },
                        { id: 31, name: "Coal Mining", icon: "🪨", direct_company_count: 14 }
                    ]
                }
            ]
        },
        'api/public/companies.php': {
            status: 'success',
            data: [
                { id: 1, name: "Masimba Construction", logo: "assets/img/clients/masimba.jpg", industry_id: 1, is_featured: 1 },
                { id: 2, name: "Asphalt & Tar", logo: "assets/img/clients/asphalt-logo.jpg", industry_id: 10, is_featured: 1 },
                { id: 3, name: "Earthwave", logo: "assets/img/clients/earthwave.jpg", industry_id: 21, is_featured: 1 },
                { id: 4, name: "Turnall", logo: "assets/img/clients/turnall-logo.jpg", industry_id: 1, is_featured: 1 }
            ]
        },
        'api/public/provinces.php': {
            status: 'success',
            data: [
                { id: 1, name: "Harare", slug: "harare" },
                { id: 2, name: "Bulawayo", slug: "bulawayo" },
                { id: 3, name: "Manicaland", slug: "manicaland" },
                { id: 4, name: "Mashonaland West", slug: "mashonaland-west" },
                { id: 5, name: "Midlands", slug: "midlands" }
            ]
        },
        'api/public/tenders.php': {
            status: 'success',
            data: [
                { id: 1, title: "Construction of Road Network", closing_date: "2026-06-15" },
                { id: 2, title: "Supply of Industrial Chemicals", closing_date: "2026-06-20" }
            ]
        },
        'api/public/events.php': {
            status: 'success',
            data: [
                { id: 1, title: "Zimbabwe Industrial Summit", event_date: "2026-07-10", location: "Harare" },
                { id: 2, title: "SME Networking Workshop", event_date: "2026-07-22", location: "Bulawayo" }
            ]
        }
    };

    const originalFetch = window.fetch;
    window.fetch = function(resource, init) {
        const url = typeof resource === 'string' ? resource : resource.url;

        // Match base URL without query params
        const baseUrl = url.split('?')[0];

        if (MOCK_DATA[baseUrl]) {
            console.log(`[Mock API] Intercepted: ${url}`);

            let data = JSON.parse(JSON.stringify(MOCK_DATA[baseUrl]));

            // Filtering for companies
            if (baseUrl === 'api/public/companies.php') {
                const params = new URLSearchParams(url.split('?')[1] || '');
                let filtered = [...data.data];

                if (params.get('featured') === '1') {
                    filtered = filtered.filter(c => c.is_featured);
                }
                if (params.get('industry_id')) {
                    filtered = filtered.filter(c => c.industry_id == params.get('industry_id'));
                }
                if (params.get('industry')) {
                    // Mapping slugs to IDs for mock
                    const slugMap = { 'construction': 1, 'manufacturing': 2 };
                    filtered = filtered.filter(c => c.industry_id == slugMap[params.get('industry')]);
                }
                if (params.get('search')) {
                    const term = params.get('search').toLowerCase();
                    filtered = filtered.filter(c => c.name.toLowerCase().includes(term));
                }

                data.data = filtered;
            }

            return Promise.resolve(new Response(JSON.stringify(data), {
                status: 200,
                headers: { 'Content-Type': 'application/json' }
            }));
        }

        return originalFetch(resource, init);
    };

    console.log("Mock API Layer Initialized");
})();
