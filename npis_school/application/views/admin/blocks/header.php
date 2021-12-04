<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Nips_school | Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/admin_assets/images/favicon.ico');?>">

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url('assets/admin_assets/css/bootstrap.min.css');?>" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="<?php echo base_url('assets/admin_assets/css/icons.min.css');?>" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?php echo base_url('assets/admin_assets/css/app.min.css');?>" id="app-style" rel="stylesheet" type="text/css">

    </head>

    
    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('assets/admin_assets/images/logo-sm.png');?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('assets/admin_assets/images/logo-dark.png');?>" alt="" height="20">
                                </span>
                            </a>

                            <a href="<?php echo base_url('Dashboard');?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('assets/admin_assets/images/logo-sm.png');?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('assets/admin_assets/images/logo-light.png');?>" alt="" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar-xs d-inline-block me-2">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        A
                                    </span>
                                </div>
                                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">ADMIN</span>
                                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="<?php echo base_url('profile');?>"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">View Profile</span></a>    
                                <a class="dropdown-item" href="<?php echo base_url('Login/logout');?>"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Log out</span></a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="uil-cog"></i>
                            </button>
                        </div>
            
                    </div>
                </div>
            </header>