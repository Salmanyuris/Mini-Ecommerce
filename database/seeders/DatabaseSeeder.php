<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Nonaktifkan foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate tables
        DB::table('admins')->truncate();
        DB::table('categories')->truncate();
        DB::table('products')->truncate();
        DB::table('orders')->truncate();

        // Aktifkan foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Jalankan seeders dengan urutan yang benar
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            // OrderSeeder bisa ditambahkan nanti jika perlu
        ]);

        $this->command->info('All seeders completed successfully!');
    }
}