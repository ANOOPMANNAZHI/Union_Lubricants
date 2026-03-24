<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSettings = [
            // Company Settings
            ['key' => 'company_name', 'value' => 'Union Lubricants'],
            ['key' => 'company_email', 'value' => 'info@unionlubricants.com'],
            ['key' => 'company_phone', 'value' => '+1-555-0000'],
            ['key' => 'company_address', 'value' => '123 Oil Lane, City, ST 12345'],
            ['key' => 'company_description', 'value' => 'Premium lubricant solutions for industrial applications worldwide.'],

            // Email Settings
            ['key' => 'mail_mailer', 'value' => 'smtp'],
            ['key' => 'mail_from_name', 'value' => 'Union Lubricants'],
            ['key' => 'mail_from_address', 'value' => 'noreply@unionlubricants.com'],
            ['key' => 'mail_host', 'value' => 'smtp.mailtrap.io'],
            ['key' => 'mail_port', 'value' => '465'],
            ['key' => 'mail_username', 'value' => ''],
            ['key' => 'mail_password', 'value' => ''],
            ['key' => 'mail_scheme', 'value' => 'tls'],

            // SEO Settings
            ['key' => 'meta_title', 'value' => 'Union Lubricants - Premium Industrial Lubricants'],
            ['key' => 'meta_description', 'value' => 'High-quality lubricant solutions for industrial applications'],
            ['key' => 'meta_keywords', 'value' => 'lubricants, industrial oils, hydraulic fluids'],

            // Social Settings
            ['key' => 'facebook_url', 'value' => ''],
            ['key' => 'twitter_url', 'value' => ''],
            ['key' => 'linkedin_url', 'value' => ''],
            ['key' => 'instagram_url', 'value' => ''],
        ];

        foreach ($defaultSettings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
