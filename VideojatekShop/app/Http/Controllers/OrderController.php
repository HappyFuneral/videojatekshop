<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;

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
                "price" => 0,
                "delivery_details" => "Foxpost",
                "postal" => $request->postal,
                "country" => $request->country,
                "province" => $request->province,
                "city" => $request->city,
                "address" => $request->address,
                "orderState_id" => 2,
                "created_by" => Auth::user()->id,
            ]
        );


        $order->save();

        $cart = session()->get('cart');
        $price = 0;
        foreach($cart as $item)
        {
            \App\Models\OrderProduct::create([
                'storage_product_id' => $item['product_id'],
                'order_id' => $order->id,
                'quantity' => $item['quantity']
            ]);
                $storage_product = \App\Models\StorageProduct::all()->find($item['product_id']);
                if ($storage_product->quantity <= $item['quantity']){
                    $storage_product->quantity = 0;
                } else {
                    $storage_product->quantity-= $item['quantity'];    
                }

            $price += $item['quantity']*\App\Models\Product::all()->find($storage_product->product_id)->price;

            $storage_product->update();

        }

        $order->price = $price;
        $order->update();
        unset($cart);
        session()->put('cart', $cart);

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
        $order->updated_by = Auth::user()->id;
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'The order was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->deleted_by = Auth::user()->id;
        $order->update();
        $order->delete();
        return back()->with("success","Sikeres Törlés");
    }

    public function show_deleted()
    {
        $deleted_orders = Order::onlyTrashed()->get();
        return view('orders.show_deleted', ['orders' => $deleted_orders]);
    }
}
