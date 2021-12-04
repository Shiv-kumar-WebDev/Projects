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
            <h4 class="mb-0">Edit News Events</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Edit News Events</li>
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
                 
                    <form action="<?php echo base_url('admin/News_events/update_news_events') ?>/<?php echo $news_events[0]['news_events-id'] ?>" method="post">
                      <div class="mb-3">

                        <label class="form-label" for="title">News Events Title</label>
                        <!-- <textarea id="title" name="title"  class="form-control" required> <?php echo $news_events[0]['news_events_title'] ?> </textarea> -->
                        <textarea rows="12" id="classic-editor" name="title" class="form-control" > <?php echo $news_events[0]['news_events_title'] ?> </textarea>
                      </div>
                     
                      <div class="mb-3">

                        <input id="date" name="date" type="hidden" value="<?php echo $news_events[0]['created_at'] ?>" />
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