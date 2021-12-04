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
                  <h4 class="mb-0">Edit Sub Category</h4>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Ecommerce</a>
                      </li>
                      <li class="breadcrumb-item active">Edit Sub Category</li>
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
                        <form action="<?php echo base_url('admin/category/Subcategory/update') ?>/<?php echo $subcategories[0]['subcategory_id'] ?>" method="post">
                          <div class="mb-3">
                          <label class="form-label" for="Categoryname"
                              >Category Name</label
                            >
                            <select name="Categoryid" id="Categoryname" class="form-control">
                              <option value="">Select Name</option>
                              <?php foreach($categories as $category){?>
                              <option <?php if($category['category_id']==$subcategories[0]['category_id']){
                                echo 'selected';
                              } ?> value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                              <?php }?>
                            </select>
                            <label class="form-label" for="Categoryname"
                              >Sub Category Name</label
                            >
                            <input
                              id="Categoryname"
                              name="SubCategoryname"
                              type="text"
                              class="form-control"
                              value="<?php echo $subcategories[0]['name'] ?>"
                            />
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

        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <script>
                  document.write(new Date().getFullYear());
                </script>
                © Minible.
              </div>
              <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                  Crafted with <i class="mdi mdi-heart text-danger"></i> by
                  <a
                    href="https://themesbrand.com/"
                    target="_blank"
                    class="text-reset"
                    >Themesbrand</a
                  >
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->