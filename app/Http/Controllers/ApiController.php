<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\City;

class ApiController extends Controller
{
    // API Login ==========================
    
    public function user(Request $request){
        $credentials = $request->only(['email', 'password']);

        if(!$token = auth('api')->attempt($credentials)){
            abort(401, 'Não autorizado');
        }

        return response()->json([
            'data' => [
                'email' => auth('api')->user()->email,
                'name' => auth('api')->user()->name,
                'token' => $token,
                'token_type' => 'bearer'
            ]
        ]);        
    }

    // API Produtos ======================

    // retorna produtos
    public function products(){
        $products = Product::all();
        return response()->json([
            $products,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], 
            JSON_UNESCAPED_UNICODE]
        );
    }

    // retorna produtos por nome da loja 
    public function productsSearch(Request $request){
        if($request->all() == null){
            return response()->json([
                'message' => 'Nenhuma loja encontrada'
            ]);
        }
        $store = Store::where('slug', 'like', '%' . $request['loja'] . '%' );
        if($store->count() < 1){
            return response()->json([
                'message' => 'Nenhuma loja encontrada'
            ]);
        }
        return response()->json([
            $store->first()->products,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], 
            JSON_UNESCAPED_UNICODE]
        );
    }

    // API Lojas ======================

    // retorna lojas
    public function stores(){
        $stores = Store::all();     
        return response()->json([
            $stores,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], 
            JSON_UNESCAPED_UNICODE]
        );
    }
    

    // retorna produtos por nome da cidade 
    public function storesSearch(Request $request){
        if($request->all() == null){
            return response()->json([
                'message' => 'Nenhuma loja encontrada nesta cidade'
            ]);
        }
        $city = City::where('slug', 'like', '%' . $request['cidade'] . '%');        
        if($city->count() < 1){
            return response()->json([
                'message' => 'Nenhuma loja encontrada nesta cidade'
            ]);
        }
        return response()->json([
            $city->first()->stores,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], 
            JSON_UNESCAPED_UNICODE]
        );
    }

    // API Cidades ======================
   
    // retorna cidades
    public function cities(){
        $cities = City::all();     
        return response()->json([
            $cities,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], 
            JSON_UNESCAPED_UNICODE]
        );
    }
    
    // retorna cidades por pesquisa
    public function citiesSearch(Request $request){
        if($request->all() == null){
            return response()->json([
                'message' => 'Nenhuma cidade encontrada'
            ]);
        }
        switch($request){
            case(!isset($request['nome'])):
                $cities = City::where('cep', '=', $request['cep'])->get();
                break;
            case(!isset($request['cep'])):
                $cities = City::where('slug', 'like', '%' . $request['nome'] . '%')->get();
                break;
            default:
                $cities = City::where('slug', 'like', '%' . $request['nome'] . '%')->orWhere('cep', '=', $request['cep'])->get();
                break; 
        }
        if($cities->count() < 1){
            return response()->json([
                'message' => 'Nenhuma cidade encontrada'
            ]);
        }

        return response()->json([
            $cities,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], 
            JSON_UNESCAPED_UNICODE]
        );
    }

}