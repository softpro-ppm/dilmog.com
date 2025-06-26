<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Insert roles
DB::table('roles')->insert([
    ['name' => 'Super Admin', 'slug' => 'super-admin', 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'Admin', 'slug' => 'admin', 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'Editor', 'slug' => 'editor', 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'Agent', 'slug' => 'agent', 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'Merchant', 'slug' => 'merchant', 'created_at' => now(), 'updated_at' => now()],
]);

// Insert users
DB::table('users')->insert([
    ['name' => 'Super Admin', 'email' => 'admin@dilmog.com', 'password' => bcrypt('password123'), 'role_id' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'John Editor', 'email' => 'editor@dilmog.com', 'password' => bcrypt('password123'), 'role_id' => 3, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
]);

// Insert parcel types
DB::table('parceltypes')->insert([
    ['title' => 'Document', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Parcel', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Electronics', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Clothing', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Food Items', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
]);

// Insert cities
DB::table('cities')->insert([
    ['title' => 'Lagos', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Abuja', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Port Harcourt', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Kano', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Ibadan', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
]);

// Insert towns
DB::table('towns')->insert([
    ['title' => 'Victoria Island', 'city_id' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Ikeja', 'city_id' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Wuse II', 'city_id' => 2, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'Garki', 'city_id' => 2, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'GRA', 'city_id' => 3, 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
]);

// Insert merchants
DB::table('merchants')->insert([
    ['firstName' => 'John', 'lastName' => 'Doe', 'companyName' => 'Doe Trading Ltd', 'emailAddress' => 'john@example.com', 'phoneNumber' => '08012345001', 'address' => 'No 1, Sample Street, Lagos', 'password' => bcrypt('password123'), 'status' => 1, 'agree' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['firstName' => 'Jane', 'lastName' => 'Smith', 'companyName' => 'Smith Enterprises', 'emailAddress' => 'jane@example.com', 'phoneNumber' => '08012345002', 'address' => 'No 2, Sample Street, Lagos', 'password' => bcrypt('password123'), 'status' => 1, 'agree' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['firstName' => 'Mike', 'lastName' => 'Johnson', 'companyName' => 'Johnson Corp', 'emailAddress' => 'mike@example.com', 'phoneNumber' => '08012345003', 'address' => 'No 3, Sample Street, Lagos', 'password' => bcrypt('password123'), 'status' => 1, 'agree' => 1, 'created_at' => now(), 'updated_at' => now()],
]);

// Insert sample parcels
DB::table('parcels')->insert([
    [
        'trackingCode' => 'DLG000001',
        'merchantId' => 1,
        'senderName' => 'Sender One',
        'senderPhone' => '08012345001',
        'senderAddress' => 'Sender Address 1',
        'receiverName' => 'Receiver One',
        'receiverPhone' => '08087654001',
        'receiverAddress' => 'Receiver Address 1',
        'parcelType' => 1,
        'weight' => '2.50',
        'numberOfItem' => 1,
        'itemName' => 'Sample Item 1',
        'itemColor' => 'Red',
        'parcelContain' => 'Sample contents 1',
        'productValue' => 15000.00,
        'pickupCity' => 1,
        'pickupTown' => 1,
        'deliveryCity' => 2,
        'deliveryTown' => 3,
        'deliveryCharge' => 1500.00,
        'codCharge' => 100.00,
        'tax' => 112.50,
        'insurance' => 300.00,
        'merchantAmount' => 15000.00,
        'merchantDue' => 2012.50,
        'merchantPaid' => 0.00,
        'status' => 0,
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'trackingCode' => 'DLG000002',
        'merchantId' => 2,
        'senderName' => 'Sender Two',
        'senderPhone' => '08012345002',
        'senderAddress' => 'Sender Address 2',
        'receiverName' => 'Receiver Two',
        'receiverPhone' => '08087654002',
        'receiverAddress' => 'Receiver Address 2',
        'parcelType' => 2,
        'weight' => '5.00',
        'numberOfItem' => 2,
        'itemName' => 'Sample Item 2',
        'itemColor' => 'Blue',
        'parcelContain' => 'Sample contents 2',
        'productValue' => 25000.00,
        'pickupCity' => 2,
        'pickupTown' => 3,
        'deliveryCity' => 1,
        'deliveryTown' => 1,
        'deliveryCharge' => 2000.00,
        'codCharge' => 150.00,
        'tax' => 187.50,
        'insurance' => 500.00,
        'merchantAmount' => 25000.00,
        'merchantDue' => 2837.50,
        'merchantPaid' => 0.00,
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now()
    ]
]);

// Insert notes
DB::table('notes')->insert([
    ['title' => 'System Note 1', 'details' => 'This is a sample system note for testing purposes.', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'System Note 2', 'details' => 'Another sample note for the logistics system.', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
    ['title' => 'System Note 3', 'details' => 'Important notice for all users.', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
]);

echo "✅ Dummy data inserted successfully!\n";
echo "👤 Users: " . DB::table('users')->count() . "\n";
echo "🏢 Merchants: " . DB::table('merchants')->count() . "\n";
echo "📦 Parcels: " . DB::table('parcels')->count() . "\n";
echo "🏙️ Cities: " . DB::table('cities')->count() . "\n";
echo "🏘️ Towns: " . DB::table('towns')->count() . "\n";
echo "📝 Notes: " . DB::table('notes')->count() . "\n";
echo "\n🔑 Admin Login Credentials:\n";
echo "   Email: admin@dilmog.com\n";
echo "   Password: password123\n";
echo "\n🌐 Application URL: http://localhost:8000\n";
