<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1> Add New State </h1>
</div>
</div>

 
<div class="row">
<div class="col-md-6">
<div class="block">
 
<form action="<?php echo base_url('State/insert') ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="">
 

<div class="form-group">
<label class="col-md-3 control-label" for="example-select"> Country </label>
<div class="col-md-9">
<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder=" Select Country..">
<option></option>
  <?php foreach($countries as $country){?>
    <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
  <?php }?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="statename"> State name </label>
<div class="col-md-9">
<input type="text" id="statename" name="statename" class="form-control" placeholder=" ">
</div>
</div>


  
<div class="buttons sticked">
   <button type="submit" class="btn btn-action btn-check">Save</button>
   <a href="#" class="btn1" data-ember-action="" data-ember-action-1122="1122">Cancel</a>
 </div>
 
</form>
</div>
</div>





</div>

 
 
 
</div>
