<?php

namespace App\Http\Controllers;

use App\Models\OrderState;
use App\Http\Requests\StoreOrderStateRequest;
use App\Http\Requests\UpdateOrderStateRequest;
use Illuminate\Support\Facades\Auth;

class OrderStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewIndex', OrderState::class);
        $ordertates = OrderState::all();
        return view("orderstates.index", ['orderstates' => $ordertates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("orderstates.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderStateRequest $request)
    {
        $this->authorize('create', OrderState::class);
        $orderState = new OrderState(
            [
                "state" => $request->state,
                "created_by" => Auth::user()->id,
            ]
        );

        $orderState->save();

        return back()->with("success", "Hozzáadtál egy rendelés állapota típust.");
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderState $orderstate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderState $orderstate)
    {
        return view("orderstates.edit", ['orderstate' => $orderstate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderStateRequest $request, OrderState $orderstate)
    {
        $this->authorize('update', OrderState::class);
        $orderstate->updated_by = Auth::user()->id;
        $orderstate->update($request->all());

        return redirect()->route('orderstates.index')->with('success', 'Az rendelés állapota típus módosult.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderState $orderstate)
    {
        $this->authorize('delete', OrderState::class);
        $orderstate->deleted_by = Auth::user()->id;
        $orderstate->update();
        $orderstate->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_orderstates = OrderState::onlyTrashed()->get();
        return view('publishers.show_deleted', ['deleted_orderstates' => $deleted_orderstates]);
    }

    public function restore(OrderState $orderstate)
    {
        $this->authorize('restore', OrderState::class);
        $orderstate->restore();
        return back()->with('success', 'Visszaállítottad a(z) ' . $orderstate->name . ' orderstate.');
    }
}
