@extends('main')
@section('title', 'Category')

@section('content')

    <form action="{{isset($categorys) ? route('admin.save-edit', $categorys->id) : route('admin.save-category')}}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name Category</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            @error('name')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input type="file" class="form-control"  name="img" id="file_img">
            @error('img')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group ">
            <img width="200px" id="hienthi_img" src="" alt="">
        </div>
        
        @if (isset($categorys))
            @method('PUT')
        @else
            @method('POST')
        @endif
        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </form>
<script>
    const file = document.getElementById("file_img");
    let img;
    $("#file_img").change(function () {
        document.querySelector("#hienthi_img").src = URL.createObjectURL(file.files[0])
        console.log(URL.createObjectURL(file.files[0]));
    });
</script>
  
@endsection