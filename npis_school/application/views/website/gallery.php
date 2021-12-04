  
  
	<!-- Page Title -->
    <section class="page-title" style="background-image: url(<?php echo base_url('assets/website_assets/'); ?>images/background/7.jpg)">
    	<div class="auto-container">
			<ul class="page-breadcrumb">
				<li><a>home</a></li>
				<li>  <?php echo $breadcrumb; ?>  </li>
			</ul>
			<h2>   <?php echo $breadcrumb; ?>  </h2>
        </div>
    </section>
    <!-- End Page Title -->		
 
	
 
	
	<!-- Related Project Section -->
	  <section class="faq-page-section" id="faq">
		<div class="auto-container">
			<!-- Sec Title -->
		 <h4> Images  </h4>
			<div class="row clearfix">
				<?php if (empty($images)) {
					echo "NO IMAGES FOUND";
				}else{ foreach ($images as $value) {?>
					<div class="gallery-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<figure class="image-box">
								<img src="<?php echo base_url('assets/admin_assets/images/gallery/'.$value['gallery_img']); ?>" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<a href="<?php echo base_url('assets/admin_assets/images/gallery/'.$value['gallery_img']); ?>" data-fancybox="gallery" data-caption="" class="icon flaticon-full-screen"></a>
										 
										</div>
									</div>
								</div>
							</figure>
							<div class="lower-content">
								<h5><a><?php echo $value['gallery_title']; ?></a></h5>
							</div>
						</div>
					</div>
				<?php } }?>		
			</div>			
		</div>
	</section>
	<!-- End Related Project Section -->
		<!-- Related Project Section -->
	  <section class="faq-page-section" id="faq">
		<div class="auto-container">
			<!-- Sec Title -->
		 
		 <h4> Videos  </h4>
		 
			<div class="row clearfix">
				<?php if (empty($videos)) {
					echo "NO VIDEOS FOUND";
				}else{ foreach ($videos as $video) {?>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="inner-box-video">
						 
								<video controls="">
									<source src="<?php echo base_url('assets/admin_assets/images/videos/'.$video['video']);?>" width="100%">
								</video>
						 
						</div>
					</div>
				<?php } }?>		
			</div>			
		</div>
	</section>
	<!-- End Related Project Section -->
	
 
 <style>
.inner-box-video {
    width: 100%;
    overflow: auto;
}     
 </style>
 
 
 
 
 