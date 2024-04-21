<?php

namespace App\Http\Controllers;

use App\Models\StorageProduct;
use App\Http\Requests\StoreStorageProductRequest;
use App\Http\Requests\UpdateStorageProductRequest;

class StorageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function products() {
        $storageproducts = StorageProduct::all();
        $response = array();
        foreach ($storageproducts as $item) {
   
            $productname = Product::find($item->product_id);
            $storagename = Product::find($item->storage_id);
    
            $response[] =
                array(
                    'code' => $item->code,
                    'stock' => $item->stock,
                    'product' => $productname,
                    'storage_id' => $storagename
                );
        }
        return response()->json($response);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function add(StoreStorageProductRequest $request){
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStorageProductRequest $request, StorageProduct $storageProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product){
        $product->delete();
        return response()->json(['msg' => 'storage deleted']);
    }
}
