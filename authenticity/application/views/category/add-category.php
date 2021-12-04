<div class="content-wrapper">
	<section class="content-header">
      <h1>Category</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Category/doAddCategory'); ?>" method="post" name="cform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Main Category Name</label>
						<div class="col-sm-6">
							<select name="maincat_id" id="maincat_id" class="form-control select2" required>
								<option value="">Select Main Category</option>
								<?php 
								foreach ($maincategory as $main) {?>
								
								<option value="<?php echo $main['maincategory_id'];?>"><?php echo $main['maincategory_name_en']; ?></option>
								<?php
								}?>
							</select>

						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Category Name(En)</label>
					<div class="col-sm-6">
					<input type="text" name="name_en" id="name_en" class="form-control" placeholder="Category Name" autocomplete="off" required>
					</div>
				</div>
				
			<div class="form-group">
				<label class="col-sm-2 control-label">Image</label>
				<div class="col-sm-6">
				<input type="file" name="catimage" id="catimage" class="form-control">
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Add Category</button>
				<a href="<?php echo base_url("Category");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>