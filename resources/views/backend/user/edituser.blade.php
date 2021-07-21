@extends('backend.master')
@section('title','| Thêm danh mục sản phẩm')
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD CATEGORY
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" method="POST" action="" novalidate="novalidate">
                                    @csrf
                                    @include('error.note')
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên tài khoản</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ $user->name }}" id="name" name="name" type="text" required="">           
                                            @if (Session::has('name'))
                                            <span class='alert alert-danger' style="margin-left:15px !important;color:red">{{ Session::get('name') }}</span>
                                        @endif 
                                        </div>
                                    </div>                          
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{$user->email }}" id="email" name="email" type="email" required="">         
                                            @if (Session::has('email'))
                                            <span class='alert alert-danger' style="margin-left:15px !important;color:red">{{ Session::get('email') }}</span>  
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Mật khẩu</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="{{ $user->password }}" id="password" name="password" type="text" required="">           
                                        </div>
                                    </div>       
                                    <div class="form-group ">
                                        <label for="comfirm_password" class="control-label col-lg-3">Nhập Lại Mật khẩu</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="" id="confirm_password" name="confirm_password" type="text" required=""> 
                                            @if (Session::has('confirm_password'))
                                            <span class='alert alert-danger' style="margin-left:15px !important;color:red">{{ Session::get('confirm_password') }}</span>
                                        @endif              
                                        </div>
                                    </div>       
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button type="submit" class="btn btn-primary" type="submit">Update</button>
                                            <a href="{{ asset('admin/user') }}" class="btn btn-default" type="button">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
</section>
@endsection

