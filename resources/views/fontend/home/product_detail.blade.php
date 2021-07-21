@extends('fontend.layout.master')
@section('title','Danh sách loại sản phẩm')
@section('main')
<section>
    <div class="container">
        <div class="row">
            @include('fontend.components.sidebar')
            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ asset('public'.$prod_detail->image_path) }}" alt="">
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">                           
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @if ($prod_detail->child_Image->count()>0)
                                            @foreach ($prod_detail->child_Image as $key=>$item)
                                                @if ($key%3==0)
                                                    <div class="item {{ $key==0?'active':'' }}">    
                                                @endif                                          
                                                    <a href=""><img style="width:80px;" src="{{ asset('public'.$item->name_image) }}" alt=""></a>
                                                @if ($key%3==2)
                                                    </div>    
                                                @endif                                                                                               
                                            @endforeach                                                                 
                                    @endif                                    
                                   
                                </div>
                              <!-- Controls -->
                              @if ($prod_detail->child_Image->count()>3)
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                              @endif                             
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="">
                            <h2>{{ $prod_detail->name }}</h2>
                            <p>Web ID: {{ $prod_detail->id }}</p>
                            <img src="images/product-details/rating.png" alt="">
                            <span>
                                    <span style="font-size: 20px">{{ number_format($prod_detail->price) }} vnđ</span>
                                    <input type="hidden" name="id" class="id_prod" value="{{ $prod_detail->id }}">
                                    <label>Quantity:</label>
                                    <input type="text" name="quantity" class="quantity" value="1">
                                    <a href="#"  @if($prod_detail->quantity==0) disabled @endif data-url="{{ asset('cart/add_cart_detail') }}" class="btn btn-fefault add_cart_detail cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Mua Hàng
                                    </a>   
                                    
                                    
                                    <div id="not_product">
                                       
                                    </div>                   
                            </span>
                            <p><b>sản phẩm còn lại:({{ $prod_detail->quantity }})</b></p>
                            <p><b>Sản phẩm đã bán:(
                                <?php $count=0?>
                                @foreach ($prod_detail->sell_count as $item)
                                    <?php 
                                        if($item->sell_product->payment==1){
                                            $count+=$item->quantity;
                                        }
                                    ?>
                                @endforeach
                                <?php echo $count ?>
                                )</b></p>
                            <p><b>Color:</b>@foreach ($prod_detail->get_child_attribute as $item_color)
                                @if ($item_color->parent_attributes->attri_id==1)
                                    {{ $item_color->parent_attributes->values.',' }}
                                @endif
                                
                            @endforeach</p>
                            <p><b>Size:</b>
                                @foreach ($prod_detail->get_child_attribute as $item_color)
                                @if ($item_color->parent_attributes->attri_id==2)
                                    {{ $item_color->parent_attributes->values.',' }}
                                @endif
                                
                            @endforeach
                            </p>
                            <p><b>Brand:</b> E-SHOPPER</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
                        </div><!--/product-information-->
                    </div>
                </div>
                
                <div class="category-tab">
                    <div class="col-sm-12">
                        <h3 class="title text-center" style="color: orange">Sản phẩm liên quan</h3>
                    </div>
                    @if (isset($product_relationship))
                    <div class="tab-content">
                        <div class="tab-pane fade active in">
                            @foreach ($product_relationship as $item)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img style="width:200px;height:250px" src="{{ asset('public'.$item->image_path) }}" alt="">
                                            <h2 style="font-size: 20px">{{ number_format($item->price) }}vnđ</h2>
                                            <p>{{ $item->name }}</p>
                                            <a href="#" data-url="{{ asset('cart/addtocart/'.$item->id) }}" class="btn btn-default add-to-cart addcart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                                        </div>              
                                    </div>
                                </div>
                            </div>             
                            @endforeach                                                       
                        </div>
                    </div>
                    @endif
               
                <div style="margin-bottom: 100px"></div>
                
            </div>
        </div>
    </div>
</section>
@endsection
