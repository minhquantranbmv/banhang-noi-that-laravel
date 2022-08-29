<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function buy_order(Request $request){
        $ord_product = new OrderProduct();
        $order = new Order();
        $carts = OrderDetail::where('user_id', '=', Auth::id())->with(['product', 'user'])->get();
        // dd($carts);
        $total_money = 0;
        foreach ($carts as $cart) {
            $total_money += $cart->money;
        }
        // dd($total_money);

        $order->user_id = Auth::id();
        $order->fullname = $request->fullname;
        $order->ship_address = $request->address;
        $order->phone = $request->phone;
        $order->order_status_id = 1;
        $order->order_code = rand(100, 1000) + time();
        $order->total_money	 =  $total_money;
        $order->save();

        foreach ($carts as $cart) {
            OrderProduct::insert([
                'product_id' => $cart->product->id,
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'quantity' => $cart->quantity,
                'money' => $cart->money,
                'attribute' => $cart->attribute,
                
            ]);
            // $ord_product->product_id = $cart->product->id;
            // $ord_product->order_id = $order->id;
            // $ord_product->quantity = $cart->quantity;
            // $ord_product->money = $cart->money;
           
        }
         $ord_product->update();

        return redirect()->route('client.show-cart'); 
    }





    public function payment_order(Request $request){
        $ord_product = new OrderProduct();
        $order = new Order();
        $total_money = 0;
        $carts = Cookie::get('shopping_carts');
        $cart_item = json_decode($carts, true);
        foreach ($cart_item as $cart) {
            $total_money += $cart['money'];

        }

        $order->user_id = Auth::id();
        $order->fullname = $request->fullname;
        $order->ship_address = $request->address;
        $order->phone = $request->phone;
        $order->order_status_id = 1;
        $order->order_code = rand(100, 1000) + time();
        $order->total_money	 =  $total_money;
        $order->save();

        foreach ($cart_item as $cart) {
            OrderProduct::insert([
                'product_id' => $cart['product_id'],
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'quantity' => $cart['quantity'],
                'money' => $cart['money'],
                'attribute' => $cart['attribute'],
                'orderdetails_id' =>1,
            ]);
           
        }
         $ord_product->update();

        return redirect()->route('client.cart.all-cart'); 
    }






}
