<!DOCTYPE html>
<html lang="zxx">
<head>
		<!-- Meta Tag -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name='copyright' content='pavilan'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title Tag  -->
		<title> Education </title>
		
		<!-- Include Header -->
		<?php $this->view('website/layout/header'); ?>
		
		<!--/ End Include Header -->
		
		
	</head>
	<body id="bg" style="">
		
		<!-- Boxed Layout -->
		<div id="page" class="site"> 
	
		<!-- Preloader -->
		<div class="preeloader">
			<div class="preloader-spinner"></div>
		</div>
		<!--/ End Preloader -->
		
 
		<!-- Include Head -->
		<?php $this->view('website/layout/head'); ?>
		
		<!--/ End Include Head -->
		
		<?php
        if($this->session->flashdata('success'))
        {   
            echo '<div class="alert alert-success"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong>'.$this->session->flashdata('success').'</div>';
        }
        if($this->session->flashdata('error'))
        {   
            echo '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('error').'</div>';
        }
        if($this->session->flashdata('warning'))
        {   
            echo '<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>warning!</strong>'.$this->session->flashdata('warning').'</div>';
        }
    ?>
 

		<!-- Faqs -->
		<section class="faqs section-space">
			<div class="container">
 
 
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-12">
						<!-- Contact Form -->
						<div class="contact-form-area faq-form m-top-30">
							<div class="form-inner">
								<div class="form-title">
									<h4> Change Password </h4>
								</div>
								<form onsubmit="return validate()" class="form" action="<?php echo base_url();?>updatepass" method="post">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<input type="password" name="newpassword" id="newpassword" required="" value="" placeholder="Enter New Password">
                                                <input type="hidden" name="id" value="<?php echo $details[0]['id'];?>" >
                                            </div>

										</div>
                                        <span id="msg"></span>
										<div class="col-12">
											<div class="form-group">
												<input type="password" name="conpassword" id="conpassword" required="" value="" placeholder="Confirm Password">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group button">
												<button type="submit" class="bizwheel-btn theme-2"> Submit </button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!--/ End contact Form -->
					</div>
				</div>
			</div>
		</section>	
		<!--/ End Faqs -->
		
 
		<!-- Include Foot -->
		<?php $this->view('website/layout/foot'); ?>
		
		<!--/ End Include Foot -->
		

		<!-- Include Footer -->
		<?php $this->view('website/layout/footer'); ?>
		
		<!--/ End Include Footer -->
		
				
		
		
		</div>
		<!-- End Boxed Layout -->
		<script>
        function validate(){
            var x= document.getElementById("newpassword").value;
            var y= document.getElementById("conpassword").value;
            if (x!=y) {
                document.getElementById("msg").innerHTML="** Password Does Not Match **";
                return false;
            }else{
                return true;
            }
            
        }
        
        </script>
		
	</body>

</html>