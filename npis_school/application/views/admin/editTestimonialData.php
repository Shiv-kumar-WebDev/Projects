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
            <h4 class="mb-0">Edit Testimonial</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Edit Testimonial</li>
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
                  <?php 
                    $testimonial = $testimonials[0];
                  ?>
                    <form action="<?php echo base_url('admin/Testimonial/update_Testimonial') ?>/<?php echo $testimonial['testimonial_id'] ?>" method="post">
                      <div class="mb-3">

                        <label class="form-label" for="title">Testimonial</label>
                        <input id="title" name="title" type="text" class="form-control" value="<?php echo $testimonial['testimonial_title'] ?>" />
                        <label class="form-label" for="testimonial_description">Testimonial Description</label>
                        <textarea id="testimonial_description" name="testimonial_description" class="form-control"><?php echo $testimonial['testimonial_description'] ?></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="testimonial_rating">Testimonial Rating</label>
                        <select name="testimonial_rating" id="testimonial_rating" class="form-control">
                          <option value="" selected disabled hidden>Select Rating</option>
                          <?php for($i=1;$i<=5;$i++){ ?>
                            <option value="<?php echo $i;  ?>" <?php echo ($i==$testimonial['testimonial_rating'])?'selected':'';  ?> > <?php echo $i;  ?></option>
                          <?php } ?>

                         
                        </select>
                   
                      <div class="mb-3">

                        <input id="date" name="date" type="hidden" value="<?php echo $testimonial['created_at'] ?>" />
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