<?php

namespace App\Http\Controllers;

use App\Models\StorageProduct;
use App\Http\Requests\StoreStorageProductRequest;
use App\Http\Requests\UpdateStorageProductRequest;
use Illuminate\Auth\Middleware\Authorize;

class StorageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storageproduct = StorageProduct::all();
        return view("storageproduts.index", ['storageproduts' => $storageproducts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("storageproduts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStorageProductRequest $request)
    {
        $storageproduct = new StorageProduct(
            [
                "code" => $request->code,
                "product_id" => $request->product_id,
                "storage_id" => $request->storage_id,
            ]
        );

        $storageproduct->save();

        return back()->with("success", "StorageProduct created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(StorageProduct $storageproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StorageProduct $storageproduct)
    {
        return view("storageproducts.edit", ['storageproduct' => $storageproduct]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStorageProductRequest $request, StorageProduct $storageproduct)
    {
        $storageproduct->update($request->all());

        return redirect()->route('storageproducts.index')->with('success', 'The storageproduct was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StorageProduct $storageproduct)
    {
        $storageproduct->delete();
    }
}
