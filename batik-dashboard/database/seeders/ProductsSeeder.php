<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ProductCategory::pluck('id', 'name')->toArray();

        $products = [
            [
                'name' => 'Batik Tulis Mega Mendung',
                'slug' => 'batik-tulis-mega-mendung',
                'product_category_id' => $categories['Batik Tulis'] ?? 1,
                'price' => 250000,
                'description' => 'Batik tulis motif Mega Mendung dengan kualitas premium. Motif awan mendung yang melambangkan kehidupan yang penuh harapan.',
                'short_description' => 'Batik tulis motif Mega Mendung premium quality',
                'is_active' => true,
                'is_featured' => true,
                'stock_quantity' => 15,
                'sku' => 'BTK-TUL-001',
                'specifications' => [
                    'Bahan' => 'Katun premium',
                    'Teknik' => 'Tulis tangan',
                    'Asal' => 'Jawa Timur',
                    'Ukuran' => 'Standard'
                ],
                'meta_title' => 'Batik Tulis Mega Mendung Premium - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Batik tulis motif Mega Mendung dengan kualitas premium dari sentra batik Jawa Timur',
            ],
            [
                'name' => 'Batik Cap Parang Kusumo',
                'slug' => 'batik-cap-parang-kusumo',
                'product_category_id' => $categories['Batik Cap'] ?? 2,
                'price' => 180000,
                'description' => 'Batik cap motif Parang Kusumo dengan teknik cap tradisional. Motif yang melambangkan kekuatan dan keberanian.',
                'short_description' => 'Batik cap motif Parang Kusumo klasik',
                'is_active' => true,
                'is_featured' => true,
                'stock_quantity' => 25,
                'sku' => 'BTK-CAP-001',
                'specifications' => [
                    'Bahan' => 'Katun combed',
                    'Teknik' => 'Cap tradisional',
                    'Asal' => 'Tenggarang, Jawa Timur',
                    'Ukuran' => 'Standard'
                ],
                'meta_title' => 'Batik Cap Parang Kusumo - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Batik cap motif Parang Kusumo dengan teknik cap tradisional dari Jawa Timur',
            ],
            [
                'name' => 'Batik Printing Modern Abstrak',
                'slug' => 'batik-printing-modern-abstrak',
                'product_category_id' => $categories['Batik Printing'] ?? 3,
                'price' => 95000,
                'description' => 'Batik printing dengan desain modern abstrak. Cocok untuk penggunaan sehari-hari dengan motif kontemporer.',
                'short_description' => 'Batik printing modern dengan motif abstrak',
                'is_active' => true,
                'is_featured' => false,
                'stock_quantity' => 40,
                'sku' => 'BTK-PRT-001',
                'specifications' => [
                    'Bahan' => 'Katun printed',
                    'Teknik' => 'Printing digital',
                    'Asal' => 'Surabaya, Jawa Timur',
                    'Ukuran' => 'Standard'
                ],
                'meta_title' => 'Batik Printing Modern Abstrak - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Batik printing dengan desain modern abstrak untuk penggunaan sehari-hari',
            ],
            [
                'name' => 'Batik Modern Geometris',
                'slug' => 'batik-modern-geometris',
                'product_category_id' => $categories['Batik Modern'] ?? 4,
                'price' => 120000,
                'description' => 'Batik modern dengan motif geometris yang stylish. Kombinasi antara tradisi dan modernitas.',
                'short_description' => 'Batik modern dengan motif geometris stylish',
                'is_active' => true,
                'is_featured' => true,
                'stock_quantity' => 30,
                'sku' => 'BTK-MOD-001',
                'specifications' => [
                    'Bahan' => 'Katun mix',
                    'Teknik' => 'Hybrid printing & cap',
                    'Asal' => 'Malang, Jawa Timur',
                    'Ukuran' => 'Standard'
                ],
                'meta_title' => 'Batik Modern Geometris - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Batik modern dengan motif geometris yang stylish dan kontemporer',
            ],
            [
                'name' => 'Batik Tradisional Truntum',
                'slug' => 'batik-tradisional-truntum',
                'product_category_id' => $categories['Batik Tradisional'] ?? 5,
                'price' => 200000,
                'description' => 'Batik tradisional motif Truntum dari Lasem. Motif yang melambangkan kesuburan dan kemakmuran.',
                'short_description' => 'Batik tradisional motif Truntum klasik',
                'is_active' => true,
                'is_featured' => false,
                'stock_quantity' => 12,
                'sku' => 'BTK-TRAD-001',
                'specifications' => [
                    'Bahan' => 'Katun halus',
                    'Teknik' => 'Cap & tulis',
                    'Asal' => 'Lasem, Jawa Timur',
                    'Ukuran' => 'Standard'
                ],
                'meta_title' => 'Batik Tradisional Truntum - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Batik tradisional motif Truntum dari Lasem yang melambangkan kesuburan',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}