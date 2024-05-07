<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewIndex', Contract::class);
        $contracts = Contract::all();
        return view("contracts.index", ['contracts' => $contracts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contracts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request)
    {
        $this->authorize('create', Contract::class);
        $request->pdf->storeAs(
            'contracts',
            'contract_' . $request->name . '_' . $request->owner . '.pdf',
            'public'
        );
        $file_name = 'contract_' . $request->name . '_' . $request->owner . '.pdf';
        
        $contract = new Contract(
            [
                "contract_name" => $request->contract_name,
                "contract_owner" => $request->contract_owner,
                "pdf" => $file_name,
                "contract_type_id" => $request->contract_type_id,
                "created_by" => Auth::user()->id,
            ]
        );

        $contract->save();

        return back()->with("success", "Szerződés hozzáadva.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        return view("contracts.edit", ['contract' => $contract]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $this->authorize('update', Contract::class);
        $request->pdf->storeAs(
            'contracts',
            'contract_' . $request->name . '_' . $request->owner . '.pdf',
            'public'
        );
        $file_name = 'contract_' . $request->name . '_' . $request->owner . '.pdf';

        $contract->pdf = $file_name;
        $contract->contract_name = $request->contract_name;
        $contract->contract_owner = $request->contract_owner;
        $contract->contract_type_id = $request->contract_type_id;
        $contract->updated_by = Auth::user()->id;

        $contract->update();
        return back()->with('success', 'A szerződést módosítottad.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        $this->authorize('delete', Contract::class);
        $contract->deleted_by = Auth::user()->id;
        $contract->update();
        $contract->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_contracts = Contract::onlyTrashed()->get();
        return view('contracts.show_deleted', ['contracts' => $deleted_contracts]);
    }

    public function restore(Contract $contract)
    {
        $this->authorize('restore', Contract::class);
        $contract->restore();
        return back()->with('success', 'Visszaállítottad a szerződést.');
    }
}
