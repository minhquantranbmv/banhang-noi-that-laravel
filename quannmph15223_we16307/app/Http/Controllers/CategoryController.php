<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(Request $request){
        $categorys = Category::paginate(5);
        if(isset($request->key)){
            
            $key = $request->key;
            // dd($key);
            $categorys = Category::where('name' , 'like' , "%$key%")->paginate(5);
        }
        return view('admin.category.list-category', ['categorys' => $categorys]);
    }

    public function add_category(){
        return view('admin.category.add-category');
    }

    public function save_category(Request $request){
        $category = new Category();
        $rule = [
            'name' => ['required', 'min:6', 'unique:category'],
            'img' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ];
        $messages = [
            'required' => ':attribute không được để chống',
           'min' => ' :attribute không được nhỏ hơn :min ký tự',
           'integer' => ' :attribute phải là số',
           'mimes' => ':attribute phải là ảnh',
           'unique' => ':attribute đã tồn tại'
        ];
        $request->validate($rule,$messages);

        if($request->hasFile('img')){
            $file = $request->img;
            $ext = $request->img->extension();
            // $file_name = $file->getClientoriginalName();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('images/category'), $file_name);
        }
        $request->merge(['image' => $file_name]);

        $data = $request->all();
        $category->name = $data['name'];
        $category->avatar = $file_name;

        $category->save();

        // dd($request->all());

        return redirect()->route('admin.list-category');
    }

    public function edit_category(Category $category){

        return view('admin.category.add-category', ['categorys' => $category]);
    }

    public function save_edit(Category $category, Request $request){
        $rule = [
            'name' => ['required', 'min:6', 'unique:category'],
            'img' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ];
        $messages = [
            'required' => ':attribute không được để chống',
           'min' => ' :attribute không được nhỏ hơn :min ký tự',
           'integer' => ' :attribute phải là số',
           'mimes' => ':attribute phải là ảnh',
           'unique' => ':attribute đã tồn tại'
        ];
        $request->validate($rule,$messages);

        if($request->hasFile('img')){
            $file = $request->img;
            $ext = $request->img->extension();
            // $file_name = $file->getClientoriginalName();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('images/category'), $file_name);
        }
        else{
            $file_name = $category->img;
        }
        $request->merge(['avatar' => $file_name]);

        $category->update($request->all());
        return redirect()->route('admin.list-category');
    }

    public function delete(Category $category){
        $category->delete();
        return back();
    }

    public function apiGetlistCate(){
        $users = Category::select('id', 'name' )->with('post')->get();
        return response()->json([
            'status' => 200,
            'data' => $users
        ]);
    }

}
