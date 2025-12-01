<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'Ikatan Putera Puteri Batik Jawa Timur',
                'type' => 'string',
                'group' => 'general',
            ],
            [
                'key' => 'site_description',
                'value' => 'Website resmi Ikatan Putera Puteri Batik Jawa Timur - Menjaga dan mempromosikan warisan budaya batik Indonesia',
                'type' => 'text',
                'group' => 'general',
            ],
            [
                'key' => 'site_email',
                'value' => 'info@batikjatim.org',
                'type' => 'email',
                'group' => 'contact',
            ],
            [
                'key' => 'site_phone',
                'value' => '+62 31 1234 5678',
                'type' => 'string',
                'group' => 'contact',
            ],
            [
                'key' => 'site_address',
                'value' => 'Jl. Raya Batik No. 123, Surabaya, Jawa Timur',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/batikjatim',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/batikjatim',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'youtube_url',
                'value' => 'https://youtube.com/batikjatim',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'whatsapp_number',
                'value' => '+6281234567890',
                'type' => 'string',
                'group' => 'contact',
            ],
            [
                'key' => 'meta_title',
                'value' => 'Ikatan Putera Puteri Batik Jawa Timur - Warisan Budaya Batik Indonesia',
                'type' => 'string',
                'group' => 'seo',
            ],
            [
                'key' => 'meta_description',
                'value' => 'Website resmi Ikatan Putera Puteri Batik Jawa Timur - Menjaga dan mempromosikan warisan budaya batik Indonesia dengan sejarah, filosofi, dan katalog produk batik dari berbagai sentra batik di Jawa Timur',
                'type' => 'text',
                'group' => 'seo',
            ],
            [
                'key' => 'meta_keywords',
                'value' => 'batik,jawa timur,budaya indonesia,sejarah batik,filosofi batik,katalog batik,workshop batik',
                'type' => 'string',
                'group' => 'seo',
            ],
            [
                'key' => 'google_analytics_id',
                'value' => '',
                'type' => 'string',
                'group' => 'analytics',
            ],
            [
                'key' => 'maintenance_mode',
                'value' => 'false',
                'type' => 'boolean',
                'group' => 'system',
            ],
            [
                'key' => 'newsletter_active',
                'value' => 'true',
                'type' => 'boolean',
                'group' => 'newsletter',
            ],
            [
                'key' => 'contact_form_active',
                'value' => 'true',
                'type' => 'boolean',
                'group' => 'contact',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}