@extends('fontend.layout.master')
@section('title','Cart')
@section('main')
<div class="cart_wrapper">
    @include('fontend.components.showcart')
</div>

<div style="margin-bottom: 50px"></div>

@endsection
@section('js')
    <script src="{{ asset('public/fontend/js/addcart.js') }}"></script>
@endsection