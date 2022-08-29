<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Attributes;
use App\Models\AttrProduct;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){
        $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->paginate(5);
        // dd($product);
        
        
            return view('admin.product.list-product', ['product'=>$product]);
        
        
    }
    public function search(Request $request){
        if(isset($request->search)){
            $key = $request->search;
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->where('pro_name', 'LIKE', "%$key%")->paginate(5);
            return view('admin.product.search-product', ['product'=>$product]);
        }
        elseif($request->search==""){
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->paginate(5);
        // dd($product);
        
        
            return view('admin.product.search-product', ['product'=>$product]);
        }
    }
    public function add_product(){
        
        $categorys = Category::select('id', 'name')->get();
        $attributes = Attributes::where('parent_id', '=' , 0)->get(); 
        $attribute_el = new Attributes(); 
        return view('admin.product.add-product', ['categorys' => $categorys, 'attributes' => $attributes , 'attribute_el' => $attribute_el]);
    }

    public function save_product(ProductRequest $request){
        $product = new Product();
        // dd($request->all());
        $pro_img = array();
        if($files = $request->file('pro_img')){
            
            foreach($files as $file){
                $ext = $file->extension();
                // $ext = strtolower($file->getClientOriginalExtension());
                // $file_name = $file->getClientoriginalName();
                $file_name = rand(1000,10000).time().'-'.'product.'.$ext;
                $file->move(public_path('images/product'), $file_name);
                $upload_path = 'public/product/';
                $image_url = $upload_path.$file_name;
                $pro_img[] = $file_name;
            }
            // dd($pro_img);
            
        }
        // $request->merge(['pro_img' => $pro_img]);
        $product->pro_name = $request->pro_name;
        $product->pro_price = $request->pro_price;
        $product->pro_amount = $request->pro_amount;
        $product->pro_sale = $request->pro_sale;
        // $product->pro_view = $request->pro_view;
        $product->pro_description = $request->pro_description;
        $product->category_id = $request->category_id;

        $product->save();
        $pro_id = $product->id;
        $into_price = $product->pro_price-$product->pro_price*$product->pro_sale/100;
        $product->update([
            'into_price'=>$into_price,
        ]);
        ImageProduct::insert([
            'add_avatar' => implode('|', $pro_img),
            'product_id' => $pro_id
        ]);
        $attr_pro = new AttrProduct();
        if($attributes = $request->attr_ele){
            foreach($attributes as $attr){
                AttrProduct::insert([
                    'attr_id'=>$attr,
                    'product_id'=>$pro_id,
                ]);
            }
        }

        return redirect()->route('admin.product.list-product');

    }

    public function edit_product($id){
        $categorys = Category::select('id', 'name')->get();
        $attributes = Attributes::where('parent_id', '=' , 0)->get(); 
        $attribute_el = new Attributes(); 
        $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->where('id' , '=' , $id)->first();
        // dd($product->attr_pro->id);
        return view('admin.product.edit-product', ['product'=>$product ,'categorys' => $categorys, 'attributes' => $attributes , 'attribute_el' => $attribute_el]);
    }

    public function save_edit(Product $product, ProductRequest $request){
        // dd($request->attr_ele);
        
        // $request->merge(['pro_img' => $pro_img]);
        $product->pro_name = $request->pro_name;
        $product->pro_price = $request->pro_price;
        $product->pro_amount = $request->pro_amount;
        $product->pro_sale = $request->pro_sale;
        // $product->pro_view = $request->pro_view;
        $product->pro_description = $request->pro_description;
        $product->category_id = $request->category_id;

        $product->update();
        $pro_id = $product->id;
        // $price = $product->
        $into_price = $product->pro_price-$product->pro_price*$product->pro_sale/100;
        // $into_price = 100 - 20*2/4;
        // dd($into_price);
        $product->update([
            'into_price'=>$into_price,
        ]);
        $pro_img = array();
        if($request->pro_img != NULL){
        if($files = $request->file('pro_img')){
            
            foreach($files as $file){
                $ext = $file->extension();
                // $ext = strtolower($file->getClientOriginalExtension());
                // $file_name = $file->getClientoriginalName();
                $file_name = rand(1000,10000).time().'-'.'product.'.$ext;
                $file->move(public_path('images/product'), $file_name);
                $upload_path = 'public/product/';
                $image_url = $upload_path.$file_name;
                $pro_img[] = $file_name;
            }
            // dd($pro_img);
            ImageProduct::where('product_id', '=', $pro_id)->update([
                'add_avatar' => implode('|', $pro_img),
                'product_id' => $pro_id
            ]);
        }
    }
        
        $attr_pro = new AttrProduct();
        $attr_pro->where('product_id', '=' , $pro_id)->delete();
        // dd($request->attr_ele);
        if($attributes = $request->attr_ele){
            foreach($attributes as $attr){
                AttrProduct::insert([
                    'attr_id'=>$attr,
                    'product_id'=>$pro_id,
                ]);
            }
        }
        return redirect()->route('admin.product.list-product');
    }

    
    
}
