<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\City;
use App\Models\Store;

class AdminAreaController extends Controller
{
    public function dashboard(){
        $products = Product::all()->count();
        $cities = City::all()->count();
        $stores = Store::all()->count();
        $stocks = Store::all();
        $stock = 0;
        foreach($stocks as $store){
            foreach($store->products as $product){
                $stock = $stock + $product->pivot->stock;
            }
        }
        return view('dashboard', compact(['products', 'cities', 'stores', 'stock']));
    }
}