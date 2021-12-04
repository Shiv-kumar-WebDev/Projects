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
            echo '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'.$this->session->flashdata('error').'</div>';
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
									<h4> Login </h4>
								</div>
								<form class="form" action="<?php echo base_url();?>userlogin_compare" method="post">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<input type="email" name="email" required="" placeholder="Enter Email Address">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<input type="password" name="password" required="" placeholder="Enter Password">
											</div>
										</div>
 
 
										<div class="col-6">
											<div class="form-group button">
												<button type="submit" class="bizwheel-btn theme-2"> Submit </button>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group button">
												<a href="<?php echo base_url();?>Verification" class="btn btn-danger"> Fogot Password? </a>
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
		
		
	</body>

</html>