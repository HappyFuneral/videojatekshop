<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ResizeImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewIndex', Product::class);
        $products = Product::all();
        return view("products.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);
        $request->product_img->storeAs(
            'products',
            'product_' . $request->name . '_' . $request->platform_id . '.jpg',
            'public'
        );
        $file_name = 'product_' . $request->name . '_' . $request->platform_id . '.jpg';
        
        $product = new Product(
            [
                "name" => $request->name,
                "code" => $request->code,
                "product_img" => $file_name,
                "description" => $request->description,
                "price" => $request->price,
                "releaseDate" => $request->releaseDate,
                "tariff_number" => $request->tariff_number,
                "tariff_description" => $request->tariff_description,
                "product_type_id" => $request->product_type_id,
                "publisher_id" => $request->publisher_id,
                "platform_id" => $request->platform_id,
                "created_by" => Auth::user()->id,
            ]
        );

        $product->save();

        return back()->with("success", "Hozzáadtad a terméket.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', Product::class);
        $request->product_img->storeAs(
            'products',
            'product_' . $request->name . '_' . $request->platform_id . '.jpg',
            'public'
        );
        $file_name = 'product_' . $request->name . '_' . $request->platform_id . '.jpg';

        $product->product_img = $file_name;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->releaseDate = $request->releaseDate;
        $product->tariff_number = $request->tariff_number;
        $product->tariff_description = $request->tariff_description;
        $product->product_type_id = $request->product_type_id;
        $product->publisher_id = $request->publisher_id;
        $product->platform_id = $request->platform_id;
        $product->updated_by = Auth::user()->id;

        $product->update();
        return back()->with('success', 'A terméket módosítottad.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', Product::class);
        $product->deleted_by = Auth::user()->id;
        $product->update();
        $product->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_products = Product::onlyTrashed()->get();
        return view('products.show_deleted', ['products' => $deleted_products]);
    }

    public function restore(Product $product)
    {
        $this->authorize('restore', Product::class);
        $product->restore();
        return back()->with('success', 'Visszaállítottad a(z)' . $product->name . ' terméket.');
    }
}