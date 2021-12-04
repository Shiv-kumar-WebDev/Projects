            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Admin Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Admin Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row mb-4">
                            <div class="col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="dropdown float-end">
                                                <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                  <i class="uil uil-ellipsis-v"></i>
                                                </a>
                                              
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="avatar-xs d-inline-block me-2">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    A
                                                </span>
                                            </div>
                                            <h5 class="mt-3 mb-1">ADMIN</h5>
                                            <p class="text-muted"></p>
                                        </div>

                                        <hr class="my-4">

                                        <div class="text-muted">
                                            <p>Hi I'm Admin,has been the industry's standard dummy text To an English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                                <i class="uil uil-user-circle font-size-20"></i>
                                                <span class="d-none d-sm-block">MY-PROFILE</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                                                <i class="uil uil-clipboard-notes font-size-20"></i>
                                                <span class="d-none d-sm-block">CHANGE-PASSWORD</span> 
                                            </a>
                                        </li>
                                    </ul>
                                   <!-- Tab content -->
                                   <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <div class="table-responsive">
                                                         <div class="row">
                                                            <div class="col-lg-12">
                                                                <div id="addproduct-accordion" class="custom-accordion">
                                                                    <div class="card">
                                                                        <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                                                                            <div class="p-4 border-top">
                                                                                <form action="<?php echo base_url('admin/Dashboard/doProfile'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="productname">Admin Name</label>
                                                                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off" required value="<?php echo $profile['username'];?>">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="productname">Admin Email</label>
                                                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" required value="<?php echo $profile['email'];?>">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="productname">Admin Contact</label>
                                                                                        <input type="number" name="admin_phoneno" id="admin_phoneno" class="form-control" placeholder="Phone No" autocomplete="off" required value="<?php echo $profile['admin_phoneno'];?>">
                                                                                    </div>                                                                      
                                                                                    <hr>
                                                                                    <div class="row">
                                                                                        <div class="col-md-7 text-end">                                      
                                                                                            <button type="submit" class="btn btn-success"><i class="uil uil-file-alt me-1"></i> Save Changes</button>
                                                                                        </div> 
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="tab-pane" id="tasks" role="tabpanel">
                                            <div>
                                                <div>
                                                    <div class="table-responsive">
                                                         <div class="row">
                                                            <div class="col-lg-12">
                                                                <div id="addproduct-accordion" class="custom-accordion">
                                                                    <div class="card">
                                                                        <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                                                                            <div class="p-4 border-top">
                                                                                <form action="<?php echo base_url('admin/Dashboard/doChangepassword'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="productname">Old Password</label>
                                                                                        <input type="password" name="opass" id="opass" class="form-control" placeholder="Add Old Password" autocomplete="off" required>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="productname">New Password</label>
                                                                                        <input type="password" name="npass" id="npass" class="form-control" placeholder="Add New Password" autocomplete="off" required>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="productname">Confirm Password</label>
                                                                                        <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Add Confirm Password" autocomplete="off" required>
                                                                                    </div>
                                                                                    <hr>
                                                                                    <div class="row">
                                                                                        <div class="col-md-7 text-end">
                                                                                            <button type="submit" class="btn btn-success"><i class="uil uil-file-alt me-1"></i> Change</button>
                                                                                        </div> 
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Minible.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://themesbrand.com/" target="_blank" class="text-reset">Themesbrand</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar="" class="h-100">

                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>



                <!-- Settings -->
                <hr class="mt-0">
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked="">
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url('assets/admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js"');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/metismenu/metisMenu.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/simplebar/simplebar.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/node-waves/waves.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/waypoints/lib/jquery.waypoints.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/jquery_counterup/jquery.counterup.min.js');?>"></script>

        <!-- apexcharts -->
        <script src="<?php echo base_url('assets/admin_assets/libs/apexcharts/apexcharts.min.js');?>"></script>

        <script src="<?php echo base_url('assets/admin_assets/js/pages/dashboard.init.js');?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets/admin_assets/js/app.js');?>"></script>

    </body>
</html>
