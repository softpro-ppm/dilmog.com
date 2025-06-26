<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if admin user already exists
        $existingAdmin = DB::table('users')->where('email', 'admin@zidrop.com')->first();
        
        if (!$existingAdmin) {
            DB::table('users')->insert([
                'role_id' => '2', // Admin role
                'name' => 'ZiDrop Admin',
                'username' => 'zidrop_admin',
                'email' => 'admin@zidrop.com',
                'phone' => '+2348123456789',
                'designation' => 'System Administrator',
                'password' => Hash::make('ZiDrop@2025'),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            echo "Admin user created successfully!\n";
            echo "Email: admin@zidrop.com\n";
            echo "Password: ZiDrop@2025\n";
        } else {
            echo "Admin user already exists!\n";
        }

        // Also check if superadmin user exists and create if not
        $existingSuperAdmin = DB::table('users')->where('email', 'superadmin@zidrop.com')->first();
        
        if (!$existingSuperAdmin) {
            DB::table('users')->insert([
                'role_id' => '1', // Super Admin role
                'name' => 'ZiDrop Super Admin',
                'username' => 'zidrop_superadmin',
                'email' => 'superadmin@zidrop.com',
                'phone' => '+2348987654321',
                'designation' => 'Super Administrator',
                'password' => Hash::make('ZiDrop@SuperAdmin2025'),
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            echo "Super Admin user created successfully!\n";
            echo "Email: superadmin@zidrop.com\n";
            echo "Password: ZiDrop@SuperAdmin2025\n";
        } else {
            echo "Super Admin user already exists!\n";
        }
    }
}
