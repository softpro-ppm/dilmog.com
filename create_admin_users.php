<?php

require_once 'vendor/autoload.php';

// Include Laravel's bootstrap
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

echo "Creating admin users...\n";

try {
    // Create Admin User
    $adminExists = DB::table('users')->where('email', 'admin@zidrop.com')->first();
    
    if (!$adminExists) {
        DB::table('users')->insert([
            'role_id' => 2, // Admin role
            'name' => 'ZiDrop Admin',
            'username' => 'zidrop_admin',
            'email' => 'admin@zidrop.com',
            'phone' => '+2348123456789',
            'designation' => 'System Administrator',
            'password' => Hash::make('ZiDrop@2025'),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        echo "✓ Admin user created successfully!\n";
        echo "  Email: admin@zidrop.com\n";
        echo "  Password: ZiDrop@2025\n\n";
    } else {
        echo "✗ Admin user already exists!\n\n";
    }

    // Create Super Admin User
    $superAdminExists = DB::table('users')->where('email', 'superadmin@zidrop.com')->first();
    
    if (!$superAdminExists) {
        DB::table('users')->insert([
            'role_id' => 1, // Super Admin role
            'name' => 'ZiDrop Super Admin',
            'username' => 'zidrop_superadmin',
            'email' => 'superadmin@zidrop.com',
            'phone' => '+2348987654321',
            'designation' => 'Super Administrator',
            'password' => Hash::make('ZiDrop@SuperAdmin2025'),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        echo "✓ Super Admin user created successfully!\n";
        echo "  Email: superadmin@zidrop.com\n";
        echo "  Password: ZiDrop@SuperAdmin2025\n\n";
    } else {
        echo "✗ Super Admin user already exists!\n\n";
    }

    echo "=== LOGIN CREDENTIALS ===\n";
    echo "Admin Panel URL: http://127.0.0.1:8000/login\n\n";
    echo "ADMIN LOGIN:\n";
    echo "Email: admin@zidrop.com\n";
    echo "Password: ZiDrop@2025\n\n";
    echo "SUPER ADMIN LOGIN:\n";
    echo "Email: superadmin@zidrop.com\n";
    echo "Password: ZiDrop@SuperAdmin2025\n\n";
    echo "=========================\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
