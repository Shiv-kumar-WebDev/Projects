
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <?php
            if($this->session->flashdata('success'))
            {   
                echo '<div class="alert alert-success"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong>'.$this->session->flashdata('success').'</div>';
            }
            if($this->session->flashdata('error'))
            {   
                echo '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'.$this->session->flashdata('error').'</div>';
            }
            if($this->session->flashdata('warning'))
            {   
                echo '<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>warning!</strong>'.$this->session->flashdata('warning').'</div>';
            }
        ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SUBJECT DETAILS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="btn btn-success" style="padding: 10px; font-weight: bold;" href="<?php echo base_url('Admin/Addsub'); ?>"><i class="fas fa-plus"></i> ADD-NEW</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            

            <div class="card card-info">
              <div class="card-header">
                <h4 class="text-center" class="card-title">Subject Details</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Subject Name</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                <?php $i=1; ?>    
                <?php foreach ($sub_details as $sub): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $sub['sub_name']; ?></td>
                    <td class="text-center">
                        <?php if ($sub['status'] == 0) { ?>
                            <a href="<?php echo base_url('admin/admin/substatus/'.$sub['sub_id']); ?>"  class="btn btn-sm btn-danger">InActive</a>
                        <?php } else { ?>
                                    <a href="<?php echo base_url('admin/admin/substatus/'.$sub['sub_id']); ?>" class="btn btn-sm btn-success">Active</a>
                                <?php } ?></td>
                  <td><?php echo date('d/m/Y',$sub['created']); ?></td>
                  <td class="project-actions text-center">
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/admin/Editsubject/'.$sub['sub_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                  </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong>Copyright &copy; 2014-2020 AdminDashboard.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/admin/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
