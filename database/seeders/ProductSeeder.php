<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
                'name' => 'Sepatu Nike Air Max',
                'description' => 'Sepatu olahraga Nike Air Max, nyaman untuk lari dan aktivitas sehari-hari.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
                'name' => 'Smart Watch Series 5',
                'description' => 'Smart watch dengan fitur kesehatan dan notifikasi lengkap.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
                'name' => 'Headphone Premium',
                'description' => 'Headphone dengan kualitas suara premium dan noise cancelling.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1560343090-f0409e92791a',
                'name' => 'Kamera DSLR Pro',
                'description' => 'Kamera DSLR profesional dengan lensa kit 18-55mm.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1546868871-7041f2a55e12',
                'name' => 'Smartphone X',
                'description' => 'Smartphone terbaru dengan kamera 108MP dan baterai tahan lama.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
