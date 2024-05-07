<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StorageProduct;
class CartController extends Controller
{

    public function Cart()
    {
        return view('cart');
    }
    public function addProductToCart($id)
    {
        $product = StorageProduct::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id" => $product->id,
                "quantity" => 1,
            ];
        }
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }
     
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Product added to cart.');
        }
    }
   
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
        }
    }

    public function getCart() {
        return session()->get('cart');
    }
}
