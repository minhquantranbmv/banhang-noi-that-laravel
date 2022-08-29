@extends('main')
@section('title', 'Attribute')

@section('content')
      <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{route('admin.attribute.add-attribute')}}">Thêm mới</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($attributes as $item)
          
      
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td> <a href="{{route('admin.attribute.list-element', $item->id)}}">{{$item->name}}</a> </td>
        <td>
          <a href="" class="btn btn-warning" >Show Attribute</a>
          <button class="deleteAttribute btn btn-danger" data-url="{{route('admin.attribute.delete-attribute', $item->id)}}"  data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" >Delete</button>
          <a class="btn btn-info" href="">Sửa</a>
        </td>
      </tr>
      
      @endforeach
    </tbody>
  </table>

<script>
  $(".deleteAttribute").click(function(){
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
