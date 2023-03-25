<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Models\City;
use App\Http\Requests\CityCreateRequest;
use App\Http\Requests\CityUpdateRequest;

class CityController extends Controller
{
    public function index(): View
    {
        $cities = City::all();
        return view('city.index', compact('cities'));
    }

    public function show($id): View
    {
        $city = City::find($id);
        return view('city.show', compact('city'));
    }


    public function create(): View
    {
        return view('city.create');
    }

    public function store(CityCreateRequest $request): RedirectResponse
    {
        City::create($request->all());
        return Redirect::route('cidades.index')->with('status', 'city-created');
    }

    public function edit($id): View
    {
        $city = City::find($id);
        return view('city.edit', compact('city'));
    }

    public function update($id, CityUpdateRequest $request): RedirectResponse
    {
        $city = City::find($id);
        $city->update($request->all());
        return Redirect::route('cidades.index')->with('status', 'city-updated');
    }

    public function destroy($id): RedirectResponse
    {
        $city = City::find($id);
        if($city->stores->count() > 0){
            return Redirect::route('cidades.index')->with('status', 'city-not-destroyed');
        } else {
            $city->delete();
            return Redirect::route('cidades.index')->with('status', 'city-destroyed');
        }
    }
}
