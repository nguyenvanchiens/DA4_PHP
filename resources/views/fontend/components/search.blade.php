@extends('fontend.layout.master')
@section('title','Danh sách loại sản phẩm')
@section('main')
<div class="container">
    <div class="row">
        @include('fontend.components.sidebar')
    <div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Tìm kiếm:{{ $name_search }}</h2>
        @foreach ($prod as $item)                   
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="height: 290px" src="{{ asset('public'.$item->image_path) }}" alt="">
                        <h2>{{ number_format($item->price) }}</h2>
                        <p>{{ $item->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Hàng</a>
                    </div>
                    <div class="product-overlay" style="  opacity: 0.9 !important;">
                        <div class="overlay-content">
                            <h2>{{ number_format($item->price) }}</h2>
                            <p>{{ $item->name }}</p>
                            <a href="#" data-url="{{ asset('cart/addtocart/'.$item->id) }}" @if($item->quantity==0) disabled @endif class="btn btn-default add-to-cart addcart"><i class="fa fa-shopping-cart"></i>Mua Hàng</a>
                            <a href="{{ asset('productdetail/'.$item->slug.'/'.$item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        <div style="text-align: center">
            
        </div>
        
    </div><!--features_items-->
</div>
    </div>
</div>
@endsection