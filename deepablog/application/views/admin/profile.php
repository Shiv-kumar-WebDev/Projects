<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
    
    
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
                                                                                <form action="<?php echo base_url('admin/Admin/doProfile'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="productname">Admin Name</label>
                                                                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off" required value="<?php echo $profile['name'];?>">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label" for="productname">Admin Email</label>
                                                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" required value="<?php echo $profile['email'];?>">
                                                                                    </div>
                                                                                    <!-- <div class="mb-3">
                                                                                        <label class="form-label" for="productname">Admin Contact</label>
                                                                                        <input type="number" name="admin_phoneno" id="admin_phoneno" class="form-control" placeholder="Phone No" autocomplete="off" required value="<?php //echo $profile['admin_phoneno'];?>">
                                                                                    </div>                                                                       -->
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
                                                                                <form action="<?php echo base_url('admin/Admin/doChangepassword'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
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
    </div> <!-- container-fluid -->
</div>
</div>

 <!-- END layout-wrapper -->