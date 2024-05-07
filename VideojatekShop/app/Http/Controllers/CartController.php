<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StorageProduct;
use Illuminate\Support\Facades\Auth;

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
        
        return redirect()->back()->with('success', 'Sikeresen frissítetted a terméket!');
    }
     
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $x = 1;
            $cart = session()->get('cart');
            while ($x<count($cart)+1 && $cart[$x]['product_id'] != $request->id){
                $x++;
            }

            if ($cart[$x]['product_id'] == $request->id) {
                $cart[$x]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Product added to cart.');
                return redirect()->back()->with('success', 'Sikeresen frissítetted a terméket!');

            }
            else{
                return redirect()->back()->with('success', 'Watafak');

            } 
          
        }
    }
   

    public function cartHistory(){
        $user_id = Auth::user()->id;
        $orders = \App\Models\Order::where('user_id',$user_id)->get();
        return view('cart_history',['orders'=>$orders]);
    }

    public function deleteProduct(Request $request)
    {
        if($request->id){
            $x = 1;
            $cart = session()->get('cart');
            while ($x<count($cart)+1 && $cart[$x]['product_id'] != $request->id){
                $x++;
            }
            if ($cart[$x]['product_id'] == $request->id) {
                $cart = session()->get('cart');
                if(isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
                session()->flash('success', 'Product successfully deleted.');
                return redirect()->back()->with('success', 'Sikeresen törölted a terméket!');

            }
            else{
                return redirect()->back()->with('success', 'Watafak');

            } 
          
        }
    
    }

    public function getCart() {
        return session()->get('cart');
    }
}
