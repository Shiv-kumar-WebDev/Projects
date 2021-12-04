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
                                    <h4 class="mb-0">Comments</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                            <li class="breadcrumb-item active">Comments</li>
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
                                            <label class="form-check-label my-2 me-2" for="order-selectinput">Comments</label>
                                            <select class="form-select" id="order-selectinput">
                                                <option selected="">All</option>
                                                <option value="1">Active</option>
                                                <option value="2">Unpaid</option>
                                            </select>
                                        </form>
                                        
                                    </div>
                                    <!-- <a href="<?php //echo base_url('admin/blog/Blog/addBlog') ?>">
                                        <button type="button" class="btn btn-success waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i> Add New Blog</button>
                                    </a> -->
                                </div>
                                <div class="table-responsive mb-4">
                                    <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                        <thead>
                                            <tr class="bg-transparent">
                                                
                                                <th>S. No</th>
                                                <th>comment</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Website</th>
                                                <th>status</th>
                                                <th>time</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=1; foreach($comments as $comment){ ?>
                                            <tr>
                                                
                                                
                                                <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $i++ ?></a> </td>
                                                <td>
                                                <?php echo $comment['message'] ?>
                                                </td>
                                                <td>
                                                <?php echo $comment['comment_name'] ?>
                                                </td>
                                                <td>
                                                <?php echo $comment['comment_email'] ?>
                                                </td>
                                                <td>
                                                <?php echo $comment['comment_website'] ?>
                                                </td>
                                                
                                                <td><?php if($comment['comment_status']==1){
                                                    echo '<a href="'.base_url('admin/blog/Comment/inactive/'.$comment['comment_id'].'').'" class="btn btn-success">Approve</a>';
                                                }else{
                                                    echo '<a href="'.base_url('admin/blog/Comment/active/'.$comment['comment_id'].'').'" class="btn btn-danger">Not Approve</a>';
                                                } ?></td>


                                                <td>
                                                <?php echo $comment['created_at'] ?>
                                                </td>
                                                
                                                
                                                
                                               
                                                
                                                <!-- <td>
                                                    <a href="<?php //echo base_url('admin/blog/Blog/editblog') ?>/<?php //echo $blog['id'] ?>" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="<?php //echo base_url('admin/blog/Blog/deleteBlog') ?>/<?php //echo $blog['id'] ?>" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td> -->
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