<div class="content-wrapper">
	<section class="content-header">
      <h1>Change Password</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('Dashboard/doChangepassword'); ?>" method="post" name="cform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Old Password</label>
					<div class="col-sm-6">
					<input type="password" name="opass" id="opass" class="form-control" placeholder="Add Old Password" autocomplete="off" required>
					</div>
				</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">New Password</label>
				<div class="col-sm-6">
				<input type="password" name="npass" id="npass" class="form-control" placeholder="Add New Password" autocomplete="off" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Confirm Password</label>
				<div class="col-sm-6">
				<input type="password" name="cpass" id="cpass" class="form-control" placeholder="Add Confirm Password" autocomplete="off" required>
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