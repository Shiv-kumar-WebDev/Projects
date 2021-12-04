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
                  <h4 class="mb-0">Edit Blog</h4>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Ecommerce</a>
                      </li>
                      <li class="breadcrumb-item active">Edit blog</li>
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
                          <?php foreach($blogs as $blog){ 
                            //echo "<pre>";
                            //print_r($blog);die();
                            ?>
                        <form action="<?php echo base_url('admin/blog/Blog/update_blog') ?>/<?php echo $blog['id'] ?>" method="post">
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
                            <label class="form-label" for="SubCategoryname"
                              >Sub Category Name</label
                            >
                            <select name="SubCategoryid" id="SubCategoryname" class="form-control">
                              <option value="">Select Name</option>
                              <?php foreach($subcategories as $category){?>
                              <option <?php if($category['subcategory_id']==$subcategories[0]['subcategory_id']){
                                echo 'selected';
                              } ?> value="<?php echo $category['subcategory_id']; ?>"><?php echo $category['name']; ?></option>
                              <?php }?>
                            </select>
                            <label class="form-label" for="title"
                              >Blog Title</label
                            >
                            <input
                              id="title"
                              name="title"
                              type="text"
                              class="form-control"
                              value="<?php echo $blog['title'] ?>"
                            />
                            <label class="form-label" for="Description"
                              >Description</label
                            >
                            <textarea
                              id="Description"
                              name="Description"
                              class="form-control"
                            ><?php echo $blog['blog_description'] ?></textarea>
                          </div>
                          <div class="mt-3">
                              <label class="form-label" for="popular_post"
                                  >Popular post </label
                                >
                              <input type="checkbox" name="popular_post" id="popular_post" value="1" <?php if($blog['popular_post']==1){
                                echo "checked";
                              }else{
                                echo "";
                              } ?> >
                              </div>
                          <div class="mb-3">
                            <label class="form-label" for="Imgname"
                              >Image</label
                            >
                            <br><br>
                            <img width="300" src="<?php echo base_url('assets/admin/images/blogs/'.$blog['imgSrc'].''); ?>" alt="">
                             <!-- <input
                              id="Imgname"
                              name="Imgname"
                              type="text"
                              class="form-control"
                              value="<?php //echo $blog['imgSrc'] ?>"
                            />  -->
                            <input type="file" name="image" id="" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="date"
                              >Date</label
                            >
                            <input
                              id="date"
                              name="date"
                              type="text"
                              class="form-control"
                              value="<?php echo $blog['created_at'] ?>"
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