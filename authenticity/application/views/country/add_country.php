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
      <h1>Country</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Country</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Country/doAddCountry'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Country Name</label>
				<div class="col-sm-6">
				<input type="text" name="country_name" id="country_name" class="form-control" placeholder="Country Name" autocomplete="off" required>
				</div>
			</div>
	        
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-success pull-left">Add Country</button>
				<a href="<?php echo base_url("Country");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>	
			</div>			
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>
