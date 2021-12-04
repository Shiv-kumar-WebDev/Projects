<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Login | Minible - Admin & Dashboard Template</title>
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
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to access admin panel.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form name="loginForm" method="POST" action="<?php echo base_url('admin/Login/doLogin'); ?>" enctype="multipart/form-data">
        
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Admin Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Admin Email">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Admin Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Admin password">
                                        </div>
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>