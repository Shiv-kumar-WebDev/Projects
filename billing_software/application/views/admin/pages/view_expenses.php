<?php include 'header.php';?>





<div id="page-content">



<div class="block full">
<div class="block-title">
<div class="block-options pull-right">
<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog"></i></a>
</div>
<h2><strong>All</strong> Expences </h2>
</div>
<div id="ecom-orders_wrapper" class="dataTables_wrapper form-inline no-footer">
<div class="row">

<div class="col-sm-8 col-xs-8">
<div id="ecom-orders_filter">
<label>
<div class="input-group">
<input type="search" class="form-control" placeholder="Search" aria-controls="ecom-orders" autocomplete="off">
<span class="input-group-addon"><i class="fa fa-search"></i></span>
</div></label>
</div>
</div>


<div class="col-sm-4 col-xs-4">
<div class="actions">
  <a href=" " id="ember8386" class="btn btn-action btn-add ember-view"> + New</a>
  <button class="btn btn-export" data-ember-action="" data-ember-action-8387="8387">Export</button>
      </div>
</div>

 
</div>

<table id="ecom-orders" class="table table-bordered table-striped table-vcenter dataTable no-footer" role="grid" aria-describedby="ecom-orders_info">
<thead>
<tr role="row">
<th class="text-center sorting_desc" style="width: 99px;" tabindex="0" aria-controls="ecom-orders" rowspan="1" colspan="1" aria-sort="descending" aria-label="ID: activate to sort column ascending"> Issue Date </th>
<th class="visible-lg sorting" tabindex="0" aria-controls="ecom-orders" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 111px;"> Doc. No. </th>
<th class="text-center visible-lg sorting" tabindex="0" aria-controls="ecom-orders" rowspan="1" colspan="1" aria-label="Products: activate to sort column ascending" style="width: 102px;"> Status </th>
<th class="hidden-xs sorting" tabindex="0" aria-controls="ecom-orders" rowspan="1" colspan="1" aria-label="Payment: activate to sort column ascending" style="width: 102px;"> Vendor Name </th>
<th class="text-right hidden-xs sorting" tabindex="0" aria-controls="ecom-orders" rowspan="1" colspan="1" aria-label="Value: activate to sort column ascending" style="width: 66px;"> Due Date </th>
<th class="sorting" tabindex="0" aria-controls="ecom-orders" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 75px;"> Tax </th>
<th class="hidden-xs text-center sorting" tabindex="0" aria-controls="ecom-orders" rowspan="1" colspan="1" aria-label="Submitted: activate to sort column ascending" style="width: 118px;"> Amount </th>
<th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 75px;">Action</th></tr>
</thead>
<tbody>



 
<tr role="row" class="odd">
<td class="text-center sorting_1"> <input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"> </td>
<td class="visible-lg"><a href="javascript:void(0)">Harry Burke</a></td>
<td class="text-center visible-lg"><a href="javascript:void(0)">2</a></td>
<td class="hidden-xs">Bank Wire</td>
<td class="text-right hidden-xs"><strong>$138,00</strong></td>
<td><span class="label label-info">For delivery</span></td>
<td class="hidden-xs text-center">23/04/2014</td>
<td class="text-center">
<div class="btn-group btn-group-xs">
<a href="page_ecom_order_view.php" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
<a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
</div>
</td>
</tr>


<tr role="row" class="even">
<td class="text-center sorting_1"> <input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"> </td>
<td class="visible-lg"><a href="javascript:void(0)">Harry Burke</a></td>
<td class="text-center visible-lg"><a href="javascript:void(0)">4</a></td>
<td class="hidden-xs">Check</td>
<td class="text-right hidden-xs"><strong>$1201,00</strong></td>
<td><span class="label label-danger">Canceled</span></td>
<td class="hidden-xs text-center">01/06/2014</td>
<td class="text-center">
<div class="btn-group btn-group-xs">
<a href="page_ecom_order_view.php" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
<a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
</div>
</td>
</tr>




 </tbody>
</table><div class="row"><div class="col-sm-5 hidden-xs"><div class="dataTables_info" id="ecom-orders_info" role="status" aria-live="polite"><strong>1</strong>-<strong>20</strong> of <strong>60</strong></div></div><div class="col-sm-7 col-xs-12 clearfix"><div class="dataTables_paginate paging_bootstrap" id="ecom-orders_paginate"><ul class="pagination pagination-sm remove-margin"><li class="prev disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i> </a></li><li class="active"><a href="javascript:void(0)">1</a></li><li><a href="javascript:void(0)">2</a></li><li><a href="javascript:void(0)">3</a></li><li class="next"><a href="javascript:void(0)"> <i class="fa fa-chevron-right"></i></a></li></ul></div></div></div></div>
</div>


 
</div>



<style>
thead {
    background: #eaedf18a;
}

</style>



<?php include 'footer.php';?>