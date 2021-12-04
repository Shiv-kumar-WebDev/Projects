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
		
		
		
		
		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('<?php echo base_url();?>assets/img/breadcrumb.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<!-- Bread Menu -->
							<div class="bread-menu">
								<ul>
									<li><a href="index-2.html">Home</a></li>
									<li><a href="#"> StProfile </a></li>
								</ul>
							</div>
							<!-- Bread Title -->
							<div class="bread-title"><h2> StProfile </h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / End Breadcrumb -->
		
		
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
		
		
		
		<!-- Blog Grid With Sidebar -->
		<section class="blog-layout news-default section-space">
			<div class="container">
				<div class="row">
				
				<?php $this->view('student/stsidebar'); ?>

				<div class="col-lg-8 col-12">
						<div class="row">

								<!-- Single Blog -->
								<div class="single-news ">
									<div class="news-body">
                       <div class="contact-form-area m-top-30">
 
							<form class="form" method="post" action="<?php echo base_url();?>st_doupdate">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
								 
											<input type="text" name="name" required="" value="<?php echo $profile[0]['name'];?>" >
											<input type="hidden" name="id" value="<?php echo $profile[0]['id'];?>" >
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
										 
											<input type="number" name="number" required="" value="<?php echo $profile[0]['number'];?>">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
								 
											<input type="email" name="email" required="" value="<?php echo $profile[0]['email'];?>">
										</div>
									</div>
 
									<div class="col-12">
										<div class="form-group button">
											<button type="submit" class="bizwheel-btn theme-2">Submit </button>
										</div>
									</div>
								</div>
							</form>
						</div>
									</div>
								 
							</div>
						</div>
					</div>
					
			 	

				</div>
 
			</div>
		</section>
		<!-- / End Blog Grid With Sidebar -->
	
		
		
		
		
		
		
		
		
 
		<!-- Include Foot -->
		<?php $this->view('website/layout/foot'); ?>
		
		<!--/ End Include Foot -->
		

		<!-- Include Footer -->
		<?php $this->view('website/layout/footer'); ?>
		
		<!--/ End Include Footer -->
	</body>

</html>