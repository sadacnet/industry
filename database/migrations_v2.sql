-- Migration to add nesting to industries and featured status to companies
-- Date: 2024-05-20

USE industry_co_zw;

-- Add parent_id to industries for nested categories
ALTER TABLE industries
ADD COLUMN parent_id INT DEFAULT NULL AFTER id,
ADD CONSTRAINT fk_industry_parent FOREIGN KEY (parent_id) REFERENCES industries(id) ON DELETE SET NULL;

-- Add is_featured to companies for homepage sliders
ALTER TABLE companies
ADD COLUMN is_featured TINYINT(1) DEFAULT 0 AFTER is_active;
