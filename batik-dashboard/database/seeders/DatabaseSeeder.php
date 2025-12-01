<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder dalam urutan yang benar
        $this->call([
            ProductCategoriesSeeder::class,
            SettingsSeeder::class,
            ProductsSeeder::class,
            EventsSeeder::class,
        ]);

        // Buat user admin jika belum ada
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('admin123'),
                'email_verified_at' => now(),
            ]
        );
    }
}