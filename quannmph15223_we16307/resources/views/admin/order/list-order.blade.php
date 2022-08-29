@extends('main')
@section('title', 'Category')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">Money</th>
        <th scope="col">Status</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
      <tr>
        <th scope="row">1</th>
        <td>{{$order->fullname}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->ship_address}}</td>
        <td>{{$order->total_money}}</td>
        <td>
          {{$order->order_status->status_name}}
          <a class="btn btn-info" href="">Cập nhật</a>
        </td>
        <td>

            <a href="{{route('admin.order.order-detail', $order->id)}}" class="btn btn-warning">Xem chi tiết</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  
@endsection
