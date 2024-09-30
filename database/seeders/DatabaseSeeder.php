<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('products')->insert([
            [
                'name' => 'Air Jordan 1 Mid SE',
                'line' => 'Deportivo',
                'description' => 'Zapato deportivo ideal para correr.',
                'price' => 499000,
                'weight' => 1, 
                'stock' => 100,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '42',
                'color' => 'Negro',
                'image' => 'Air_Jordan_Mid_SE_1.jpg', 
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'name' => 'Adidas Samba',
                'line' => 'Casual',
                'description' => 'Zapato casual para el día a día.',
                'price' => 199900,
                'weight' => 1, 
                'stock' => 80,
                'guarantee' => '30 dias',
                'brand' => 'Nike',
                'size' => '40',
                'color' => 'Blanco',
                'image' => 'shop_04.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adidas Supernova',
                'line' => 'Deportivo',
                'description' => 'Zapato deportivo ideal para correr',
                'price' => 220000,
                'weight' => 1,
                'stock' => 30,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '42',
                'color' => 'Negro',
                'image' => 'shop_03.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike Blazer',
                'line' => 'Casual',
                'description' => 'Zapato casual para el dia a dia.',
                'price' => 420000,
                'weight' => 1,
                'stock' => 5067,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '44',
                'color' => 'azul',
                'image' => 'shop_04.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sandalias HYM',
                'line' => 'Formal',
                'description' => 'Zapato formal para ocasiones especiales.',
                'price' => 280000,
                'weight' => 1,
                'stock' => 26,
                'guarantee' => '30 dias',
                'brand' => 'HYM',
                'size' => '44',
                'color' => 'Negro',
                'image' => 'shop_05.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Botas Negras HYM',
                'line' => 'Formal',
                'description' => 'Zapato formal para ocasiones especiales.',
                'price' => 199900,
                'weight' => 1,
                'stock' => 26,
                'guarantee' => '30 dias',
                'brand' => 'HYM',
                'size' => '44',
                'color' => 'Negro',
                'image' => 'shop_06.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Air Jordan 1 Mid',
                'line' => 'Deportivo',
                'description' => 'Zapato deportivo ideal para correr',
                'price' => 399900,
                'weight' => 1,
                'stock' => 30,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '42',
                'color' => 'Negro',
                'image' => 'shop_07.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike M2K tekno',
                'line' => 'Casual',
                'description' => 'Zapato casual para el dia a dia.',
                'price' => 270000,
                'weight' => 1,
                'stock' => 30,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '37',
                'color' => 'Café',
                'image' => 'shop_08.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adidas Campus',
                'line' => 'Casual',
                'description' => 'Zapato casual para el dia a dia.',
                'price' => 180000,
                'weight' => 1,
                'stock' => 25,
                'guarantee' => '30 dias',
                'brand' => 'Nike',
                'size' => '45',
                'color' => 'Azul',
                'image' => 'shop_09.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
         
           
        ]);
    }
}
