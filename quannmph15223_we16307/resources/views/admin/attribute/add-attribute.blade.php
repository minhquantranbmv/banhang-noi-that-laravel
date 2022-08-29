@extends('main')
@section('title', 'Product')

@section('content')

    <form action="{{isset($attribute) ? route('admin.attribute.save-edit', $attribute->id) : route('admin.attribute.save-add')}}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name Attribute</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            @error('name')
            <div id="emailHelp" style="color: red" class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group ">
            <img width="200px" id="hienthi_img" src="" alt="">
        </div>
        
        @if (isset($attribute))
            @method('PUT')
        @else
            @method('POST')
        @endif
        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </form>

  
@endsection