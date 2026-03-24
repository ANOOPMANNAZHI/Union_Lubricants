-- Add dummy data for abouts
INSERT INTO abouts (title, content, image_path, created_at, updated_at) VALUES
('About Union Lubricants', 'We are a leading provider of quality lubricants and related products. With over 20 years of experience, we serve industries worldwide.', '/storage/abouts/about-us.jpg', NOW(), NOW());

-- Add dummy data for banners
INSERT INTO banners (heading, description, image_path, created_at, updated_at) VALUES
('Summer Sale 2025', 'Get 20% off on all products', '/storage/banners/summer-sale.jpg', NOW(), NOW()),
('New Product Launch', 'Introducing our premium synthetic blend', '/storage/banners/new-product.jpg', NOW(), NOW());

-- Add dummy data for product_categories
INSERT INTO product_categories (name, slug, description, is_active, created_at, updated_at) VALUES
('Engine Oils', 'engine-oils', 'Premium quality engine oils for all vehicle types', 1, NOW(), NOW()),
('Hydraulic Fluids', 'hydraulic-fluids', 'Specialized hydraulic fluids for machinery', 1, NOW(), NOW()),
('Gear Oils', 'gear-oils', 'High-performance gear lubricants', 1, NOW(), NOW());

-- Add dummy data for products
INSERT INTO products (category_id, name, slug, code, short_description, description, viscosity_grade, image_path, is_active, created_at, updated_at) VALUES
(1, 'Super Engine Oil 10W-40', 'super-engine-oil-10w-40', 'UL-EO-001', 'Premium synthetic blend', 'Premium synthetic blend engine oil for all weather conditions', '10W-40', '/storage/products/engine-oil-001.jpg', 1, NOW(), NOW()),
(2, 'Industrial Hydraulic Fluid ISO 46', 'industrial-hydraulic-fluid-iso-46', 'UL-HF-001', 'High-quality hydraulic fluid', 'Premium hydraulic fluid for industrial machinery', 'ISO 46', '/storage/products/hydraulic-001.jpg', 1, NOW(), NOW()),
(3, 'Gear Oil EP 220', 'gear-oil-ep-220', 'UL-GO-001', 'Extreme pressure gear oil', 'High-performance gear oil for heavy machinery', 'ISO 220', '/storage/products/gear-oil-001.jpg', 1, NOW(), NOW());

-- Add dummy data for services
INSERT INTO services (title, description, icon, image_path, created_at, updated_at) VALUES
('Product Consultation', 'Expert advice on selecting the right lubricant for your needs', '/storage/icons/consultation.png', '/storage/services/consultation.jpg', NOW(), NOW()),
('Bulk Supply', 'Custom bulk supply solutions for industrial customers', '/storage/icons/bulk-supply.png', '/storage/services/bulk-supply.jpg', NOW(), NOW()),
('Technical Support', '24/7 technical support for product usage', '/storage/icons/support.png', '/storage/services/support.jpg', NOW(), NOW());

-- Add dummy data for posts
INSERT INTO posts (title, slug, excerpt, content, featured_image, is_published, published_at, created_at, updated_at) VALUES
('Benefits of Synthetic Oils', 'benefits-of-synthetic-oils', 'Learn about the advantages of synthetic lubricants', 'Synthetic oils offer superior protection and performance compared to conventional oils. They provide better temperature stability, longer drain intervals, and improved fuel efficiency.', '/storage/posts/synthetic-oils.jpg', 1, NOW(), NOW(), NOW()),
('Maintenance Tips for Machinery', 'maintenance-tips-machinery', 'Keep your machinery running smoothly with these tips', 'Regular maintenance with proper lubricants extends equipment life. Follow these essential tips to maximize performance and reduce downtime.', '/storage/posts/maintenance-tips.jpg', 1, NOW(), NOW(), NOW());

-- Add dummy data for testimonials
INSERT INTO testimonials (author_name, author_position, author_company, content, author_image, rating, is_featured, created_at, updated_at) VALUES
('John Smith', 'Operations Manager', 'ABC Manufacturing', 'Union Lubricants products have improved our equipment performance significantly!', '/storage/testimonials/john.jpg', 5, 1, NOW(), NOW()),
('Sarah Johnson', 'Fleet Manager', 'XYZ Logistics', 'Excellent quality and reliable supply. Highly recommended!', '/storage/testimonials/sarah.jpg', 5, 1, NOW(), NOW()),
('Mike Chen', 'Maintenance Director', 'Industrial Solutions Inc', 'Professional service and top-notch products. Best lubricant supplier.', '/storage/testimonials/mike.jpg', 5, 1, NOW(), NOW());
