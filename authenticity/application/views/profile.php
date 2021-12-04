<div class="content-wrapper">
	<section class="content-header">
      <h1>Change Profile</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Profile</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Dashboard/doProfile'); ?>" method="post" name="profileform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-6">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" required value="<?php echo $profile['email'];?>">
					</div>
				</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Username</label>
				<div class="col-sm-6">
				<input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off" required value="<?php echo $profile['username'];?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Phone No</label>
				<div class="col-sm-6">
				<input type="number" name="admin_phoneno" id="admin_phoneno" class="form-control" placeholder="Phone No" autocomplete="off" required value="<?php echo $profile['admin_phoneno'];?>">
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Change</button>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>