<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'phone' => '0123xxxxxx',
                'email' => 'info@ecommerce.com',
                'address' => 'Uttara Dhaka',
                'facebook' => '',
                'instagram' => '',
                'twitter' => '',
                'youtube' => '',
                'logo' => '',
                'hero_image' => '',
            ],
            
        ];
        Setting::insert($settings);
    }
}
