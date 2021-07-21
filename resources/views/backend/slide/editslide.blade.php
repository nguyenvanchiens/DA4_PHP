@extends('backend.master')
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            EDIT CATEGORY
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    @include('error.note')
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên shop</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" value="{{ $slide->name_shop }}" id="" name="name_shop" minlength="2" type="text" required="">
                                        </div>
                                    </div>     
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tiêu Đề</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" value="{{ $slide->header }}" id="" name="header" minlength="2" type="text" required="">
                                        </div>
                                    </div>     
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Nội Dung</label>
                                        <div class="col-lg-6">
                                            <textarea class='ckeditor' required  name="content" id="" cols="30" rows="10">{{ $slide->content }}</textarea>
                                            <script type="text/javascript">
                                                var editor = CKEDITOR.replace('content',{
                                                    language:'vi',
                                                    filebrowserImageBrowseUrl:'../../public/backend/ckfinder/ckfinder.html?Type=Images',
                                                    filebrowserFlashBrowseUrl:'../../public/backend/ckfinder/ckfinder.html?Type=Flash',
                                                    filebrowserImageUploadUrl:'../../public/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                    filebrowserFlashUploadUrl:'../../public/backend/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                })
                                            </script>
                                        </div>
                                    </div>       
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">image</label>
                                        <div class="col-lg-6">
                                            <label>Ảnh sản phẩm</label>
                                            <input id="img" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
                                            <img id="avatar" class="thumbnail"  width="300px" src="{{ asset('public'.$slide->image) }}">
                                        </div>
                                        <script type="text/javascript">
                                            function changeImg(input){
                                                //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
                                                if(input.files && input.files[0]){
                                                    var reader = new FileReader();
                                                    //Sự kiện file đã được load vào website
                                                    reader.onload = function(e){
                                                        //Thay đổi đường dẫn ảnh
                                                        $('#avatar').attr('src',e.target.result);
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                            $(document).ready(function() {
                                                $('#avatar').css('cursor','pointer');
                                                $('#avatar').click(function(){
                                                    $('#img').click();
                                                });
                                            });
                                        </script>
                                    </div>                                  
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button type="submit" class="btn btn-primary" type="submit">Update</button>
                                            <a href="{{ asset('admin/slide') }}" class="btn btn-default" type="button">Cancel</a>
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
