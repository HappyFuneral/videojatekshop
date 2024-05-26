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
        $this->authorize('viewIndex', ProductType::class);
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
        $this->authorize('create', ProductType::class);
        $producttype = new ProductType(
            [
                "name" => $request->name,
                "created_by" => Auth::user()->id,
            ]
        );

        $producttype->save();

        return back()->with("success", "Hozzáadtál egy termék típust.");
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
        $this->authorize('update', ProductType::class);
        $producttype->updated_by = Auth::user()->id;
        $producttype->update($request->all());

        return redirect()->route('producttypes.index')->with('success', 'A termék típust módosítottad.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        $this->authorize('delete', ProductType::class);
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
        $this->authorize('restore', ProductType::class);
        $productType->restore();
        return back()->with('success', 'Visszaállítottad a termék típust.');
    }
}
