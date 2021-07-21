@extends('backend.master')
@section('title','|  Thêm sản phẩm')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD Product
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="commentForm" method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-7">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-3">Tên sản phẩm</label>
                                            <div class="col-lg-9">
                                                <input class=" form-control" value="{{ old('name') }}" id="name"  name="name" minlength="2" type="text">
                                                @if ($errors->has('name'))
                                                    {{ $errors->first('name') }}
                                                @endif
                                            </div>
                                        </div>  
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-3">SEO</label>
                                            <div class="col-lg-9">
                                                <input class=" form-control" value="" id="slug"  name="slug" minlength="2" type="text">
                                                @if ($errors->has('slug'))
                                                    {{ $errors->first('slug') }}
                                                @endif
                                            </div>
                                        </div> 
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-3">Mô tả</label>
                                            <div class="col-lg-9">
                                                <textarea name="description" class="form-control my-editor">hàng đẹp</textarea>
                                                <script type="text/javascript">
                                                    var editor = CKEDITOR.replace('description',{
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
                                            <label for="cname" class="control-label col-lg-3">Hình ảnh</label>
                                            <div class="col-lg-9">
                                                <label>Ảnh sản phẩm</label>
                                                <input id="img" type="file" multiple="multiple" name="image" class="form-control hidden" onchange="changeImg(this)">
                                                <img id="avatar" class="thumbnail"  width="300px" src="{{ asset('public/backend/images/new_seo-10-512.png') }}">
                                                @if ($errors->has('image'))
                                                    {{ $errors->first('name') }}                              
                                                @endif
                                            </div>
                                            <script type="text/javascript">
                                                function changeImg(input){
                                                    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
                                                    // if(input.files && input.files[0]){
                                                    //     var reader = new FileReader();
                                                    //     //Sự kiện file đã được load vào website
                                                    //     reader.onload = function(e){
                                                    //         //Thay đổi đường dẫn ảnh
                                                    //         $('#avatar').attr('src',e.target.result);
                                                    //     }
                                                    //     reader.readAsDataURL(input.files[0]);
                                                    // }
                                                    alert(input.val());
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
                                            <label for="cname" class="control-label col-lg-3">ảnh chi tiết</label>
                                            <div class="col-lg-9">
                                                <input type="file" name="image_path[]" multiple id="image_path">
                                            </div>
                                        </div>                                  
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-3">Giá gốc</label>
                                            <div class="col-lg-9">
                                                <input class=" form-control" value="100000" name="originalprice" minlength="2" type="text" >
                                                @if ($errors->has('originalprice'))
                                                {{ $errors->first('originalprice') }}
                                            @endif
                                            </div>
                                        </div> 
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-3">Giá bán</label>
                                            <div class="col-lg-9">
                                                <input class=" form-control" value="300000" name="price" minlength="2" type="text" >
                                                @if ($errors->has('price'))
                                                {{ $errors->first('price') }}
                                            @endif
                                            </div>
                                        </div> 
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-3">Khuyến mại</label>
                                            <div class="col-lg-9">
                                                <input class=" form-control" value="250000" name="sale_price" type="text" >
                                                @if ($errors->has('sale_price'))
                                                {{ $errors->first('sale_price') }}
                                            @endif
                                            </div>
                                        </div> 
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-3">Số lượng</label>
                                            <div class="col-lg-9">
                                                <input class=" form-control" value="20" name="quantity" minlength="2" type="text" >
                                                @if ($errors->has('quantity'))
                                                {{ $errors->first('quantity') }}
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form_group" style="margin-bottom: 30px">
                                            <div class="col-lg-3">
                                                <span>Thuộc tính</span>
                                               
                                            </div>
                                             <div class="col-lg-9">
                                                <ul class="nav nav-tabs">
                                                    @foreach ($attr as $item)
                                                        <li class=" @if($item->id==1)active @endif "><a data-toggle="tab" href="#tab_{{ $item->id }}">{{ $item->Key }}</a></li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content" style="margin-top: 20px">
                                                    <div id="tab_1" class="tab-pane fade in active">
                                                        <div class="group_checkbox">
                                                            <div class="group_checkbox">
                                                                @foreach ($attr_color as $item)
                                                                @foreach ($item->get_child_value as $value)
                                                                    <span>{{ $value->values }}</span> <input type="checkbox" name="color[]" value="{{ $value->id }}" id="">
                                                                @endforeach
                                                                {{--  <div class="div" style="margin-top: 20px">                                                                 
                                                                    <a href="{{ asset('admin/attributes/add_values') }}" type="submit" style="" class="btn btn-primary">Thêm Attr</a>
                                                                </div>
                                                               
                                                                     --}}
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                    <div id="tab_2" class="tab-pane fade">
                                                        <div class="group_checkbox">
                                                            <div class="group_checkbox">
                                                                @foreach ($attr_size as $item)
                                                                @foreach ($item->get_child_value as $value)
                                                                    <span>{{ $value->values }}</span> <input type="checkbox" name="size[]" value="{{ $value->id }}" id="">
                                                                @endforeach
                                                                    
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                             </div>                                      
                                        </div>
                                        <div class="form_group" style="width:200px;margin-bottom: 30px">
                                            <span style="color:white">hello</span>
                                        </div>
                                        <div class="form-group" >
                                            <label for="cname" class="control-label col-lg-3">Category</label>
                                            <div class="col-lg-9">
                                                <select  name="cate_id" class="form-control">
                                                    <?php
                                                        showCategory($cates)    
                                                    ?>
                                                </select>
                                            </div>                      
                                        </div>
                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-3">Nhập tag SP</label>   
                                            <div class="col-lg-9">
                                            <select name="tags[]" class="form-control tags_select" multiple="multiple">
                                                
                                            </select>
                                            </div>
                                        </div>	
                                        <div class="form-group" >
                                            <label for="cname" class="control-label col-lg-3">Trạng thái</label>
                                            <div class="input-group" style="margin-top: 9px !important;">
                                                Có: <input type="radio" checked name="status" value="1">
                                                Không: <input type="radio"  name="status" value="0">
                                            </div>  
                                        </div>
                                        <div class="form-group" >
                                            <label for="cname" class="control-label col-lg-3">hot</label>
                                            <div class="input-group" style="margin-top: 9px !important;">
                                                Có: <input type="radio"  name="hot" value="1">
                                                Không: <input type="radio"checked name="hot" value="0">
                                            </div>                                          
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-6">
                                                <button type="submit" class="btn btn-primary" type="submit">ADD</button>
                                                <a href="{{ asset('admin/category') }}" class="btn btn-default" type="button">Cancel</a>
                                            </div>
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
        if($item->parent_id == $parent_id){
            echo "<option value='$item->id'>$char $item->name</option>";
            unset($categories[$key]);
            showCategory($categories, $item->id, $char.' ---');
        }
    };
};
?>

@section('js')
    <script src="js/slug.js"></script>
    <script src="/path-to-your-tinymce/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".tags_select").select2({
    tags: true,
    tokenSeparators: [',']})
    </script>
@endsection