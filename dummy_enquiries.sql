-- Add enquiries data
INSERT INTO enquiries (name, email, phone, subject, message, status, created_at, updated_at) VALUES
('Robert Davis', 'robert@example.com', '+1-555-0101', 'Bulk Order Inquiry', 'I am interested in bulk supply of your engine oils for our fleet.', 'new', NOW(), NOW()),
('Emily Wilson', 'emily@example.com', '+1-555-0102', 'Product Information', 'Can you provide technical specifications for your hydraulic fluids?', 'in_progress', NOW(), NOW());
