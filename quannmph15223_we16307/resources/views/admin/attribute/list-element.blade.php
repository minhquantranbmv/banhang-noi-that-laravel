@extends('main')
@section('title', 'Attribute')

@section('content')
      <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{route('admin.attribute.add-attr-element', $id)}}">Thêm mới</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th></th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($attributes as $item)
          
      
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td> {{$item->name}} </td>
        @if($item->color == "")
        <td></td>
        @else
        <td> <input type="color" disabled value="{{$item->color}}" name="" id=""></td>
        @endif
        <td>
          <button class="deleteAttribute btn btn-danger" data-url="{{route('admin.attribute.delete-attribute', $item->id)}}"  data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" >Delete</button>
        </td>
      </tr>
      
      @endforeach
    </tbody>
  </table>

<script>
  $(".deleteAttribute").click(function(){
        // $this = $(this)
        // console.log($this.closest('tr'))
        var $row = $(this).closest('tr')
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
                $row.remove()
                console.log("it Work");
            }
        });

        console.log("It failed");
    });
</script>
  

  
@endsection
