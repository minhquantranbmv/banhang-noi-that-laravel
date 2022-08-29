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
          <button class="deleteCategory btn btn-danger" data-url="{{route('admin.delete-category', $item->id)}}" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" >Delete Task</button>
          <a class="btn btn-info" href="{{route('admin.product.edit-product', $item->id)}}">Sửa</a>
        </td>
      </tr>
      
      @endforeach