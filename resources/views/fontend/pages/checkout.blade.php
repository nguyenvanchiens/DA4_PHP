@extends('fontend.layout.master')
@section('main')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Thanh toán</li>
            </ol>
        </div><!--/breadcrums-->
        

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Địa chỉ khách hàng</p>
                        <form action="{{ URL::to('cart/payment') }}" method="POST">
                            @csrf
                            <input type="text" value="{{ $customer->name }}" name="name" required placeholder="Tên khách hàng">
                            <input type="email" value="{{ $customer->email }}" name="email" required placeholder="Email khách hàng">
                            <input type="text" value="{{ $customer->phone }}" name="phone" required placeholder="Phone Khách hàng">
                            <input type="text" value="{{ $customer->address }}" name="address" required placeholder="Địa chỉ khách hàng">
                            <button type="submit" class="btn btn-primary">Mua Hàng</button>
                        </form>
                      
                    </div>
                    <div style="font-size: 12px;padding: 0 !important;margin-top: 20px;margin-left: -16px;">
                        @include('error.note')
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Ghi chú</p>
                        <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                    </div>	
                </div>
                <div class="col-sm-5">
                    <div class="shopper-info">
                        <p>Thông tin đơn hàng</p>
                        @if (isset($cart))
                        <div style="border: 1px solid #E6E4DF;" class="table-responsive cart_info">
                            <table class="table table-condensed update_cart">
                                <thead>
                                    <tr class="cart_menu text-center" style="background: #FE980F;padding:20px;color:white">
                                        <td style="padding: 15px" class="image">Hình ảnh</td>
                                        <td class="description">Tên</td>
                                        <td class="price">Giá</td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="total">Tổng tiền</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>   
                                    
                                    <?php $total =0 ?>
                                    @foreach ($cart as $item)
                                        <?php $total+=$item->prod_quantity*$item->prod_price ;?>
                                        <tr class="text-center">
                                              <td><img style="width:100px" src="{{ asset('public'.$item->prod_image) }}" alt=""></td>
                                              <td>{{ $item->prod_name }}</td>
                                              <td>{{ $item->prod_price }}</td>
                                              <td>{{ $item->prod_quantity }}</td>
                                              <td>{{ $item->prod_quantity*$item->prod_price }}</td>
                                        </tr> 
                                    @endforeach                                                                                                                                                                                             
                                </tbody>            
                            </table>
                            <h3 style="float:right;color:red">Tổng tiền: <span style="color: black;margin-right: 50px;"><?php echo number_format($total)?> vnđ</span></h3>
                        </div>
                        @else
                            <h2>giỏ hàng trống</h2>
                        @endif
                    </div>
                </div>					
            </div>
        </div>
        <div class="review-payment">
            <h2>xem lại giỏ hàng hoặc cập nhật &amp; tại đây <a href="{{ asset('cart') }}">Giỏ hàng</a> </h2>
        </div>
    </div>
</section>
@endsection