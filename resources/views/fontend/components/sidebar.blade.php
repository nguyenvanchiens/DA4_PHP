<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Loại Sản Phẩm</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			@foreach ($cates as $item)							
				<div class="panel panel-default">
					<div class="panel-heading">
						@if ($item->childs->count()>0)
						<h4 class="panel-title">
							<a href="{{ asset('categorydetail/'.$item->slug.'/'.$item->id) }}">{{ $item->name }}</a>
							<a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{ $item->id }}">
								<span class="badge pull-right">									
									<i class="fa fa-plus"></i>
									</span>
							</a>
						</h4>
						@else 
						<h4 class="panel-title">
						<a href="{{ asset('categorydetail/'.$item->slug.'/'.$item->id) }}">
							<span class="badge pull-right">									
								</span>
								{{ $item->name }}
						</a>
						</h4>
						@endif
					</div>
					<div id="sportswear_{{ $item->id }}" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								@foreach ($item->childs as $cate)
									<li><a href="{{ asset('categorydetail/'.$cate->slug.'/'.$cate->id) }}">{{ $cate->name }}</a></li>
								@endforeach								
							</ul>
						</div>
					</div>
				</div>
			@endforeach
		</div>	
		<div class="brands_products"><!--brands_products-->
			
		</div><!--/brands_products-->
		
		<div class="price-range"><!--price-range-->
			
		</div><!--/price-range-->
		
		<div class="shipping text-center"><!--shipping-->
			<img src="images/home/shipping.jpg" alt="">
		</div><!--/shipping-->
	
	</div>
</div>