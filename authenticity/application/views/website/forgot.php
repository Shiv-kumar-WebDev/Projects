
	
    <div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
        	<div class="container">
            	<div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Login</span></div>
            </div>
        </div>
        <?php
            if($this->session->flashdata('success'))
            {   
                echo '<div class="alert alert-success"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('success').'</div>';
            }
            if($this->session->flashdata('error'))
            {   
                echo '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('error').'</div>';
            }
            if($this->session->flashdata('warning'))
            {   
                echo '<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;'.$this->session->flashdata('warning').'</div>';
            }
        ?>
        <!--End Breadcrumbs-->
        <!--Page Title with Image-->
        <div class="page-title"><h1>Forgot Password</h1></div>
        <!--End Page Title with Image-->
        <div class="container">
            <div class="row">
				<!--Main Content-->
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 box">
                	<h3> LOGIN </h3>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    <a href="<?php echo base_url();?>landing/login" class="btn">Go To LogIn</a>
                </div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box">
                	<div class="mb-4">
                       <form onsubmit="return validate()" action="<?php echo base_url();?>landing/forgot_password"  class="form" method="POST">	
                       <h3>Forgot Password</h3>
						<p>If you forgot your password ! So don't worry.</p>
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Enter Your Email <span >*</span></label>
                                    <input type="email" name="email" placeholder="Enter Your Email Address" id="CustomerEmail" required="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Create Your New Password <span >*</span></label>
                                    <input type="password" value="" name="password" placeholder="Create Your New Password" id="CustomerPassword" required="">                            
                                </div>
                            </div>
                            <span id="msg" style="color: #ff0000;"></span>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="ConfirmPassword">Confirm New Password <span >*</span></label>
                                    <input type="password" value="" name="confirm_password" placeholder="Confirm New Password" id="ConfirmPassword" required="">                         
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Submit">
							 
                                <p class="mb-4">
								    <a href="<?php echo base_url();?>landing/register" id="customer_register_link">Create Account</a>
                                </p>
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
				<!--End Main Content-->
			</div>
        
        </div><!--End Body Container-->
        
    </div><!--End Page Wrapper-->
    
 
 <script>
        function validate(){
            var x= document.getElementById("CustomerPassword").value;
            var y= document.getElementById("ConfirmPassword").value;
            if (x!=y) {
                document.getElementById("msg").innerHTML=" Password Does Not Match ! PLEASE ENTER SAME PASSWORD";
                return false;
            }else{
                return true;
            }
            
        }
        
    </script>