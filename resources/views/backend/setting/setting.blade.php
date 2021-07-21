@extends('backend.master')
@section('title','| Setting')
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
      Setting
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">   
        <div class="dropdown">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Add Setting
          </button>
          <div class="dropdown-menu m-2">
            <a style="display: block;padding:10px" class="dropdown-item" href="{{ asset('admin/setting/addsetting').'?type=text' }}">text</a>
            <a class="dropdown-item" style="padding:10px" href="{{ asset('admin/setting/addsetting').'?type=textarea' }}">textarea</a>
          </div>
        </div>    
        {{-- <a href="{{ asset('admin/setting/addsetting') }}" class="btn btn-sm btn-primary">ADD Setting</a>                            --}}
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
        <thead >
          <tr>
            <th class="text-center"  style="width:110px;">
               ID
            </th>
            <th class="text-center">Config Key</th>
            <th class="text-center">Config Value</th>
            <th style="width:30px;text-align:center">CHỨC NĂNG</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($setting as $item)
          <tr>
            <td class="text-center">{{ $item->id }}</td>
            <td class="text-center">{{ $item->config_key }}</td>
            <td class="text-center">{{ $item->config_value }}</td>
            <td  class="text-center" style="width:170px;text-align:center;vertical-align: middle;">
                <a href="{{ asset('admin/setting/editsetting/'.$item->id)}}" class="btn btn-warning"><i style="color:white" class="glyphicon glyphicon-edit"></i> Sửa</a>
                <a href="" data-url="{{ asset('admin/setting/deletesetting/'.$item->id) }}" class="btn btn-danger action_delete"><i style="color:white" class="glyphicon glyphicon-trash"></i> Xóa</a>
            </td>
        </tr>
          @endforeach
            
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                        
          {{ $setting->links() }}
        </div> 
      </div>
    </footer>
  </div>
</div>

</section>
@endsection
