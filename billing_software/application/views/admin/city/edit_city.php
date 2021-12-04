<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1> Edit City </h1>
</div>
</div>

 
<div class="row">
<div class="col-md-6">
<div class="block">
 
  

  <form action="<?php echo base_url('City/update/').$cities[0]['id'] ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="">
  <div class="form-group">
			<label class="col-md-3 control-label" for="example-select"> Country</label>
			<div class="col-md-9">
			<select required id="example-select2" name="contry_id" class="select-select2 choosecountry" style="width: 100%;" data-placeholder=" Select country..">
			<option></option>
			<?php foreach ($countries as $value) {?>
				<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$cities[0]['country_id']) {
					echo "selected";
				} ?>><?php echo $value['name']; ?></option>
			<?php }?>
			</select>
			</div>
			</div>
			 
			<div class="form-group">
			<label class="col-md-3 control-label" for="example-select"> State </label>
			<div class="col-md-9">
			<select required id="example-select2" name="billing_state" class="select-select2 choosestate" style="width: 100%;" data-placeholder=" Select State..">
				<?php foreach ($states as $value) {?>
				<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$cities[0]['state_id']) {
					echo "selected";
				} ?>><?php echo $value['name']; ?></option>
			<?php }?>
			</select>
			</div>
			</div> 
			 
			 
			<div class="form-group">
			<label class="col-md-3 control-label" for="example-select"> City </label>
			<div class="col-md-9">
			<select required id="example-select2" name="billing_city" class="select-select2 choosecity" style="width: 100%;" data-placeholder=" Select City..">
			<?php foreach ($cities as $value) {?>
				<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$cities[0]['id']) {
					echo "selected";
				} ?>><?php echo $value['name']; ?></option>
			<?php }?>
			</select>
			</div>
			</div> 
</div>
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
