<?php include 'header.php';?>



<div id="page-content">
 
 
<div class="block full">
<div class="block-title">
<div class="block-options pull-right">
<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="New invoice"><i class="fa fa-plus"></i></a>
<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Delete invoice"><i class="fa fa-times"></i></a>
<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" onclick="App.pagePrint();"><i class="fa fa-print"></i> Print</a>
</div>
</div>
<div class="row block-section">
<div class="col-sm-12">
<hr>
<h2><strong> Tech Inc.</strong></h2>
<address>
Noida, UP (09), IN<br>
+919898765675<br>
prakash@gmail.com<br>
<strong> GSTIN: </strong> 232312345678909<br>
<strong>Contact Name: </strong> example </a>
</address>
 

<div class="left">
<h2><strong> Bill To </strong></h2>
<address>
<strong> Prakash  </strong><br>
jaat johi <br>
bfbfb fg, gf, AP (28) 110096, IN <br> 
jaat@gmail.com  <br>
+918976787876 <br>
<strong> TIN:</strong> 43534534534534534 <br>
 <strong> VAT: </strong> axscscsdcdcewe <br>
<strong>  PAN:</strong> 23435345345345
</address>
</div>

</div>
</div>
<div class="table-responsive">
<table class="table table-vcenter">
<thead style="background: #394263;">
<tr>
<th>S.N. </th>
<th> Item Description</th>
<th> HSN/SAC	 </th>
<th> Price (₹) Taxable Value </th>
<th>Taxable Value (₹) </th>
<th> IGST(₹)</th>
<th> CESS (₹)</th>
<th> CESS (₹)</th>
<th> Amount(₹) </th> 
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td> Website Design </td>
<td> 2342</td>
<td>3543 </td>
<td> 3453 </td>
<td> 3453 </td>
<td> 3453 </td>
<td> 3453 </td>
<td> 3453 </td>
</tr>
 
<tr>
<td>2</td>
<td> Website Design </td>
<td> 2342</td>
<td>3543 </td>
<td> 3453 </td>
<td> 3453 </td>
<td> 3453 </td>
<td> 3453 </td>
<td> 3453 </td>
</tr> 
 
 
<tr class="active">
<td colspan="8" class="text-right"><span class="h4"> Discount </span></td>
<td class="text-right"><span class="h4">$ 23.000</span></td>
</tr>
<tr class="active">
<td colspan="8" class="text-right"><span class="h4"> Total Taxable Value </span></td>
<td class="text-right"><span class="h4">25%</span></td>
</tr>
<tr class="active">
<td colspan="8" class="text-right"><span class="h4"> wedwe (2.0%) </span></td>
<td class="text-right"><span class="h4">$ 5.750</span></td>
</tr>
<tr class="active">
<td colspan="8" class="text-right"><span class="h3"><strong> Rounded Off </strong></span></td>
<td class="text-right"><span class="h3"><strong>$ 28.750</strong></span></td>
</tr>
<tr class="active">
<td colspan="8" class="text-right"><span class="h3"><strong> Total Value (in figure) </strong></span></td>
<td class="text-right"><span class="h3"><strong>$ 28.750</strong></span></td>
</tr>
<tr class="active">
<td colspan="8" class="text-right"><span class="h3"><strong> Total Value (in words) </strong></span></td>
<td class="text-right"><span class="h3"><strong>$ 28.750</strong></span></td>
</tr>
</tbody>
</table>
</div>
<div class="clearfix">
<div class="btn-group pull-right">
<a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-print"></i> Save</a>
<a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-angle-right"></i> Send Invoice</a>
</div>
</div>
</div>
</div>



<style>
span.h3 {
    font-size: 14px;
}

.block-options .label, .switch, .table.table-vcenter td, .table.table-vcenter th {
    vertical-align: middle;
    font-size: 14px;
}


.left {
    float: right;
    margin-top: -197px;
}


address {
    margin-bottom: 0px;
    font-style: normal;
    line-height: 24px;
    font-size: 14px;
}
h2 strong {
    font-size: 20px;
}
h1, h2, h3 {
    margin-bottom: 5px;
}

th {
    color: #fff;
}
.table>thead>tr>td.active, .table>tbody>tr>td.active, .table>tfoot>tr>td.active, .table>thead>tr>th.active, .table>tbody>tr>th.active, .table>tfoot>tr>th.active, .table>thead>tr.active>td, .table>tbody>tr.active>td, .table>tfoot>tr.active>td, .table>thead>tr.active>th, .table>tbody>tr.active>th, .table>tfoot>tr.active>th {
    background-color: #fff;
}
span.h4 {
    font-size: 14px;
    font-weight: 600;
}

</style>


<?php include 'footer.php';?>