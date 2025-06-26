<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Parceltype;
use App\City;
use App\Town;
use App\Merchant;
use App\Agent;
use App\Deliveryman;
use App\Service;
use App\Logo;
use App\Setting;
use App\Contact;
use App\Banner;
use App\Feature;
use App\Partner;
use App\About;
use App\Faq;
use App\Notice;
use App\Blog;
use App\Gallery;
use App\Career;
use App\Socialmedia;
use App\Counter;
use App\Disclamer;
use App\ChargeTarif;
use App\Parcel;
use App\Pickup;
use App\Note;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ComprehensiveSeeder extends Seeder
{
    public function run()
    {
        // Seed Roles
        $roles = [
            ['name' => 'Super Admin', 'slug' => 'super-admin'],
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Editor', 'slug' => 'editor'],
            ['name' => 'Agent', 'slug' => 'agent'],
            ['name' => 'Merchant', 'slug' => 'merchant'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Seed Users
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@dilmog.com',
            'password' => Hash::make('password123'),
            'role_id' => 1,
            'status' => 1,
        ]);

        User::create([
            'name' => 'Editor User',
            'email' => 'editor@dilmog.com',
            'password' => Hash::make('password123'),
            'role_id' => 3,
            'status' => 1,
        ]);

        // Seed Parcel Types
        $parcelTypes = [
            ['title' => 'Document', 'status' => 1],
            ['title' => 'Parcel', 'status' => 1],
            ['title' => 'Electronics', 'status' => 1],
            ['title' => 'Clothing', 'status' => 1],
            ['title' => 'Food Items', 'status' => 1],
        ];

        foreach ($parcelTypes as $type) {
            Parceltype::create($type);
        }

        // Seed Cities
        $cities = [
            ['title' => 'Lagos', 'status' => 1],
            ['title' => 'Abuja', 'status' => 1],
            ['title' => 'Port Harcourt', 'status' => 1],
            ['title' => 'Kano', 'status' => 1],
            ['title' => 'Ibadan', 'status' => 1],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }

        // Seed Towns
        $towns = [
            ['title' => 'Victoria Island', 'city_id' => 1, 'status' => 1],
            ['title' => 'Ikeja', 'city_id' => 1, 'status' => 1],
            ['title' => 'Wuse II', 'city_id' => 2, 'status' => 1],
            ['title' => 'Garki', 'city_id' => 2, 'status' => 1],
            ['title' => 'GRA', 'city_id' => 3, 'status' => 1],
        ];

        foreach ($towns as $town) {
            Town::create($town);
        }

        // Seed Settings
        Setting::create([
            'title' => 'Dilmog Logistics',
            'system_name' => 'Dilmog Courier System',
            'email' => 'info@dilmog.com',
            'contact' => '+234-800-123-4567',
            'address' => 'Lagos, Nigeria',
            'footer_text' => 'Dilmog Logistics - Fast & Reliable Delivery Service',
        ]);

        // Seed Contact Information
        Contact::create([
            'title' => 'Dilmog Logistics Contact',
            'details' => 'Contact us for all your delivery needs',
            'email' => 'info@dilmog.com',
            'phone' => '+234-800-123-4567',
            'address' => 'Plot 123, Victoria Island, Lagos, Nigeria',
        ]);

        // Seed Services
        $services = [
            [
                'title' => 'Same Day Delivery',
                'details' => 'Fast same-day delivery within the city',
                'image' => 'same-day.jpg',
                'status' => 1
            ],
            [
                'title' => 'Next Day Delivery',
                'details' => 'Reliable next-day delivery service',
                'image' => 'next-day.jpg',
                'status' => 1
            ],
            [
                'title' => 'Express Delivery',
                'details' => 'Express delivery for urgent parcels',
                'image' => 'express.jpg',
                'status' => 1
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Seed Features
        $features = [
            [
                'title' => 'Real-time Tracking',
                'details' => 'Track your parcels in real-time',
                'image' => 'tracking.jpg',
                'status' => 1
            ],
            [
                'title' => 'Secure Delivery',
                'details' => 'Safe and secure delivery guaranteed',
                'image' => 'secure.jpg',
                'status' => 1
            ],
            [
                'title' => '24/7 Support',
                'details' => 'Round the clock customer support',
                'image' => 'support.jpg',
                'status' => 1
            ],
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }

        // Seed Merchants
        for ($i = 1; $i <= 10; $i++) {
            Merchant::create([
                'firstName' => 'Merchant' . $i,
                'lastName' => 'User' . $i,
                'companyName' => 'Company ' . $i . ' Ltd',
                'emailAddress' => 'merchant' . $i . '@example.com',
                'phoneNumber' => '08012345' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'address' => 'Address ' . $i . ', Lagos, Nigeria',
                'password' => Hash::make('password123'),
                'status' => 1,
                'agree' => 1,
            ]);
        }

        // Seed Agents
        for ($i = 1; $i <= 5; $i++) {
            Agent::create([
                'name' => 'Agent ' . $i,
                'email' => 'agent' . $i . '@dilmog.com',
                'phone' => '08012345' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'address' => 'Agent Address ' . $i,
                'password' => Hash::make('password123'),
                'status' => 1,
            ]);
        }

        // Seed Delivery Men
        for ($i = 1; $i <= 8; $i++) {
            Deliveryman::create([
                'name' => 'Delivery Man ' . $i,
                'email' => 'delivery' . $i . '@dilmog.com',
                'phone' => '08012345' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'address' => 'Delivery Address ' . $i,
                'password' => Hash::make('password123'),
                'status' => 1,
            ]);
        }

        // Seed Charge Tariffs
        $chargeTariffs = [
            [
                'pickupcity_id' => 1,
                'deliverycity_id' => 2,
                'deliverycharge' => 1500,
                'extradeliverycharge' => 500,
                'codcharge' => 100,
                'tax' => 7.5,
                'insurance' => 2.0,
                'status' => 1,
            ],
            [
                'pickupcity_id' => 1,
                'deliverycity_id' => 3,
                'deliverycharge' => 2000,
                'extradeliverycharge' => 600,
                'codcharge' => 150,
                'tax' => 7.5,
                'insurance' => 2.0,
                'status' => 1,
            ],
            [
                'pickupcity_id' => 2,
                'deliverycity_id' => 1,
                'deliverycharge' => 1500,
                'extradeliverycharge' => 500,
                'codcharge' => 100,
                'tax' => 7.5,
                'insurance' => 2.0,
                'status' => 1,
            ],
        ];

        foreach ($chargeTariffs as $tariff) {
            ChargeTarif::create($tariff);
        }

        // Seed Sample Parcels
        for ($i = 1; $i <= 20; $i++) {
            Parcel::create([
                'trackingCode' => 'DLG' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'merchantId' => rand(1, 10),
                'senderName' => 'Sender ' . $i,
                'senderPhone' => '08012345' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'senderAddress' => 'Sender Address ' . $i,
                'receiverName' => 'Receiver ' . $i,
                'receiverPhone' => '08087654' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'receiverAddress' => 'Receiver Address ' . $i,
                'parcelType' => rand(1, 5),
                'weight' => rand(1, 10) . '.00',
                'numberOfItem' => rand(1, 5),
                'itemName' => 'Item ' . $i,
                'itemColor' => ['Red', 'Blue', 'Green', 'Black', 'White'][rand(0, 4)],
                'parcelContain' => 'Sample parcel contents ' . $i,
                'productValue' => rand(5000, 50000),
                'pickupCity' => rand(1, 5),
                'pickupTown' => rand(1, 5),
                'deliveryCity' => rand(1, 5),
                'deliveryTown' => rand(1, 5),
                'deliveryCharge' => rand(1000, 3000),
                'codCharge' => rand(50, 200),
                'tax' => rand(100, 500),
                'insurance' => rand(50, 300),
                'merchantAmount' => rand(5000, 50000),
                'merchantDue' => rand(1000, 10000),
                'merchantPaid' => rand(0, 5000),
                'status' => rand(0, 6),
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
                'updated_at' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }

        // Seed About
        About::create([
            'title' => 'About Dilmog Logistics',
            'details' => 'Dilmog Logistics is a leading courier and logistics company in Nigeria, providing fast, reliable, and secure delivery services across the country.',
            'image' => 'about.jpg',
        ]);

        // Seed FAQs
        $faqs = [
            [
                'question' => 'How can I track my parcel?',
                'answer' => 'You can track your parcel using the tracking code provided at the time of booking on our website.',
                'status' => 1,
            ],
            [
                'question' => 'What are your delivery charges?',
                'answer' => 'Delivery charges vary based on location, weight, and service type. Please check our pricing page for details.',
                'status' => 1,
            ],
            [
                'question' => 'Do you offer same-day delivery?',
                'answer' => 'Yes, we offer same-day delivery within major cities for urgent deliveries.',
                'status' => 1,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // Seed Social Media
        Socialmedia::create([
            'facebook' => 'https://facebook.com/dilmog',
            'twitter' => 'https://twitter.com/dilmog',
            'linkedin' => 'https://linkedin.com/company/dilmog',
            'instagram' => 'https://instagram.com/dilmog',
            'youtube' => 'https://youtube.com/dilmog',
        ]);

        // Seed Counters
        $counters = [
            ['title' => 'Happy Customers', 'number' => '5000', 'status' => 1],
            ['title' => 'Delivered Parcels', 'number' => '25000', 'status' => 1],
            ['title' => 'Cities Covered', 'number' => '50', 'status' => 1],
            ['title' => 'Years Experience', 'number' => '10', 'status' => 1],
        ];

        foreach ($counters as $counter) {
            Counter::create($counter);
        }

        // Seed Disclaimers
        Disclamer::create([
            'title' => 'Merchant Terms',
            'details' => 'Terms and conditions for merchants using our platform.',
        ]);

        Disclamer::create([
            'title' => 'Agent Terms',
            'details' => 'Terms and conditions for agents working with us.',
        ]);

        // Seed Notes
        for ($i = 1; $i <= 10; $i++) {
            Note::create([
                'title' => 'Note ' . $i,
                'details' => 'This is a sample note ' . $i . ' for the system.',
                'status' => 1,
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }

        echo "✅ All tables seeded successfully with dummy data!\n";
    }
}
