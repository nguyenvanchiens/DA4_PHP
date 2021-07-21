<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản Phẩm Đề Xuất</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
                @foreach ($recomments as $key=>$item)   
                @if ($key%3==0)
                <div class="item {{ $key==0 ? 'active':'' }}">	
                @endif          
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img style="width:200px;height:220px" src="{{ asset('public'.$item->image_path) }}" alt="" />
                                <h2 style="font-size: 20px">{{ number_format($item->price) }}vnđ</h2>
                                <p>{{ $item->name }}</p>
                                <a href="#" data-url="{{ asset('cart/addtocart/'.$item->id) }}" class="btn btn-default add-to-cart addcart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                            </div>                      
                        </div>
                    </div>
                </div>
                @if ($key%3==2)
                    </div>
                @endif   
                    
                @endforeach	
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->