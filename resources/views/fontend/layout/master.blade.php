<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="{{ asset('public/fontend') }}/">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"> <!--linh dẫn đến fontawesome để lấy đường dẫn các icon-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head><!--/head-->

<body style="">

	@include('fontend.components.header')
	
									
	@yield('main')
			
	
	@include('fontend.components.footer')
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="js/addcart.js"></script>
	@yield('js')

<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="fa fa-angle-up"></i></a>
<div class="addsuccess">
    <span>thêm sản phẩm thành công</span>
</div>
{{--  <div class="addfalse">
    <span>thêm sản phẩm thành công</span>
</div>  --}}
<div class="deletesucces">
    <span>xóa sản phẩm thành công</span>
</div>

</body>
</html>