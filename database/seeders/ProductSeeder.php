<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('products')->insert([
            [
                'name' => 'Patriot PT 3816',
                'description' => 'Мощная бензопила',
                'image_url' => 'assets/img/product/cart1.png',
                'price' => 990,
                'stock' => 10,
            ],
            [
                'name' => 'Xiaomi Jinxun 12-in-1',
                'description' => 'Набор инструментов',
                'image_url' => 'assets/img/product/cart2.png',
                'price' => 1700,
                'stock' => 20,
            ],
        ]);
    }

}
