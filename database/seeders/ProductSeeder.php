<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data existing jika ada
        DB::table('products')->delete();

        // Ambil kategori untuk relasi
        $elektronik = Category::where('slug', 'elektronik')->first();
        $fashionPria = Category::where('slug', 'fashion-pria')->first();
        $fashionWanita = Category::where('slug', 'fashion-wanita')->first();
        $kesehatan = Category::where('slug', 'kesehatan-kecantikan')->first();
        $rumahTangga = Category::where('slug', 'rumah-tangga')->first();
        $olahraga = Category::where('slug', 'olahraga-outdoor')->first();

        $products = [
            // Produk Elektronik
            [
                'name' => 'Smartphone Samsung Galaxy S21',
                'slug' => 'smartphone-samsung-galaxy-s21',
                'description' => 'Smartphone flagship dengan kamera canggih dan performa tinggi. Layar 6.2 inch, RAM 8GB, Storage 128GB.',
                'price' => 8999000,
                'stock' => 15,
                'image' => 'samsung-s21.jpg',
                'is_active' => true,
                'category_id' => $elektronik->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop ASUS VivoBook 15',
                'slug' => 'laptop-asus-vivobook-15',
                'description' => 'Laptop tipis dan ringan dengan prosesor Intel Core i5 dan SSD 512GB. Cocok untuk kerja dan kuliah.',
                'price' => 12499000,
                'stock' => 8,
                'image' => 'asus-vivobook.jpg',
                'is_active' => true,
                'category_id' => $elektronik->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Headphone Sony WH-1000XM4',
                'slug' => 'headphone-sony-wh-1000xm4',
                'description' => 'Headphone wireless dengan noise cancellation terbaik di kelasnya. Baterai tahan 30 jam.',
                'price' => 4599000,
                'stock' => 12,
                'image' => 'sony-headphone.jpg',
                'is_active' => true,
                'category_id' => $elektronik->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smart TV LG 55 inch 4K',
                'slug' => 'smart-tv-lg-55-inch-4k',
                'description' => 'TV LED 4K UHD dengan webOS dan Magic Remote. Dilengkapi dengan Dolby Vision dan Atmos.',
                'price' => 7999000,
                'stock' => 6,
                'image' => 'lg-tv.jpg',
                'is_active' => true,
                'category_id' => $elektronik->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Produk Fashion Pria
            [
                'name' => 'Kemeja Formal Pria Lengan Panjang',
                'slug' => 'kemeja-formal-pria-lengan-panjang',
                'description' => 'Kemeja formal bahan katun premium dengan desain klasik. Tersedia berbagai ukuran.',
                'price' => 299000,
                'stock' => 25,
                'image' => 'kemeja-pria.jpg',
                'is_active' => true,
                'category_id' => $fashionPria->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Celana Chino Pria Slim Fit',
                'slug' => 'celana-chino-pria-slim-fit',
                'description' => 'Celana chino dengan bahan nyaman dan model slim fit. Cocok untuk casual dan semi-formal.',
                'price' => 249000,
                'stock' => 20,
                'image' => 'celana-chino.jpg',
                'is_active' => true,
                'category_id' => $fashionPria->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sepatu Sneakers Pria Casual',
                'slug' => 'sepatu-sneakers-pria-casual',
                'description' => 'Sepatu sneakers dengan desain modern dan bahan kulit sintetis yang awet.',
                'price' => 459000,
                'stock' => 18,
                'image' => 'sepatu-pria.jpg',
                'is_active' => true,
                'category_id' => $fashionPria->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Produk Fashion Wanita
            [
                'name' => 'Dress Wanita Maxi Dress',
                'slug' => 'dress-wanita-maxi-dress',
                'description' => 'Dress panjang dengan bahan flowy dan desain elegan. Cocok untuk berbagai acara.',
                'price' => 389000,
                'stock' => 15,
                'image' => 'dress-wanita.jpg',
                'is_active' => true,
                'category_id' => $fashionWanita->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blouse Wanita Casual',
                'slug' => 'blouse-wanita-casual',
                'description' => 'Blouse dengan bahan katun lembut dan desain simple. Nyaman dipakai sehari-hari.',
                'price' => 189000,
                'stock' => 22,
                'image' => 'blouse-wanita.jpg',
                'is_active' => true,
                'category_id' => $fashionWanita->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tas Wanita Handbag Kulit',
                'slug' => 'tas-wanita-handbag-kulit',
                'description' => 'Tas handbag dari bahan kulit asli dengan desain elegan dan ruang yang cukup.',
                'price' => 659000,
                'stock' => 10,
                'image' => 'tas-wanita.jpg',
                'is_active' => true,
                'category_id' => $fashionWanita->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Produk Kesehatan & Kecantikan
            [
                'name' => 'Skincare Set Daily Routine',
                'slug' => 'skincare-set-daily-routine',
                'description' => 'Set skincare lengkap untuk perawatan harian. Termasuk facial wash, toner, serum, dan moisturizer.',
                'price' => 289000,
                'stock' => 30,
                'image' => 'skincare-set.jpg',
                'is_active' => true,
                'category_id' => $kesehatan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parfum Eau de Toilette 100ml',
                'slug' => 'parfum-eau-de-toilette-100ml',
                'description' => 'Parfum dengan aroma segar dan tahan lama. Botol elegan 100ml.',
                'price' => 199000,
                'stock' => 40,
                'image' => 'parfum.jpg',
                'is_active' => true,
                'category_id' => $kesehatan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Produk Rumah Tangga
            [
                'name' => 'Set Peralatan Dapur Stainless Steel',
                'slug' => 'set-peralatan-dapur-stainless-steel',
                'description' => 'Set peralatan dapur lengkap dari bahan stainless steel berkualitas tinggi.',
                'price' => 459000,
                'stock' => 12,
                'image' => 'peralatan-dapur.jpg',
                'is_active' => true,
                'category_id' => $rumahTangga->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blender Multifungsi 5-in-1',
                'slug' => 'blender-multifungsi-5-in-1',
                'description' => 'Blender dengan 5 fungsi: blender, juicer, food processor, dan lainnya. Kapasitas 2L.',
                'price' => 589000,
                'stock' => 8,
                'image' => 'blender.jpg',
                'is_active' => true,
                'category_id' => $rumahTangga->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Produk Olahraga & Outdoor
            [
                'name' => 'Sepatu Lari Running Shoes',
                'slug' => 'sepatu-lari-running-shoes',
                'description' => 'Sepatu lari dengan teknologi cushioning terbaru untuk kenyamanan maksimal.',
                'price' => 789000,
                'stock' => 14,
                'image' => 'sepatu-lari.jpg',
                'is_active' => true,
                'category_id' => $olahraga->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Matras Yoga Premium',
                'slug' => 'matras-yoga-premium',
                'description' => 'Matras yoga dengan bahan non-slip dan ketebalan optimal untuk kenyamanan berlatih.',
                'price' => 189000,
                'stock' => 20,
                'image' => 'matras-yoga.jpg',
                'is_active' => true,
                'category_id' => $olahraga->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Product::insert($products);

        $this->command->info('Products seeded successfully!');
        $this->command->info('Total products: ' . count($products));
    }
}