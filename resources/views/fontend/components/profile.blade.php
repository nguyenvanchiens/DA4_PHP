@extends('fontend.layout.master')
@section('main')
<div class="cart_wrapper">
    <div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Profile</li>
        </ol>
    </div>  
</div>
<div class="container">
    
    <div class="row">
        @include('fontend.components.sidebar')
        <div class="col-md-9">
            <div class="group_profile">
                <div class="header">
                    <h3 class="text-center" style="text-transform: uppercase;color:#FE980F">Hồ Sơ Của Tôi</h3>
                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                </div>
                <div class="body">
                    <form action="{{ URL::to('profile/'.$customer->id) }}" method="POST">
                        @csrf
                        <div class="group_form">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" class="form-control" disabled name="phone" value="{{ $customer->email }}" id="">
                        </div>
                        <div class="group_form">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" name="name" value="{{ $customer->name }}" id="">
                        </div>
                        <div class="group_form">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" id="">
                        </div>
                        <div class="group_form">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{ $customer->address }}" id="">
                        </div>
                        <div class="group_form">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>      
    </div>
    
</div>

@endsection
