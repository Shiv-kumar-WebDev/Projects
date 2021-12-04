<div class="content-wrapper">
	<section class="content-header">
      <h1>maincategory</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add maincategory</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/MainCategory/doAddmaincategory'); ?>" method="post" name="cform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">maincategory Name(En)</label>
					<div class="col-sm-6">
					<input type="text" name="maincategory_name_en" id="maincategory_name_en" class="form-control" placeholder="maincategory Name" autocomplete="off" required>
					</div>
				</div>
				
			<div class="form-group">
				<label class="col-sm-2 control-label">Image</label>
				<div class="col-sm-6">
				<input type="file" name="maincatimage" id="maincatimage" class="form-control" accept="image/*">
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Add maincategory</button>
				<a href="<?php echo base_url("MainCategory");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>