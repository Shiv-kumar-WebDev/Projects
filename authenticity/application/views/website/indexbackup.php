 
    
    
    <div id="page-content">
        <!--Home slider-->
        <div class="slideshow slideshow-wrapper">
            <div class="home-slideshow">
            <?php foreach($sliders as $slider){ ?>
                <div class="slide">
                    <div class="blur-up lazyload">
                        <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/<?php echo $slider['maincat_id'];  ?>/<?php echo $slider['cat_id']; ?>/<?php echo $slider['sub_cat_id'] ?>"><img class="blur-up lazyload desktop-hide" data-src="<?php echo base_url();?>assets/images/slider/<?php echo $slider['image']; ?>" src="<?php echo base_url();?>assets/images/slider/<?php echo $slider['image']; ?>" alt="" title=""></a>
                    </div>
                </div>
         <?php }  ?>
            </div>
        </div>
        <!--End Home slider-->
        

        
        <!--Body Container-->
        <div class="container">
            <!--Image Banner-->
            <div class="section imgBanners style2 no-pb-section">
                <div class="section-header">
                    <h2>Shop By Category </h2>
                </div>
                <div class="collection-banners">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 img-banner-item">
                            <div class="imgBanner-grid-item">
                                <div class="inner btmleft">
                                    <a href="category.php">
                                        <span class="img">
                                            <img class="blur-up lazyload" data-src="<?php echo base_url();?>assets/website_assets/images/collection-banner/collection-bn1-style2.jpg" src="<?php echo base_url();?>assets/website_assets/images/collection-banner/collection-bn1-style2.jpg" alt="" title=" ">
                                        </span>
                                        <span class="ttl"><span class="tt-small"> Handicraft </span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 img-banner-item">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 img-banner-item">
                                    <div class="imgBanner-grid-item">
                                        <div class="inner btmleft">
                                            <a href="category.php">
                                                <span class="img">
                                                    <img class="blur-up lazyload" data-src="<?php echo base_url();?>assets/website_assets/images/collection-banner/collection-bn2-style2.jpg" src="<?php echo base_url();?>assets/website_assets/images/collection-banner/collection-bn2-style2.jpg" alt="" title=" ">
                                                </span>
                                                <span class="ttl"><span class="tt-small"> Handicraft </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 img-banner-item last">
                                    <div class="imgBanner-grid-item">
                                        <div class="inner btmleft">
                                            <a href="category.php">
                                                <span class="img">
                                                    <img class="blur-up lazyload" data-src="<?php echo base_url();?>assets/website_assets/images/collection-banner/collection-bn3-style2.jpg" src="<?php echo base_url();?>assets/website_assets/images/collection-banner/collection-bn3-style2.jpg" alt="" title=" ">
                                                </span>
                                                <span class="ttl"><span class="tt-small">Backpack</span></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="imgBanner-grid-item">
                                        <div class="inner btmleft">
                                            <a href="category.php">
                                                <span class="img">
                                                    <img class="blur-up lazyload" data-src="<?php echo base_url();?>assets/website_assets/images/collection-banner/collection-bn4-style2.jpg" src="<?php echo base_url();?>assets/website_assets/images/collection-banner/collection-bn4-style2.jpg" alt="" title=" ">
                                                </span>
                                                <span class="ttl"><span class="tt-small">Accessories</span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Image Banner-->
                
            <!--New Arrivals-->
            <div class="section product-slider tab-slider-product no-pb-section">
                <div class="section-header">
                    <h2> Spotlight </h2>
                </div>
                <div class="tabs-listing">
                    <ul class="tabs clearfix">

                        <?php $i=1; ?>
                         <?php
                      
                                $this->db->select('*');
                                $this->db->from('maincategory');  
                                $this->db->where('maincatstatus','1');
                                $this->db->where('spotlight','1');
                                $this->db->limit('3');
                                $query = $this->db->get();        
                                $maincat_list =  $query->result_array();
                                foreach($maincat_list as $row){
                                    if ($i == 1) {?>
                                        <li class="active" rel="tab<?php echo $i; ?>"> <?php echo $row['maincategory_name_en']; $i++;?> </li>
                                    <?php }else{?>
                                        <li rel="tab<?php echo $i; ?>"> <?php echo $row['maincategory_name_en']; $i++; ?> </li>
                                    <?php } ?>
                                    <?php } ?>
                                    
                        <!-- <li class="active" rel="tab1"> Kitchenware </li>
                        <li rel="tab2"> Tableware </li>
                        <li rel="tab3" class="tab_last"> Furniture & Lighting </li> -->
                    </ul>
                    <div class="tab_container">
                        <?php $r=1; ?>
                        <?php
                      
                                $this->db->select('*');
                                $this->db->from('maincategory');  
                                $this->db->where('maincatstatus','1');
                                $this->db->limit('3');
                                $query = $this->db->get();        
                                $maincat_list =  $query->result_array();
                                foreach($maincat_list as $row){
                                   ?>
                                        <?php $this->db->select('*');
                                        $this->db->from('product');  
                                        $this->db->where('maincatid',$row['maincategory_id']);
                                        $this->db->where('prostatus','1');
                                        $this->db->limit('10');
                                        $querypro = $this->db->get();        
                                        $pro_list =  $querypro->result_array();
                                        // // print_r($pro_list);die();
                                        // foreach($pro_list as $pro){
                                        ?>
                                            <h3 class="tab_drawer_heading" rel="tab<?php echo $r; ?>" > <i class="anm anm-angle-down-r" aria-hidden="true"></i></h3>
                                            <div id="tab<?php echo $r; $r++; ?>" class="tab_content grid-products">
                                                <div class="productSlider">
                                                 <?php   foreach($pro_list as $pro){
                                        ?>
                                                    <div class="col-12 item">
                                                        <!-- start product image -->
                                                        <div class="product-image">
                                                            <!-- start product image -->
                                                            <a href="<?php echo base_url();?>landing/productdetails/<?php echo $pro['product_id'];  ?>" class="product-img">
                                                                <!-- image -->
                                                                <img class="primary blur-up lazyload" data-src="<?php echo base_url();?>assets/images/products/<?php echo $pro['promain_image'] ?>" src="<?php echo base_url();?>assets/images/products/<?php echo $pro['promain_image'] ?>" alt="" title="">
                                                                <!-- End image -->
                                                            </a>
                                                            <!-- end product image -->

                                                            <!--Product Button-->
                                                            <div class="button-set style1">
                                                                <ul>
                                                                    <li>
                                                                        <!--Cart Button-->
                                                                        <form class="add" action="cart-variant1.html" method="post">
                                                                            <button class="btn-icon btn btn-addto-cart" type="button" tabindex="0">
                                                                                <i class="icon anm anm-cart-l"></i>
                                                                                <span class="tooltip-label">Add to Cart</span>
                                                                            </button>
                                                                        </form>
                                                                        <!--end Cart Button-->
                                                                    </li>
                     
                                                                    <li>
                                                                        <!--Wishlist Button-->
                                                                        <div class="wishlist-btn">
                                                                            <a class="btn-icon wishlist add-to-wishlist" href="my-wishlist.html">
                                                                                <i class="icon anm anm-heart-l"></i>
                                                                                <span class="tooltip-label">Add To Wishlist</span>
                                                                            </a>
                                                                        </div>
                                                                        <!--End Wishlist Button-->
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!--End Product Button-->
                                                        </div>
                                                        <!-- end product image -->
                                                        <!--start product details -->
                                                        <div class="product-details text-center">
                                                            <!-- product name -->
                                                            <div class="product-name">
                                                                <a href="<?php echo base_url();?>landing/productdetails/<?php echo $pro['product_id'] ?>"><?php echo $pro['proname_en']; ?> </a>
                                                            </div>
                                                            <!-- End product name -->
                                                            <!-- product price -->
                                                            <div class="product-price">
                                                                <span class="price"> &#8360; <?php echo $pro['discount_price'] ?></span> 
                                                                <span class="price"> &#36; <?php echo $pro['usd_discount_price'] ?></span>
                                                            </div>
                                                            <!-- End product price -->
                                                        </div>
                                                        <!-- End product details -->
                                                    </div>
                                                    
                                        <?php } ?>
                                                </div>
                                            </div>
                        

                                        
                               <?php }?> 
                        
                    </div>
                </div>
            </div>
            <!--End New Arrivals-->
            
            
            
            
            
            <!--New Arrivals-->
            <div class="section product-slider no-pb-section">
                <div class="section-header">
                    <h2>New Arrivals</h2>
                </div>
                <div class="productSlider grid-products">
                    <?php foreach($products as $product){ ?>>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="<?php echo base_url();?>landing/productdetails/<?php echo $product['product_id'] ?>" class="product-img">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="<?php echo base_url();?>assets/images/products/<?php echo $product['promain_image'] ?>" src="<?php echo base_url();?>assets/images/products/<?php echo $product['promain_image'] ?>" alt="" title="">
                                    <!-- End image -->
                                </a>
                                <!-- end product image -->
                                
                                <!--Product Button-->
                                <div class="button-set style1">
                                    <ul>
                                        <li>
                                            <!--Cart Button-->
                                            <form class="add" action="cart-variant1.html" method="post">
                                                <button class="btn-icon btn btn-addto-cart btn-square" type="button" tabindex="0">
                                                    <i class="icon anm anm-cart-l"></i>
                                                    <span class="tooltip-label">Add to Cart</span>
                                                </button>
                                            </form>
                                            <!--end Cart Button-->
                                        </li>
     
                                        <li>
                                            <!--Wishlist Button-->
                                            <div class="wishlist-btn">
                                                <a class="btn-icon wishlist add-to-wishlist btn-square" href="wishlist.html">
                                                    <i class="icon anm anm-heart-l"></i>
                                                    <span class="tooltip-label">Add To Wishlist</span>
                                                </a>
                                            </div>
                                            <!--End Wishlist Button-->
                                        </li>
     
                                    </ul>
                                </div>
                                <!--End Product Button-->
                            </div>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="<?php echo base_url();?>landing/productdetails/<?php echo $product['product_id'] ?>"><?php echo $product['proname_en'] ?></a>
                                </div>
                                <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                <span class="price"> &#8360; <?php echo $product['discount_price'] ?></span> 
                                                 <span class="price"> &#36; <?php echo $product['usd_discount_price'] ?></span>
                                            </div>
                                            <!-- End product price -->
                            </div>
                            <!-- End product details -->
                        </div>

                    <?php } ?>


                    
                   
                </div>
            </div>
            <!--End New Arrivals-->         
            
        
        </div>
        
 
        
        <!--Featured Content-->
 
 <div class="section featuredContent featuredContentStyle2">
            <div class="container">
                <div class="row-fluid d-flex justify-content-between align-items-center">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 pl-0 px-0">
                        <img data-src="<?php echo base_url();?>assets/website_assets/images/christmas2-fw-bnr.jpg" src="<?php echo base_url();?>assets/website_assets/images/christmas2-fw-bnr.jpg" alt="Christmas Headquarters" title="Christmas Headquarters">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="row-text text-center">
                            <h3>Christmas Headquarters</h3>
                            <div class="rte rte-setting featured-row__subtext">
                                <p>Your Holiday Headquarters for toys and games, candy, treats, crafts, Christmas party decorations and supplies. Find the perfect Christmas ornaments, Santa costumes and accessories too!</p>
                            </div>
                            <a href="#" class="btn">View Collections</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


 


        <div class="section home-instagram no-pt-section">
            <div class="container">
             
                <div class="section-header">
                    <h2> Instagram</h2>
                    <p>@8senses </p>
                </div>
               <div class="row"> 
                    <?php foreach ($instagram as $post) { ?>
                        <div class="col-md-3">        
                            <div class="insta">    
                                <a href="<?php echo $post['post_url']; ?>"> <img class="primary blur-up lazyload"  src="<?php echo base_url();?>assets/images/instagram/<?php echo $post['post_image']; ?>" alt="" title=""> </a>        
                            </div>                   
                        </div>  
                    <?php } ?>                 
                </div>
            </div>
        </div>      
    </div><!--End Page Wrapper-->
    
    
  