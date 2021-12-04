 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Blog Slider</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                            <li class="breadcrumb-item active">Blog Slider</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                            
                                    <div class="float-end">
                                        <form class="d-inline-flex mb-3">
                                            <label class="form-check-label my-2 me-2" for="order-selectinput">Orders</label>
                                            <select class="form-select" id="order-selectinput">
                                                <option selected="">All</option>
                                                <option value="1">Active</option>
                                                <option value="2">Unpaid</option>
                                            </select>
                                        </form>
                                        
                                    </div>
                                    <a href="<?php echo base_url('admin/blog/Slider/addSlider') ?>">
                                        <button type="button" class="btn btn-success waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i> Add New Slider</button>
                                    </a>
                                </div>
                                <div class="table-responsive mb-4">
                                    <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                        <thead>
                                            <tr class="bg-transparent">
                                                
                                                <th>S.no</th>
                                                <th>Image</th>
                                                <th>Date</th>
                                                <th>Slider Title</th>
                                                <!-- <th>Description</th> -->
                                                <th>Slider status</th>
                                                <!-- <th>Popular post</th> -->
                                                <th style="width: 120px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=1; foreach($sliders as $slider){ ?>
                                            <tr>
                                                
                                                
                                                <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $i++ ?></a> </td>
                                                <td>
                                                <img width="100" src="<?php echo base_url('assets/admin/images/sliders/'); ?><?php echo $slider['slider_img'] ?>" alt="slider">
                                                </td>
                                                <td>
                                                <?php echo $slider['created_at'] ?>
                                                </td>
                                                <td>
                                                <?php echo $slider['slider_title'] ?>
                                                </td>
                                                <!-- <td>
                                                <?php //echo $blog['blog_description'] ?>
                                                </td> -->
                                                
                                                <td><?php if($slider['slider_status']==1){
                                                    echo '<a href="'.base_url('admin/blog/Slider/inactive/'.$slider['slider_id'].'').'" class="btn btn-success">active</a>';
                                                }else{
                                                    echo '<a href="'.base_url('admin/blog/Slider/active/'.$slider['slider_id'].'').'" class="btn btn-danger">inactive</a>';
                                                } ?></td>


                                                <!-- <td><?php /*if($blog['popular_post']==1){
                                                    echo '<a href="'.base_url('admin/blog/Blog/inactivePost/'.$blog['id'].'').'" class="btn btn-success">Popular Post</a>';
                                                }else{
                                                    echo '<a href="'.base_url('admin/blog/Blog/activePost/'.$blog['id'].'').'" class="btn btn-danger">Not a Popular Post</a>';
                                                } */?></td> -->
                                                
                                                
                                                
                                               
                                                
                                                <td>
                                                    <a href="<?php echo base_url('admin/blog/Slider/editSlider') ?>/<?php echo $slider['slider_id'] ?>" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="<?php echo base_url('admin/blog/Slider/deleteSlider') ?>/<?php echo $slider['slider_id'] ?>" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Minible.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://themesbrand.com/" target="_blank" class="text-reset">Themesbrand</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->