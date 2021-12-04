
  
    <div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="breadcrumbs"><a href="index.html" title="Back to the home page">My Account</a> <span aria-hidden="true">|</span> <span>Account Settings</span></div>
            </div>
        </div>
        <!--End Breadcrumbs-->
        <div class="container">
            <div class="page-title"><h1>Account Settings</h1></div>

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
 
            <div class="row mb-5">
                <div class="col-xs-6 col-lg-6 col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content padding-30px-all md-padding-15px-all" style="">
                        <!-- Dashboard -->
                        <div id="dashboard" class="tab-pane fade active show">
                            <h3> Personal Information </h3>
                            <div class="card">
                                <div class="card-body">
                                    <!-- Form register -->
                                     <form action="<?php echo base_url() ?>landing/updateuser" method="post" enctype="multipart/form-data" >
         
                                        <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
                                            <input type="text" id="orangeForm-name3" name="username" value="<?php echo $user[0]['username']; ?>" required="" class="form-control">
                                            <label for="orangeForm-name3">Your name</label>
                                        </div>
                                        <div class="md-form">
                                            <i class="fa fa-envelope prefix grey-text"></i>
                                            <input type="email" id="orangeForm-email3" name="email" value="<?php echo $user[0]['email']; ?>" required="" class="form-control">
                                            <input value="<?php echo $user[0]['user_id']; ?>" name="user_id" type="hidden">
                                            <label for="orangeForm-email3">Your email</label>
                                        </div>

                                        <div class="md-form">
                                            <i class="fa fa-envelope prefix grey-text"></i>
                                            <input type="number" id="email3" name="user_phone" value="<?php echo $user[0]['user_phone']; ?>" required="" class="form-control">
                                            <label for="orangeForm-email3"> Mobile </label>
                                        </div>
                                        
                                        
                                        <!-- <div class="md-form">
                                            <i class="fa fa-photo prefix grey-text"></i>
                                            <input type="file"  id="profilepic" class="form-control" name="profilepic" />
                                        </div> -->
                                        <div class="text-center">
                                            <button class="btn btn-deep-orange"> Save <i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                    <!-- Form register -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard -->
                    </div>
                    <!-- End Tab panes -->
                </div>
                
                
                
                
                
                
                <div class="col-xs-6 col-lg-6 col-md-12">
                    <!-- Tab panes -->
                    <div class="dashboard-content padding-30px-all md-padding-15px-all" style="">
                        <!-- Dashboard -->
                        <div id="dashboard" class="tab-pane fade active show">
                            <h3> Security </h3>
                            <div class="card">
                                <div class="card-body">
                                    <!-- Form register -->
                                     <form onsubmit="return validate()" action="<?php echo base_url() ?>landing/updateuserpass" method="post" >
         
                                        <div class="md-form">
                                            <i class="fa fa-envelope prefix grey-text"></i>
                                            <input type="password" id="orangeForm-name3" placeholder="Enter Current Password" name="current_pass" required="" class="form-control">
                                            <label for="orangeForm-name3"> Current Password </label>
                                        </div>
                                        <div class="md-form">
                                            <i class="fa fa-lock prefix grey-text"></i>
                                            <input type="password" id="CustomerPassword" placeholder="Create Your New Password" name="password" required="" class="form-control">
                                            <input value="<?php echo $user[0]['user_id']; ?>" name="user_id" type="hidden">
                                            <label for="orangeForm-email3"> New  Password </label>
                                        </div>
                                        <span id="msg" style="color: #ff0000;"></span>

                                        <div class="md-form">
                                            <i class="fa fa-lock prefix grey-text"></i>
                                            <input type="password" id="ConfirmPassword" placeholder="Confirm New Password" name="confirm_password" required="" class="form-control">
                                            <label for="orangeForm-email3"> Confirm Password </label>
                                        </div>
                                    
                                        <div class="text-center">
                                            <button class="btn btn-deep-orange"> Update <i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                    <!-- Form register -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard -->
                    </div>
                    <!-- End Tab panes -->
                </div>                
            </div>
        </div><!--End Body Container-->
    </div><!--End Page Wrapper-->
    
    
    
    
    
 
 <script>
    function validate(){
        var x= document.getElementById("CustomerPassword").value;
        var y= document.getElementById("ConfirmPassword").value;
        if (x!=y) {
            document.getElementById("msg").innerHTML=" NEW PASSWORD AND CONFIRM NEW PASSWORD DOES NOT MATCH !";
            return false;
        }else{
            return true;
        }
    }
</script>    
    
    
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>    
  
  
 <style>
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css);
@import url(https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css);

.hm-gradient {
    background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
}
.darken-grey-text {
    color: #2E2E2E;
}
.danger-text {
    color: #ff3547; }
.default-text {
    color: #2BBBAD; 
}
.info-text {
    color: #33b5e5; 
}
.form-white .md-form label {
  color: #fff; 
}
.form-white input[type=text]:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    -webkit-box-shadow: 0 1px 0 0 #fff;
    box-shadow: 0 1px 0 0 #fff; 
}
.form-white input[type=text]:focus:not([readonly]) + label {
    color: #fff; 
}
.form-white input[type=password]:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    -webkit-box-shadow: 0 1px 0 0 #fff;
    box-shadow: 0 1px 0 0 #fff; 
}
.form-white input[type=password]:focus:not([readonly]) + label {
    color: #fff; 
}
.form-white input[type=password], .form-white input[type=text] {
    border-bottom: 1px solid #fff; 
}
.form-white .form-control:focus {
    color: #fff;
}
.form-white .form-control {
    color: #fff;
}
.form-white textarea.md-textarea:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    box-shadow: 0 1px 0 0 #fff;
    color: #fff; 
}
.form-white textarea.md-textarea  {
    border-bottom: 1px solid #fff;
    color: #fff;
}
.form-white textarea.md-textarea:focus:not([readonly])+label {
    color: #fff;
}
.ripe-malinka-gradient {
    background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
}
.near-moon-gradient {
    background-image: linear-gradient(to bottom, #5ee7df 0%, #b490ca 100%);
}     
 </style>   
    
    
    