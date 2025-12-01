<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Batik Tulis',
                'slug' => 'batik-tulis',
                'description' => 'Batik tulis tangan dengan motif tradisional yang dibuat secara manual',
                'is_active' => true,
            ],
            [
                'name' => 'Batik Cap',
                'slug' => 'batik-cap',
                'description' => 'Batik cap dengan teknik cetak menggunakan cap kayu',
                'is_active' => true,
            ],
            [
                'name' => 'Batik Printing',
                'slug' => 'batik-printing',
                'description' => 'Batik modern dengan teknik printing digital',
                'is_active' => true,
            ],
            [
                'name' => 'Batik Modern',
                'slug' => 'batik-modern',
                'description' => 'Batik kontemporer dengan desain modern dan inovatif',
                'is_active' => true,
            ],
            [
                'name' => 'Batik Tradisional',
                'slug' => 'batik-tradisional',
                'description' => 'Batik dengan motif tradisional khas Jawa Timur',
                'is_active' => true,
            ],
            [
                'name' => 'Aksesoris Batik',
                'slug' => 'aksesoris-batik',
                'description' => 'Aksesoris dan pelengkap dengan motif batik',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}