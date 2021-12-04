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
                  <h4 class="mb-0">Add Blog</h4>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Ecommerce</a>
                      </li>
                      <li class="breadcrumb-item active">Add Blog</li>
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
                      <form action="<?php echo base_url('admin/blog/Blog/insert') ?>" method="post" enctype="multipart/form-data">
                          <div class="mb-3">
                            <label class="form-label" for="Categoryname"
                                >Category Name</label
                              >
                              <select name="Categoryid" id="Categoryname" class="form-control mb-2">
                                <option value="">Select category</option>
                                <?php foreach($categories as $category){?>
                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                                <?php }?>
                              </select>
                            <label class="form-label" for="subcategoryname"
                                >Subcategory Name</label
                              >
                              <!-- <select name="subcategoryid" id="subcategoryname" class="form-control">
                                <option value="">Select Name</option>
                                <?php //foreach($subcategories as $subcategory){?>
                                <option value="<?php //echo $subcategory['subcategory_id']; ?>"><?php //echo $subcategory['name']; ?></option>
                                <?php //}?>
                              </select> -->
                              <select name="subcategoryid" id="subcategoryname" class="form-control">
                                <option value="">Select subcategory</option>
                              </select>
                              <div class="mt-3">
                                <label class="form-label" for="title"
                                  >Title</label
                                >
                                <input
                                  id="title"
                                  name="title"
                                  type="text"
                                  class="form-control"
                                  required
                                />
                              </div>
                              <div class="mt-3">
                                <label class="form-label" for="Description"
                                  >Description</label
                                >
                                <textarea
                                  id="Description"
                                  name="Description"
                                  type="text"
                                  class="form-control"
                                  required
                                ></textarea>
                              </div>
                              <div class="mt-3">
                              <label class="form-label" for="popular_post"
                                  >Popular post </label
                                >
                              <input type="checkbox" name="popular_post" id="popular_post" value="1"  >
                              </div>
                          </div>
                          <!-- <div class="mb-3">
                            <label class="form-label" for="date"
                              >Date</label
                            >
                            <input
                              id="date"
                              name="date"
                              type="date"
                              class="form-control"
                            />
                          </div> -->
                          <div class="mb-3">
                            <label class="form-label" for="image"
                              >Image</label
                            >
                            <input type="file" name="image" id="" class="form-control" >
                          </div>
                          <!-- <div class="mb-3">
                            <label class="form-label" for="image"
                              >Image</label
                            >
                            <input type="file" name="image1[]" multiple id="" class="form-control" >
                          </div> -->
                          
                         

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