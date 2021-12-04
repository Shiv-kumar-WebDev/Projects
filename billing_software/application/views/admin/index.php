<!DOCTYPE html>
 <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
 
<title> Handicraft </title>
 
<meta name="author" content=" ">
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
<link rel="shortcut icon" href="<?php echo base_url();?>assets/admin_assets/img/favicon.png">
 
 
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_assets/css/bootstrap.min-3.6.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_assets/css/plugins-3.8.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_assets/css/main-3.8.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_assets/css/themes-3.1.css">
<script src="<?php echo base_url();?>assets/admin_assets/js/vendor/modernizr.min-3.6.js"></script>
</head>
<body>
<div id="login-background">
<img src="<?php echo base_url();?>assets/admin_assets/img/placeholders/headers/login_header.jpg" alt="Login Background" class="animation-pulseSlow">
</div>
<div id="login-container" class="animation-fadeIn">
<div class="login-title text-center">
<h1><i class="gi gi-flash"></i> <strong> Handicraft </strong><br><small>Please <strong>Login</strong>  </small></h1>
		<?php $this->load->view("admin/common/errors");?>
</div>
<div class="block push-bit">
<form action="<?php echo base_url('Login/doLogin'); ?>" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
<div class="form-group">
<div class="col-xs-12">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
<input type="email" id="login-email" name="email" class="form-control input-lg" placeholder="Email" required>
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="input-group">
<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
<input type="password" id="login-password" name="password" class="form-control input-lg" placeholder="Password" required>
</div>
</div>
</div>
<div class="form-group form-actions">
<div class="col-xs-4">
<span></span>
</label>
</div>
<div class="col-xs-8 text-right">
<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
</div>
</div>
 
</form>
 
</div>

</div>
 
<script src="<?php echo base_url();?>assets/admin_assets/js/vendor/jquery.min-3.6.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/vendor/bootstrap.min-3.6.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/plugins-3.8.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/app-3.7.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVxLoIeqnW5iqwWDOXNQ57PHPMWSqwNVU"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/helpers/gmaps.min.js"></script>
 
</body>
</html>