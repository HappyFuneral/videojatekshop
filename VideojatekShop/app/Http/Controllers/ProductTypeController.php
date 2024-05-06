<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Http\Requests\StoreProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producttypes = ProductType::all();
        return view("producttypes.index", ['producttypes' => $producttypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("producttypes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductTypeRequest $request)
    {
        $producttype = new ProductType(
            [
                "name" => $request->name,
                "created_by" => Auth::user()->id,
            ]
        );

        $producttype->save();

        return back()->with("success", "producttypes created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $producttype)
    {
        return view("producttypes.edit", ['producttype' => $producttype]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductTypeRequest $request, ProductType $producttype)
    {
        $producttype->updated_by = Auth::user()->id;
        $producttype->update($request->all());

        return redirect()->route('producttypes.index')->with('success', 'The producttype was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        $productType->deleted_by = Auth::user()->id;
        $productType->update();
        $productType->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_productTypes = ProductType::onlyTrashed()->get();
        return view('publishers.show_deleted', ['producttypes' => $deleted_productTypes]);
    }

    public function restore(ProductType $productType)
    {
        $productType->restore();
        return back()->with('success', '' . $productType->name . ' was successfully restored.');
    }
}
