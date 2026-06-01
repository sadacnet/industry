-- Populate the nested hierarchy based on screenshots
USE industry_co_zw;

-- First, clear existing industries to start fresh for the directory
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE industries;
SET FOREIGN_KEY_CHECKS = 1;

-- Insert Parent Categories
INSERT INTO industries (id, name, slug, icon, display_order) VALUES
(1, 'Construction', 'construction', '🏗️', 1),
(2, 'Manufacturing', 'manufacturing', '🏭', 2),
(3, 'CZI Member Directory', 'czi-member-directory', '🏢', 3),
(4, 'Msasa', 'msasa', '📍', 4),
(5, 'Industry', 'industry', '💼', 5);

-- Insert Sub-categories for Construction
INSERT INTO industries (name, slug, parent_id, icon) VALUES
('Abrasives', 'abrasives', 1, '💎'),
('Air Conditioning', 'air-conditioning', 1, '🌬️'),
('Brick Manufacturing', 'brick-manufacturing', 1, '🧱'),
('Building', 'building', 1, '🏢'),
('Cements', 'cements', 1, '📦'),
('Concrete Products', 'concrete-products', 1, '🪨'),
('Landscaping', 'landscaping', 1, '🌳'),
('Painting', 'painting', 1, '🎨'),
('Real Estate', 'real-estate', 1, '🏠'),
('Shopfitters', 'shopfitters', 1, '🏪');

-- Insert Sub-categories for Manufacturing
INSERT INTO industries (name, slug, parent_id, icon) VALUES
('Beauty and Cosmetics', 'beauty-cosmetics', 2, '💄'),
('Chemicals', 'chemicals', 2, '🧪'),
('Electrical', 'electrical', 2, '⚡'),
('Engineering', 'engineering', 2, '⚙️'),
('Foams and Beds', 'foams-beds', 2, '🛏️'),
('Hardware', 'hardware', 2, '🔨'),
('Leather Products', 'leather-products', 2, '👞'),
('Metal Works', 'metal-works', 2, '🔩'),
('Packaging', 'packaging', 2, '📦'),
('Pharmaceuticals', 'pharmaceuticals', 2, '💊'),
('Plastics', 'plastics', 2, '🥤'),
('Stationery', 'stationery', 2, '✏️');

-- Insert Sub-categories for CZI Member Directory
INSERT INTO industries (name, slug, parent_id, icon) VALUES
('Accommodation', 'accommodation', 3, '🛌'),
('Arts and Culture', 'arts-culture', 3, '🎭'),
('Associations', 'associations', 3, '🤝'),
('Consulting', 'consulting', 3, '📋'),
('CZI', 'czi', 3, '🏛️'),
('Education', 'education', 3, '🎓'),
('Fire Places', 'fire-places', 3, '🔥'),
('Fuel Technology', 'fuel-technology', 3, '⛽'),
('Handling Services', 'handling-services', 3, '📦'),
('homeware', 'homeware', 3, '🏠'),
('ICT', 'ict', 3, '💻'),
('Printing', 'printing', 3, '🖨️'),
('Security', 'security', 3, '🛡️'),
('SPORT', 'sport', 3, '⚽'),
('Supermarket', 'supermarket', 3, '🛒'),
('Wedding and Accessories', 'wedding-accessories', 3, '💍');

-- Insert Sub-categories for Msasa
INSERT INTO industries (name, slug, parent_id, icon) VALUES
('Citroen', 'citroen', 4, '🚗'),
('Streets', 'streets', 4, '🛣️'),
('Whites Way', 'whites-way', 4, '⚪');

-- Insert Sub-categories for Industry
INSERT INTO industries (name, slug, parent_id, icon) VALUES
('Agriculture', 'agriculture', 5, '🚜'),
('Auctions', 'auctions', 5, '🔨'),
('Auto Mobile', 'auto-mobile', 5, '🚗'),
('Car Hiring', 'car-hiring', 5, '🔑'),
('Entertainment', 'entertainment', 5, '🎬'),
('Events Management', 'events-management', 5, '📅'),
('Finance', 'finance', 5, '💰'),
('Food', 'food', 5, '🍴'),
('Health and Hygien', 'health-hygien', 5, '🏥'),
('Laundry', 'laundry', 5, '🧺'),
('Media', 'media', 5, '📻'),
('Shipping, Forwarding and Custom Clearing', 'shipping-forwarding', 5, '🚢'),
('Tenders', 'tenders', 5, '📄'),
('Transport', 'transport', 5, '🚛'),
('Travel and Tourism', 'travel-tourism', 5, '✈️');

-- Insert some sample companies to match the counts in the screenshot
-- Note: province_id 1 is Harare from our seed data
INSERT INTO companies (name, industry_id, province_id, is_active, is_featured) VALUES
('Onel Electrical Engineers', (SELECT id FROM industries WHERE slug='engineering'), 1, 1, 1),
('Latoma Investments', (SELECT id FROM industries WHERE slug='engineering'), 1, 1, 1),
('AMC Chinhoyi', (SELECT id FROM industries WHERE slug='auto-mobile'), 1, 1, 1),
('KW Blasting', (SELECT id FROM industries WHERE slug='mining' OR slug='construction' LIMIT 1), 1, 1, 1),
('Speartec', (SELECT id FROM industries WHERE slug='ict'), 1, 1, 1);
