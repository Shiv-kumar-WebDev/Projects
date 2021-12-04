<?php include 'header.php';?>


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
 
<form action="page_forms_general.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
 
 <div class="row">
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-text-input"> Name </label>
<div class="col-md-9">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>
 
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-text-input"> Description </label>
<div class="col-md-9">
<textarea id="example-clickable-bio" name="example-clickable-bio" rows="1" class="form-control ui-wizard-content" placeholder=" "></textarea>
</div>
</div> 
</div>

<div class="row"> 
<div class="form-group col-md-4">
<label class="col-md-3 control-label" for="example-text-input"> Quantity </label>
<div class="col-md-9">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>

 
<div class="form-group col-md-4">
<label class="col-md-3 control-label" for="example-select"> Unit </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select GST Treatment..">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select>
</div>
</div>

<div class="form-group col-md-4">
<label class="col-md-3 control-label" for="example-select">Tax </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select GST Treatment..">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select>
</div>
</div>
</div>


<div class="form-group col-md-12">
<label class="col-md-2 control-label" for="example-text-input"> HSN </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>


<div class="form-group col-md-12">
<label class="col-md-2 control-label" for="example-text-input"> SKU </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>


<div class="form-group">
<label class="col-md-2 control-label" for="example-text-input"> TIN </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>
 
</form>
 
 
 
 <div class="row">
<div class="col-md-6">
<div class="block">
<div class="block-title">
<h2> Sale Info </h2>
</div>
<form action="page_forms_general.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> Unit Price </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Currency </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select country..">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select>
</div>
</div>
</div>
 

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> CESS % </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-4 control-label" for="example-select"> + CESS </label>
<div class="col-md-8">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>
</div>
 
</form>
</div>
</div>



<div class="col-md-6">
<div class="block">
<div class="block-title">
<h2> Purchase Info </h2>
</div>
<form action="page_forms_general.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> Unit Price </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Currency </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select country..">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select>
</div>
</div>
</div>
 

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> CESS % </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-4 control-label" for="example-select"> + CESS </label>
<div class="col-md-8">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>
</div>
 
</form>
</div>
</div>
 
</div>
</div>
</div>
 
</div>
</div>















<div class="tab-pane" id="example-tabs-profile"> 

 <div class="row">
<div class="col-md-12">
<div class="block">
 
<form action="page_forms_general.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
 
 <div class="row">
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-text-input"> Name </label>
<div class="col-md-9">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>
 
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-text-input"> Description </label>
<div class="col-md-9">
<textarea id="example-clickable-bio" name="example-clickable-bio" rows="1" class="form-control ui-wizard-content" placeholder=" "></textarea>
</div>
</div> 
</div>

<div class="row"> 
 
 
<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Unit </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select GST Treatment..">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select>
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select">Tax </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select GST Treatment..">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select>
</div>
</div>
</div>


<div class="form-group col-md-12">
<label class="col-md-2 control-label" for="example-text-input"> HSN </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>


<div class="form-group col-md-12">
<label class="col-md-2 control-label" for="example-text-input"> SKU </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>


<div class="form-group">
<label class="col-md-2 control-label" for="example-text-input"> TIN </label>
<div class="col-md-10">
<input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>
 
</form>
 
 
 
 <div class="row">
<div class="col-md-6">
<div class="block">
<div class="block-title">
<h2> Sale Info </h2>
</div>
<form action="page_forms_general.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> Unit Price </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Currency </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select country..">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select>
</div>
</div>
</div>
 

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> CESS % </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-4 control-label" for="example-select"> + CESS </label>
<div class="col-md-8">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>
</div>
 
</form>
</div>
</div>



<div class="col-md-6">
<div class="block">
<div class="block-title">
<h2> Purchase Info </h2>
</div>
<form action="page_forms_general.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> Unit Price </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-3 control-label" for="example-select"> Currency </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select country..">
<option></option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="Javascript">Javascript</option>
<option value="PHP">PHP</option>
<option value="MySQL">MySQL</option>
</select>
</div>
</div>
</div>
 

 <div class="row">
<div class="form-group col-md-6">
<label class="col-sm-5 control-label" for="example-input-small"> CESS % </label>
<div class="col-sm-7">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>

<div class="form-group col-md-6">
<label class="col-md-4 control-label" for="example-select"> + CESS </label>
<div class="col-md-8">
<input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=" ">
</div>
</div>
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
</div>




 
 <div class="buttons sticked">
    <button type="submit" class="btn btn-action btn-check">Save</button>
    <a href="#" class="btn1" data-ember-action="" data-ember-action-1122="1122">Cancel</a>
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



<?php include 'footer.php';?>