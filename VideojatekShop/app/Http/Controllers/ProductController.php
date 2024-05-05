<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Auth\Middleware\Authorize;
use Intervention\Image\Facades\Image as ResizeImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        //TODO product image upload

        $request->product_img->storeAs(
            'products',
            'product_' . $request->name . '_' . $request->title . '.jpg',
            'public'
        );
        $file_name = 'product_' . $request->name . '_' . $request->title . '.jpg';
        
        $product = new Product(
            [
                "name" => $request->name,
                "product_img" => $file_name,
                "description" => $request->description,
                "price" => $request->price,
                "releaseDate" => $request->releaseDate,
                "tariff_number" => $request->tariff_number,
                "tariff_description" => $request->tariff_description,
                "product_type_id" => $request->product_type_id,
                "publisher_id" => $request->publisher_id
            ]
        );

        $product->save();

        return back()->with("success", "Product created successfully.");
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
        $request->product_img->storeAs(
            'products',
            'product_' . $request->name . '_' . $request->title . '.jpg',
            'public'
        );
        $file_name = 'product_' . $request->name . '_' . $request->title . '.jpg';

        $product->product_img = $file_name;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->releaseDate = $request->releaseDate;
        $product->taricff_number = $request->taricff_number;
        $product->tariff_description = $request->tariff_description;
        $product->product_type_id = $request->product_type_id;
        $product->publisher_id = $request->publisher_id;

        $product->update();
        return back()->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}