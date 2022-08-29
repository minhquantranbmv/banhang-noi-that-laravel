@extends('main')
@section('title', 'Attribute')

@section('content')

    <form action="{{route('admin.attribute.save-add-element', $attribute->id)}}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name Attribute</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            @error('name')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3"> 
            <input type="checkbox" name="" id="add-mausac">   
            <label for="">Chọn màu sắc ( nếu có )</label> 
        </div>        
        <div  class="mb-3 add-color">
           
        </div>
        <div class="form-group ">
            <img width="200px" id="hienthi_img" src="" alt="">
        </div>   
        @method('POST')
        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </form>

  <script>
    var add_mausac = document.querySelector("#add-mausac");
    add_mausac.onclick = function(){
        if(this.checked == true){
            document.querySelector(".add-color").innerHTML = ` <label for="exampleInputEmail1" class="form-label">Chọn màu sắc </label>
        <input type="color" class="form-control" name="color" value="" id="exampleInputEmail1" aria-describedby="emailHelp">`;
        } else {
            document.querySelector(".add-color").innerHTML = ``;
        }
    }
  </script>
@endsection