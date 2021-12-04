<div class="content-wrapper">
	<section class="content-header">
      <h1>Category</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Category</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			
			</div>
			</div>
			<form action="<?php echo base_url('admin/Category/doUpdateCategory/'.$editcategory['category_id']); ?>" method="post" name="cform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
	                <label class="col-sm-2 control-label">Main Category Name</label>
	                <div class="col-sm-6">
	                    <select name="maincat_id" id="maincat_id" class="form-control select2" required>
	                        <option value="">Select Main Category</option>
	                        <?php 
	                        for($i=0;$i<count($maincategory);$i++){?>
	                            <option value="<?php echo($maincategory[$i]['maincategory_id']);?>" <?php if($maincategory[$i]['maincategory_id'] == 
	                            $editcategory['maincategory_id']){ echo "selected='selected'";}?>><?php echo($maincategory[$i]['maincategory_name_en']);?></option>
	                        <?php
	                        }?>
	                    </select>

	                </div>
	            </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Category Name(En)</label>
					<div class="col-sm-6">
					<input type="text" name="name_en" id="name_en" class="form-control" value="<?php echo $editcategory['name_en'];?>" autocomplete="off" required>
					</div>
				</div>
				<div class="form-group">
				
			<div class="form-group">
				<label class="col-sm-2 control-label">Image</label>
				<div class="col-sm-6">
				<input type="file" name="catimage" id="catimage" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-6">
				<?php if(!empty($editcategory['image'])){?>
				<img src="<?php echo base_url("assets/images/category/".$editcategory['image']);?>" height="100" width="150" />	
				<?php }else{?>
				<img src="<?php echo base_url("assets/img/placeholder.png");?>" height="100" width="150" />
				<?php } ?>
				</div>								
			</div>
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Update Category</button>
				<a href="<?php echo base_url("Category");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>