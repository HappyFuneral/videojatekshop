<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

class ProductController extends Controller
{
    public function products() {
        $products = Product::all();
        $response = array();
        foreach ($products as $product) {
   
            $category = ProductType::find($product->product_type_id);

    
            $response[] =
                array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'title' => $product->title,
                    'price' => $product->price,
                    'category' => $category->name,
                    'img' => $product->img,
                    'description' => $product->description
                );
            
        }
        return response()->json($response);
    }
}
