<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1> Edit vendor </h1>
</div>
</div>

<form action="<?php echo base_url('Client/doupdate_client/'.$client_data[0]['id']);?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
 
<div class="row">
	<div class="col-md-6">
	<div class="block">
	 
	 
	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> Company name </label>
	<div class="col-md-9">
	<input type="text" id="example-text-input" name="company_name" class="form-control" placeholder=" " value="<?php echo $client_data[0]['company_name']; ?>" required>
	</div>
	</div>
	 
	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> Phone </label>
	<div class="col-md-9">
	<input type="number" id="example-text-input" name="phone" class="form-control" placeholder=" " value="<?php echo $client_data[0]['phone']; ?>" required>
	</div>
	</div> 
	 
	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> Email </label>
	<div class="col-md-9">
	<input type="email" id="example-text-input" name="email" class="form-control" placeholder=" " value="<?php echo $client_data[0]['email']; ?>" required>
	</div>
	</div>

	 
	<div class="form-group">
	<label class="col-md-3 control-label" for="example-select"> GST Treatment </label>
	<div class="col-md-9">
	<select id="example-select2" name="gst_treatment" class="select-select2" style="width: 100%;" data-placeholder=" Select GST Treatment.." required>
	<option></option>
	<?php foreach ($gst as $value) {?>
		<option <?php if ($value['id']==$client_data[0]['gst_treatment']) {echo "selected";} ?> value="<?php echo $value['id']; ?>">
			<?php echo $value['gst_per']; ?>%
		</option>
    <?php } ?>
	</select>
	</div>
	</div>


	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> GSTIN </label>
	<div class="col-md-9">
	<input type="text" id="example-text-input" name="gstin" class="form-control" placeholder=" " value="<?php echo $client_data[0]['gstin']; ?>" required>
	</div>
	</div>


	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> PAN </label>
	<div class="col-md-9">
	<input type="text" id="example-text-input" name="pan" class="form-control" placeholder=" " value="<?php echo $client_data[0]['pan']; ?>" required>
	</div>
	</div>


	<div class="form-group">
	<label class="col-md-3 control-label" for="example-text-input"> TIN </label>
	<div class="col-md-9">
	<input type="text" id="example-text-input" name="tin" class="form-control" placeholder=" " value="<?php echo $client_data[0]['tin']; ?>" required>
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
			<textarea id="example-input-small"  name="billing_add" class="form-control input-sm" required placeholder=" " ><?php echo $billing_address[0]['address']; ?></textarea>
			</div>
			</div>

			<div class="form-group">
			<label class="col-md-3 control-label" for="example-select"> Country</label>
			<div class="col-md-9">
			<select required id="example-select2" name="billing_contry" class="select-select2 choosecountry" style="width: 100%;" data-placeholder=" Select country..">
			<option></option>
			<?php foreach ($country as $value) {?>
				<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$billing_address[0]['country']) {
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
				<?php foreach ($b_state as $value) {?>
				<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$billing_address[0]['state']) {
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
			<?php foreach ($b_city as $value) {?>
				<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$billing_address[0]['city']) {
					echo "selected";
				} ?>><?php echo $value['name']; ?></option>
			<?php }?>
			</select>
			</div>
			</div> 

			 
			<div class="form-group">
			<label class="col-sm-3 control-label"> Pin Code </label>
			<div class="col-sm-9">
			<input type="number" class="form-control" name="billing_pin" required placeholder=" " value="<?php echo $billing_address[0]['pincode']; ?>">
			</div>
			</div>
			 
			 
			</div>
			</div>

	<div class="col-md-6">
	 
	 
		<div class="block">
			<div class="block-title">
			<h2> Shipping Address </h2>
			</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="example-input-small"> Address </label>
					<div class="col-sm-9">
						<textarea required id="example-input-small"  name="shipping_add" class="form-control input-sm" placeholder=" "><?php echo $shipping_address[0]['address']; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label" for="example-select"> Country</label>
					<div class="col-md-9">
						<select required id="example-select2" name="shipping_contry" class="select-select2 chooseshipcountry" style="width: 100%;" data-placeholder=" Select country..">
						<option></option>
						<?php foreach ($country as $value) {?>
							<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$shipping_address[0]['country']) {
					echo "selected";
				} ?>><?php echo $value['name']; ?></option>
						<?php }?>
						</select>
					</div>
				</div>
			 
				<div class="form-group">
				<label class="col-md-3 control-label" for="example-select"> State </label>
				<div class="col-md-9">
				<select required id="example-select2" name="shipping_state" class="select-select2 chooseshipstate" style="width: 100%;" data-placeholder=" Select State..">
					<?php foreach ($s_state as $value) {?>
				<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$shipping_address[0]['state']) {
					echo "selected";
				} ?>><?php echo $value['name']; ?></option>
			<?php }?>
				</select>
				</div>
				</div> 
				 
				 
				<div class="form-group">
				<label class="col-md-3 control-label" for="example-select"> City </label>
				<div class="col-md-9">
				<select required id="example-select2" name="shipping_city" class="select-select2 chooseshipcity" style="width: 100%;" data-placeholder=" Select City..">
				<?php foreach ($s_city as $value) {?>
				<option value="<?php echo $value['id']; ?>" <?php if ($value['id']==$shipping_address[0]['city']) {
					echo "selected";
				} ?>><?php echo $value['name']; ?></option>
			<?php }?>
				</select>
				</div>
				</div> 

			 
				<div class="form-group">
					<label class="col-sm-3 control-label"> Pin Code </label>
					<div class="col-sm-9">
						<input type="number" class="form-control" name="shipping_pin" placeholder=" " value="<?php echo $shipping_address[0]['pincode']; ?>" required>
					</div>
				</div>
	 	</div> 
	    <button type="submit" class="btn btn-action btn-check">Save</button>
	</div>
</div>
</form>
