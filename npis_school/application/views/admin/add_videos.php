<!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
        <div class="page-content">
          <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
              <div class="col-12">
                <div
                  class="
                    page-title-box
                    d-flex
                    align-items-center
                    justify-content-between
                  "
                >
                  <h4 class="mb-0">Add Video</h4>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active">Add Video</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <!-- end page title -->

            <div class="row">
              <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                  <div class="card">
                    <div
                      id="addproduct-billinginfo-collapse"
                      class="collapse show"
                      data-bs-parent="#addproduct-accordion"
                    >
                      <div class="p-4 border-top">
                        <form action="<?php echo base_url('admin/Video/doaddvideos') ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">                           
                                <div class="mt-3">
                                    <label class="form-label" for="video_link">Video Category</label>
                                    <select class="form-control" name="video_cat" required>
                                        <option value="" selected disabled hidden>Select Category</option>
                                        <option value="1">Gallery</option>
                                        <option value="2">Events</option>
                                </select>
                                </div>
                            </div>
                            <div class="mb-3">                           
                                <div class="mt-3">
                                    <label class="form-label" for="video_link">Video Title</label>
                                    <input id="video_title" name="video_title" type="text" class="form-control" required />
                                </div>
                            </div>
                            <div class="mb-3">                           
                                <div class="mt-3">
                                    <label class="form-label" for="video_link">Choose Video</label>
                                    <input type="file" name="video" id="video" class="form-control" required>
                                </div>
                            </div>
                          <button class="btn" type="submit">
                          <a class="btn btn-success">
                            <i class="uil uil-file-alt me-1"></i> SAVE
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