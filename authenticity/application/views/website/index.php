<?php
$this->db->select("*");
$this->db->from("site_settings");
$query = $this->db->get();
$data = $query->result_array();
foreach ($data as $value) {
   if ($value['name'] == 'product_title') {
      $product_title = $value['value'];
   }
}
?>
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
                <h2> Shop By Category  </h2>
                <p>Kitchens that inspire. Conversations you desire.</p>
            </div>
            <div class="collection-banners">
                <div class="row">
                    <?php $c=1; ?>
                    <?php

                    $this->db->select('*');
                    $this->db->from('category');  
                    $this->db->where('status','1');
                    $this->db->where('cat_grid','1');
                    $this->db->limit('4');
                    $query = $this->db->get();        
                    $cat_list =  $query->result_array();
                                // print_r($cat_list);die();
                    foreach($cat_list as $row){
                        if ($c==1) {?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 img-banner-item">
                                <div class="imgBanner-grid-item">
                                    <div class="inner btmleft">
                                        <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/0/<?php echo $row['category_id'];  ?>">
                                            <span class="img">
                                                <img class="blur-up lazyload" data-src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" alt="" title=" ">
                                            </span>
                                            <span class="ttl"><span class="tt-small"> <?php echo $row['name_en'];?> </span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 img-banner-item">
                                <div class="row"> <?php $c++;?>
                            <?php  }elseif ($c==2) {?>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 img-banner-item">
                                    <div class="imgBanner-grid-item">
                                        <div class="inner btmleft">
                                            <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/0/<?php echo $row['category_id'];  ?>">
                                                <span class="img">
                                                    <img class="blur-up lazyload" data-src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>   " alt="" title=" ">
                                                </span>
                                                <span class="ttl"><span class="tt-small"> <?php echo $row['name_en'];?> </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 img-banner-item last"><?php $c++;?>
                            <?php  }elseif ($c==3) {?>
                                <div class="imgBanner-grid-item">
                                    <div class="inner btmleft">
                                        <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/0/<?php echo $row['category_id'];  ?>">
                                            <span class="img">
                                                <img class="blur-up lazyload" data-src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" alt="" title=" ">
                                            </span>
                                            <span class="ttl"><span class="tt-small"><?php echo $row['name_en'];?></span></span>
                                        </a>
                                    </div>
                                    </div><?php $c++;?>
                                <?php  }else {?>
                                    <div class="imgBanner-grid-item">
                                        <div class="inner btmleft">
                                            <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/0/<?php echo $row['category_id'];  ?>">
                                                <span class="img">
                                                    <img class="blur-up lazyload" data-src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" alt="" title=" ">
                                                </span>
                                                <span class="ttl"><span class="tt-small"><?php echo $row['name_en'];?></span></span>
                                            </a>
                                        </div>
                                    </div>

                                <?php  }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-12">
                <div class="btnall">
                   <a href="<?php echo base_url('')?>landing/categories" class="btn border-btn-1 btn--large">Browse All  Category </a>     
               </div>
           </div>

       </div>
       <!--End Image Banner-->

       <!--New Arrivals-->
       <div class="section product-slider tab-slider-product no-pb-section">
        <div class="container">   
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
                                                        <form class="add" method="post">
                                                            <button class="btn-icon btn btn-addto-cart" data-toggle="modal" data-target="#addcart" onclick="getvar('<?php echo $pro['product_id'];  ?>')" type="button" tabindex="0">
                                                                <i class="icon anm anm-cart-l" ></i>
                                                                <span class="tooltip-label">Add to Cart</span>
                                                            </button>
                                                        </form>
                                                        <!--end Cart Button-->
                                                    </li>

                                                    <li>
                                                        <!--Wishlist Button-->
                                                        <div class="wishlist-btn">
                                                            <a class="btn-icon wishlist add-to-wishlist"  onclick="addtoWishlist('<?php echo $pro['product_id'];  ?>')">
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
                                         <s id="ComparePrice-product-template"><span class="money list_price">₹ <?php echo $pro['price'] ?> </span></s>   <span class="lprice"> &#8360; <?php echo $pro['discount_price'] ?></span> 
                                            <s id="ComparePrice-product-template"><span class="money">$  <?php echo $pro['usd_price'] ?> </span></s>   <span class="lprice"> &#36; <?php echo $pro['usd_discount_price'] ?></span>
                                             <p class="save"> Save ₹ <?php echo $pro['price']-$pro['discount_price']; ?>  <span> $  <?php echo $pro['usd_price']-$pro['usd_discount_price']; ?> </span></p>
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
    </div>
    <!--End New Arrivals-->





    <!--New Arrivals-->
    <div class="section product-slider no-pb-section">
        <div class="container">
        <div class="section-header">
            <h2> Trending and Timeless </h2>
        </div>
        <div class="productSlider grid-products">
            <?php foreach($products as $product){ ?>
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
                                       <button class="btn-icon btn btn-addto-cart" data-toggle="modal" data-target="#addcart" onclick="getvar('<?php echo $product['product_id'];  ?>')" type="button" tabindex="0">
                                            <i class="icon anm anm-cart-l" ></i>
                                            <span class="tooltip-label">Add to Cart</span>
                                        </button>
                                    </form>
                                    <!--end Cart Button-->
                                </li>

                                <li>
                                    <!--Wishlist Button-->
                                    <div class="wishlist-btn">
                                        <a class="btn-icon wishlist add-to-wishlist btn-square"   onclick="addtoWishlist('<?php echo $pro['product_id'];  ?>')">
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
                        <s id="ComparePrice-product-template"><span class="money list_price">₹ <?php echo $product['price'] ?> </span></s>   <span class="lprice"> &#8360; <?php echo $product['discount_price'] ?></span> 
                        <s id="ComparePrice-product-template"><span class="money">$  <?php echo $product['usd_price'] ?> </span></s>   <span class="lprice"> &#36; <?php echo $product['usd_discount_price'] ?></span>
                        <p class="save"> Save ₹ <?php echo $product['price']-$product['discount_price']; ?>  <span> $  <?php echo $product['usd_price']-$product['usd_discount_price']; ?> </span></p>
                    </div>
                    <!-- End product price -->
                </div>
                <!-- End product details -->
            </div>

        <?php } ?>



</div>
    </div>
</div>
<!--End New Arrivals-->         



<!--Offer Of The Month-->
    <div class="section product-slider no-pb-section">
        <div class="section-header">
            <h2> <?php echo $product_title; ?> </h2>
            <p>Describe your products, collection etc...</p>
        </div>
        <div class="productSlider grid-products">
            <?php foreach($getOfferProduct as $product){ ?>
            <div class="col-12 item">
                <!-- start product image -->
                <div class="product-image">
                    <!-- start product image -->
                    <span class="badge badge-success" id="off_57" style="display: inline;"><?php echo $product['discount'] ?> %</span> 
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
                                        <button class="btn-icon btn btn-addto-cart" data-toggle="modal" data-target="#addcart" onclick="getvar('<?php echo $product['product_id'];  ?>')" type="button" tabindex="0">
                                            <i class="icon anm anm-cart-l" ></i>
                                            <span class="tooltip-label">Add to Cart</span>
                                        </button>
                                    </form>
                                    <!--end Cart Button-->
                                </li>

                                <li>
                                    <!--Wishlist Button-->
                                    <div class="wishlist-btn">
                                        <a class="btn-icon wishlist add-to-wishlist btn-square"   onclick="addtoWishlist('<?php echo $pro['product_id'];  ?>')">
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
                        <s id="ComparePrice-product-template"><span class="money list_price">₹ <?php echo $product['price'] ?> </span></s>   <span class="lprice"> &#8360; <?php echo $product['discount_price'] ?></span> 
                        <s id="ComparePrice-product-template"><span class="money">$  <?php echo $product['usd_price'] ?> </span></s>   <span class="lprice"> &#36; <?php echo $product['usd_discount_price'] ?></span>
                        <p class="save"> Save ₹ <?php echo $product['price']-$product['discount_price']; ?>  <span> $  <?php echo $product['usd_price']-$product['usd_discount_price']; ?> </span></p>
                    </div>
                    <!-- End product price -->
                </div>
                <!-- End product details -->
            </div>

        <?php } ?>

    </div>
</div>
<!--End Offer Of The Month -->   



<!--Featured Content-->

<div class="section featuredContent featuredContentStyle2">
    <div class="container">
        <div class="row-fluid d-flex justify-content-between align-items-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 pl-0 px-0">
                <img data-src="<?php echo base_url();?>assets/website_assets/images/christmas2-fw-bnr.jpg" src="<?php echo base_url();?>assets/website_assets/images/ho.jpg">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="row-text">
                    <h3> handpicked by us </h3>
                    <div class="rte rte-setting featured-row__subtext">
                        <p>Breakfast jumpstarts the metabolism, and it helps in burning more calories throughout the day. This beautiful handcrafted Earth Breakfast Set is a healthy gift set for your loved ones. The lid of the cup can be used as a coaster too. This breakfast set comes in a handmade reusable engineered wooden gift box.</p>
                        <h4>THIS PRODUCT IS</4>
                            <ul style="padding: 10px 20px;">
                             <li>Handcrafted</li> 
                             <li> Food Safe</li>
                             <li> Form & Function</li>
                         </ul>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>


 
 
 <!-- 
 <div class="section home-blog-post">
    <div class="container">
        <div class="section-header">
            <h2>Fresh From Our Blog</h2>
            <p>You are going to love this amazing shopify theme.</p>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="blog-post-slider">
                    <div class="blogpost-item">
                        <a href="#;" class="post-thumb">
                            <img src="http://aauthenticity.com/assets/images/instagram/332-5.jpg" alt="" title=""/>
                        </a>
                        <div class="post-detail">
                            <h3 class="post-title"><a href="#;">Our development is your success</a></h3>
                            <ul class="publish-detail">
                                <li><span class="article__date">March 06, 2019</span></li>
                                <li><i class="anm anm-comments-l"></i> <a href="#;" class="btn-link">1 comment</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blogpost-item">
                        <a href="#;" class="post-thumb">
                            <img src="http://aauthenticity.com/assets/images/instagram/332-5.jpg" alt="" title=""/>
                        </a>
                        <div class="post-detail">
                            <h3 class="post-title"><a href="#;">Ensuring Customer Success</a></h3>
                            <ul class="publish-detail">
                                <li><span class="article__date">February 11, 2019</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blogpost-item">
                        <a href="#;" class="post-thumb">
                            <img src="http://aauthenticity.com/assets/images/instagram/332-5.jpg" alt="" title=""/>
                        </a>
                        <div class="post-detail">
                            <h3 class="post-title"><a href="#;">We can make your business shine!</a></h3>
                            <ul class="publish-detail">
                                <li><span class="article__date">February 19, 2019</span></li>
                                <li><i class="anm anm-comments-l"></i> <a href="#;" class="btn-link">2 comments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->



<div class="section home-instagram no-pt-section">
    <div class="container">

        <div class="section-header">
            <h2> Instagram</h2>
            <p>@aauthenticity</p>
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


<style>
   span#off_57 {
    position: absolute;
    z-index: 1;
    left: 10px;
    top: 5px;
    font-size: 16px;
    background: #ff0303;
    border-radius: 100%;
    line-height: 35px;
} 

.save{color: #226832;}
</style>