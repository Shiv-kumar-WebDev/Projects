<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="
                    page-title-box
                    d-flex
                    align-items-center
                    justify-content-between
                  ">
                        <h4 class="mb-0">Add Gallery</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Add Gallery</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <?php $this->load->view("admin/common/errors"); ?>
                    <div id="addproduct-accordion" class="custom-accordion">
                        <div class="card">
                            <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                                <div class="p-4 border-top">
                                    <form action="<?php echo base_url('admin/Gallery/insert') ?>" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <div class="mt-3">
                                                <label class="form-label" for="img_type">Image Category</label>
                                                <select class="form-control" name="img_type" required>
                                                    <option value="" selected disabled hidden>Select Category</option>
                                                    <option value="1">Gallery</option>
                                                    <option value="2">Events</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">

                                            <div class="mt-3">
                                                <label class="form-label" for="title">Gallery Title</label>
                                                <input id="title" name="title" type="text" class="form-control" required />
                                            </div>


                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="image">Gallery Image</label>
                                            <input type="file" name="image" id="" class="form-control">
                                        </div>




                                        <button class="btn" type="submit">
                                            <a class="btn btn-success">
                                                <i class="uil uil-file-alt me-1"></i> Save
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <!-- end row-->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->