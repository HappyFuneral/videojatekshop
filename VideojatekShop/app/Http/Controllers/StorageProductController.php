<?php

namespace App\Http\Controllers;

use App\Models\StorageProduct;
use App\Http\Requests\StoreStorageProductRequest;
use App\Http\Requests\UpdateStorageProductRequest;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;

class StorageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewIndex', StorageProduct::class);
        $storageproducts = StorageProduct::all();
        return view("storageproducts.index", ['storageproducts' => $storageproducts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("storageproducts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStorageProductRequest $request)
    {
        $this->authorize('create', StorageProduct::class);
        $storageproduct = new StorageProduct(
            [
                "quantity" => $request->quantity,
                "product_id" => $request->product_id,
                "storage_id" => $request->storage_id,
                "created_by" => Auth::user()->id,
            ]
        );

        $storageproduct->save();

        return back()->with("success", "Sikeresen naplóztad.");
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
        $this->authorize('update', StorageProduct::class);
        $storageproduct->updated_by = Auth::user()->id;
        $storageproduct->update($request->all());

        return redirect()->route('storageproducts.index')->with('success', 'Módosult az adat.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StorageProduct $storageproduct)
    {
        $this->authorize('delete', StorageProduct::class);
        $storageproduct->deleted_by = Auth::user()->id;
        $storageproduct->update();
        $storageproduct->delete();
        return back()->with("success","Sikeres Törlés");
    }

    /**
     * Display a listing of the deleted data.
     */
    public function show_deleted()
    {
        $deleted_storageproduts = StorageProduct::onlyTrashed()->get();
        return view('storageproducts.show_deleted', ['deleted_storageproducts' => $deleted_storageproduts]);
    }

    public function restore(StorageProduct $storageproduct)
    {
        $this->authorize('restore', StorageProduct::class);
        $storageproduct->restore();
        return back()->with('success', 'Visszaállítottad a napló bejegyzésd.');
    }
}
