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

  <title><?php echo ucfirst($sitename);?></title>



  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">

  

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/font-awesome.min.css");?>">



  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/ionicons.min.css");?>">

  

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/select2.min.css");?>">
  

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-datepicker.min.css");?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-timepicker.min.css");?>">

  

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/AdminLTE.min.css");?>">

  

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/dataTables.bootstrap.min.css");?>">

  

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/_all-skins.min.css");?>">
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery3.min.css");?>">

  <script>
      var baseurl="<?php echo base_url();?>";
      var base_url="<?php echo base_url();?>";
</script>

</head>

<body class="hold-transition skin-blue">

<div class="wrapper">

	<header class="main-header">

		<a class="logo">

		<span class="logo-mini"><?php echo ucfirst($sitename);?></span>

		<span class="logo-lg"><b><?php echo ucfirst($sitename);?> Aauthenticity </b></span>

		</a>

    

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

          <span class="sr-only">Toggle navigation</span>

        </a>



        <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          

			<li class="dropdown user user-menu">

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">

				  <img src="<?php echo base_url("assets/img/admin.jpg");?>" class="user-image" alt="User Image">

				  <span class="hidden-xs"><?php echo $this->session->userdata("username");?></span>

				</a>

            <ul class="dropdown-menu">

              <!-- User image -->

				<li class="user-header"><img src="<?php echo base_url("assets/img/admin.jpg");?>" class="img-circle" alt="User Image">

					<p><?php echo $this->session->userdata("username");?></p>

					<p><?php echo $this->session->userdata("admin_phoneno");?></p>

			    </li>
               <!-- Menu Footer-->
			    <li class="user-footer">
					<div class="row">
						<div class="col-xs-4 text-center">
							<a href="<?php echo base_url('Change-Password');?>" class="btn btn-default btn-flat">Change</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="<?php echo base_url('profile');?>" class="btn btn-default btn-flat">Profile</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="<?php echo base_url('Login/logout');?>" class="btn btn-default btn-flat">Logout</a>
						</div>
					</div>
			    </li>

            </ul>

			</li>

        </ul>

        </div>    

	</nav>

   </header>

 

    <aside class="main-sidebar">

	<section class="sidebar">

		<ul class="sidebar-menu" data-widget="tree">

        <li><a href="<?php echo base_url('Dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('Slider');?>"><i class="fa fa-laptop"></i> <span>Slider</span></a></li>
        <li><a href="<?php echo base_url('MainCategory');?>"><i class="fa fa-file-o"></i> <span>Main Category</span></a></li>

        <li><a href="<?php echo base_url('Category');?>"><i class="fa fa-files-o"></i> <span>Category</span></a></li>
        <li><a href="<?php echo base_url('Subcategory');?>"><i class="fa fa-files-o"></i> <span>Sub Category</span></a></li>
        <li><a href="<?php echo base_url('Country');?>"><i class="fa fa-list"></i> <span>Country</span></a></li>
        <li><a href="<?php echo base_url('Country_Weight');?>"><i class="fa fa-list"></i> <span>Country Weight </span></a></li>
     <!-- <li><a href="<?php echo base_url('Attr_Optn');?>"><i class="fa fa-th"></i> <span>Attr Option</span></a></li> -->
        <li><a href="<?php echo base_url('Product');?>"><i class="fa fa-list"></i> <span>Product</span></a></li>
      <li><a href="<?php echo base_url('coupon');?>"><i class="fa fa-th"></i> <span>Coupon</span></a></li>
        
        <li><a href="<?php echo base_url('User');?>"><i class="fa fa-user"></i> <span>User</span></a></li>
        <!-- <li><a href="<?php echo base_url('Reviews');?>"><i class="fa fa-user"></i> <span>User Reviews</span></a></li> -->
        <li><a href="<?php echo base_url('Order');?>"><i class="fa fa-shopping-cart"></i> <span>Order</span></a></li>
        <li><a href="<?php echo base_url('purchased');?>"><i class="fa fa-shopping-cart"></i> <span>Purchased Order</span></a></li>
        <li><a href="<?php echo base_url('Waste_List');?>"><i class="fa fa-shopping-cart"></i> <span>Waste</span></a></li>
        <li><a href="<?php echo base_url('ProductView_outOfStock');?>"><i class="fa fa-th"></i> <span>Products Stock </span></a></li> 
        <li><a href="<?php echo base_url('Quantity_Logs');?>"><i class="fa fa-book"></i> <span>Quantity Logs</span></a></li>
        <li><a href="<?php echo base_url('Ledger');?>"><i class="fa fa-book"></i> <span>Ledger</span></a></li>

        <!-- <li><a href="<?php echo base_url('Quantity');?>"><i class="fa fa-book"></i> <span> Product Quantity</span></a></li> -->
        <li><a href="<?php echo base_url('Instagram');?>"><i class="fa fa-book"></i> <span>InstaGram</span></a></li>

        <!-- <li><a href="<?php echo base_url('Address');?>"><i class="fa fa-address-card-o"></i> <span>Address</span></a></li> -->

        <!-- <li><a href="<?php echo base_url('city');?>"><i class="fa fa-map-signs"></i> <span>City</span></a></li> -->
         <li><a href="<?php echo base_url('Page');?>"><i class="fa fa-files-o"></i> <span>Page</span></a></li> 
        <!--<li><a href="<?php echo base_url('DeliveryBoy');?>"><i class="fa fa-user"></i> <span>Delivery Boy</span></a></li>-->


         <!-- <li><a href="<?php echo base_url('blog');?>"><i class="fa fa-laptop"></i> <span> Blog </span></a></li>  -->


        <li><a href="<?php echo base_url('settings');?>"><i class="fa fa-cog"></i> <span>Settings</span></a></li>

      </ul>

    </section>

	</aside>
	
	
	
<style>
.skin-blue .sidebar a {
    color: #ffffff;
}    

.content-header>h1 {
    margin: 0;
    font-size: 24px;
    text-transform: capitalize;
    font-weight: 700;
}

.skin-blue .main-header .navbar {
    background-color: #222d32;
}

</style>	

