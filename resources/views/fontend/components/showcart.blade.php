<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Giỏ hàng</li>
        </ol>
    </div>
    @if (isset($cart))  
    <div style="border: 1px solid #E6E4DF;" class="table-responsive cart_info">
        <table class="table table-condensed update_cart" >
            <thead>
                <tr class="cart_menu" style="background: #FE980F;padding:20px;color:white">
                    <td style="padding: 15px" class="image text-center">Stt</td>
                    <td class="description" style="text-align: center">Tên</td>
                    <td style="padding: 15px" class="image">Hình ảnh</td>                  
                    <td class="price">Giá (vnđ)</td>
                    <td class="quantity ">Số lượng</td>
                    <td class="total">Tổng tiền (vnđ)</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0;$stt=0; ?>
                @if (isset($cart))
                @foreach ($cart as $id=>$item)
                <?php 
                    $total+= $item->prod_quantity*$item->prod_price;
                    $stt+=1;
                ?>
                <tr>
                    <td style="text-align: center"><?php echo $stt?></td>
                   
                    <td class="text-center">                      
                        <h4>{{ $item->prod_name }}</h4>
                    </td>
                    <td class="cart_description">
                        <a href=""><img style="width:100px" src="{{ asset('public'.$item->prod_image) }}" alt=""></a>
                    </td>
                   
                    <td class="cart_price">
                        <p>{{ number_format($item->prod_price) }}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <input class="cart_quantity_input quantity_cart" type="number" min="1" name="quantity" value="{{ $item->prod_quantity }}" size="2">
                            <input type="hidden" name="product_id" class="product_id" value="{{ $item->prod_quantity }}">
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">{{ number_format($item->prod_quantity*$item->prod_price) }}</p>
                    </td>
                    <td class="">
                        <a class="btn upadte_cart" data-url="{{ asset('cart/updatecart') }}" data-id="{{ $item->id }}" style="background-color: blue;color:white;border-radius:5px" href="#">Cập nhật</a>
                        <a class="btn delete_cart" data-url="{{ asset('cart/deletecart') }}" data-id="{{ $item->id }}" style="background-color: red;color:white" href="#"><i class="fas fa-trash-alt"></i></a>         
                    </td>
                </tr>
            @endforeach
                @endif              
            </tbody>            
        </table>
            <a href="{{ asset('/') }}" class="btn btn-primary">Mua Thêm</a>
            <a href="{{ asset('login_checkout') }}" class="btn btn-primary">Thanh toán</a>
            <h3 style="float:right;color:red">Tổng tiền: <span style="color: black;margin-right: 50px;"><?php echo number_format($total)?> vnđ</span></h3>
    </div>
    @else
        <h3>không có sản phẩm nào trong giỏ hàng</h3>
    @endif

</div>