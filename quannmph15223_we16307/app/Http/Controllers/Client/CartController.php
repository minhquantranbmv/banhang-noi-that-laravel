<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function all_cart(Request $request){
        if($carts = Cookie::get('shopping_carts')){
            $cart_item = json_decode($carts, true);
        }
        else{
            $cart_item = [];
        }
        // dd($cart_item);
        // return json_encode($carts);
        return view('client.cart.show-cart', ['carts' => $cart_item]);
    }

    public function cart_quantity(Product $product, Request $request){

        // return response()->json(['data' => $product->id]);

        $carts = Cookie::get('shopping_carts');
        $cart_data = json_decode($carts, true);

        $item_list = array_column($cart_data, 'product_id');

        if(in_array($product->id, $item_list)){
            foreach ($cart_data as $key => $value) {
                if($cart_data[$key]['product_id'] == $product->id){
                    $cart_data[$key]['quantity'] = $request->quantity;
                    $cart_data[$key]['money'] = $product->into_price*$cart_data[$key]['quantity'];
                    $item_data = json_encode($cart_data);
                    $minutes = 30;
                    Cookie::queue(Cookie::make('shopping_carts', $item_data, $minutes));
                    return response()->json(['status'=>$cart_data[$key]['money']]);
                }
            }
        }
        else{
            return response()->json(['status'=>'Đéo thành công']);
        }

        // $carts = Cookie::get('shopping_carts');
        // $carts = json_decode($carts, true);
        // dd($carts);
        // $key = $product->id;
        // // if(isset($cart[$key])){
        //     // log("qân");
        //     $carts[$key]['quantity'] = (int)$carts[$key]['quantity'] + $request->quantity;
        //     $carts[$key]['money'] = 300000;
        //     return response()->json(['status'=>'Item update from Cart']);
        //     // dd($cart[$key]);
        // // }
    }

    public function save_cart(Product $product ,Request $request){
        $carts = Cookie::get('shopping_carts');
        $key = $product->id;
        // dd($carts);
        $carts = json_decode($carts, true);
        // dd($abc[$key]->product_id);
        if(isset($carts[$key])){
            // dd($carts[$key]['quantity']);

            
            $carts[$key]['quantity'] = (int)$carts[$key]['quantity'] + $request->quantity;
            dd($carts[$key]['quantity']);
        }else{
            $attribute=array();
            if($attr = $request->attribute){
                foreach ($attr as $value) {
                    $attribute[] = $value;
                }
            }
            $images = explode('|', $product->imgpro->add_avatar);
            // $money = $product->into_price * $request->quantity;
            $carts[$key] =[
                
                'product_id' => $product->id,
                'name' => $product->pro_name,
                'money' => $product->into_price * $request->quantity,
                'quantity' => $request->quantity,
                'avatar' => $images[0],
                'attribute' => implode(' | ', $attribute),
                'user_id' => Auth::id(),
                // 'total_money' => $request->quantity*$product->pro_price,
            ];
            // $carts[] = $data_item;
            // $data_item = json_encode($data_cart);
            // dd($carts);
            $item_data = json_encode($carts);
            
            Cookie::queue(Cookie::make('shopping_carts', $item_data, 3600));
            // Cookie::queue('shopping_cart', json_encode($data_cart), 50);
        }
        return redirect()->route('client.cart.all-cart')->with('msg', 'Thêm vào giỏ hàng thành công');
        // return response()->json(['status'=>'"'.$product->id.'" Added to Cart']);

    }

    public function delete($pro_id){
        // Cookie::queue(Cookie::forget('shopping_carts'));
        // return response()->json(['status'=>'Your Cart is Cleared']);

        $carts = Cookie::get('shopping_carts');
        $cart_data = json_decode($carts, true);

        $item_list = array_column($cart_data, 'product_id');

        if(in_array($pro_id, $item_list)){
            foreach ($cart_data as $key => $value) {
                if($cart_data[$key]['product_id'] == $pro_id){
                    unset($cart_data[$key]);
                    $item_data = json_encode($cart_data);
                    $minutes = 30;
                    Cookie::queue(Cookie::make('shopping_carts', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }

    }


    public function addCart($id, Request $request)
	{
		$product = Product::findorFail($id);
		if(Cookie::has('item')){
			$found = in_array($id, array_column(unserialize(Cookie::get('item')), 'id'));
			if($found){
				$cart = unserialize(Cookie::get('item'));
				$key = array_search($id, array_column($cart, 'id'));
				$cart[$key]['quantity'] += 1;
				Cookie::queue(Cookie::make('item', serialize($cart), 60));
				return redirect('cart')->with('message','Đã thêm vào giỏ!');
			}
			$cart = unserialize(Cookie::get('item'));
		} 
		$cart[] = ['id' => $id, 'name' => $product->name, 'price' => $product->price, 'quantity' => 1, 'thumbnail' => $product->thumbnail];
		//Khởi tạo giỏ hàng bằng cookie
		Cookie::queue(Cookie::make('item', serialize($cart), 1440));
		return redirect('cart')->with('message','Đã thêm vào giỏ!');
	}
    public function addtocart(Request $request)
    {

        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
                }
            }
        }
        else
        {
            $products = Product::find($prod_id);
            $prod_name = $products->name;
            $prod_image = $products->image;
            $priceval = $products->price;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }
    }
}
