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
            <h4 class="mb-0">Edit Toppers</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Edit Toppers</li>
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
                  
                    <form action="<?php echo base_url('admin/Toppers/update_toppers') ?>/<?php echo $toppers[0]['toppers_id'] ?>" method="post" enctype="multipart/form-data">
                      <div class="mb-3">

                        <label class="form-label" for="title">Toppers Title</label>
                        <input id="title" name="title" type="text" class="form-control" value="<?php echo $toppers[0]['toppers_title'] ?>" />

                        <label class="form-label" for="toppers_class">Toppers Class</label>
                        <input id="toppers_class" name="toppers_class" type="text" class="form-control" value="<?php echo $toppers[0]['toppers_class'] ?>" />

                        <label class="form-label" for="toppers_percentage">Toppers Percentage</label>
                        <input id="toppers_percentage" name="toppers_percentage" type="text" class="form-control" value="<?php echo $toppers[0]['toppers_percentage'] ?>" />
                       
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label" for="Imgname">Image</label>
                        <br><br>
                        <img width="300" src="<?php echo base_url('assets/admin_assets/images/toppers/' . $toppers[0]['toppers_img'] . ''); ?>" alt="">
                        
                        <input type="file" name="image" id="" class="form-control">
                      </div>
                      <div class="mb-3">

                        <input id="date" name="date" type="hidden" value="<?php echo $toppers[0]['created_at'] ?>" />
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