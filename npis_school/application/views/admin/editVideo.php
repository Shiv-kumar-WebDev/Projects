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
                  <h4 class="mb-0">Edit Video</h4>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active">Edit Video</li>
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
                          <?php foreach($videos as $video){ 
                            ?>
                        <form action="<?php echo base_url('admin/Video/update_video') ?>/<?php echo $video['video_id'] ?>" method="post">
                          <div class="mb-3">
                          
                            <label class="form-label" for="video_link"
                              >Video Link</label
                            >
                            <input
                              id="video_link"
                              name="video_link"
                              type="text"
                              class="form-control"
                              value="<?php echo $video['video_link'] ?>"
                            />
                            
                          </div>
                          
                          <div class="mb-3">
                             
                            <input
                              id="date"
                              name="date"
                              type="hidden"
                              value="<?php echo $video['created_at'] ?>"
                            />
                          </div>
                          
                         

                          <button class="btn" type="submit">
                          <a class="btn btn-success">
                            <i class="uil uil-file-alt me-1"></i> Save
                          </a>
                          </button>
                        </form>
                        <?php } ?>
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