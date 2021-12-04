<?php 
    $this->db->select("*");
    $this->db->from("site_settings");
    $this->db->where("name",'site_name');
    $query = $this->db->get();
    $data = $query->result_array();
    $sitename =$data[0]['value']; 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo ucfirst($sitename);?> | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/font-awesome.min.css");?>">
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/ionicons.min.css");?>">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/AdminLTE.min.css");?>">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
 
 	<div class="login-box-body">
	    
                     <a href="http://aauthenticity.com/">
                            <img src="http://aauthenticity.com/assets/website_assets/images/jewellery-logo.png" alt=" " title=" ">
                        </a>	    
	    
	    
    <p class="login-box-msg">Enter your email address and password to access admin panel.</p>
	<?php $this->load->view("common/errors");?>
    <form name="loginForm" method="POST" action="<?php echo base_url('admin/Login/doLogin'); ?>" enctype="multipart/form-data">
		<div class="form-group has-feedback">
			<input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email" required>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
        <div class="form-group has-feedback">
			<input type="password" name="password" id="password" class="form-control" autocomplete="off" placeholder="Password" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="row">
			<div class="col-xs-4"></div>
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Log In</button>
			</div><br/>
        </div>
	</form>
	</div>
</div>
<style>
.login-box, .register-box {
    width: 430px;
    margin: 7% auto;
}  

.login-box-msg, .register-box-msg {
    margin: 0;
    text-align: center;
    padding: 18px 20px 20px 15px;
}

</style>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>

    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script> 
</body>

</html>

