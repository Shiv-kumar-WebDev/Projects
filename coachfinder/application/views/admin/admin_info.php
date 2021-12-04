<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#"><h3><i class="far fa-user"></i> </h3> </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><h5><?php $name = $user['name']; echo $name; ?> </h5></span>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php $email = $user['email']; echo $email; ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('Admin/Change_password'); ?>" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Change password
          </a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('log_out'); ?>" class="dropdown-item dropdown-footer"><h6> Log-out </h6></a>
        </div>
         
      </li>
      
    </ul>
  </nav>