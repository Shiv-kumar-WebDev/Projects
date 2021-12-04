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
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="<?php echo base_url();?>assets/admin_assets/js/vendor/modernizr.min-3.6.js"></script>
<script>
      var baseurl="<?php echo base_url();?>"
</script>
</head>

<body>
<div id="page-wrapper">
<div class="preloader themed-background">
<h1 class="push-top-bottom text-light text-center"><strong> Bill </strong>  Handicraft </h1>
<div class="inner">
<h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
<div class="preloader-spinner hidden-lt-ie10"></div>
</div>
</div>
<div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
 
 
 
 
<div id="sidebar">
<div id="sidebar-scroll">
<div class="sidebar-content">
<a href="<?php echo base_url(); ?>" class="sidebar-brand">
<i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Bill</strong>  Handicraft </span>
</a>
 
<ul class="sidebar-nav">


<li><a href="<?php echo base_url(); ?>" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a></li>

<li><a class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-certificate sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Clients </span></a>
<ul>
<li> <a href="<?php echo base_url('Clients'); ?>">  View Client </a> </li>
<li> <a href="<?php echo base_url('AddClient'); ?>"> Add Client </a></li>
</ul>
</li>


<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-notes_2 sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Vendors </span></a>
<ul>
 <li> <a href="<?php echo base_url('AddVendor'); ?>"> Add Vendors </a></li>
<li> <a href="<?php echo base_url('Vendor'); ?>">  View Vender </a></li>
</ul>
</li>

 
<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-table sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Items </span></a>
<ul>
<li> <a href="<?php echo base_url('AddItems'); ?>"> Add Items </a></li>
<li> <a href="<?php echo base_url('Items'); ?>">  View Items </a></li>
</ul>
</li>

 
<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-cup sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">  Invoices </span></a>
<ul>
<li> <a href="<?php echo base_url('AddInvoices'); ?>"> Add Invoice </a></li>
<li> <a href="<?php echo base_url('Invoices'); ?>"> View Invoice </a></li>
</ul>
</li>



<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Quotes  </span></a>
<ul>
<li> <a href="<?php echo base_url('AddQuotes'); ?>"> Add Quotes </a></li>
<li> <a href="<?php echo base_url('Quotes'); ?>">  View Quotes </a></li>
</ul>
</li>


<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Delivery Notes  </span></a>
<ul>
<li> <a href="<?php echo base_url('AddDelivery_notes'); ?>"> Add Delivery Notes </a></li>
<li> <a href="<?php echo base_url('Delivery_notes'); ?>">  View Delivery Notes </a></li>
</ul>
</li>

<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Credit Notes  </span></a>
<ul>
 <li> <a href="<?php echo base_url('AddCredit_notes'); ?>"> Add Credit Notes</a></li>
<li> <a href="<?php echo base_url('Credit_notes'); ?>">  View Credit Notes </a></li>
</ul>
</li>


<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Debit Notes  </span></a>
<ul>
<li> <a href="<?php echo base_url('AddDebit_notes'); ?>"> Add Debit Notes </a></li>
<li> <a href="<?php echo base_url('Debit_notes'); ?>">  View Debit Notes </a></li>
</ul>
</li>

<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Purchase Orders  </span></a>
<ul>
<li> <a href="<?php echo base_url('AddPurchase_orders'); ?>"> Add Purchase Orders </a></li>
<li> <a href="<?php echo base_url('Purchase_orders'); ?>"> View Purchase Orders </a></li>
</ul>
</li>


<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Bills </span></a>
<ul>
<li> <a href="<?php echo base_url('AddBills'); ?>"> Add Bills </a></li>
<li> <a href="<?php echo base_url('Bills'); ?>">  View Bills </a></li>
</ul>
</li>


<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Expenses </span></a>
<ul>
<li> <a href="<?php echo base_url('AddExpenses'); ?>"> Add  Expenses  </a></li>
<li> <a href="<?php echo base_url('Expenses'); ?>">  View Expenses </a></li>
</ul>
</li>

<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"> Payments </span></a>
<ul>
<li> <a href="<?php echo base_url('AddPayment'); ?>"> Add  Payments  </a></li>
<li> <a href="<?php echo base_url('Payments'); ?>">  View Payments </a></li>
</ul>
</li>


<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">  Reports </span></a>
<ul>
<li> <a href="<?php echo base_url('AddReport'); ?>"> Add  Reports  </a></li>
<li> <a href="<?php echo base_url('Reports'); ?>"> View Reports </a></li>
</ul>
</li>

<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">  Preferences </span></a>
<ul>
<li> <a href="<?php echo base_url('AddPreference'); ?>"> Add  Preferences  </a></li>
<li> <a href="<?php echo base_url('Preferences'); ?>">  View Preferences </a></li>
</ul>
</li>


<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">  Country </span></a>
<ul>
    <li> <a href="<?php echo base_url('addCountry') ?>">  Add Country </a></li>
    <li> <a href="<?php echo base_url('viewCountry') ?>">View Country  </a></li>
</ul>
</li>

<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">  State </span></a>
<ul>
<li> <a href="<?php echo base_url('addState') ?>"> Add State </a></li>
<li> <a href="<?php echo base_url('viewState') ?>"> View State </a></li>
</ul>
</li>

<li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">  City </span></a>
<ul>
<li> <a href="<?php echo base_url('addCity') ?>">  Add City </a></li>
<li> <a href="<?php echo base_url('viewCity') ?>"> View City </a></li>
</ul>
</li>



</ul> 
</div>
</div>
</div>






<div id="main-container">


<header class="navbar navbar-default">
<ul class="nav navbar-nav-custom">
<li>
<a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
<i class="fa fa-bars fa-fw"></i>
</a>
</li>
<li class="dropdown">
<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<i class="gi gi-settings"></i>
</a>
<ul class="dropdown-menu dropdown-custom dropdown-options">
<li class="dropdown-header text-center">Header Style</li>
<li>
<div class="btn-group btn-group-justified btn-group-sm">
<a href="javascript:void(0)" class="btn btn-primary active" id="options-header-default">Light</a>
<a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
</div>
</li>
<li class="dropdown-header text-center">Page Style</li>
<li>
<div class="btn-group btn-group-justified btn-group-sm">
<a href="javascript:void(0)" class="btn btn-primary active" id="options-main-style">Default</a>
<a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
</div>
</li>
</ul>
</li>
</ul>


<ul class="nav navbar-nav-custom pull-right">
 
<li class="dropdown">
<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<img src="<?php echo base_url();?>assets/admin_assets/img/placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
</a>
<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
<li class="divider"></li>
<li><a href="user_profile.php"><i class="fa fa-user fa-fw pull-right"></i>Profile</a></li>
<li class="divider"></li>
<li><a href="<?php echo base_url('Login/logout');?>"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a></li>
</ul>
</li>
</ul>
</header>