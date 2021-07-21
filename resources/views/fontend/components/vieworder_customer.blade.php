@extends('fontend.layout.master')
@section('main')
<div class="container">
     @include('fontend.components.sidebar')
    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs" style="background-color: #F5F5F5;border-bottom:none">
                    <li class=" active">
                        <a href="#category_tab_1" data-toggle="tab">Tất Cả</a>
                    </li>
                    <li class=" ">
                        <a href="#category_tab_2" data-toggle="tab">Chờ xác nhận</a>
                    </li>
                    <li class=" ">
                        <a href="#category_tab_3" data-toggle="tab">Chờ lấy hàng</a>
                    </li>
                    <li class=" ">
                        <a href="#category_tab_4" data-toggle="tab">Đang giao</a>
                    </li>
                    <li class=" ">
                        <a href="#category_tab_5" data-toggle="tab">Đã giao</a>
                    </li>
                    <li class=" ">
                        <a href="#category_tab_6" data-toggle="tab">Đã hủy</a>
                    </li>
                            
            </ul>
        </div>
        <div class="tab-content">
            <div style="padding: 15px" class="tab-pane fade active in " id="category_tab_1">     
                @foreach ($success as $item)                                            
                <div class="group_order">
                    <div class="order_status" >
                        <div class="detail">
                            <p>đơn hàng số {{ $item->id }}</p>
                        </div>
                        <div class="staus">
                            <p>Hoàn thành</p>
                        </div>
                    </div>
                    <?php $total = 0?>
                    @foreach ($item->child_order as $sp)   
                    <?php $total += $sp->quantity*$sp->price?>                                     
                        <div class="order" style="margin-bottom: 20px;">
                            <div class="group_product">
                                <div class="image">
                                    <img src="{{ asset('public'.$sp->parentProduct->image_path) }}" alt="">
                                </div>
                                <div class="content" style="margin-left: 10px">
                                    <p>{{ $sp->parentProduct->name }}</p>
                                    <p>x {{ $sp->quantity }}</p>
                                </div>
                            </div>
                            <div class="group_price" style="height: 100%;
                            line-height: 60px;">
                                <span style="font-size: 18px">{{ number_format($sp->price) }}vnđ</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="group_total">
                        <p>Số tiền phải trả: <?php echo number_format($total)?>vnđ</p>
                    </div>
                    <div class="speach">

                    </div>
                    <div class="group_handling">
                        <div class="group_button">
                            <button class="btn btn-danger" disabled>Đã thành công</button>
                            <a href="{{ asset('repurchase/'.$item->id) }}" class="btn btn-success">Mua lại</a>
                        </div>
                    </div>
                </div>
                <div class="cleafix" style="background-color: white;
                height: 60px;"></div>   
                @endforeach                                          
            </div>
            <div style="padding: 15px" class="tab-pane fade " id="category_tab_2">
                @foreach ($Ordernotconfirmed as $item)                                            
                <div class="group_order">
                    <div class="order_status" >
                        <div class="detail">
                            <p>đơn hàng số {{ $item->id }}</p>
                        </div>
                        <div class="staus">
                            <p>chưa xác nhận</p>
                        </div>
                    </div>
                    <?php $total = 0?>
                    @foreach ($item->child_order as $sp)   
                    <?php $total += $sp->quantity*$sp->price?>                                     
                        <div class="order" style="margin-bottom: 20px;">
                            <div class="group_product">
                                <div class="image">
                                    <img src="{{ asset('public'.$sp->parentProduct->image_path) }}" alt="">
                                </div>
                                <div class="content" style="margin-left: 10px">
                                    <p>{{ $sp->parentProduct->name }}</p>
                                    <p>x {{ $sp->quantity }}</p>
                                </div>
                            </div>
                            <div class="group_price" style="height: 100%;
                            line-height: 60px;">
                                <span style="font-size: 18px">{{ number_format($sp->price) }}vnđ</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="group_total">
                        <p>Số tiền phải trả: <?php echo number_format($total)?>vnđ</p>
                    </div>
                    <div class="speach">

                    </div>
                    <div class="group_handling">
                        <div class="group_button">
                            <button class="btn btn-danger" disabled>Đang xử lý...</button>
                            <a href="{{ asset('delete_order/'.$item->id) }}" class="btn btn-success">Hủy Đơn</a>
                        </div>
                    </div>
                </div>
                <div class="cleafix" style="background-color: white;
                height: 60px;"></div>   
                @endforeach 
            </div>
            <div style="padding: 15px" class="tab-pane fade  " id="category_tab_3">
                @foreach ($Orderconfirmed as $item)                                            
                <div class="group_order">
                    <div class="order_status" >
                        <div class="detail">
                            <p>đơn hàng số {{ $item->id }}</p>
                        </div>
                        <div class="staus">
                            <p>chờ lấy hàng</p>
                        </div>
                    </div>
                    <?php $total = 0?>
                    @foreach ($item->child_order as $sp)   
                    <?php $total += $sp->quantity*$sp->price?>                                     
                        <div class="order" style="margin-bottom: 20px;">
                            <div class="group_product">
                                <div class="image">
                                    <img src="{{ asset('public'.$sp->parentProduct->image_path) }}" alt="">
                                </div>
                                <div class="content" style="margin-left: 10px">
                                    <p>{{ $sp->parentProduct->name }}</p>
                                    <p>x {{ $sp->quantity }}</p>
                                </div>
                            </div>
                            <div class="group_price" style="height: 100%;
                            line-height: 60px;">
                                <span style="font-size: 18px">{{ number_format($sp->price) }}vnđ</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="group_total">
                        <p>Số tiền phải trả: <?php echo number_format($total)?>vnđ</p>
                    </div>
                    <div class="speach">

                    </div>
                    <div class="group_handling">
                        <div class="group_button">
                            <button class="btn btn-danger" disabled>Đang Lấy hàng...</button>
                            <a href="{{ asset('delete_order/'.$item->id) }}" class="btn btn-success">Hủy Đơn</a>
                        </div>
                    </div>
                </div>
                <div class="cleafix" style="background-color: white;
                height: 60px;"></div>   
                @endforeach 
            </div>
            <div style="padding: 15px" class="tab-pane fade  " id="category_tab_4">
                @foreach ($delivery as $item)                                            
                <div class="group_order">
                    <div class="order_status" >
                        <div class="detail">
                            <p>đơn hàng số {{ $item->id }}</p>
                        </div>
                        <div class="staus">
                            <p>Đang giao</p>
                        </div>
                    </div>
                    <?php $total = 0?>
                    @foreach ($item->child_order as $sp)   
                    <?php $total += $sp->quantity*$sp->price?>                                     
                        <div class="order" style="margin-bottom: 20px;">
                            <div class="group_product">
                                <div class="image">
                                    <img src="{{ asset('public'.$sp->parentProduct->image_path) }}" alt="">
                                </div>
                                <div class="content" style="margin-left: 10px">
                                    <p>{{ $sp->parentProduct->name }}</p>
                                    <p>x {{ $sp->quantity }}</p>
                                </div>
                            </div>
                            <div class="group_price" style="height: 100%;
                            line-height: 60px;">
                                <span style="font-size: 18px">{{ number_format($sp->price) }}vnđ</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="group_total">
                        <p>Số tiền phải trả: <?php echo number_format($total)?>vnđ</p>
                    </div>
                    <div class="speach">

                    </div>
                    <div class="group_handling">
                        <div class="group_button">
                            <button class="btn btn-danger" disabled>Đang giao...</button>
                            
                        </div>
                    </div>
                </div>
                <div class="cleafix" style="background-color: white;
                height: 60px;"></div>   
                @endforeach 
            </div>
            <div style="padding: 15px" class="tab-pane fade  " id="category_tab_5">
                @foreach ($success as $item)                                            
                <div class="group_order">
                    <div class="order_status" >
                        <div class="detail">
                            <p>đơn hàng số {{ $item->id }}</p>
                        </div>
                        <div class="staus">
                            <p>Đã giao thành công</p>
                        </div>
                    </div>
                    <?php $total = 0?>
                    @foreach ($item->child_order as $sp)   
                    <?php $total += $sp->quantity*$sp->price?>                                     
                        <div class="order" style="margin-bottom: 20px;">
                            <div class="group_product">
                                <div class="image">
                                    <img src="{{ asset('public'.$sp->parentProduct->image_path) }}" alt="">
                                </div>
                                <div class="content" style="margin-left: 10px">
                                    <p>{{ $sp->parentProduct->name }}</p>
                                    <p>x {{ $sp->quantity }}</p>
                                </div>
                            </div>
                            <div class="group_price" style="height: 100%;
                            line-height: 60px;">
                                <span style="font-size: 18px">{{ number_format($sp->price) }}vnđ</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="group_total">
                        <p>Số tiền phải trả: <?php echo number_format($total)?>vnđ</p>
                    </div>
                    <div class="speach">

                    </div>
                    <div class="group_handling">
                        <div class="group_button">
                            <button class="btn btn-danger" disabled>Đã giao...</button>
                            <a href="{{ asset('repurchase/'.$item->id) }}" class="btn btn-success">Mua lại</a>
                        </div>
                    </div>
                </div>
                <div class="cleafix" style="background-color: white;
                height: 60px;"></div>   
                @endforeach 
            </div>
            <div style="padding: 15px" class="tab-pane fade  " id="category_tab_6">
                @foreach ($deleted as $item)                                            
                <div class="group_order">
                    <div class="order_status" >
                        <div class="detail">
                            <p>đơn hàng số {{ $item->id }}</p>
                        </div>
                        <div class="staus">
                            <p>Đã hủy</p>
                        </div>
                    </div>
                    <?php $total = 0?>
                    @foreach ($item->child_order as $sp)   
                    <?php $total += $sp->quantity*$sp->price?>                                     
                        <div class="order" style="margin-bottom: 20px;">
                            <div class="group_product">
                                <div class="image">
                                    <img src="{{ asset('public'.$sp->parentProduct->image_path) }}" alt="">
                                </div>
                                <div class="content" style="margin-left: 10px">
                                    <p>{{ $sp->parentProduct->name }}</p>
                                    <p>x {{ $sp->quantity }}</p>
                                </div>
                            </div>
                            <div class="group_price" style="height: 100%;
                            line-height: 60px;">
                                <span style="font-size: 18px">{{ number_format($sp->price) }}vnđ</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="group_total">
                        <p>Số tiền phải trả: <?php echo number_format($total)?>vnđ</p>
                    </div>
                    <div class="speach">

                    </div>
                    <div class="group_handling">
                        <div class="group_button">
                            <button class="btn btn-danger" disabled>Đã Hủy...</button>
                            <a href="{{ asset('repurchase/'.$item->id) }}" class="btn btn-success">Mua lại</a>
                        </div>
                    </div>
                </div>
                <div class="cleafix" style="background-color: white;
                height: 60px;"></div>   
                @endforeach 
            </div>
        </div>
    </div>
</div>
   
@endsection