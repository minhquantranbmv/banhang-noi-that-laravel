@extends('main')
@section('title', 'Order')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name Product</th>
        <th scope="col">Image</th>
        <th scope="col">Attribute</th>
        <th scope="col">Quantity</th>
        <th scope="col">Money</th>
        <th scope="col">Status</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
        @foreach($order_product as $order)
      <tr>
        <th scope="row">1</th>
        <td>{{$order->product->pro_name}}</td>
        <td>
          @if($order->product->imgpro != "")
          @php
              $images = explode('|', $order->product->imgpro->add_avatar)
          @endphp          
          <img width="180px" src="{{asset("images/product/$images[0]")}}" alt=""> 
          @endif
        </td>
        <td>{{$order->attribute}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->money}}</td>
        <td>{{$order->order->order_status->status_name}}</td>
        <td>
            <a href="" class="btn btn-danger">Xoá</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  
@endsection
