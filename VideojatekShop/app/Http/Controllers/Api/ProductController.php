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
    public function checkout(Request $request){
        
    }

    public function add(ProductStoreRequest $request){
        $request->img->storeAs(
            'picture',
            'product_' . $request->name . '.jpg',
            'public'
        );
        $file_name = 'product_' . $request->name . '.jpg';

        $printer = Product::create($request->all());
        $printer->img = $file_name;
        $printer->updated_at = now();
        $printer->created_at = now();
        $printer->update();
    }

    public function delete(Product $product){
        $product->delete();
        return response()->json(['msg' => 'product deleted']);
    }
}
