
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>EDIT SUBJECT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard'); ?>">Admin</a></li>
              <li class="breadcrumb-item active">Edit Subject</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            </div>
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h4 class="text-center" class="card-title">EDIT SUBJECT</h4>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="contact-form" name="contact-form" action="<?php echo base_url('admin/admin/doeditsub'); ?>" method="POST">

                <div class="card-body">
                  <!-- row -->
                  <div class="row">
                    <div class="col-md-4">
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id="sub_name" name="sub_name" value="<?php echo $subject[0]['sub_name'];?>" class="form-control" required="">
                                <input type="hidden" id="sub_id" name="sub_id" value="<?php echo $subject[0]['sub_id'];?>" >
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-4">
                        </div>
                  </div>
                  <!-- row end -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="text-center text-md">
                        <button type="submit" class="btn btn-secondary" >EDIT</button>
                        <a class="btn btn-danger" href="<?php echo base_url('Admin/Subjects'); ?>" >BACK</a>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-2">
          </div>
        </div>
      </div>  
            <!-- Form Element sizes -->
            
                  
          
                  <div class="form-group">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>


</body>
</html>
