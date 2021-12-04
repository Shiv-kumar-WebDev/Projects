<div class="content-wrapper">
	<section class="content-header">
      <h1>Sub Category</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Sub Category</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			
			</div>
			</div>
			<form action="<?php echo base_url('admin/Subcategory/doUpdateSubCategory/'.$editcategory['subcategory_id']); ?>" method="post" name="cform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
                            
	           <div class="form-group">
					<label class="col-sm-2 control-label">Main Category</label>
					<div class="col-sm-6">
						<select class="form-control choosemaincat select2" name="maincatid" required>
							<option value="">Select Main Category</option>
								<?php foreach ($maincategory as $row) { ?>
									<option value="<?php echo $row['maincategory_id']; ?>"><?php echo $row['maincategory_name_en']; ?></option>
								<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Category</label>
					<div class="col-sm-6">
						<select class="form-control select2 ctgry" name="catid" >

							<option value="">Select Category</option>

						</select>
					</div>
				</div>
                            
                            
				<div class="form-group">
					<label class="col-sm-2 control-label">Category Name(En)</label>
					<div class="col-sm-6">
					<input type="text" name="name_en" id="name_en" class="form-control" value="<?php echo $editcategory['subcategory_name_en'];?>" autocomplete="off" required>
					</div>
				</div>
				
				 
				

			<div class="form-group">
				<label class="col-sm-2 control-label">Image</label>
				<div class="col-sm-6">
				<input type="file" name="catimage" id="catimage" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-6">
				<?php if(!empty($editcategory['subcategory_image'])){?>
				<img src="<?php echo base_url("assets/images/subcategory/".$editcategory['subcategory_image']);?>" height="100" width="150" />	
				<?php }else{?>
				<img src="<?php echo base_url("assets/img/placeholder.png");?>" height="100" width="150" />
				<?php } ?>
				</div>								
			</div>
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Edit Sub Category</button>
				<a href="<?php echo base_url("Subcategory");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>