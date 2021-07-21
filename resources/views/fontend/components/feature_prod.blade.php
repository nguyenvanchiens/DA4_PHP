<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản Phẩm Hot</h2>
   @foreach ($feature_product as $item)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="width:250px" src="{{ asset('public'.$item->image_path) }}" alt="" />
                        <h2 style="font-size: 20px">{{ number_format($item->price) }} vnđ</h2>
                        <p>{{ $item->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Hàng</a>
                    </div>
                    <div class="product-overlay" style="opacity:0.9 !important">
                        <div class="overlay-content">
                            <h2>{{ number_format($item->price) }} vnđ</h2>
                          <p>{{ $item->name }}</p>
                            <a href="#" @if($item->quantity==0) disabled @endif data-url="{{ asset('cart/addtocart/'.$item->id) }}" class="btn btn-default add-to-cart addcart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                            <a href="{{ asset('productdetail/'.$item->slug.'/'.$item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Chi tiết</a>
                        </div>
                    </div>
            </div>
            
            </div>
        </div>
    @endforeach
</div><!--features_items-->
