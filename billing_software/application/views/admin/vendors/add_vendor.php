<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1> Add New Vendor </h1>
</div>
</div>

<form action="<?php echo base_url();?>Vendor/doadd_vendor" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
 
<div class="row">
	<div class="col-md-6">
	<div class="block">
	 
	 
	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> Company name </label>
	<div class="col-md-9">
	<input type="text" id="example-text-input" name="company_name" class="form-control" placeholder=" " required>
	</div>
	</div>
	 
	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> Phone </label>
	<div class="col-md-9">
	<input type="number" id="example-text-input" name="phone" class="form-control" placeholder=" " required>
	</div>
	</div> 
	 
	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> Email </label>
	<div class="col-md-9">
	<input type="email" id="example-text-input" name="email" class="form-control" placeholder=" " required>
	</div>
	</div>

	 
	<div class="form-group">
	<label class="col-md-3 control-label" for="example-select"> GST Treatment </label>
	<div class="col-md-9">
	<select id="example-select2" name="gst_treatment" class="select-select2" style="width: 100%;" data-placeholder=" Select GST Treatment.." required>
	<option></option>
	<?php foreach ($gst as $value) {?>
		<option value="<?php echo $value['id']; ?>"><?php echo $value['gst_per']; ?>%</option>
    <?php } ?>
	</select>
	</div>
	</div>


	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> GSTIN </label>
	<div class="col-md-9">
	<input type="text" id="example-text-input" name="gstin" class="form-control" placeholder=" " required>
	</div>
	</div>


	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> PAN </label>
	<div class="col-md-9">
	<input type="text" id="example-text-input" name="pan" class="form-control" placeholder=" " required>
	</div>
	</div>


	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> TIN </label>
	<div class="col-md-9">
	<input type="text" id="example-text-input" name="tin" class="form-control" placeholder=" " required>
	</div>
	</div>


	  
	 
	</div>
	</div>




			<div class="col-md-6">
			 
			 
			<div class="block">
			<div class="block-title">
			<h2> Billing Address </h2>
			</div>
			<div class="form-group">
			<label class="col-sm-3 control-label" for="example-input-small"> Address </label>
			<div class="col-sm-9">
			<textarea id="example-input-small"  name="billing_add" class="form-control input-sm" required placeholder=" "></textarea>
			</div>
			</div>

			<div class="form-group">
			<label class="col-md-3 control-label" for="example-select"> Country</label>
			<div class="col-md-9">
			<select required id="example-select2" name="billing_contry" class="select-select2 choosecountry" style="width: 100%;" data-placeholder=" Select country..">
			<option></option>
			<?php foreach ($country as $value) {?>
				<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			<?php }?>
			</select>
			</div>
			</div>
			 
			<div class="form-group">
			<label class="col-md-3 control-label" for="example-select"> State </label>
			<div class="col-md-9">
			<select required id="example-select2" name="billing_state" class="select-select2 choosestate" style="width: 100%;" data-placeholder=" Select State..">
			</select>
			</div>
			</div> 
			 
			 
			<div class="form-group">
			<label class="col-md-3 control-label" for="example-select"> City </label>
			<div class="col-md-9">
			<select required id="example-select2" name="billing_city" class="select-select2 choosecity" style="width: 100%;" data-placeholder=" Select City..">
			
			</select>
			</div>
			</div> 

			 
			<div class="form-group">
			<label class="col-sm-3 control-label"> Pin Code </label>
			<div class="col-sm-9">
			<input type="number" class="form-control" name="billing_pin" required placeholder=" ">
			</div>
			</div>
			 
			 
			</div>
			</div>

	<div class="col-md-6">
	 
	 
		
	    <button type="submit" class="btn btn-action btn-check">Save</button>
	</div>
</div>
</form>
