<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;
use Attribute;

class AttributeController extends Controller
{
    public function index(){
        $attributes = Attributes::where('parent_id' , '=' , '0')->paginate(5);
        return view('admin.attribute.list-attribute',['attributes' => $attributes]);
    }

    public function add_attribute(){
        return view('admin.attribute.add-attribute');
    }
    public function save_add(Request $request){
        $attribute = new Attributes();
        $rule = [
            'name' => ['required', 'min:3', 'unique:attributes'],
        ];
        $messages = [
            'required' => ':attribute không được để chống',
           'min' => ' :attribute không được nhỏ hơn :min ký tự',
           'unique' => 'Thuộc tính đã tồn tại'
        ];
        $request->validate($rule,$messages);

        

        $data = $request->all();
        $attribute->name = $data['name'];

        $attribute->save();

        // dd($request->all());

        return redirect()->route('admin.attribute.list-attribute');
    }

    public function delete(Attributes $attribute){
        $attribute->delete();
        return response()->json([
            'success' => true
        ], 200);
    }



    public function list_element($id){
        $attributes = Attributes::where('parent_id', '=', $id)->get();

        return view('admin.attribute.list-element', ['attributes' => $attributes, 'id' => $id]);
    }

    public function add_attr_element($id){
        $attribute = Attributes::find($id);
        $element = Attributes::where('parent_id', '=', $id)->get();
        // dd($element);
        return view('admin.attribute.add-element', ['element' => $element, 'attribute' => $attribute]);
    }
    
    public function save_attr_element(Request $request , $id){
        $attribute = new Attributes();
        $rule = [
            'name' => ['required', 'unique:attributes'],
        ];
        $messages = [
            'required' => ':attribute không được để chống',
           'unique' => 'Thuộc tính đã tồn tại'
        ];
        $request->validate($rule,$messages);

        

        $data = $request->all();
        $attribute->name = $data['name'];
        $attribute->parent_id = $id;
        if(isset($data['color'])){
            $attribute->color = $data['color'];
        }
        else{
            $attribute->color = "";
        }
        
        $attribute->save();

        // dd($request->all());

        return redirect()->route('admin.attribute.list-attribute');
    }

    public function save_edit_element($id){
        
    }

    public function delete_element(Attributes $attribute){
        $attribute->delete();
        return back();
    }

}
