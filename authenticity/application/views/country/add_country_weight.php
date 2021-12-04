 <style>
	button.btn.btn-success.add-variant {
		margin-top: 22px;
	}

	.appe {
		float: left;
		width: 100%;
		overflow: auto;
	}

	.pip img {
		height: 200px;
	}

	.remove {
		background: black;
		color: white;
		padding: 7px;
		cursor: pointer;
	}
}
</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<div class="content-wrapper">
	<section class="content-header">
      <h1>Country Weight</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Country Weight</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Country/doAddCountryWeight'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Country</label>
				<div class="col-sm-6">
					<select class="form-control select2" name="country_id" required>
						<option value="">Select Main Country</option>
							<?php foreach ($country as $row) { ?>
								<option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
							<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Country Weight </label>
				<div class="col-sm-3">
				<input type="number" name="c_weight_from" id="c_weight_from" class="form-control" placeholder="Country Weight From" autocomplete="off" required>
				</div>
				<div class="col-sm-3">
				<input type="number" name="c_weight_to" id="c_weight_to" class="form-control" placeholder="Country Weight To" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Country Weight Price</label>
				<div class="col-sm-6">
				<input type="text" name="c_weight_price" id="c_weight_price" class="form-control" placeholder="Country Weight Price" autocomplete="off" required>
				</div>
			</div>
	        
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-success pull-left">Add Country</button>
				<a href="<?php echo base_url("Country_Weight");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>	
			</div>			
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>
