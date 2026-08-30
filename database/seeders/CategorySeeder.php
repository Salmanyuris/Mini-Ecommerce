<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data existing jika ada
        DB::table('categories')->delete();

        $categories = [
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'description' => 'Produk elektronik terbaru dan berkualitas',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion Pria',
                'slug' => 'fashion-pria',
                'description' => 'Pakaian dan aksesoris fashion untuk pria',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion Wanita',
                'slug' => 'fashion-wanita',
                'description' => 'Pakaian dan aksesoris fashion untuk wanita',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kesehatan & Kecantikan',
                'slug' => 'kesehatan-kecantikan',
                'description' => 'Produk kesehatan dan kecantikan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rumah Tangga',
                'slug' => 'rumah-tangga',
                'description' => 'Kebutuhan rumah tangga dan dapur',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olahraga & Outdoor',
                'slug' => 'olahraga-outdoor',
                'description' => 'Perlengkapan olahraga dan aktivitas outdoor',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categories);

        $this->command->info('Categories seeded successfully!');
    }
}