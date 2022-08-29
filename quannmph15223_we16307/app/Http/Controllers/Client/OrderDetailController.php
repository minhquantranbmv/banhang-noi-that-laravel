<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Use_;

class OrderDetailController extends Controller
{
    //
    public function show_cart(){
        // $cart = new OrderDetail();
        $carts = OrderDetail::where('user_id', '=', Auth::id())->with(['product', 'user'])->get();
        return view('client.cart.cart',['carts'=>$carts]);
    }

    public function add_cart(Product $product, Request $request){
        // dd($request->all());
        $attribute=array();
        $cart = new OrderDetail();
        if($attr = $request->attribute){
            foreach ($attr as $value) {
                $attribute[] = $value;
            }
        }
        // dd($attribute);
        $cart->product_id = $product->id;
        $cart->money = $product->into_price * $request->quantity;
        // $cart->money = 1;    
        $cart->quantity = $request->quantity;
        $cart->attribute = implode(' | ', $attribute);
        $cart->user_id = Auth::id();
        
        $cart->save();
        // return redirect()->route('client.cart',Auth::id());
    }

    public function delete_cart(OrderDetail $cart){
        // dd($cart->id);
        $cart->delete();
        return back();
    }

    
}
