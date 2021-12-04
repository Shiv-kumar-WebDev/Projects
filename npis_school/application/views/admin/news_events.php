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
                         <h4 class="mb-0">News_events</h4>

                         <div class="page-title-right">
                             <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                 <li class="breadcrumb-item active">News_events</li>
                             </ol>
                         </div>

                     </div>
                 </div>
             </div>
             <!-- end page title -->

             <div class="row">
                 <div class="col-lg-12">
                     <div>

                         <?php $this->load->view("admin/common/errors"); ?>
                         <a href="<?php echo base_url('AddNews_events') ?>">
                             <button type="button" class="btn btn-success waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i> Add New News Events</button>
                         </a>
                     </div>
                     <div class="table-responsive mb-4">
                         <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                             <thead>
                                 <tr class="bg-transparent">

                                     <th>S.no</th>
                                     <th>Date</th>
                                     <th>News Events Title</th>
                                     <th>News Events status</th>
                                     <th style="width: 120px;">Action</th>
                                 </tr>
                             </thead>
                             <tbody>

                                 <?php $i = 1;
                                    foreach ($news_events as $news_event) {
                                    ?>
                                     <tr>


                                         <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $i++ ?></a> </td>
                                        
                                         <td>
                                             <?php echo $news_event['created_at'] ?>
                                         </td>
                                         <td>
                                             <?php echo $news_event['news_events_title'] ?>
                                         </td>
                                         

                                         <td><?php if ($news_event['news_events_status'] == 1) {
                                                    echo '<a href="' . base_url('admin/News_events/inactive/' . $news_event['news_events-id'] . '') . '" class="btn btn-success">active</a>';
                                                } else {
                                                    echo '<a href="' . base_url('admin/News_events/active/' . $news_event['news_events-id'] . '') . '" class="btn btn-danger">inactive</a>';
                                                } ?></td>


                                         





                                         <td>
                                             <a href="<?php echo base_url('admin/News_events/editNews_events') ?>/<?php echo $news_event['news_events-id'] ?>" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                             <a href="<?php echo base_url('admin/News_events/deleteNews_events') ?>/<?php echo $news_event['news_events-id'] ?>" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
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



 </div>
 <!-- end main content-->

 </div>
 <!-- END layout-wrapper -->