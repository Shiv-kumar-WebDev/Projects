<div class="content-wrapper">
	<section class="content-header">
      <h1>Logo</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Logo</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Category/doAddlogo'); ?>" method="post" name="sform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Site Name</label>
				<div class="col-sm-6">
				<input type="text" name="sitename" id="sitename" class="form-control" required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Logo</label>
				<div class="col-sm-6">
				<input type="file" name="sliderimage" id="sliderimage" class="form-control" required>
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Add Logo</button>
				<a href="<?php echo base_url("Logo");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>