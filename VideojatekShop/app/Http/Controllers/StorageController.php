<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use App\Http\Requests\StoreStorageRequest;
use App\Http\Requests\UpdateStorageRequest;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storages = Storage::all();
        return view("storages.index", ['storages' => $storages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("storages.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStorageRequest $request)
    {
        $storage = new Storage(
            [
                "storageName" => $request->storageName,
                "postal" => $request->postal,
                "country" => $request->country,
                "province" => $request->province,
                "city" => $request->city,
                "address" => $request->address,
                "created_by" => Auth::user()->id,
            ]
        );

        $storage->save();

        return back()->with("success", "Storage created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Storage $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Storage $storage)
    {
        return view("storages.edit", ['storage' => $storage]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStorageRequest $request, Storage $storage)
    {
        $storage->updated_by = Auth::user()->id;
        $storage->update($request->all());

        return redirect()->route('storages.index')->with('success', 'The storage was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Storage $storage)
    {
        $storage->deleted_by = Auth::user()->id;
        $storage->update();
        $storage->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_storages = Storage::onlyTrashed()->get();
        return view('storages.show_deleted', ['storages' => $deleted_storages]);
    }

    public function restore(Storage $storage)
    {
        $storage->restore();
        return back()->with('success', '' . $storage->name . ' was successfully restored.');
    }
}
