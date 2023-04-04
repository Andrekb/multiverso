<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreCreateRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Http\Requests\StockUpdateRequest;
use App\Models\Store;
use App\Models\City;

class StoreController extends Controller
{
    public function index(): View
    {
        $stores = Store::all();
        return view('store.index', compact('stores'));
    }

    public function show($id): View
    {
        $store = Store::find($id);
        return view('store.show', compact('store'));
    }

    public function create(): View
    {
        $cities = City::all();
        return view('store.create', compact('cities'));
    }

    public function store(StoreCreateRequest $request): RedirectResponse
    {
        Store::create($request->all());
        return Redirect::route('lojas.index')->with('status', 'store-created');
    }

    public function edit($id): View
    {
        $store = Store::find($id);        
        $cities = City::all();
        return view('store.edit', compact(['store', 'cities']));
    }

    public function update($id, StoreUpdateRequest $request): RedirectResponse
    {
        $store = Store::find($id);
        $store->update($request->all());
        return Redirect::route('lojas.index')->with('status', 'store-updated');
    }

    public function destroy($id): RedirectResponse
    {
        $store = Store::find($id);
        if($store->products->count() > 0){
            return Redirect::route('lojas.index')->with('status', 'store-not-destroyed');
        } else {
            $store->delete();
            return Redirect::route('lojas.index')->with('status', 'store-destroyed');
        }
    }

    public function stock(): View
    {
        $stores = Store::all();
        return view('store.stock', compact('stores'));
    }

    public function editStock($id): View
    {
        $store = Store::find($id);
        return view('store.edit_stock', compact('store'));
    }

    public function updateStock($storeId, $productId, StockUpdateRequest $request): RedirectResponse
    {
        $store = Store::find($storeId);
        $store->products()->updateExistingPivot($productId, [
            'stock' => $request->stock
        ]);
        return Redirect::route('lojas.editStock', $storeId)->with('status', 'stock-updated');
    }
}