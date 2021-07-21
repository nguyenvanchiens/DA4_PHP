@extends('backend.master')
@section('title','| User')
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
        <a href="{{ asset('admin/user/add') }}" class="btn btn-sm btn-primary">ADD User</a>                   
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead style="text-align:center">
          <tr style="text-align:center">
            <th style="text-align:center" style="width:20px;">
               ID
            </th>
            <th style="text-align:center">Tên Tài Khoản</th>
            <th style="text-align:center">Created_at</th>
            <th style="width:30px;text-align:center">EDIT</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($uesr as $item)
            <tr style="text-align:center">
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->created_at}}</td>
              <td  style="width:170px;text-align:center">
                  <a href="{{ asset('admin/user/edit/'.$item->id)}}" class="btn btn-warning"><i style="color:white" class="glyphicon glyphicon-edit"></i> Sửa</a>
                  <a href="{{ asset('admin/user/delete/'.$item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i style="color:white" class="glyphicon glyphicon-trash"></i> Xóa</a>
              </td>
            </tr>     
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
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
 