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
									<h4> Register </h4>
								</div>
								<form class="form" method="post" action="<?php echo base_url();?>doregister">
								<div class="row">
                                    <div class="col-12">
										<div class="form-group">
                                        <select id="person" onchange="getsub()" class="form-control" name="type" required="">
                                            <option value=" ">Register</option>
                                            <option value="2">As a Coach</option>
                                            <option value="3">As a Student</option>
				                        </select>
										</div>
                                    </div>
									<div id="sub" class="col-12">
										<div class="form-group">
                                        <select class="form-control" name="subject" required="">
                                            <option value=" ">Select Subject</option>
											<?php foreach($subject as $sub){ ?>
												<option value="<?php echo $sub['sub_id']?>"><?php echo $sub['sub_name']?></option>
											<?php }?>
				                        </select>
										</div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
								 
											<input type="text" name="name" required="" placeholder="Full Name">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
										 
											<input type="number" name="number" required="" placeholder="Mobile Number">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
								 
											<input type="email" name="email" required="" placeholder="Email Address">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
										 
											<input type="password" name="password" required="" placeholder="Create Password">
										</div>
									</div>
 
									<div class="col-12">
										<div class="form-group">
											<button type="submit" class="bizwheel-btn theme-2">Register </button>
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
			function getsub(){
				var person = document.getElementById("person");
				if(person.value == 3){
					document.getElementById("sub").style.visibility="hidden";
				}else{
					document.getElementById("sub").style.visibility="visible";
				}
			}
		</script>
		
		
	</body>

</html>