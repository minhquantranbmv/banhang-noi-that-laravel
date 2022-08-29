<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attributes;
use App\Models\AttrProduct;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductClientController extends Controller
{
    public function index(){
        $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->paginate(10);
        // dd($product);
        
        return view('client.product.shop', ['product'=>$product]);
    }
    public function sing_product(Product $product){
        $show_product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->where('id', '=', $product->id)->first();
        $attributes = Attributes::where('parent_id', '=' , 0)->get(); 
        $attribute_el = new Attributes(); 

        return view('client.product.single-product', ['product'=>$show_product, 'attributes'=>$attributes, 'attribute_el'=>$attribute_el]);
    }

    public function search_product(Request $request){
        if(isset($request->search)){
            $key = $request->search;
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->where('pro_name', 'LIKE', "%$key%")->paginate(5);
            return response()->json([
                'success' => true
            ], 200);
        }
        elseif($request->search==""){
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->paginate(5);
        }
    }
}
