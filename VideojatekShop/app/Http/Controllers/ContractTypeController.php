<?php

namespace App\Http\Controllers;

use App\Models\ContractType;
use App\Http\Requests\StoreContractTypeRequest;
use App\Http\Requests\UpdateContractTypeRequest;
use Illuminate\Support\Facades\Auth;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewIndex', ContractType::class);
        $contracttypes = ContractType::all();
        return view("contracttypes.index", ['contracttypes' => $contracttypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contracttypes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractTypeRequest $request)
    {
        $this->authorize('create', ContractType::class);
        $contracttype = new ContractType(
            [
                "name" => $request->name,
                "created_by" => Auth::user()->id,
            ]
        );

        $contracttype->save();

        return back()->with("success", "Hozzáadtad a Szerződés típust.");
    }

    /**
     * Display the specified resource.
     */
    public function show(ContractType $contractType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContractType $contracttype)
    {
        return view("contracttypes.edit", ['contracttype' => $contracttype]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractTypeRequest $request, ContractType $contracttype)
    {
        $this->authorize('update', ContractType::class);
        $contracttype->updated_by = Auth::user()->id;
        $contracttype->update($request->all());

        return redirect()->route('contracttypes.index')->with('success', 'Módosítottad a szerződés típust.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractType $contracttype)
    {
        $this->authorize('delete', ContractType::class);
        $contracttype->deleted_by = Auth::user()->id;
        $contracttype->update();
        $contracttype->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_contracttypes = ContractType::onlyTrashed()->get();
        return view('contracttypes.show_deleted', ['contracttypes' => $deleted_contracttypes]);
    }

    public function restore(ContractType $contracttype)
    {
        $this->authorize('restore', ContractType::class);
        $contracttype->restore();
        return back()->with('success', 'Visszaállítottad ' . $contracttype->name . ' .');
    }
}
