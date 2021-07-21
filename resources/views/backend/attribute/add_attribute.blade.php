@extends('backend.master')
@section('title','| Thêm danh mục sản phẩm')
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD ATTRIBUTES
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" method="POST" action="" novalidate="novalidate">
                                    @csrf
                                    @include('error.note')
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Name</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="" id="name" name="name" minlength="2" type="text" required="">           
                                        </div>
                                    </div>                                
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button type="submit" class="btn btn-primary" type="submit">ADD</button>
                                            <a href="{{ asset('admin/category') }}" class="btn btn-default" type="button">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
</section>
@endsection
