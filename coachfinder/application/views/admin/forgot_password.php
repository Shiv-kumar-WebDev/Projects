
<body class="hold-transition login-page">
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
<div class="login-box">
    <div class="card card-outline card-info">
        <div class="card-header text-center">
            <a class="h1"><b>Forgot </b>Password</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">You are only one step away to create your password, create strong password.</p>
            <form action="<?php echo base_url('update_pass'); ?>" method="post">
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" required="" placeholder="ENTER EMAIL ADDRESS">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" required="" placeholder="ENTER NEW PASSWORD">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-info btn-block">Forget Password</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/admin/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/'); ?>dist/js/adminlte.min.js"></script>
</body>
</html>
