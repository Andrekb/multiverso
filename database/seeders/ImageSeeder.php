<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Product::all() as $product){
            for($i = 1; $i < 4; $i++){
                Image::create([
                    'path' => $product->id . '-' . $product->slug . '-' . ($product->images()->count() + 1) . '.png',
                    'product_id' => $product->id
                    
                ]);
            }
        }
    }
}
