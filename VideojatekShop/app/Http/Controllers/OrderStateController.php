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
        $ordertates = OrderState::all();
        return view("orderstates.index", ['ordertates' => $ordertates]);
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
        $orderState = new OrderState(
            [
                "state" => $request->state,
                "created_by" => Auth::user()->id,
            ]
        );

        $orderState->save();

        return back()->with("success", "Orderstate created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderState $orderState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderState $orderState)
    {
        return view("orderstates.edit", ['orderState' => $orderState]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderStateRequest $request, OrderState $orderState)
    {
        $orderState->updated_by = Auth::user()->id;
        $orderState->update($request->all());

        return redirect()->route('orderstates.index')->with('success', 'The orderstate was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderState $orderState)
    {
        $orderState->deleted_by = Auth::user()->id;
        $orderState->update();
        $orderState->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_orderStates = OrderState::onlyTrashed()->get();
        return view('publishers.show_deleted', ['publishers' => $deleted_orderStates]);
    }

    public function restore(OrderState $orderState)
    {
        $orderState->restore();
        return back()->with('success', '' . $orderState->name . ' was successfully restored.');
    }
}
