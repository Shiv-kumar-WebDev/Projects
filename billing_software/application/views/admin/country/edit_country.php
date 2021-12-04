<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1> Edit Country </h1>
</div>
</div>

 
<div class="row">
<div class="col-md-6">
<div class="block">
 
<?php foreach($countries as $country){ ?>
<form action="<?php echo base_url('Country/update/').$country['id'] ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="">
 
<div class="form-group">
<label class="col-md-3 control-label" for="Shortname"> Short name </label>
<div class="col-md-9">
<input value="<?php echo $country['sortname'] ?>" type="text" id="example-text-input" name="Shortname" class="form-control" placeholder=" ">
</div>
<label class="col-md-3 control-label" for="example-text-input"> Country name </label>
<div class="col-md-9">
<input value="<?php echo $country['name'] ?>" type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder=" ">
</div>
</div>


  
<div class="buttons sticked">
   <button type="submit" class="btn btn-action btn-check">Save</button>
   <a href="#" class="btn1" data-ember-action="" data-ember-action-1122="1122">Cancel</a>
 </div>
 
</form>
<?php } ?>
</div>
</div>





</div>

 
 
 
</div>
