-- Insert dummy data for roles
INSERT INTO roles (name, slug, created_at, updated_at) VALUES 
('Super Admin', 'super-admin', datetime('now'), datetime('now')),
('Admin', 'admin', datetime('now'), datetime('now')),
('Editor', 'editor', datetime('now'), datetime('now')),
('Agent', 'agent', datetime('now'), datetime('now')),
('Merchant', 'merchant', datetime('now'), datetime('now'));

-- Insert dummy users
INSERT INTO users (name, email, password, role_id, status, created_at, updated_at) VALUES 
('Super Admin', 'admin@dilmog.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, datetime('now'), datetime('now')),
('John Editor', 'editor@dilmog.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, 1, datetime('now'), datetime('now'));

-- Insert parcel types
INSERT INTO parceltypes (title, status, created_at, updated_at) VALUES 
('Document', 1, datetime('now'), datetime('now')),
('Parcel', 1, datetime('now'), datetime('now')),
('Electronics', 1, datetime('now'), datetime('now')),
('Clothing', 1, datetime('now'), datetime('now')),
('Food Items', 1, datetime('now'), datetime('now'));

-- Insert cities
INSERT INTO cities (title, status, created_at, updated_at) VALUES 
('Lagos', 1, datetime('now'), datetime('now')),
('Abuja', 1, datetime('now'), datetime('now')),
('Port Harcourt', 1, datetime('now'), datetime('now')),
('Kano', 1, datetime('now'), datetime('now')),
('Ibadan', 1, datetime('now'), datetime('now'));

-- Insert towns
INSERT INTO towns (title, city_id, status, created_at, updated_at) VALUES 
('Victoria Island', 1, 1, datetime('now'), datetime('now')),
('Ikeja', 1, 1, datetime('now'), datetime('now')),
('Wuse II', 2, 1, datetime('now'), datetime('now')),
('Garki', 2, 1, datetime('now'), datetime('now')),
('GRA', 3, 1, datetime('now'), datetime('now'));

-- Insert settings
INSERT INTO settings (title, system_name, email, contact, address, footer_text, created_at, updated_at) VALUES 
('Dilmog Logistics', 'Dilmog Courier System', 'info@dilmog.com', '+234-800-123-4567', 'Lagos, Nigeria', 'Dilmog Logistics - Fast & Reliable Delivery Service', datetime('now'), datetime('now'));

-- Insert contact information
INSERT INTO contacts (title, details, email, phone, address, created_at, updated_at) VALUES 
('Dilmog Logistics Contact', 'Contact us for all your delivery needs', 'info@dilmog.com', '+234-800-123-4567', 'Plot 123, Victoria Island, Lagos, Nigeria', datetime('now'), datetime('now'));

-- Insert services
INSERT INTO services (title, details, image, status, created_at, updated_at) VALUES 
('Same Day Delivery', 'Fast same-day delivery within the city', 'same-day.jpg', 1, datetime('now'), datetime('now')),
('Next Day Delivery', 'Reliable next-day delivery service', 'next-day.jpg', 1, datetime('now'), datetime('now')),
('Express Delivery', 'Express delivery for urgent parcels', 'express.jpg', 1, datetime('now'), datetime('now'));

-- Insert merchants
INSERT INTO merchants (firstName, lastName, companyName, emailAddress, phoneNumber, address, password, status, agree, created_at, updated_at) VALUES 
('John', 'Doe', 'Doe Trading Ltd', 'john@example.com', '08012345001', 'No 1, Sample Street, Lagos', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, datetime('now'), datetime('now')),
('Jane', 'Smith', 'Smith Enterprises', 'jane@example.com', '08012345002', 'No 2, Sample Street, Lagos', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, datetime('now'), datetime('now')),
('Mike', 'Johnson', 'Johnson Corp', 'mike@example.com', '08012345003', 'No 3, Sample Street, Lagos', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, datetime('now'), datetime('now'));

-- Insert agents
INSERT INTO agents (name, email, phone, address, password, status, created_at, updated_at) VALUES 
('Agent One', 'agent1@dilmog.com', '08012345101', 'Agent Address 1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, datetime('now'), datetime('now')),
('Agent Two', 'agent2@dilmog.com', '08012345102', 'Agent Address 2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, datetime('now'), datetime('now'));

-- Insert delivery men
INSERT INTO deliverymen (name, email, phone, address, password, status, created_at, updated_at) VALUES 
('Delivery Man One', 'delivery1@dilmog.com', '08012345201', 'Delivery Address 1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, datetime('now'), datetime('now')),
('Delivery Man Two', 'delivery2@dilmog.com', '08012345202', 'Delivery Address 2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, datetime('now'), datetime('now'));

-- Insert charge tariffs
INSERT INTO charge_tarifs (pickupcity_id, deliverycity_id, deliverycharge, extradeliverycharge, codcharge, tax, insurance, status, created_at, updated_at) VALUES 
(1, 2, 1500.00, 500.00, 100.00, 7.50, 2.00, 1, datetime('now'), datetime('now')),
(1, 3, 2000.00, 600.00, 150.00, 7.50, 2.00, 1, datetime('now'), datetime('now')),
(2, 1, 1500.00, 500.00, 100.00, 7.50, 2.00, 1, datetime('now'), datetime('now'));

-- Insert sample parcels
INSERT INTO parcels (trackingCode, merchantId, senderName, senderPhone, senderAddress, receiverName, receiverPhone, receiverAddress, parcelType, weight, numberOfItem, itemName, itemColor, parcelContain, productValue, pickupCity, pickupTown, deliveryCity, deliveryTown, deliveryCharge, codCharge, tax, insurance, merchantAmount, merchantDue, merchantPaid, status, created_at, updated_at) VALUES 
('DLG000001', 1, 'Sender One', '08012345001', 'Sender Address 1', 'Receiver One', '08087654001', 'Receiver Address 1', 1, '2.50', 1, 'Sample Item 1', 'Red', 'Sample contents 1', 15000.00, 1, 1, 2, 3, 1500.00, 100.00, 112.50, 300.00, 15000.00, 2012.50, 0.00, 0, datetime('now'), datetime('now')),
('DLG000002', 2, 'Sender Two', '08012345002', 'Sender Address 2', 'Receiver Two', '08087654002', 'Receiver Address 2', 2, '5.00', 2, 'Sample Item 2', 'Blue', 'Sample contents 2', 25000.00, 2, 3, 1, 1, 2000.00, 150.00, 187.50, 500.00, 25000.00, 2837.50, 0.00, 1, datetime('now'), datetime('now')),
('DLG000003', 3, 'Sender Three', '08012345003', 'Sender Address 3', 'Receiver Three', '08087654003', 'Receiver Address 3', 3, '1.00', 1, 'Sample Item 3', 'Green', 'Sample contents 3', 8000.00, 1, 2, 3, 5, 1800.00, 80.00, 135.00, 160.00, 8000.00, 2175.00, 2175.00, 3, datetime('now'), datetime('now'));

-- Insert notes
INSERT INTO notes (title, details, status, created_at, updated_at) VALUES 
('System Note 1', 'This is a sample system note for testing purposes.', 1, datetime('now'), datetime('now')),
('System Note 2', 'Another sample note for the logistics system.', 1, datetime('now'), datetime('now')),
('System Note 3', 'Important notice for all users.', 1, datetime('now'), datetime('now'));
