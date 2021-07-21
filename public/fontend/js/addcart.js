function addToCart(event){
    event.preventDefault();
    let urlData = $(this).data('url');
    $.ajax({
        type:"GET",
        url:urlData,
        dataType:'json',
        success:function($data){
            if($data.code==200){
                var span = $(".addsuccess");
                        setTimeout(function () {
                            span.css('display','block');
                        }, 100);
                        setTimeout(function () {
                            span.css('display','none');
                        }, 2000);
            }
            else if($data.code==201){
                window.location.href = "http://localhost/Fashion_shop/login_checkout";
            }
            else{
                alert('bạn đã mua quá số lượng hàng còn lại rồi');
            }
        },error:function(){
            console.log('lỗi');
        }
    });
};
function UpdateCart(event){
    event.preventDefault();
    let urlData = $(this).data('url');
    let idcart = $(this).data('id');
    let quantity = $(this).parents('tr').find('input.quantity_cart').val();
    $.ajax({
        Type:"GET",
        url:urlData,
        data:{idcart:idcart,quantity:quantity},
        success:function(data){
            if(data.code===200){
                $('.cart_wrapper').html(data.cart_component);
                location.reload();
            }
            // else{
            //     alert('bạn đã mua quá số lượng hàng còn lại rồi');
            //     location.reload();
            // }

        },error:function(){
            console.log('lỗi');
        }
    });
}
function deleteCart(event){
    event.preventDefault();
    let urlData = $(this).data('url');
    let id = $(this).data('id');
    $.ajax({
        Type:'GET',
        url:urlData,
        data:{'id':id},
        success:function(data){
            if(data.code==200){
                if(data.code===200){
                    var span = $(".deletesucces");
                        setTimeout(function () {
                            span.css('display','block');
                        }, 100);
                        setTimeout(function () {
                            span.css('display','none');
                        }, 2000);
                    $('.cart_wrapper').html(data.cart_component);
                    setTimeout(function () {
                        location.reload();
                    }, 300);
                }
            }
        },error:function(){
            console.log('lỗi');
        }
    });
}
function addCartDetail(event){
    event.preventDefault();
    let id = $('.id_prod').val();
    let quantity = $('.quantity').val();
    let urlData = $(this).data('url');
    let message = $('#not_product');
    let html ='<span style="color:red;font-size: 17px;">Sản phẩm không đủ số lượng mất rồi</span>';
    $.ajax({
        Type:'GET',
        url:urlData,
        data:{'id':id,'quantity':quantity},
        success:function(data){

            if(data.code==200){
                var span = $(".addsuccess");
                        setTimeout(function () {
                            span.css('display','block');
                        }, 100);
                        setTimeout(function () {
                            span.css('display','none');
                        }, 2000);
                        window.location.href = "http://localhost/Fashion_shop/cart";
            }
            else if(data.code==201){
                window.location.href = "http://localhost/Fashion_shop/login_checkout";
            }
            else{
                alert('bạn đã mua quá số lượng hàng còn lại rồi');
            }
        },error:function(){

        }
    });
}
$(function(){
    $('.addcart').on('click',addToCart);
    $('.upadte_cart').on('click',UpdateCart);
    $('.delete_cart').on('click',deleteCart);
    $('.add_cart_detail').on('click',addCartDetail);
});
