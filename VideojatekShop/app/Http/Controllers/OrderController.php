<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Auth\Middleware\Authorize;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view("orders.index", ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("orders.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order(
            [
                "user_id" => Auth::user()->id,
                "price" => $request->price,
                "delivery_date" => $request->delivery_date,
                "delivery_details" => $request->delivery_details,
                "postal" => $request->postal,
                "country" => $request->country,
                "provincie" => $request->provincie,
                "city" => $request->city,
                "address" => $request->address,
                "orderState_id" => $request->orderState_id
            ]
        );

        $order->save();

        return back()->with("success", "Order created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'The order was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
    }
}
