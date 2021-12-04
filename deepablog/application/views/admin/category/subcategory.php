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
                                    <h4 class="mb-0">Orders</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                            <li class="breadcrumb-item active">Orders</li>
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
                                    <a href="<?php echo base_url('admin/category/Subcategory/addSubCategory') ?>">
                                        <button type="button" class="btn btn-success waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i> Add New subcategory</button>
                                    </a>
                                </div>
                                <div class="table-responsive mb-4">
                                    <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                        <thead>
                                            <tr class="bg-transparent">
                                                
                                                <th>S.no</th>
                                                <!-- <th>Category name</th> -->
                                                <th>Category Name</th>
                                                <th>Sub Category</th>
                                                <th>Sub Category status</th>
                                                <th style="width: 120px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=1; foreach($sub_categories as $category){
                                            //echo "<pre>"; 
                                            //print_r($category);die();
                                            ?>
                                            <tr>
                                                
                                                
                                                <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $i++ ?></a> </td>
                                                <td>
                                                <?php echo $category['category_name'] ?>
                                                </td>
                                                <td>
                                                <?php echo $category['name'] ?>
                                                </td>
                                                <td><?php if($category['status']==1){
                                                    echo '<a href="'.base_url('admin/category/Subcategory/inactive/'.$category['subcategory_id'].'').'" class="btn btn-success">active</a>';
                                                }else{
                                                    echo '<a href="'.base_url('admin/category/Subcategory/active/'.$category['subcategory_id'].'').'" class="btn btn-danger">inactive</a>';
                                                } ?></td>
                                                
                                                
                                               
                                                <td>
                                                    <a href="<?php echo base_url('admin/category/Subcategory/editSubCategory') ?>/<?php echo $category['subcategory_id'] ?>" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="<?php echo base_url('admin/category/Subcategory/deleteSubCategory') ?>/<?php echo $category['subcategory_id'] ?>" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
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