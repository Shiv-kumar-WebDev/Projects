 <!-- Page Title -->
 <section class="page-title" style="background-image: url(<?php echo base_url('assets/website_assets/'); ?>images/background/7.jpg)">
 	<div class="auto-container">
 		<ul class="page-breadcrumb">
 			<li><a href="index.php">home</a></li>
 			<li>General Enquiry </li>
 		</ul>
 		<h2>General Enquiry </h2>
 	</div>
 </section>
 <!-- End Page Title -->


 <!-- Request Quote Section -->
 <section class="request-quote-section style-two" id="enguiry">
 	<div class="auto-container">


 		<!-- Inner Container -->
 		<div class="inner-container">
 			<!-- Sec Title -->
 			<div class="sec-title">
 				<div class="clearfix">
 					<div class="pull-left">
 						<div class="title"><span class="separator"></span>Share Your Query With Us</div>
 						<h2> GENERAL ENQUIRY FORM </h2>
 					</div>

 				</div>
 			</div>

 			<!-- Default Form -->
 			<div class="default-form">

 				<div class="row clearfix">

 					<!-- Column -->
 					<div class="column col-lg-10 col-md-12 col-sm-12">
 						<?php
							if ($this->session->flashdata('success')) {
								echo '<div class="alert alert-success"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->session->flashdata('success') . '</div>';
							}
							if ($this->session->flashdata('error')) {
								echo '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->session->flashdata('error') . '</div>';
							}
							if ($this->session->flashdata('warning')) {
								echo '<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;' . $this->session->flashdata('warning') . '</div>';
							}
						?>

 						<form action="<?php echo base_url('home/send_gen_enquiry_mail'); ?>" method="POST">
 							<div class="form-group row">
 								<label for="staticEmail" class="col-sm-4 col-form-label"> DATE </label>
 								<div class="col-sm-8">
 									<input type="date" class="form-control" id="date" name="date" value="" required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label"> STUDENT NAME </label>
 								<div class="col-sm-8">
 									<input type="text" class="form-control" id="cname" name="cname" placeholder="STUDENT NAME " required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label">STUDENT CLASS </label>
 								<div class="col-sm-8">
 									<input type="text" class="form-control" id="class" name="class" placeholder="STUDENT CLASS " required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label"> PARENT / GUARDIAN NAME </label>
 								<div class="col-sm-8">
 									<input type="text" class="form-control" id="pname" name="pname" placeholder="PARENT/GUARDIAN NAME" required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label"> MOBILE NUMBER </label>
 								<div class="col-sm-8">
 									<input type="number" class="form-control" id="mobile" name="mobile" placeholder="MOBILE NUMBER" required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label">YOUR QUREY </label>
 								<div class="col-sm-8">
 									<textarea class="form-control" id="query" name="query" placeholder="YOUR QUREY" required></textarea>
 								</div>
 							</div>

 							<button type="submit" class="theme-btn btn-style-four"><span class="txt"> SUBMIT </span></button>

 						</form>



 					</div>
 				</div>

 			</div>
 		</div>
 	</div>
 </section>
 <!-- End Request Quote Section -->