<?php include 'header.php';?>




<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1>  Add Credit Notes </h1>
</div>

<div class="block">
 
<div class="title">
<form action="page_forms_components.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
<fieldset>
 
<div class="form-group">
<label class="col-md-2 control-label" for="example-select2"> Client Name </label>
<div class="col-md-4">
<select id="example-select2" name="example-select2" class="select-select2 select2-hidden-accessible" style="width: 100%;" data-placeholder="Choose one.." tabindex="-1" aria-hidden="true">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
</select> 
</div>

<div class="col-md-2">
<a href="ddew" class="btn btn-sm btn-primary"> + Add New Client </a>
</div>

</div>
</fieldset>



<div class="form-group">
<label class="col-md-2 control-label" for="example-datepicker"> Proforma No.</label>
<div class="col-md-1">
<input type="text" class="form-control" placeholder="">
</div>
<div class="col-md-2">
<input type="text" class="form-control" placeholder="">
</div>

<label class="col-md-2 control-label" for="example-datepicker"> Proforma Date</label>

<div class="col-md-2">
<input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
</div>
</div>



<div class="form-group">
<div class="col-md-3">
<input type="text" class="form-control" placeholder="Enquary No.">
</div>
<div class="col-md-2">
<input type="text" class="form-control" placeholder="">
</div>

<label class="col-md-2 control-label" for="example-datepicker">  Valid Unit </label>

<div class="col-md-2">
<input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
</div>
</div>





</form> 
 
</div>
</div>


 


</div>
 
 
<div class="block">
<div class="table-responsive">
<table class="table table-vcenter table-striped">
<thead>

<tr>
<th> No.</th>
<th>Item Name </th>
<th> HSN/SAC </th>
<th> Unit </th>
<th> QTY </th>
<th> Price </th>
<th> Discount (%) </th>
<th> CGST </th>
<th> SGST </th>
<th> IGST </th>
<th> CESS </th>
<th> Total	 </th>
<th style="width: 150px;" class="text-center">Actions</th>
</tr>

</thead>
<tbody>
<tr>
<td> 1.</td>
<td>client1 </td>
<td>client1 </td>
<td> Trial </td>
<td>client1 </td>
<td>client1 </td>
<td> Trial </td>
<td>client1 </td>
<td>client1 </td>
<td> Trial </td>
<td>client1 </td>
<td> Trial </td>
<td class="text-center">
<div class="btn-group btn-group-xs">
<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
<a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
</div>
</td>
</tr>
 
 <tbody>
<tr>
<td> 2.</td>
<td><select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Select">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select> </td>
<td> <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">  </td>
<td> <select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select ">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select> </td>
<td> <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">  </td>
<td> <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">   </td>
<td> <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">  </td>
<td> <select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select> </td>
<td> <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">  </td>
<td> <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">  </td>
<td> <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">   </td>
<td> <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">  </td>
<td><a href="#" title="Add line" class="btn btn-blue btn-add" data-ember-action="" data-ember-action-2373="2373">+ Add line</a></td>
</tr>
</tbody>
</table>
</div>
</div>






<div class="block">
<div class="row">

<div class="col-md-6"> 

<div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span>Total quantity</span></label>
</div>

<div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span> Add shipping charges </span></label>
</div>
 
 
<div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span> Add discount to all </span></label>
</div>

<div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span> Show CESS</span></label>
</div> 

 <div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span> Subject to reverse charge </span></label>
</div> 

</div>




<div class="col-md-6"> 
 <div class="totals">
 
 
    <div id="subtotal" class="row">
      <label>Subtotal:</label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>
	
    <div id="subtotal" class="row">
      <label> CGST: </label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>	

    <div id="subtotal" class="row">
      <label> SGST: </label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>	

    <div id="subtotal" class="row">
      <label> IGST: </label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>	
	
    <div id="subtotal1" class="row">
      <label> Total: </label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>	
	
	
	
</div>
</div>
 
</div>
</div>







<div class="block" style="padding-bottom: 20px;">
<div class="row">

<div class="col-md-6"> 
<legend><i class="fa fa-angle-right"></i>Terms & Conditions </legend>
<textarea id="val_bio" name="val_bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
</div>

<div class="col-md-6"> 
<legend><i class="fa fa-angle-right"></i> Private notes (not shown to client) </legend>
<textarea id="val_bio" name="val_bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
</div>


</div>
</div>

 

</div>



 <div class="buttons sticked">
    <button type="submit" class="btn btn-action btn-check">Save </button>
    <a href="#" class="btn1" data-ember-action="" data-ember-action-1122="1122">Cancel</a>
  </div>


<style>
a.btn.btn-blue.btn-add {
    color: #fff;
    background: #282e45;
}
.totals .row span.amount {
    float: right;
}
input#example-inline-checkbox1 {
    position: inherit;
}
.row label, .document-form #summary .totals .row span.amount {
 
    color: #072d45;
    font-size: 14px;
    font-weight: 700;
    line-height: 1.4285714286em;
    padding-bottom: 0.625em;
}
 
 span#ember2413 {
    font-weight: 700;
}

.field.checkbox-field label {
    display: block;
    margin-bottom: 0;
    line-height: 3.3846153846em;
    position: relative;
    font-size: 16px;
    font-weight: 500;
}

input#example-inline-checkbox1 {
    font-size: 14px;
    width: 1.5em;
    height: 1.5em;
    border-radius: 3px;
    background-color: #fff;
    margin-right: 30px;
}


</style>


<?php include 'footer.php';?>