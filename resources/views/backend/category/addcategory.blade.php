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
                            ADD CATEGORY
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
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">slug</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="" id="slug" name="slug" minlength="2" type="text" required="">           
                                        </div>
                                    </div>                                                            
                                    <div class="form-group">
                                        <label for="" class="control-label col-lg-3">Danh mục cha:</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="parent_id" id="">
                                                <option value="0">ROOT</option>
                                                <?php showCategory($cate) ?>
                                            </select>
                                        </div>                                       
                                    </div>    
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Status</label>
                                        <div class="col-lg-6" style="margin-top: 6px;">
                                            có: <input type="radio" name="status" id="" value="1">
                                            không: <input type="radio" name="status" id="" value="0">
                                            @if (Session::has('status'))
                                                <span class='alert alert-danger' style="margin-left:15px !important;color:red">{{ Session::get('status') }}</span>
                                            @endif
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

<?php
    function showCategory($categories,$parent_id=0,$char=''){
        foreach ($categories as $key => $item) {
            if($item->parent_id==$parent_id){
                echo '<option value="'.$item->id.'">'.$char.$item->name.'</option>';
                unset($categories[$key]);
                showCategory($categories, $item->id, $char.' ---');
            }
        }
    }
?>

@section('js')
    <script src="{{ asset('public/backend/js/slug.js') }}"></script>
@endsection