@extends('main')
@section('title', 'Product')

@section('content')
      <!-- Button trigger modal -->
    <a class="btn btn-primary" href="{{route('admin.product.add-product')}}">Thêm mới</a>
    
    <div style="margin-top: 20px" class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tìm kiếm</label>
      <input type="text" data-token="{{ csrf_token() }}" class="form-control" name="search" id="txtSearch" aria-describedby="emailHelp">
    </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name Product</th>
        <th scope="col">Avatar</th>
        <th scope="col">Price</th>
        <th scope="col">Amount</th>
        <th scope="col">Sale</th>

        <th scope="col">View</th>
        <th scope="col">Category</th>
        <th scope="col">Thao tác</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($product as $item)
          
      
      <tr>
        <th scope="row">1</th>
        <td>{{$item->pro_name}}</td>
        <td>
          @if($item->imgpro != "")
          @php
              $images = explode('|', $item->imgpro->add_avatar)
          @endphp          
            <img width="180px" src="{{asset("images/product/$images[0]")}}" alt=""> 
          @endif
          
          <img src="" alt="">
        </td>
        <td>{{$item->pro_price}} vnđ</td>
        <td>{{$item->pro_amount}}</td>
        <td>{{$item->pro_sale}} %</td>
        <td>{{$item->pro_view}}</td>
        <td>
          {{-- {{$item->category_id}} --}}
          {{$item->category->name}}
          
        </td>
        {{-- <td>
          <ul>
              @foreach ($item->attr_pro as $attr)
                  <li>{{$attr->attribute->name}}</li>
              @endforeach
          </ul>
        </td> --}}
        <td>
          <a class="btn btn-warning" href="">Xem Thêm</a>
          <button class="deleteProduct btn btn-danger" data-url="{{route('admin.delete-category', $item->id)}}" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" >Delete</button>
          <a class="btn btn-info" href="{{route('admin.product.edit-product', $item->id)}}">Sửa</a>
        </td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
  
<div class="container">
  {{$product->links("pagination::bootstrap-4")}}
</div>
 
<script>
  
  $('#txtSearch').on('keyup',function(){
    console.log("quân");
      $value = $(this).val();
      $.ajax({
          type: 'GET',
          url: "{{route('admin.product.search-product')}}",
          data: {
              'search': $value,
              // "_method": 'POST',
              // "_token": token,
          },
          // dataType:'json',
          // headers: {
          //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          // },
          
          success:function(data){
            console.log("abc");
              $('tbody').html(data);
          }
      });
  })

  $(".deleteProduct").click(function(){
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
