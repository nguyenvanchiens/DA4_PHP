@extends('backend.master')
@section('title','| Sản phẩm')
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('public/backend/js/product.js') }}"></script>
@endsection
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      PRODUCT
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="{{ asset('admin/product/add') }}" class="btn btn-sm btn-primary">ADD Product</a>                   
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{ URL::to('admin/product/search') }}" method="GET">
          <div class="input-group">
            <input type="text" class="input-sm form-control" name="seach" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Go!</button>
            </span>
          </div>
        </form>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead style="text-align:center">
          <tr style="text-align:center">
            <th style="text-align:center" style="width:20px;">
               ID
            </th>
            <th style="text-align:center">Tên SP</th>
            <th style="text-align:center">Màu sắc</th>
            <th style="text-align:center">Hình Ảnh</th>
            <th style="text-align:center">Giá SP</th>
            <th style="text-align:center">Loại SP</th>
            <th style="width:30px;text-align:center">EDIT</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($prod as $item)
            <tr style="text-align:center">
              <td style="vertical-align: middle;">{{ $item->id }}</td>
              <td style="vertical-align: middle;">{{ $item->name }}</td>
              <td style="vertical-align: middle;">
                  @foreach ($item->get_child_attribute as $item_attr)
                      @if($item_attr->parent_attributes->attri_id==1)
                        {{ $item_attr->parent_attributes->values.',' }}
                      @endif
                      
                  @endforeach
              </td>
              <td><img style="width:150px" src="{{ asset('public'.$item->image_path) }}" alt=""></td>
              <td style="vertical-align: middle;"><span class="text-ellipsis">{{ number_format($item->price) }}vnđ</span></td>
              <td style="vertical-align: middle;">{{ $item->Cate->name }}</td>
              <td  style="width:170px;text-align:center;vertical-align: middle;">
                  <a href="{{ asset('admin/product/edit/'.$item->id)}}" class="btn btn-warning"><i style="color:white" class="glyphicon glyphicon-edit"></i> Sửa</a>
                  <a href="" data-url="{{ asset('admin/product/delete/'.$item->id) }}" class="btn btn-danger action_delete"><i style="color:white" class="glyphicon glyphicon-trash"></i> Xóa</a>
              </td>
            </tr>    
            @endforeach    
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {{ $prod->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
<!-- footer -->
<div class="footer">
  <div class="wthree-copyright">
    <p class="text-center">© Được làm và thiết kế bởi <a href="http://w3layouts.com">Mighty</a></p>
  </div>
</div>
<!-- / footer -->
@endsection
 