<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>ADMIN @yield('title')</title>
<base href="{{ asset('public/backend') }}/">
<base src="{{ asset('public/backend') }}/">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"> <!--linh dẫn đến fontawesome để lấy đường dẫn các icon-->
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">

@yield('css')
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{ asset('admin') }}" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
   
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
       
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username">{{ Auth::user()->name }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{ asset('logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->     
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{ asset('admin') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh Sách</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ asset('admin/category') }}"><i class="fas fa-apple-alt"></i> Danh sách loại sản phẩm</a></li>
                        <li><a href="{{ asset('admin/product') }}"><i class="fas fa-asterisk"></i> Danh sách sản phẩm</a></li>
                        <li><a href="{{ asset('admin/user') }}"><i class="fas fa-users"></i> Quản lý user</a></li>
                        <li><a href="{{ asset('admin/slide') }}"><i class="fas fa-users"></i> Slide</a></li>
                        <li><a href="{{ asset('admin/setting') }}"><i class="fas fa-hammer"></i> Setting</a></li>
                         <li><a href="{{ asset('admin/footer') }}"><i class="fas fa-sort-amount-up-alt"></i> Footer</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-sort-amount-up-alt"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ asset('admin/order') }}"><i class="fas fa-sort-amount-up-alt"></i>Đơn hàng chưa xác thực</a></li>
                        <li><a href="{{ asset('admin/order/assigned') }}"><i class="fas fa-check"></i>Danh sách đơn hàng xác thực</a></li>
                        <li><a href="{{ asset('admin/order/showdelevery') }}"><i class="fas fa-car"></i>Danh sách đơn hàng đang giao</a></li>
                        <li><a href="{{ asset('admin/order/view_order_succes') }}"><i class="far fa-bell"></i>Danh sách đơn hàng thành công</a></li>
                        <li><a href="{{ asset('admin/order/view_order_deleted') }}"><i class="fas fa-ban"></i>Danh sách đơn hàng bị hủy</a></li>
                        <li><a href="{{ asset('admin/order/statistical') }}"><i class="fab fa-buffer"></i>Thống kê doanh thu</a></li>
                    </ul>
                </li>
            </ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
@yield('main')

</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
@yield('js')
<script src="js/Statistical.js"></script>
<!-- morris JavaScript -->	
<script>
$(document).ready(function() {
//BOX BUTTON SHOW AND CLOSE
jQuery('.small-graph-box').hover(function() {
  jQuery(this).find('.box-button').fadeIn('fast');
}, function() {
  jQuery(this).find('.box-button').fadeOut('fast');
});
jQuery('.small-graph-box .box-close').click(function() {
  jQuery(this).closest('.small-graph-box').fadeOut(200);
  return false;
});

//CHARTS
function gd(year, day, month) {
    return new Date(year, month - 1, day).getTime();
}

graphArea2 = Morris.Area({
    element: 'hero-area',
    padding: 10,
behaveLikeLine: true,
gridEnabled: false,
gridLineColor: '#dddddd',
axes: true,
resize: true,
smooth:true,
pointSize: 0,
lineWidth: 0,
fillOpacity:0.85,
    data: [
        {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
        {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
        {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
        {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
        {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
        {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
        {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
        {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
        {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
    
    ],
    lineColors:['#eb6f6f','#926383','#eb6f6f'],
    xkey: 'period',
    redraw: true,
    ykeys: ['iphone', 'ipad', 'itouch'],
    labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
    pointSize: 2,
    hideHover: 'auto',
    resize: true
});


});
</script>
<!-- calendar -->
<script type="text/javascript" src="js/monthly.js"></script>
<script type="text/javascript">
$(window).load( function() {

    $('#mycalendar').monthly({
        mode: 'event',
        
    });

    $('#mycalendar2').monthly({
        mode: 'picker',
        target: '#mytarget',
        setWidth: '250px',
        startHidden: true,
        showTrigger: '#mytarget',
        stylePast: true,
        disablePast: true
    });

switch(window.location.protocol) {
case 'http:':
case 'https:':
// running on a server, should be good.
break;
case 'file:':
alert('Just a heads-up, events will not work when run locally.');
}

});
</script>
<script>
    $('#calendar').datepicker({
    });
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    });
    function changeImg(input){
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if(input.files && input.files[0]){
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e){
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#avatar').click(function(){
            $('#img').click();
        });
    });
</script>	

<!-- //calendar -->
</body>
</html>