<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 0965842998</a></li>
                            <li><a href="https://www.facebook.com/profile.php?id=100004895267775"><i class="fa fa-envelope"></i>Nguyễn chiến</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ asset('/') }}"><img src="images/home/logo.png" alt=""></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            
                        </div>
                        
                        <div class="btn-group">
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php 
                                $user = session()->get('customer_id');
                                $user_name = session()->get('customer_name');
                                if($user!=null){

                                
                            ?>
                                <li><a href="{{ asset('cart/checkout') }}"><i class="fas fa-shopping-basket"></i>Thanh toán</a></li>
                            <?php
                                } 
                                else {
                                    
                            ?>
                             <li><a href="{{ asset('login_checkout') }}"><i class="fas fa-shopping-basket"></i>Thanh toán</a></li>
                            <?php 
                                }
                            ?>
                            <li><a href="{{ asset('cart') }}"><i class="fa fa-shopping-cart"></i> Gió hàng</a></li>
                            <?php 
                                $user = session()->get('customer_id');
                                $user_name = session()->get('customer_name');
                                if($user!=null){

                                
                            ?>
                                <li><a href="{{ asset('logout_user') }}"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
                                <li class="parent_child" style="position: relative;">
                                    <a href="javascript:void(0)"><i class="far fa-user"></i><?php echo $user_name?></a>                                  
                                    <ul class="child_menu" style="">
                                        <li><a href="{{ asset('profile/'.$user) }}">Tài khoản của tôi</a></li>
                                        <li><a href="{{ asset('vieworder_customer/'.$user) }}">Đơn mua</a></li>
                                    </ul>
                                </li>
                               
                            <?php
                                } 
                                else {
                                    # code...
                            ?>
                             <li><a href="{{ asset('login_checkout') }}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                            <?php 
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!--mainmenu pull-->
                    @include('fontend.components.mainmenu')
                    <!--end mainmenu-->
                </div>
                <div class="col-sm-3">
                    <form action="{{ URL::to('search') }}" method="GET">
                        <div class="search_box pull-right">
                            <input style="background-image:none" type="text" name="name" placeholder="Tìm kiếm">
                            <button type="submit" class="btn btn-primay" style="margin-left:-2px">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->