 
 
	
	<!-- Page Title -->
    <section class="page-title" style="background-image: url(<?php echo base_url('assets/website_assets/'); ?>images/background/7.jpg)">
    	<div class="auto-container">
			<ul class="page-breadcrumb">
				<li><a href="index.php">home</a></li>
				<li>  TESTIMONIAL  </li>
			</ul>
			<h2>   TESTIMONIAL </h2>
        </div>
    </section>
    <!-- End Page Title -->	
	
	
 
 
 <!-- Testimonial Section -->
	<section class="testimonial-section" style="background-image:url(<?php echo base_url('assets/website_assets/'); ?>images/background/pattern-3.png)">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="title"><span class="separator"></span>  Testimonial </div>
				<h2> See what Parents say <br> about us</h2>
			</div>
			<div class="testimonial-carousel owl-carousel owl-theme">
				
				<!-- Testimonial Block -->
				<?php foreach($testimonials as $testimonial) {?>
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="quote-icon flaticon-quote-2"></div>
						<div class="author-image-outer">
							<div class="author-image">
								<img src="<?php echo base_url('assets/website_assets/'); ?>images\resource\author-1.jpg" alt="">
							</div>
							<h6><?php echo $testimonial['testimonial_title'] ?></h6>
						</div>
						<div class="rating">
							<?php for($i=0;$i<=$testimonial['testimonial_rating']-1;$i++){?>
							<span class="fa fa-star"></span>
							
							<?php }?>
						</div>
						<div class="text"><?php echo $testimonial['testimonial_description'] ?></div>
					</div>
				</div>
				<?php }?>
				
				
				
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->	
	