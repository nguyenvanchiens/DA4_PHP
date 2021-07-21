@extends('backend.master')
@section('title','| Thêm danh mục Setting')
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD SETTING
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
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">config key</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" value="" id="name" name="config_key" minlength="2" type="text" required="">           
                                            @if ($errors->has('config_key'))
                                                <span class="text-danger">{{ $errors->first('config_key') }}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">config value</label>
                                        <div class="col-lg-6">
                                            @if (request()->type==='text')                                                                                            
                                                <input class="form-control" value="" id="config_value" name="config_value" minlength="2" type="text" required="">
                                                @if ($errors->has('config_value'))
                                                    <span class="text-danger">{{ $errors->first('config_value') }}</span>
                                                @endif           
                                            @elseif(request()->type==='textarea')
                                                <textarea class="form-control" name="config_value" id="config_value" cols="30" rows="10"></textarea>
                                            @endif
                                        </div>
                                    </div>                                                                                           
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button type="submit" class="btn btn-primary" type="submit">ADD</button>
                                            <a href="{{ asset('admin/setting') }}" class="btn btn-default" type="button">Cancel</a>
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

