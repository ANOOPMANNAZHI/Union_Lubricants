-- Add certifications data
INSERT INTO certifications (title, description, pdf_path, image_path, created_at, updated_at) VALUES
('ISO 9001:2015', 'Quality Management System Certification', '/storage/certificates/iso-9001.pdf', '/storage/certificates/iso-9001.jpg', NOW(), NOW()),
('ISO 14001:2015', 'Environmental Management Certification', '/storage/certificates/iso-14001.pdf', '/storage/certificates/iso-14001.jpg', NOW(), NOW());
