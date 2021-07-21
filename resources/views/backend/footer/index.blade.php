@extends('backend.master')
@section('title','| Footer')
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Footer
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">        
        <a href="{{ asset('admin/category/add') }}" class="btn btn-sm btn-primary">ADD Footer</a>                           
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
            <th class="">description</th>
            <th class="text-center">created_at</th>
            <th>CHỨC NĂNG</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing  items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                        
          
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

