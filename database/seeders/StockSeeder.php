<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = Store::all();
        foreach($stores as $store){
            $store->products()->attach([
                1 => ['stock' => rand(1,50)],
                2 => ['stock' => rand(1,50)],
                3 => ['stock' => rand(1,50)],
                4 => ['stock' => rand(1,50)],
            ]);
        }
    }
}