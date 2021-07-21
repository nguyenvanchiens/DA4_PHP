function revenueByDay(event){
    event.preventDefault();
    let total = $('.totalPrice');
    let profit = $('.profit');
    let data = $(this).data('url');
    let dollarUSLocale  = Intl.NumberFormat('en-US');
    $.ajax({
        type:"GET",
        url:data,
        dataType:'json',
        success:function(res){
            if(res.code==200){
                total.html('Tổng doanh thu kiếm được theo ngày: '+dollarUSLocale .format(res.total)+' vnđ');
                profit.html('Tổng lợi nhuận kiếm được theo ngày: '+dollarUSLocale .format(res.profit)+' vnđ');
            }
        },error:function(){
            console.log('lỗi');
        }
    });
}

function revenueByYear(event){
    event.preventDefault();
    let total = $('.totalPrice');
    let profit = $('.profit');
    let data = $(this).data('url');
    let dollarUSLocale  = Intl.NumberFormat('en-US');
    $.ajax({
        type:"GET",
        url:data,
        dataType:'json',
        success:function(res){
            if(res.code==200){
                total.html('Tổng doanh thu kiếm được theo năm: '+dollarUSLocale .format(res.total)+' vnđ');
                profit.html('Tổng lợi nhuận kiếm được theo năm: '+dollarUSLocale .format(res.profit)+' vnđ');
            }
        },error:function(){
            console.log('lỗi');
        }
    });
}
function revenueByMonth(event){
    event.preventDefault();
    let total = $('.totalPrice');
    let profit = $('.profit');
    let data = $(this).data('url');
    let dollarUSLocale  = Intl.NumberFormat('en-US');
    $.ajax({
        type:"GET",
        url:data,
        dataType:'json',
        success:function(res){
            if(res.code==200){
                total.html('Tổng doanh thu kiếm được theo tháng: '+dollarUSLocale .format(res.total)+' vnđ');
                profit.html('Tổng lợi nhuận kiếm được theo tháng: '+dollarUSLocale .format(res.profit)+' vnđ');
            }
        },error:function(){
            console.log('lỗi');
        }
    });
}
function Calculatorevenue(event){
    event.preventDefault();
    let total = $('.totalPrice');
    let profit = $('.profit');
    let date_from = $('.date_from').val();
    let date_to = $('.date_to').val();
    let data_url = $(this).data('url');
    let dollarUSLocale  = Intl.NumberFormat('en-US');
    $.ajax({
        type:"GET",
        url:data_url,
        data:{'date_from':date_from,'date_to':date_to},
        success:function(data){
            if(data.code==200){
                total.html('Tổng doanh thu kiếm : '+dollarUSLocale .format(data.total)+' vnđ');
                profit.html('Tổng lợi nhuận kiếm : '+dollarUSLocale .format(data.profit)+' vnđ');
            }
        },error(){
            alert('lỗi');
        }
    })
}
$(function(){
    $('.revenueByDay').on('click',revenueByDay);
    $('.revenueByYear').on('click',revenueByYear);
    $('.revenueByMonth').on('click',revenueByMonth);
    $('.Calculatorevenue').on('click',Calculatorevenue);
});