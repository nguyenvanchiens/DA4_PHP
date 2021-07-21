<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($cates as $keycategory=>$item)
                <li class=" {{ $keycategory==0 ? 'active' : '' }}">
                    <a href="#category_tab_{{ $item->id }}" data-toggle="tab">{{ $item->name }}</a>
                </li>
            @endforeach
            
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($cates as $keyproduct=>$itemcate)
        <div class="tab-pane fade {{ $keyproduct==0?'active in' : '' }} " id="category_tab_{{ $itemcate->id }}" >
            @foreach ($itemcate->Product->take(4) as $product_item)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img style="width:200px;" src="{{ asset('public'.$product_item->image_path) }}" alt="" />
                            <h2 style="font-size: 20px">{{ number_format($product_item->price)}}vnđ</h2>
                            <p>{{ $product_item->name }}</p>
                            <a href="#" data-url="{{ asset('cart/addtocart/'.$product_item->id) }}" class="btn btn-default add-to-cart addcart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                        </div>              
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>