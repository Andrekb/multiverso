<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\Image;
use Intervention\Image\Facades\Image as Img;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        return view('product.create');
    }

    public function store(ProductCreateRequest $request): RedirectResponse
    {
        $product = Product::create($request->all());
        return Redirect::route('produtos.images', $product->id)->with('status', 'product-created');
    }

    public function images($id): View
    {
        $product = Product::find($id);
        return view('product.images', compact('product'));
    }

    public function imagesStore(Request $request)
    {
        $image = $request->file('file');        
        $img = Img::make($request->file('file'));
        $product = Product::find($request->id);
        $imageName = $product->id . '-' . $product->slug . '-' . ($product->images()->count() + 1) . '.' . $image->extension();

        Image::create([
            'path' => $imageName,
            'product_id' => $product->id
        ]);

        $path = public_path('images/products/');
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path.$imageName, 60); 

        return response()->json(['success'=>$imageName]);
    }    

    public function imagesDestroy($id): RedirectResponse
    {
        $image = Image::find($id);
        $product_id = $image->product->id;        
        $path = 'images/products/';
        Storage::disk('publicShow')->delete($path.$image->path);
        $image->delete();

        return Redirect::route('produtos.edit', $product_id)->with('status', 'image-destroyed');
    }

    public function edit($id): View
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update($id, ProductUpdateRequest $request): RedirectResponse
    {
        $product = Product::find($id);
        $product->update($request->all());
        return Redirect::route('produtos.index')->with('status', 'product-updated');
    }

    public function destroy($id): RedirectResponse
    {
        $product = Product::find($id);
        if($product->stores->count() > 0){
            return Redirect::route('produtos.index')->with('status', 'product-not-destroyed');
        } else {               
            $path = public_path('images/products/');
            foreach($product->images as $image){
                Storage::delete($path.$image->path);
                $image()->delete();
            }
            $product->delete();
            return Redirect::route('produtos.index')->with('status', 'product-destroyed');
        }
    }

}