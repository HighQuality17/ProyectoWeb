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
                'guarantee' => '1 año',
                'brand' => 'MarcaX',
                'size' => '42',
                'color' => 'Negro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike Blazer',
                'line' => 'Casual',
                'description' => 'Zapato casual para el día a día.',
                'price' => 35,
                'weight' => 1, 
                'stock' => 200,
                'guarantee' => '6 meses',
                'brand' => 'MarcaY',
                'size' => '40',
                'color' => 'Marrón',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Botas H&M',
                'line' => 'Formal',
                'description' => 'Zapato formal para ocasiones especiales.',
                'price' => 70,
                'weight' => 1,
                'stock' => 50,
                'guarantee' => '2 años',
                'brand' => 'MarcaZ',
                'size' => '44',
                'color' => 'Negro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
