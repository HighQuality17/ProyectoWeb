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
                'name' => 'Adidas Racer',
                'line' => 'Deportivo',
                'description' => 'Zapato deportivo ideal para correr.',
                'price' => 50,
                'weight' => 1, 
                'stock' => 100,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '42',
                'color' => 'Negro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike Blazer',
                'line' => 'Casual',
                'description' => 'Zapato casual para el día a día.',
                'price' => 100,
                'weight' => 1, 
                'stock' => 80,
                'guarantee' => '30 dias',
                'brand' => 'Nike',
                'size' => '40',
                'color' => 'Blanco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adidas Campus',
                'line' => 'Casual',
                'description' => 'Zapato casual para el dia a dia.',
                'price' => 70,
                'weight' => 1,
                'stock' => 5067,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '44',
                'color' => 'azul',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Adidas Boost',
                'line' => 'Deportivo',
                'description' => 'Zapato deportivo ideal para correr',
                'price' => 50,
                'weight' => 1,
                'stock' => 30,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '42',
                'color' => 'Negro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adidas Samba',
                'line' => 'Casual',
                'description' => 'Zapato casual para el dia a dia.',
                'price' => 65,
                'weight' => 1,
                'stock' => 30,
                'guarantee' => '30 dias',
                'brand' => 'Adidas',
                'size' => '37',
                'color' => 'Café',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike Air Jordan',
                'line' => 'Casual',
                'description' => 'Zapato casual para el dia a dia.',
                'price' => 80,
                'weight' => 1,
                'stock' => 25,
                'guarantee' => '30 dias',
                'brand' => 'Nike',
                'size' => '45',
                'color' => 'Rojo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike Air Retro ',
                'line' => 'Casual',
                'description' => 'Zapato casual para el dia a dia.',
                'price' => 85,
                'weight' => 1,
                'stock' => 35,
                'guarantee' => '30 dias',
                'brand' => 'Nike',
                'size' => '44',
                'color' => 'Azul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sandalias HYM',
                'line' => 'Formal',
                'description' => 'Zapato formal para ocasiones especiales.',
                'price' => 45,
                'weight' => 1,
                'stock' => 26,
                'guarantee' => '30 dias',
                'brand' => 'HYM',
                'size' => '44',
                'color' => 'Negro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
