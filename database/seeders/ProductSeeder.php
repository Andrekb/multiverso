<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Misty',
            'description' => 'Inspirada em um dos Fiordes do Alasca, a peça Misty possui muita personalidade. Junto com a sua irmã Kenai proporciona composições lindas para mesa de jantar, centro e até mesmo aparadores.',
            'price' => 700,
            'headline' => 'A beleza da misty em sua casa',
            'weight' => 7,
            'height' => 38,
            'width' => 29,
            'lenght' => 1.320
            
        ]);
        Product::create([
            'name' => 'Kenai',
            'description' => 'Inspirada em outro Fiorde do Alasca, a peça Kenai é o complemento natural da Misty. Juntas formam uma composição linda e equilibrada.',
            'price' => 380,
            'headline' => 'A beleza da kenai em um ambiente moderno',
            'weight' => 4,
            'height' => 28,
            'width' => 17,
            'lenght' => 350
            
        ]);
    }
}
