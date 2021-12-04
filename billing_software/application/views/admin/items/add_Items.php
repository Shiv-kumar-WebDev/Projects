

<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1> New Item </h1>
</div>
</div>

  <div class="row">
 <div class="col-md-12">
 <div class="block">
<ul class="nav nav-tabs push" data-toggle="tabs">
<li class="active"><a href="#example-tabs-news"> Product </a></li>
<li class=""><a href="#example-tabs-profile"> Service </a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="example-tabs-news">

<div class="row">
<div class="col-md-12">
<div class="block">
 
<form action="<?php echo base_url();?>Items/doadd_items" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered">
 
 <div class="row">
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-text-input"> Name </label>
<div class="col-md-9">
<input type="text" id="example-text-input" name="name" class="form-control" placeholder=" " required="">
<input type="hidden" name="type" value="1">
</div>
</div>
 
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-text-input"> Description </label>
<div class="col-md-9">
<textarea id="example-clickable-bio" name="description" rows="1" class="form-control ui-wizard-content" placeholder=" " required></textarea>
</div>
</div> 
</div>

<div class="row"> 
<div class="form-group col-md-4">
<label class="col-md-3 control-label" for="example-text-input"> Quantity </label>
<div class="col-md-9">
<input type="text" id="example-text-input" name="qty" class="form-control" placeholder=" " required>
</div>
</div>

 
<div class="form-group col-md-4">
<label class="col-md-3 control-label" for="example-select"> Unit </label>
<div class="col-md-9">
<select id="example-select2" name="unit" class="select-select2" style="width: 100%;" data-placeholder=" Select Unit ..">
<option></option>
<?php foreach ($unit as $value) {?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['unit']; ?></option>
<?php  } ?>
</select>
</div>
</div>

<div class="form-group col-md-4">
<label class="col-md-3 control-label" for="example-select">Tax </label>
<div class="col-md-9">
<select id="example-select2" name="tax" class="select-select2" style="width: 100%;" data-placeholder=" Select GST Treatment..">
<option></option>
<?php foreach ($tax as $value) {?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['gst_per']; ?>%</option>
<?php  } ?>
</select>
</div>
</div>
</div>


<div class="form-group col-md-12">
<label class="col-md-2 control-label" for="example-text-input"> HSN </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="hsn" class="form-control" placeholder=" " required>
</div>
</div>


<div class="form-group col-md-12">
<label class="col-md-2 control-label" for="example-text-input"> SKU </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="sku" class="form-control" placeholder=" " required>
</div>
</div>


<div class="form-group">
<label class="col-md-2 control-label" for="example-text-input"> TIN </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="tin" class="form-control" placeholder=" " required>
</div>
</div>
 
 
 
 <div class="row">
<div class="col-md-6">
<div class="block">
<div class="block-title">
<h2> Sale Info </h2>
</div>
 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> Unit Price </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="unit_price" class="form-control input-sm" placeholder=" " required>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Currency </label>
<div class="col-md-9">
<select id="example-select2" name="currency" class="select-select2" style="width: 100%;" data-placeholder=" Select Currency..">
<option></option>
<?php foreach ($currency as $value) {?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['currency']; ?></option>
<?php  } ?>
</select>
</div>
</div>
</div>
 

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> CESS % </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="chess_per" class="form-control input-sm" placeholder=" " required>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-4 control-label" for="example-select"> + CESS </label>
<div class="col-md-8">
<input type="text" id="example-input-small" name="chess" class="form-control input-sm" placeholder=" " required>
</div>
</div>
</div>
</div>
</div>



<div class="col-md-6">
<div class="block">
<div class="block-title">
<h2> Purchase Info </h2>
</div>

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> Unit Price </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="punit_price" class="form-control input-sm" placeholder=" " required>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Currency </label>
<div class="col-md-9">
<select id="example-select2" name="pcurrency" class="select-select2" style="width: 100%;" data-placeholder=" Select Currency..">
<option></option>
<?php foreach ($currency as $value) {?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['currency']; ?></option>
<?php  } ?>
</select>
</div>
</div>
</div>
 

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> CESS % </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="pchess_per" class="form-control input-sm" placeholder=" " required>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-4 control-label" for="example-select"> + CESS </label>
<div class="col-md-8">
<input type="text" id="example-input-small" name="pchess" class="form-control input-sm" placeholder=" " required>
</div>
</div>
</div>
</div>
</div>
 
</div>
 <div class="buttons" style="text-align: center;">
    <button type="submit" class="btn btn-action btn-check">Save</button>
  </div>
</form>

</div>

</div>
 
</div>
</div>















<div class="tab-pane" id="example-tabs-profile"> 

 <div class="row">
<div class="col-md-12">
<div class="block">
 
<form action="<?php echo base_url();?>Items/doadd_items" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered">
 
 <div class="row">
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-text-input"> Name </label>
<div class="col-md-9">
<input type="text" id="example-text-input" name="name" class="form-control" placeholder=" " required>
<input type="hidden" name="type" value="2">
<input type="hidden" name="qty" value="0">
</div>
</div>
 
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-text-input"> Description </label>
<div class="col-md-9">
<textarea id="example-clickable-bio" name="description" rows="1" class="form-control ui-wizard-content" placeholder=" " required></textarea>
</div>
</div> 
</div>

<div class="row"> 
 
 
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Unit </label>
<div class="col-md-9">
<select id="example-select2" name="unit" class="select-select2" style="width: 100%;" data-placeholder=" Select Unit ..">
<option></option>
<?php foreach ($unit as $value) {?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['unit']; ?></option>
<?php  } ?>
</select>
</div>
</div>


<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select">Tax </label>
<div class="col-md-9">
<select id="example-select2" name="tax" class="select-select2" style="width: 100%;" data-placeholder=" Select GST Treatment..">
<option></option>
<?php foreach ($tax as $value) {?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['gst_per']; ?>%</option>
<?php  } ?>
</select>
</div>
</div>
</div>


<div class="form-group col-md-12">
<label class="col-md-2 control-label" for="example-text-input"> HSN </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="hsn" class="form-control" placeholder=" " required>
</div>
</div>


<div class="form-group col-md-12">
<label class="col-md-2 control-label" for="example-text-input"> SKU </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="sku" class="form-control" placeholder=" " required>
</div>
</div>


<div class="form-group">
<label class="col-md-2 control-label" for="example-text-input"> TIN </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="tin" class="form-control" placeholder=" " required>
</div>
</div>
 
 
 
 <div class="row">
<div class="col-md-6">
<div class="block">
<div class="block-title">
<h2> Sale Info </h2>
</div>
 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> Unit Price </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="unit_price" class="form-control input-sm" placeholder=" " required>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Currency </label>
<div class="col-md-9">
<select id="example-select2" name="currency" class="select-select2" style="width: 100%;" data-placeholder=" Select Currency..">
<option></option>
<?php foreach ($currency as $value) {?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['currency']; ?></option>
<?php  } ?>
</select>
</div>
</div>
</div>
 

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> CESS % </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="chess_per" class="form-control input-sm" placeholder=" " required>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-4 control-label" for="example-select"> + CESS </label>
<div class="col-md-8">
<input type="text" id="example-input-small" name="chess" class="form-control input-sm" placeholder=" " required>
</div>
</div>
</div>
</div>
</div>



<div class="col-md-6">
<div class="block">
<div class="block-title">
<h2> Purchase Info </h2>
</div>

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> Unit Price </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="punit_price" class="form-control input-sm" placeholder=" " required>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Currency </label>
<div class="col-md-9">
<select id="example-select2" name="pcurrency" class="select-select2" style="width: 100%;" data-placeholder=" Select Currency..">
<option></option>
<?php foreach ($currency as $value) {?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['currency']; ?></option>
<?php  } ?>
</select>
</div>
</div>
</div>
 

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> CESS % </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="pchess_per" class="form-control input-sm" placeholder=" " required>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-4 control-label" for="example-select"> + CESS </label>
<div class="col-md-8">
<input type="text" id="example-input-small" name="pchess" class="form-control input-sm" placeholder=" " required>
</div>
</div>
</div>
</div>
</div>
 
</div>
 <div class="buttons" style="text-align: center;">
    <button type="submit" class="btn btn-action btn-check">Save</button>
  </div>
</form>

</div>
</div>
</div>
 
</div>

</div>
</div>
</div>
</div>
</div>




 
 
</div>


<style>
.block {
    margin-top: 10px;
    margin-bottom: 50px;
}

div#page-content {
    min-height: 800px!important;
}

</style>


