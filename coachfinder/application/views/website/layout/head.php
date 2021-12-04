
		
		<!-- Header -->
		<header class="header">
 
			<!-- Middle Header -->
			<div class="middle-header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="middle-inner">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-12">
										<!-- Logo -->
										<div class="logo">
											<!-- Image Logo -->
											<div class="img-logo">
												<a href="<?php echo base_url();?>Home">
													<img src="<?php echo base_url();?>assets/img/logo.png" alt="#">
												</a>
											</div>
										</div>								
										<div class="mobile-nav"></div>
									</div>
									<div class="col-lg-10 col-md-9 col-12">
										<div class="menu-area">
											<!-- Main Menu -->
											<nav class="navbar navbar-expand-lg">
												<div class="navbar-collapse">	
													<div class="nav-inner">	
														<div class="menu-home-menu-container">
															<!-- Naviagiton -->
															<ul id="nav" class="nav main-menu menu navbar-nav">
															 
															 <li class="icon-active"><a href="#"> How it work  </a>
																	<ul class="sub-menu">
																		<li><a href="#"> Link 1 </a></li>
                                                                        <li><a href="#"> Link 2 </a></li>
																		<li><a href="#"> Link 3 </a></li>
																		<li><a href="#"> Link 4 </a></li>
																	</ul>
																</li>
                                                            <li><a href="#"> Find a Coach   </a></li>
															<li><a href="#"> Become  a Coach   </a></li>
															<li><a href="#"> Resources   </a></li>

															 <li class="icon-active"><a href="#"> About  </a>
																	<ul class="sub-menu">
																		<li><a href="#"> Link 1 </a></li>
                                                                        <li><a href="#"> Link 2 </a></li>
																		<li><a href="#"> Link 3 </a></li>
																		<li><a href="#"> Link 4 </a></li>
																	</ul>
																</li>
															<?php if(empty($user['name'])) { ?>
																<li>  <a href="<?php echo base_url();?>Signin" class="biz-btn"> Log in </a> </li>
															<li>  <a href="<?php echo base_url();?>Signup" class="biz1-btn"> Register </a> </li>
															<?php }else{  ?>
															
																<li><?php $pro=" ";
																if ($user['type']==2) {
																	$pro="CoProfile";
																}
																if ($user['type']==3) {
																	$pro="StProfile";
																}?>  <a href="<?php echo base_url();echo $pro;?>" class="biz1-btn"> PROFILE </a> </li>
																<?php }  ?>	

															
															</ul>
															<!--/ End Naviagiton -->
														</div>
													</div>
												</div>
											</nav>
 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Middle Header -->
		</header>