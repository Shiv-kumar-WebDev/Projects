 
 
	
	<!-- Page Title -->
    <section class="page-title" style="background-image: url(<?php echo base_url('assets/website_assets/'); ?>images/background/7.jpg)">
    	<div class="auto-container">
			<ul class="page-breadcrumb">
				<li><a href="index.php">home</a></li>
				<li>  Enquiry </li>
			</ul>
			<h2>  Enquiry </h2>
        </div>
    </section>
    <!-- End Page Title -->	
	
	
	<!-- Request Quote Section -->
	<section class="request-quote-section style-two" id="enguiry">
		<div class="auto-container">
		
		  <div class="sec-title centered">
			<div class="bold-text">
				<h2>    Enquiry  </h2>
				</div>
			</div>


			<div class="row clearfix">
			
				<!-- Info Column -->
				<div class="info-column col-lg-4 col-md-6 col-sm-12">
					<div class="inner-column">
						<div class="icon flaticon-maps-and-flags"></div>
						<strong>Our head office address:</strong> <br>
						NEHRU INTERNATIONAL PUBLIC SCHOOL, <br> U – 1, Sector 11, Noida 201301
					</div>
				</div>
				
				<!-- Info Column -->
				<div class="info-column col-lg-4 col-md-6 col-sm-12">
					<div class="inner-column">
						<div class="icon flaticon-telephone-1"></div>
						<strong>Call for help:</strong> <br> 
						Phone : <a href="tel:+22-5-789-0001"> 0120-4208105 </a><br>
						Support : <a href="tel:+15-2-654-0002"> 91-9873897807 </a>
					</div>
				</div>
				
				<!-- Info Column -->
				<div class="info-column col-lg-4 col-md-6 col-sm-12">
					<div class="inner-column">
						<div class="icon flaticon-email-2"></div>
						<strong>Mail us for information:</strong> <br> 
						Email : <a href="mailto:nipsnoida@gmail.com"> nipsnoida@gmail.com </a><br>
						Phone : <a href="tel:9354505170"> 91-9354505170 </a>
					</div>
				</div>
				
			</div>
			
			
			<!-- Inner Container -->
			<div class="inner-container">
				<!-- Sec Title -->
				<div class="sec-title">
					<div class="clearfix">
						<div class="pull-left">
							<div class="title"><span class="separator"></span>What We Do</div>
							<h2>Request a quote for  your work</h2>
						</div>
 
					</div>
				</div>
				
				<!-- Default Form -->
				<div class="default-form">
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
					<form action="<?php echo base_url('home/send_contact_mail'); ?>" method="POST" >
						<div class="row clearfix">
						
							<!-- Column -->
							<div class="column col-lg-6 col-md-12 col-sm-12">
								<!-- Form Group -->
								<div class="form-group">
									<input type="text" name="name" value="" placeholder="Name" required="">
								</div>
								
								<div class="form-group">
									<input type="email" name="email" value="" placeholder="Email" required="">
								</div>
								
								<div class="form-group">
									<input type="text" name="subject" value="" placeholder="Subject" required="">
								</div>
							</div>
							
							<!-- Column -->
							<div class="column col-lg-6 col-md-12 col-sm-12">
								<div class="form-group">
									<textarea name="message" placeholder="Your Massage"></textarea>
								</div>
								
								<div class="form-group">
									<button type="submit" class="theme-btn btn-style-four"><span class="txt">Send Now</span></button>
								</div>
							</div>
							
						</div>
					</form>
				</div>
				<!--End Default Form-->
				
			</div>
		</div>
	</section>
	<!-- End Request Quote Section -->
	