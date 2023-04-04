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
        Product::create([
            'name' => 'Hardanger',
            'description' => 'O Fiorde Hardangerfjord é um dos fiordes mais impressionantes e belos da Noruega, para demonstrar tal beleza só uma de nossas mais lindas peças.',
            'price' => 1000,
            'headline' => 'A natureza em uma peça de madeira',
            'weight' => 4,
            'height' => 28,
            'width' => 17,
            'lenght' => 350            
        ]);
        Product::create([
            'name' => 'Geiranger',
            'description' => 'O Fiorde é um dos fiordes mais famosos e espetaculares da Noruega, localizado na região oeste do país. Com seus penhascos íngremes, cachoeiras deslumbrantes e águas cristalinasa, e nada mais justo que esta peça tenha esse nome para representar tal beleza.',
            'price' => 1200,
            'headline' => 'Os penhascos representados e uma única peça',
            'weight' => 4,
            'height' => 28,
            'width' => 17,
            'lenght' => 350            
        ]);
    }
}
