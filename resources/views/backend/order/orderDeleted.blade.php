@extends('backend.master')
@section('title','| Danh mục sản phẩm')
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH ĐƠN HÀNG BỊ HỦY
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">        
                                  
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead >
          <tr>
            <th class="text-center">
               ID
            </th>
            <th class="text-center">Tên khách hàng</th>
            <th class="text-center">email</th>
            <th class="text-center">SĐT</th>
            <th class="text-center">Địa chỉ</th>
            <th class="text-center">Tiền đơn hàng</th>
            <th class="text-center">Trạng thái</th>
            <th style="width:250px;text-align:center">CHỨC NĂNG</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($order as $item)   
          <?php $total=0?>    
          @foreach ($item->child_order as $detail)
            <?php $total+= $detail->quantity*$detail->price ?>             
          @endforeach
            <tr class="text-center">
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
                <td>
                  <?php echo number_format($total)?>đ
                </td>      
                <td>   
                  @if($item->deleted==1)
                    <span class="text-danger">Đơn hàng bị hủy</span>
                  @endif                
                </td>
                <td>
                  <a href="{{ asset('admin/order/vieworder/'.$item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> View</a>               
                  </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing  items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                        
          
        </div> 
      </div>
    </footer>
  </div>
</div>

</section>
@endsection
