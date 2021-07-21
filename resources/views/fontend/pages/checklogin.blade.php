@extends('fontend.layout.master')
@section('main')
    <section style="margin-top: 100px" id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập bằng tài khoản</h2>
                    <div style="margin-left: -17px;margin-bottom: 16px;">
                        @include('error.note')
                    </div>
                    <form action="{{ URL::to('login_user') }}" method="POST">
                        
                        @csrf
                        <input type="email" name="email" placeholder="Tài Khoản">
                        <input type="password" name="password" placeholder="Mật Khẩu">
                        <button type="submit" class="btn btn-default">Đăng Nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng Ký Tài Khoản Mới!</h2>
                    <form action="{{ URL::to('/add_customer') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Tên">
                        <input type="email" name="email" placeholder="Email">
                        <span class="text-danger">
                            @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                        </span>                     
                        <input type="password" name="password" placeholder="Mật Khẩu">
                        <button type="submit" class="btn btn-default">Đăng Ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section>
@endsection
