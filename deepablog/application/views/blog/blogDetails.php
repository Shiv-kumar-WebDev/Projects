  <!-- Single Blog Banner Start Here -->
  <section class="single-blog-wrap-layout1">
            <div class="single-blog-banner-layout1">
                <div class="banner-img">
                    <img src="<?php echo base_url('assets/blog/img/blog/blog208.jpg'); ?>" alt="blog">
                </div>
                <div class="banner-content">
                    <div class="container">
                        <?php foreach($blogs as $blog){ ?>
                        <h2 class="item-title"><?php echo $blog['title'] ?>  </h2>
                        <?php } ?>
                        <ul class="item-social">
                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i>SHARE</a></li>
                            <li><a href="#" class="twitter"><i class="fab fa-twitter"></i>SHARE</a></li>
                            <li><a href="#" class="g-plus"><i class="fab fa-google-plus-g"></i>SHARE</a></li>
                            <li><a href="#" class="pinterst"><i class="fab fa-pinterest"></i>PIN IT</a></li>
 
                        </ul>
                        <ul class="response-area">
                            <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                            <li><a href="#"><i class="far fa-eye"></i>105</a></li>
                            <li><a href="#"><i class="far fa-heart"></i>225</a></li>
                            <li><a href="#"><i class="fas fa-share"></i>302</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row gutters-50">
                    <div class="col-lg-8">
                        <div class="single-blog-box-layout1">
                            <div class="blog-details">
                                <?php foreach($blogs as $blog) {?>
                                    <img src="<?php echo base_url('assets/admin/images/blogs/'); ?><?php echo $blog['imgSrc'] ?>" alt="blog">
                                <p class="mt-4"> <?php echo $blog['blog_description']?></p>
                                <?php } ?>
                            </div>
                            <div class="blog-entry-meta">
                                <ul>
                                    <li class="item-tag"><i class="fas fa-bookmark"></i>
                                        <a href="#">explore,</a>
                                        <a href="#">travel,</a>
                                        <a href="#">vacation,</a>
                                    </li>
                                    <li class="item-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="item-respons"><i class="fas fa-heart"></i>1,230</li>
                                </ul>
                            </div>
                            <div class="blog-author">
                                <div class="media media-none--xs">
                                    <img src="<?php echo base_url('assets/blog/img/blog/blog212.jpg') ?>" alt="Author" class="media-img-auto">
                                    <div class="media-body">
                                        <h4 class="item-title">Lora Zaman</h4>
                                        <div class="item-subtitle">Author</div>
                                        <p>Dorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit,sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
                                        <ul class="item-social">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="related-item">
                                <div class="section-heading-4 heading-dark">
                                    <h3 class="item-heading">YOU MAY ALSO LIKE</h3>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="blog-box-layout1 text-left">
                                            <div class="item-img">
                                                <a href="single-blog.html"><img src="<?php echo base_url('assets/blog/img/blog/blog213.jpg') ?>" alt="blog"></a>
                                            </div>
                                            <div class="item-content">
                                                <ul class="entry-meta meta-color-dark">
                                                    <li><i class="fas fa-tag"></i>Fashion</li>
                                                    <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                                                </ul>
                                                <h5 class="item-title"><a href="single-blog.html">How an Island Formsn
                                                        River
                                                        And Stones</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="blog-box-layout1 text-left">
                                            <div class="item-img">
                                                <a href="single-blog.html"><img src="<?php echo base_url('assets/blog/img/blog/blog214.jpg') ?>" alt="blog"></a>
                                            </div>
                                            <div class="item-content">
                                                <ul class="entry-meta meta-color-dark">
                                                    <li><i class="fas fa-tag"></i>Fashion</li>
                                                    <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                                                </ul>
                                                <h5 class="item-title"><a href="single-blog.html">How an Island Formsn
                                                        River
                                                        And Stones</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="blog-box-layout1 text-left">
                                            <div class="item-img">
                                                <a href="single-blog.html"><img src="<?php echo base_url('assets/blog/img/blog/blog215.jpg') ?>" alt="blog"></a>
                                            </div>
                                            <div class="item-content">
                                                <ul class="entry-meta meta-color-dark">
                                                    <li><i class="fas fa-tag"></i>Fashion</li>
                                                    <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                                                </ul>
                                                <h5 class="item-title"><a href="single-blog.html">How an Island Formsn
                                                        River
                                                        And Stones</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-comment">
                                <div class="section-heading-4 heading-dark">
                                    <h3 class="item-heading">COMMENTS</h3>
                                </div>
                                <?php foreach($comments as $comment){ ?>
                                <div class="media media-none--xs">
                                    <img src="<?php echo base_url('assets/blog/img/blog/blog216.jpg') ?>" alt="Blog Comments" class="img-fluid media-img-auto">
                                    <div class="media-body">
                                        <h4 class="item-title"><?php echo $comment['comment_name'] ?></h4>
                                        <div class="item-subtitle"><?php echo $comment['created_at'] ?></div>
                                        <p><?php echo $comment['message'] ?></p>
                                        <a href="#" class="item-btn">Reply</a>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- <div class="media media-none--xs">
                                    <img src="<?php //echo base_url('assets/blog/img/blog/blog217.jpg') ?>" alt="Blog Comments" class="img-fluid media-img-auto">
                                    <div class="media-body">
                                        <h4 class="item-title">Dakcon Nitiya</h4>
                                        <div class="item-subtitle">2 Mins Ago</div>
                                        <p>Bmmy text of the printing and typesetting industryorem Ipsum has
                                            been the industry's standard dummy text ever since the</p>
                                        <a href="#" class="item-btn">Reply</a>
                                    </div>
                                </div> -->
                            </div>
                            <div class="blog-form">
                                <div class="section-heading-4 heading-dark">
                                    <h3 class="item-heading">WRITE A COMMENT</h3>
                                </div>
                                <?php foreach($blogs as $blog){ ?>
                                <form class="contact-form-box" method="post" action="<?php echo base_url('Blog/user_comment/').$blog['id'] ?>" >
                                    <div class="row gutters-15">
                                        <div class="col-md-4 form-group">
                                            <input type="text" placeholder="Name*" class="form-control" name="first_name" data-error="Name field is required" required="">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="email" placeholder="E-mail*" class="form-control" name="email" data-error="E-mail field is required" required="">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" placeholder="Website*" class="form-control" name="website" data-error="website field is required" required="">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea placeholder="Write your comments ..." class="textarea form-control" name="message" rows="8" cols="20" data-error="Message field is required" required=""></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <button type="submit" class="item-btn">POST COMMENT</button>
                                        </div>
                                    </div>
                                    <div class="form-response"></div>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
					
					
					
					
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">POPULAR POSTS</h3>
                            </div>
                            <div class="widget-latest">
                                <ul class="block-list">
                                    <?php foreach($popularPosts as $popularPost){ 
                                        // echo "<pre>";
                                        // print_r($popularPost);die();
                                        ?>
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img width="100" src="<?php echo base_url('assets/admin/images/blogs/') ?><?php echo $popularPost['imgSrc'] ?>" alt="Post"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i><?php echo $popularPost['category_name'] ?></li>
                                                <li><i class="fas fa-calendar-alt"></i><?php echo $popularPost['created_at'] ?></li>
                                            </ul>
                                            <h4 class="item-title"><a href="#"><?php echo $popularPost['title'] ?></a></h4>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    <!-- <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="<?php //echo base_url('assets/blog/img/blog/blog86.jpg') ?>" alt="Post"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Flower</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h4 class="item-title"><a href="#">Type designer Jeremy Tanka rdoverhauls
                                                    online</a></h4>
                                        </div>
                                    </li>
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="<?php echo base_url('assets/blog/img/blog/blog87.jpg') ?>" alt="Post"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Stage</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h4 class="item-title"><a href="#">5 design things to look out for in June
                                                    2019</a></h4>
                                        </div>
                                    </li>
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="<?php echo base_url('assets/blog/img/blog/blog88.jpg') ?>" alt="Post"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Life Style</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h4 class="item-title"><a href="#">Marc Falzone opens £2 million UK Expo
                                                    Pavilion</a></h4>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">FOLLOW ME ON</h3>
                            </div>
                            <div class="widget-follow-us-2">
                                <ul>
                                    <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-twitter"></i>FOLLOWE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-instagram"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i>FOLLOW ME</a></li>

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
                                        <a href="#"><?php echo $category['name'] ?>
                                            <!-- <span>(35)</span> -->
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
                        <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="<?php echo base_url('assets/blog/img/figure/figure5.jpg') ?>" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Blog Banner End Here -->
 