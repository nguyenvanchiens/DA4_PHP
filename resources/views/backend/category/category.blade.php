@extends('backend.master')
@section('title','| Danh mục sản phẩm')
@section('main')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      PRODUCT CATEGORY
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">        
        <a href="{{ asset('admin/category/add') }}" class="btn btn-sm btn-primary">ADD Category</a>                           
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
            <th class="">TÊN LOẠI</th>
            <th class="text-center">SEO</th>
            <th class="text-center">Số lượn SP</th>
            <th class="text-center">Status</th>
            <th class="text-center">ParentId</th>
            <th style="width:30px;text-align:center">CHỨC NĂNG</th>
          </tr>
        </thead>
        <tbody>
           <?php showCategory($cates) ?>    
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing {{ $count }} items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                        
          {{ $cates->links() }}
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
<?php
 function showCategory($categories,$parent_id=0,$char='')
  {
      foreach ($categories as $key => $item) {
          if($item->parent_id==$parent_id){
            echo '<tr >';
                echo '<td class="text-center">'.$item->id .'</td>';
                echo '<td >'.$char.$item->name .'</td>';
                echo '<td class="text-center">'. $item->slug .'</td>';
                echo '<td class="text-center">'. $item->Product->count() .'</td>';
                echo '<td class="text-center">'. $item->status .'</td>';
                echo '<td class="text-center">'. $item->parent_id .'</td>';
                
                echo 
                "
                  <td style='width:170px;text-align:center'>
                    <a href='/Fashion_shop/admin/category/edit/$item->id' class='btn btn-warning'><i style='color:white' class='glyphicon glyphicon-edit'></i> Sửa</a>   
                    <a href='/Fashion_shop/admin/category/delete/$item->id' onclick='return confirm('Bạn có chắc chắn muốn xóa?')' class='btn btn-danger'><i style='color:white' class='glyphicon glyphicon-trash'></i> Xóa</a>
                  </td>
                ";
            echo '</tr>';
            unset($categories[$key]);
            showCategory($categories,$item->id,$char.' --- ');
          }
      }
  }
?>
