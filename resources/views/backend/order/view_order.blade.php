@extends('backend.master')
@section('title','| Danh mục sản phẩm')
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      View OrderDetail
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">        
                                  
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
       
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead >
          <tr>
            <th class="text-center">
               ID
            </th>
            <th class="text-center">Tên SP</th>
            <th class="text-center">Hình Ảnh</th>
            <th class="text-center">Số lượng</th>
            <th class="text-center">Đơn giá</th>
            <th class="text-center">Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0?>
            @foreach ($order->child_order as $item)
           
              <?php $total += $item->quantity*$item->price;?>
                <tr class="text-center">
                    <td style="vertical-align: middle;">{{ $item->id }}</td>
                    <td style="vertical-align: middle;">{{ $item->parentProduct->name }}</td>
                    <td><img style="width:150px" src="{{ asset('public'.$item->parentProduct->image_path) }}" alt=""></td>
                    <td style="vertical-align: middle;">{{ $item->quantity }}</td>
                    <td style="vertical-align: middle;">{{ $item->price }}</td>
                    <td style="vertical-align: middle;">{{ number_format($item->quantity*$item->price) }}vnđ</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div style="float: right;padding:10px">
        
        <div>                 
            <span style="margin-right: 20px">Tổng thanh toán ({{ $order->child_order->count() }} Sản phẩm):<?php echo number_format($total)?>vnđ</span>
            @if ($order->deleted==1)
              <a href="{{ asset('admin/order/view_order_deleted') }}" class="btn btn-primary">back</a>
            @else
            @if ($order->payment==1&&$order->delivery==0)
              <a href="{{ asset('admin/order/view_order_succes') }}" class="btn btn-primary">back</a>
            @else 
            @if ($order->payment==1&&$order->delivery==1)
            <a href="{{ asset('admin/order/statistical') }}" class="btn btn-primary">back</a>
            @else 
            @if ($order->status==1)
            <a href="" class="btn btn-danger">Xóa</a>
            <a href="{{ asset('admin/order/assigned') }}" class="btn btn-primary">back</a>
            @else
            <a href="{{ asset('admin/order/orderprocessing/'.$order->id) }}" class="btn btn-danger">Giao hàng</a>
            <a href="{{ asset('admin/order') }}" class="btn btn-primary">back</a>
            @endif
            @endif
            @endif
            @endif
        </div>
    </div>
  </div>
</div>

</section>
<div style="margin-bottom: 80px">
   
</div>
@endsection
