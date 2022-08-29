<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;

class OrderAdminController extends Controller
{
    public function index(){
        $orders = Order::with('order_status')->get();
        return view('admin.order.list-order', ['orders' => $orders]);
    }
    public function order_detail(Order $order){
        // $order_detail = OrderDetail::where('user_id', '=', Auth::id())->get();
        // $order_pro = OrderProduct::find(Auth::id())->get();
        // foreach ($order_detail as $value) {
        //     $order_pro->update([
        //         'attribute' => $value->attribute,
        //     ]);
        // }
        $order_product= OrderProduct::with(['product','order'])->where('order_id', '=', $order->id)->get();
        
        return view('admin.order.order-detail',['order_product'=>$order_product]);
    }
}
