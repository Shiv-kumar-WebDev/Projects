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
      <h1>Instagram</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Instagram Post</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Instagram/doAddInstagram'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Post Url</label>
				<div class="col-sm-6">
				<input type="text" name="post_url" id="post_url" class="form-control" placeholder="Post Url" autocomplete="off" required>
				</div>
			</div>


			<div class="form-group has-feedback">
	            <label for="exampleInputPassword1" class="col-sm-2 control-label">Image </label>
	              <div class="input-group control-group after-add-more col-sm-6">
	                    <input type="file"  id="file" class="form-control" name="post_image" />
		        </div>
		     </div>
	        
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-success pull-left">Add Instagram Post</button>
				<a href="<?php echo base_url("Instagram");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>	
			</div>			
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>
