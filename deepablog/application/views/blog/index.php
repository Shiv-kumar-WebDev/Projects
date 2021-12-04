
		
		
		
		
		
		
		
		
		
		
        <!-- Slider Area Start Here -->
        <section class="slider-wrap-layout3">
            <div class="rc-carousel nav-control-layout3" data-loop="true" data-center="false" data-items="5" data-margin="5" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="700" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="2" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="3" data-r-large-nav="true" data-r-large-dots="false" data-r-extra-large="3" data-r-extra-large-nav="true" data-r-extra-large-dots="false">
                <?php foreach($sliders as $slider){ 
                    //print_r($slider);die();
                    ?>
                <div class="slider-box-layout3">
                    <div class="item-img">
                        <img height="500" src="<?php echo base_url('assets/admin/images/sliders/'); ?><?php echo $slider['slider_img'] ?>" alt="slider">
                        <div class="item-content">
                            <ul class="entry-meta meta-color-light">
                                <li><i class="fas fa-tag"></i><?php echo $slider['category_name'] ?></li>
                                <!-- <li><i class="fas fa-calendar-alt"></i><?php //echo $slider['created_at'] ?></li> -->
                                <!-- <li><i class="fas fa-user"></i>BY <a href="#"><?php //echo $slider['user'] ?></a></li> -->
                                <li><i class="far fa-clock"></i><?php echo $slider['created_at'] ?></li>
                            </ul>
                            <h2 class="item-title"><a href="blog_detail.html"><?php echo $slider['slider_title'] ?></a></h2>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- <div class="slider-box-layout3">
                    <div class="item-img">
                        <img src="<?php echo base_url(); ?>assets\img\slider\slide3-2.jpg" alt="slider">
                        <div class="item-content">
                            <ul class="entry-meta meta-color-light">
                                <li><i class="fas fa-tag"></i>Fashion</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h2 class="item-title"><a href="blog_detail.html">Technology Inside the new battl eraa for
                                    the american west.</a></h2>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="slider-box-layout3">
                    <div class="item-img">
                        <img src="<?php echo base_url(); ?>assets\img\slider\slide3-3.jpg" alt="slider">
                        <div class="item-content">
                            <ul class="entry-meta meta-color-light">
                                <li><i class="fas fa-tag"></i>Fashion</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h2 class="item-title"><a href="blog_detail.html">Technology Inside the new battl eraa for
                                    the american west.</a></h2>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="slider-box-layout3">
                    <div class="item-img">
                        <img src="<?php echo base_url(); ?>assets\img\slider\slide3-2.jpg" alt="slider">
                        <div class="item-content">
                            <ul class="entry-meta meta-color-light">
                                <li><i class="fas fa-tag"></i>Fashion</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h2 class="item-title"><a href="blog_detail.html">Technology Inside the new battl eraa for
                                    the american west.</a></h2>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <!-- Slider Area End Here -->
		
		
		
        <!-- Blog Area Start Here -->
        <section class="blog-wrap-layout4">
            <div class="container">
		         <div class="section-heading heading-dark">
                  <h3 class="item-heading"> OUR LATEST BLOG </h3>
                 </div>
			
                <div class="row gutters-50">
				 
                    <div class="col-lg-9">
                        <div class="blog-wrap-layout5">
                            <div class="row">
                                <?php foreach($blogs as $blog){ ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="blog-box-layout2">
                                        <div class="item-img">
                                            <a href="<?php echo base_url('Blog/blogDetails/').$blog['id']; ?>"><img src="<?php echo base_url('assets/admin/images/blogs/'); ?><?php echo $blog['imgSrc'] ?>" alt="blog"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i><?php echo $blog['category_name'] ?></li>
                                                <li><i class="fas fa-calendar-alt"></i><?php echo $blog['created_at'] ?></li>
                                            </ul>
                                            <h3 class="item-title"><a href="blog_detail.html"><?php echo $blog['title'] ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="blog-box-layout2">
                                        <div class="item-img">
                                            <a href="blog_detail.html"><img src="<?php echo base_url(); ?>assets\img\blog\blog35.jpg" alt="blog"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Fashion</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h3 class="item-title"><a href="blog_detail.html">How an Island Formsn
                                                    River And Stones</a></h3>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="blog-box-layout2">
                                        <div class="item-img">
                                            <a href="blog_detail.html"><img src="<?php echo base_url(); ?>assets\img\blog\blog37.jpg" alt="blog"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Fashion</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h3 class="item-title"><a href="blog_detail.html">How an Island Formsn
                                                    River And Stones</a></h3>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="blog-box-layout2">
                                        <div class="item-img">
                                            <a href="blog_detail.html"><img src="<?php echo base_url(); ?>assets\img\blog\blog38.jpg" alt="blog"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Fashion</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h3 class="item-title"><a href="blog_detail.html">How an Island Formsn
                                                    River And Stones</a></h3>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="blog-box-layout2">
                                        <div class="item-img">
                                            <a href="blog_detail.html"><img src="<?php echo base_url(); ?>assets\img\blog\blog39.jpg" alt="blog"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Fashion</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h3 class="item-title"><a href="blog_detail.html">How an Island Formsn
                                                    River And Stones</a></h3>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="blog-box-layout2">
                                        <div class="item-img">
                                            <a href="blog_detail.html"><img src="<?php echo base_url(); ?>assets\img\blog\blog40.jpg" alt="blog"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Fashion</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h3 class="item-title"><a href="blog_detail.html">How an Island Formsn
                                                    River And Stones</a></h3>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        
                  
                    </div>
					
					
					
					
					
                    <div class="col-lg-3 sidebar-widget-area sidebar-break-md">
 
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
                            </div>
                            <div class="widget-follow-us">
                                <ul>
                                    <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                              
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">CATEGORIES</h3>
                            </div>
                            <div class="widget-categories">
                                <ul>
                                    <?php foreach($categories as $category){ ?>
                                    <li>
                                        <a href="#"><?php echo $category['category_name']; ?>
                                            <span>(35)</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <!-- <li>
                                        <a href="#">Fashion
                                            <span>(10)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Food
                                            <span>(25)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style
                                            <span>(15)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Travel
                                            <span>(22)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Video
                                            <span>(18)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Technology
                                            <span>(22)</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
              
 
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->
		
		
		
		
        