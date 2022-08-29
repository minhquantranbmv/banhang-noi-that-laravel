@extends('main')
@section('title', 'Category')

@section('content')
      <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{route('admin.add-category')}}">Thêm mới</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Avatar</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categorys as $item)
          
      
      <tr>
        <th scope="row">1</th>
        <td>{{$item->name}}</td>
        <td><img width="200px" src="{{asset("images/category/$item->avatar")}}" alt=""></td>
        <td>
          {{-- <form action="">
            @csrf
            <button class="btn btn-danger">Xoá</button>
            @method('DELETE')
          </form> --}}
          <button class="deleteCategory btn btn-danger" data-url="{{route('admin.delete-category', $item->id)}}" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" >Delete Task</button>
          <a class="btn btn-info" href="{{route('admin.edit-category', $item->id)}}">Sửa</a>
        </td>
      </tr>
      
      @endforeach
    </tbody>
  </table>

<script>
  $(".deleteCategory").click(function(){
        var id = $(this).data("id");
        var token = $(this).data("token");
        var link = $(this).data("url");
        $.ajax(
        {
            url: link,
            type: 'POST',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function ()
            {
                console.log("it Work");
            }
        });

        console.log("It failed");
    });
</script>
  

  
@endsection
