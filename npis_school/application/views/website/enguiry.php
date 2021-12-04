 <!-- Page Title -->
 <section class="page-title" style="background-image: url(<?php echo base_url('assets/website_assets/'); ?>images/background/7.jpg)">
 	<div class="auto-container">
 		<ul class="page-breadcrumb">
 			<li><a href="index.php">home</a></li>
 			<li> Enquiry </li>
 		</ul>
 		<h2> Enquiry </h2>
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
 						<div class="title"><span class="separator"></span>What We Do</div>
 						<h2> ADMISSION ENQUIRY FORM </h2>
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

 						<form action="<?php echo base_url('home/send_enquiry_mail'); ?>" method="POST">
 							<div class="form-group row">
 								<label for="staticEmail" class="col-sm-4 col-form-label"> DATE </label>
 								<div class="col-sm-8">
 									<input type="date" class="form-control-plaintext" id="date" name="date" value="" required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label"> CHILD NAME </label>
 								<div class="col-sm-8">
 									<input type="text" class="form-control" id="cname" name="cname" placeholder=" " required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label"> PARENT/GUARDIAN NAME </label>
 								<div class="col-sm-8">
 									<input type="text" class="form-control" id="pname" name="pname" placeholder=" " required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label"> CLASS APPLIED FOR </label>
 								<div class="col-sm-8">
 									<input type="text" class="form-control" id="class" name="class" placeholder=" " required>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label"> EMAIL ADDRESS </label>
 								<div class="col-sm-8">
 									<input type="email" class="form-control" id="email" name="email" placeholder=" " required>
 								</div>
 							</div>


 							<div class="form-group row">
 								<label for="inputPassword" class="col-sm-4 col-form-label"> MOBILE NUMBER </label>
 								<div class="col-sm-8">
 									<input type="number" class="form-control" id="mobile" name="mobile" placeholder=" " required>
 								</div>
 							</div>


 							<p> Queries will be entertained within office working hours, 8:00a.m. - 4:00a.m., except Sundays and holidays.</p>

 							<button type="submit" class="theme-btn btn-style-four"><span class="txt"> SUBMIT </span></button>

 						</form>



 					</div>
 				</div>

 			</div>
 		</div>
 	</div>
 </section>
 <!-- End Request Quote Section -->