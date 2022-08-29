@extends('main')
@section('title', 'Product')

@section('content')
<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name Product</label>
            <input type="text" class="form-control" name="pro_name" value="{{old('pro_name')}}" id="exampleInputEmail1" aria-describedby="emailHelp">       
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            @error('pro_name')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3" id="add_product">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input multiple type="file" style="width: 95%;" class="form-control"  name="pro_img[]" id="file_img">
            <div style="float: right; margin-top:-36px" id="them_sp" class="btn btn-success">+</div>     
            @error('pro_img')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group ">
            <img width="200px" id="hienthi_img" src="" alt="">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="number" class="form-control" name="pro_price" value="{{old('pro_price')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            @error('pro_price')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Amount</label>
            <input type="number" class="form-control" name="pro_amount" value="{{old('pro_amount')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            @error('pro_amount')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sale</label>
            <input type="number" class="form-control" name="pro_sale" value="{{old('pro_sale')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            @error('pro_sale')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn danh mục</label>
           
            <select class="form-select" name="category_id" aria-label="Default select example">
                {{-- <option selected>Open this select menu</option> --}}
                 @foreach($categorys as $category)                 
                    <option value="{{$category->id}}">{{$category->name}}</option>

                @endforeach
              </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn thuộc tính</label>
            <div class="container overflow-hidden">
                <div class="row gy-5">
                    @foreach($attributes as $attribute)
                    <div class="col-6">
                        <div class="p-3 border bg-light">
                            {{-- <input type="checkbox" name="" id="attribute"> --}}
                            <label for="attribute">{{$attribute->name}}</label> 
                            <div style="margin-left: 20px">
                                @php
                                 $abc = $attribute_el->where('parent_id' , '=' , $attribute->id)->get();   
                                //  dd($attribute_el);
                                @endphp
                                @foreach($abc as $item)
                                <input type="checkbox" name="attr_ele[]" value="{{$item->id}}" id="attr{{$item->id}}">
                                <label for="attr{{$item->id}}">{{$item->name}}</label>  <br>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
              </div>
            
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mô tả</label>
            <textarea name="pro_description" value="{{old('pro_description')}}" ></textarea>
            {{-- <input type="text" class="form-control" name="pro_description" value="{{old('pro_description')}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            {{-- <textarea name="pro_description"  id="" cols="30" rows="10"></textarea> --}}
            @error('pro_description')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        
                
            @method('POST')
        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </form>
</div>
<script>
    $('#them_sp').click(function(){
        $('#add_product').append(`
            <br>
            <input multiple style="width: 95%;" type="file" class="form-control"  name="pro_img[]" id="hienthi exampleInputPassword1 ">
            
        `);
    })

    const file = document.getElementById("file_img");
    let img;
    $("#file_img").change(function (e) {
        const img = e.target.files
        console.log(111, img)
        console.log(222, img[0])
        var i=0;
        // img.forEach(element => {
            console.log("okok");
            document.querySelector("#hienthi_img").src = URL.createObjectURL(file.files[0])
            console.log(URL.createObjectURL(file.files[0]));
        i++;
        // });
        // document.querySelector("#hienthi_img").src = URL.createObjectURL(file.files[0])
        // console.log(URL.createObjectURL(file.files[0]));
    });


    // const file = document.getElementById("file_img");
    // let img;
    file.onchange = (e) => {
        

        // document.querySelector("#hienthi_img").src = URL.createObjectURL(file.files[0])
        // console.log(URL.createObjectURL(file.files[0]));
        
    }
    
</script>

<script>
        CKEDITOR.replace('pro_description');
</script>
@endsection