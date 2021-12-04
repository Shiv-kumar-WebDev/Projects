<body class="hold-transition login-page">
<div class="login-box">
  <?php
            
            if($this->session->flashdata('error'))
            {   
                echo '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'.$this->session->flashdata('error').'</div>';
            }
           
        ?>
  <!-- <div class="login-logo">
    <a><b>Admin </b>Panel</a>
  </div> -->
  <!-- /.login-logo -->
  <div class="card">
  </br>
    <div class="card-body login-card-body">
      <h4 class="login-box-msg">ADMIN LOGIN</h4>

      <form action="<?php echo base_url('login_compare'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" required="" placeholder="Email Address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" required="" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
           </div>
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-info btn-block">SIGN IN</button>
          </div>
          <div class="col-4">
           </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <p class="mb-1">
        <a href="Admin/ForgotPassword" class="btn btn-warning "><i class="fas fa-key mr-2"></i>FORGOT PASSWORD</a>
        <!-- <a href="Admin/ForgotPassword">I forgot my password</a> -->
      </p>
      </div>
      <!-- /.social-auth-links -->

      
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
