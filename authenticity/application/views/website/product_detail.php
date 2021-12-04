<div id="page-content">        
    <!--Body Container-->
    <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Product</span></div>
        </div>
    </div>
    <!--End Breadcrumbs-->
    <div class="container">
        <div class="product-detail-container product-single-style1">

            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img product-horizontal-style">
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <img id="zoompro" class="zoompro prlightbox" src="<?php echo base_url('assets/images/products/').'/'.$product_data[0]['promain_image'];?>" data-zoom-image="<?php echo base_url('assets/images/products/').'/'.$product_data[0]['promain_image'];?>" alt="">
                                </div>
                            </div>


                            <div class="product-thumb product-horizontal-thumb">
                                <div id="gallery" class="product-thumb-style1">
                                    <a data-image="<?php echo base_url('assets/images/products/').'/'.$product_data[0]['promain_image'];?>" data-zoom-image="<?php echo base_url('assets/images/products/').'/'.$product_data[0]['promain_image'];?>" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                       <img class="blur-up lazyload" data-src="<?php echo base_url('assets/images/products/').'/'.$product_data[0]['promain_image'];?>" src="<?php echo base_url('assets/images/products/').'/'.$product_data[0]['promain_image'];?>" alt="">
                                   </a>

                                   <?php foreach ($product_images as $images) {?>

                                      <a data-image="<?php echo base_url('assets/images/products/').'/'.$images['pro_image_name'];?>" data-zoom-image="<?php echo base_url('assets/images/products/').'/'.$images['pro_image_name'];?>" class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1">
                                       <img class="blur-up lazyload" data-src="<?php echo base_url('assets/images/products/').'/'.$images['pro_image_name'];?>" src="<?php echo base_url('assets/images/products/').'/'.$images['pro_image_name'];?>" alt="">                                         
                                   </a>
                               <?php } ?>                                          
                           </div>
                       </div>

                   </div>
               </div>


               <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-single__meta">
                    <h1 class="product-single__title"><?php echo $product_data[0]['proname_en']; ?></h1>
                    <div class="prInfoRow">
                                    <!-- <div class="product-review">
                                        <a class="reviewLink" href="#tab2">
                                            <i class="font-13 fa fa-star"></i>
                                            <i class="font-13 fa fa-star"></i>
                                            <i class="font-13 fa fa-star"></i>
                                            <i class="font-13 fa fa-star"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <span class="spr-badge-caption">6 reviews</span>
                                        </a>
                                    </div> -->

                                    
                                </div>
                                <?php 
                                    $lprice = (!empty($product_data[0]['list_price']))?$product_data[0]['list_price']:$product_data[0]['price'];
                                    $price  = (!empty($product_data[0]['variant_price']))?$product_data[0]['variant_price']:$product_data[0]['discount_price'];
                                    $usdlprice = (!empty($product_data[0]['usd_list_price']))?$product_data[0]['usd_list_price']:$product_data[0]['usd_price'];
                                    $usdprice  = (!empty($product_data[0]['usd_variant_price']))?$product_data[0]['usd_variant_price']:$product_data[0]['usd_discount_price']; 
                                    $dprice = $lprice - $price;
                                    $discount = ($dprice * 100)/ $lprice;
                                ?>

                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    INR : 
                                    <s id="ComparePrice-product-template"><span class="money list_price">₹ <?php echo $lprice; ?></span></s>
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money price">₹ <?php echo $price; ?>/-</span></span>
                                    </span>
                                </p><br>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    USD : 
                                    <s id="ComparePrice-product-template"><span class="money">$ <?php echo $usdlprice; ?></span></s>
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">$ <?php echo $usdprice; ?></span></span>
                                    </span>

                                </p>
                                <br>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="money" style="color: #fe0000;">Discount : <?php echo $product_data[0]['discount']; ?> %</span>
                                    
                                </p>
                            </div>
                            

                            <!-- <?php if(!empty($product_data[0]['color'])){ ?>
                                <div class="swatch clearfix swatch-0 option1">
                                    <div class="product-form__item">
                                        <label class="label">Color: <span class="required"></span> <span class="slVariant"><?php echo $product_data[0]['color']; ?></span></label>
                                    </div>
                                </div>
                            <?php }  ?> -->
                            <?php if (!empty($product_data[0]['size'])) {?>
                                <div class="swatch clearfix swatch-0 option1">
                                    <div class="product-form__item">
                                        <label class="label">Size : <span class="required"></span> 
                                            <select class="form-control choosesize select2" id="size_id" name="size" required>
                                               <option value="">Select Size</option>
                                                    <?php foreach ($size as $value) { ?>
                                                            <option <?php echo ($product_data[0]['size']==$value['size'])?'selected':''; ?> value="<?php echo $value['size'];?>"><?php echo $value['size'];?></option>
                                                    <?php } ?>
                                            </select>
                                        </label>
                                         <input type="hidden" id="product_id" name="product_id" value="<?php echo $product_data[0]['product_id'];?>">
                                    </div>
                                </div>
                                <div class="swatch clearfix swatch-0 option1">
                                    <div class="product-form__item">
                                        <label class="label">Color : <span class="required"></span> 
                                            <select class="form-control choosecolor select2" name="color" required>
                                               <option value="">Select Color</option>
                                                    <?php foreach ($color as $value) { ?>
                                                            <option <?php echo ($product_data[0]['color']==$value['color'])?'selected':''; ?> value="<?php echo $value['color'];?>"><?php echo $value['color'];?></option>
                                                    <?php } ?>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            <?php }?>

                            <p class="infolinks">
                                <a href="#ShippingInfo" class="mfp btn shippingInfo"><i class="anm anm-paper-l-plane"></i> Delivery &amp; Returns</a>
                            </p>
                            
  
                                          <p class="infolinks" style="cursor: pointer;">
                                            <a class="wishlist add-to-wishlist"  onclick="addtoWishlist('<?php echo $product_data[0]['product_id'];  ?>')" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>

                                        </p>                          
                            
                            
                            <form method="post" action="" class="product-form product-form-product-template hidedropdown">
                                <!-- Product Action -->
                                    <div class="product-action clearfix">
                                        <div class="product-form__item--quantity">
                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                    <input type="text" id="qty" name="quantity" value="1" class="product-form__input qty" readonly>
                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>                                
                                        <div class="product-form__item--submit buttonblock">
                                            <button type="button" name="add" onclick="addtocart('<?php echo $product_data[0]['product_id']; ?>','<?php echo $product_data[0]['variant_id']; ?>','<?php echo $product_data[0]['size']; ?>','<?php echo $product_data[0]['color']; ?>')" class="btn product-form__cart-submit">
                                                <span>Add to cart</span>
                                            </button>
                                        </div>

                                    </div>
                                
                                <!-- End Product Action -->
                            </form>

                            <div class="product-single__description rte">
                                <?php echo $product_data[0]['description_en']; ?>
                            </div>

                            <div class="trustseal-img"><img src="<?php echo base_url();?>assets/website_assets/ images/checkout-cards.png" alt=""></div>

                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            

            
            <!--Related Product Slider-->
            <div class="related-product grid-products">
                <div class="section-header">
                    <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                </div>
                <div class="productPageSlider">

                    <?php

                    $this->db->select('*');
                    $this->db->from('product');  
                    $this->db->where('catid',$product_data[0]['catid']);
                        // $this->db->where('total_qty' != '0');
                    $query = $this->db->get();        
                    $catpro_list =  $query->result_array();
                        // print_r($catpro_list);die();
                    foreach($catpro_list as $pro){
                     ?>




                     <div class="col-12 item">
                        <!-- start product image -->
                        <div class="product-image">
                            <!-- start product image -->
                            <a href="<?php echo base_url();?>landing/productdetails/<?php echo $pro['product_id'];  ?>" class="product-img">
                                <!-- image -->
                                <img  style="height: 200px;" class="primary blur-up lazyload" data-src="<?php echo base_url('assets/images/products/').'/'.$pro['promain_image'];?>" src="<?php echo base_url('assets/images/products/').'/'.$pro['promain_image'];?>" alt="image">
                                <!-- End image -->
                            </a>
                            <!-- end product image -->

                            <!--Product Button-->
                                <div class="button-set style1">
                                    <ul>
                                        <li>
                                            <!--Cart Button-->
                                            <form class="add" action="cart-variant1.html" method="post">
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
                                <a href="<?php echo base_url();?>landing/productdetails/<?php echo $pro['product_id'];  ?>"><?php echo $pro['proname_en']; ?></a>
                            </div>
                            <!-- End product name -->

                            <!-- product price -->
                            <div class="product-price">
                                <span class="price"> &#8360; <?php echo $pro['discount_price']; ?></span> 
                                <span class="price"> &#36; <?php echo $pro['usd_discount_price']; ?></span>
                            </div>
                            <!-- End product price -->
                        </div>
                        <!-- End product details -->
                    </div>

                <?php }?>
            </div>
        </div>
        <!--End Related Product Slider-->




        <!--Image Banner-->
        <div class="section imgBanners style2 no-pb-section">
            <div class="section-header">
                <h2> All Categories  </h2>

            </div>
            <div class="collection-banners">
                <div class="row">

                 <?php foreach ($categories as $row) {?>
                    <div class="col-md-2">        
                        <div class="insta" style="text-align: center;">    
                            <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/0/<?php echo $row['category_id'];  ?>"> <img style="height: 170px;width: fit-content;" class="primary blur-up lazyload"  data-src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" alt="" title=""> </a>        
                            <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/0/<?php echo $row['category_id'];  ?>"> <?php echo $row['name_en'];?></a> 
                        </div>                   
                    </div>   
                <?php }?>
                

            </div>
        </div>

    </div>
    <!--End Image Banner-->


</div><!--End Body Container-->
</div><!--End Page Wrapper-->







<style>
    span.badge.badge-danger h2 {
        padding: 8px 16px 0px;
        color: #fff;
        line-height: 10px;
        font-size: 15px;
        text-transform: capitalize;
    }  
    .badge-danger {
        color: #fff;
        background-color: var(--success);
    }

    .product-form__item--submit {
        width: 50%;
        overflow: hidden;
        padding-left: 15px;
    }

    span.slVariant {
        border: 1px solid #9da2a7;
        padding: 2px 15px;
        border-radius: 4px;
    }

</style>


<script>
    $(function(){
        var $pswp = $('.pswp')[0],
        image = [],
        getItems = function() {
            var items = [];
            $('.lightboximages a').each(function() {
                var $href   = $(this).attr('href'),
                $size   = $(this).data('size').split('x'),
                item = {
                    src : $href,
                    w: $size[0],
                    h: $size[1]
                }
                items.push(item);
            });
            return items;
        }
        var items = getItems();
        
        $.each(items, function(index, value) {
            image[index]     = new Image();
            image[index].src = value['src'];
        });
        $('.prlightbox').on('click', function (event) {
            event.preventDefault();

            var $index = $(".active-thumb").parent().attr('data-slick-index');
            $index++;
            $index = $index-1;

            var options = {
                index: $index,
                bgOpacity: 0.9,
                showHideOpacity: true
            }
            var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
            lightBox.init();
        });
    });
</script>








