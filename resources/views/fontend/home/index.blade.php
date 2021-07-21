@extends('fontend.layout.master')
@section('title','Home | Chien-Shopper')
@section('main')
@include('fontend.components.slider')
<section>
	<div class="container">
		<div class="row">
				@include('fontend.components.sidebar')
				<div class="col-sm-9 padding-right">
					<!--feature item-->
					@include('fontend.components.feature_prod')
					<!--end feature item-->

					<!--category-tab-->
					@include('fontend.components.category_tab')
					<!--/category-tab-->	

					<!--recommentded-->
					@include('fontend.components.recommended_item')
					<!--endrecommentded-->				
										
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js')
	
@endsection
