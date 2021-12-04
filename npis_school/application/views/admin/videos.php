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
                         <h4 class="mb-0">video</h4>

                         <div class="page-title-right">
                             <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                 <li class="breadcrumb-item active">video</li>
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
                         <a href="<?php echo base_url('AddVideos') ?>">
                             <button type="button" class="btn btn-success waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i> Add video</button>
                         </a>
                     </div>
                     <div class="table-responsive mb-4">
                         <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                             <thead>
                                 <tr class="bg-transparent">

                                     <th>S.no</th>
                                     <th>Type</th>
                                     <th>Video</th>
                                     <th>Video Title</th>
                                     <th>Video status</th>
                                     <th style="width: 120px;">Action</th>
                                 </tr>
                             </thead>
                             <tbody>

                                 <?php $i = 1;
                                    foreach ($videos as $video) {
                                    ?>
                                     <tr>
                                         <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $i++ ?></a> </td>
                                         <td><?php if ($video['video_cat'] == 1) {
                                                    echo 'GALLERY';
                                                } else {
                                                    echo 'EVENT';
                                                } ?></td>
                                         <td>
                                             <video controls="" width="100px" height="100px">
                                                 <source src="<?php echo base_url('assets/admin_assets/images/videos/' . $video['video']); ?>">
                                             </video>
                                         </td>
                                         <td>
                                             <?php echo $video['videos_title'] ?>
                                         </td>

                                         <td><?php if ($video['vid_status'] == 1) {
                                                    echo '<a href="' . base_url('admin/Video/status/' . $video['videos_id'] . '') . '" class="btn btn-success">Active</a>';
                                                } else {
                                                    echo '<a href="' . base_url('admin/Video/status/' . $video['videos_id'] . '') . '" class="btn btn-danger">Inactive</a>';
                                                } ?></td>
                                         <td>
                                             <a href="<?php echo base_url('DeleteVideo') ?>/<?php echo $video['videos_id'] ?>" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
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