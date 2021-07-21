@extends('backend.master')
@section('title','| Thống kê doanh thu')

@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THỐNG KÊ DOANH THU
    </div>
  </div>
  <div class="row">
    <div class="col-md-9" >
      <div class="contai" style="border: 1px solid #DCDEE0;">
          <div class="header" style="color: white;background-color:green;padding:10px;border-radius:4px">
              <h3 class="panner" >Bảng thống kê doanh thu</h3>
          </div>
          <div class="body" style="padding: 20px;background-color:white">
              <div class="group">

                  <span>Từ: <input type="date" class="date_from" name="date_from" id=""></span>
                  <span>Đến: <input type="date" class="date_to" name="date_to" id=""></span>
                  <a href="#" data-url="{{ asset('admin/order/Calculatorevenue') }}" class="btn btn-primary Calculatorevenue">Tính</a>  


                  <a href="#" data-url="{{ asset('admin/order/revenuebyday') }}" class="btn btn-primary revenueByDay">Tính lãi ngày</a>
                  <a href="#" data-url="{{ asset('admin/order/revenueByMonth') }}" class="btn btn-primary revenueByMonth">Tính lãi tháng</a>
                  <a href="#" data-url="{{ asset('admin/order/revenuebyyear') }}" class="btn btn-primary revenueByYear">Tính lãi năm</a>
              </div>
             
              <div class="total" style="padding: 20px 0">
                  <p class="totalPrice">Tổng doanh thu kiếm được:</span></p>
              </div>
              <div class="total" style="padding: 20px 0">
                  <p class="profit">Lợi nhuận kiếm được:</p>
              </div>
          </div>
      </div>
      
  </div>
  </div>
  <div  class="row" style="padding-top: 20px;">
    
    <div class="col-md-12">
      <div class="contai" style="border: 1px solid #DCDEE0;">
        <div class="header" style="color: white;background-color:green;padding:10px;border-radius:4px">
            <h3 class="panner" >Bảng Đơn Hàng Đã Bán</h3>
        </div>
        <div class="body" style="padding: 20px;background-color:white">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">stt</th>
                <th scope="col">Tên Khách</th>
                <th scope="col">Giá Bán</th>
                <th scope="col">Tiền nhập</th>
                <th scope="col">Lợi nhuận</th>
                <th scope="col">Ngày bán</th>
                <th scope="col">Chi Tiết</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($order as $item)
              <?php $stt=0;$total=0;$profit=0;$prod_total=0 ?>
              <?php $stt+=1 ?>
              <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->name }}</td>
                  <td>
                    @foreach ($item->child_order as $sp)
                        <?php $total += $sp->quantity*$sp->price?>
                    @endforeach
                    <?php echo number_format($total)?>
                  </td>
                  <td>
                    @foreach ($item->child_order as $sp)
                      <?php $prod_total += $sp->parentProduct->originalprice*$sp->quantity ?>
                    @endforeach
                    <?php echo number_format($prod_total)?>
                  </td>
                  <td>
                    <?php echo number_format($total-$prod_total)?>
                  </td>
                  <td>{{ $item->updated_at->format('d/m/Y') }}</td>
                  <td><a href="{{ asset('admin/order/vieworder/'.$item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Xem</a></td>
              </tr>
              @endforeach             
            </tbody>
          </table>
        </div>
    </div>
    </div>
  </div>
  {{ $order->links() }}
</div>

</section>

@endsection

