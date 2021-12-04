<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title> Aauthenticty </title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/website_assets/images/favicon.png">
<!-- Plugins CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/website_assets/css/plugins.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/website_assets/css/style-1.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/website_assets/js/sweetalert.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/website_assets/js/site-294181adec18ed639e160b96b45d17ac.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/website_assets/css/responsive-1.css">
</head>
<body class="template-index index-jewelry-store">
<div id="pre-loader">
    <img src="<?php echo base_url();?>assets/website_assets/images/loader.png" alt="Aauthenticty">
</div>
<div class="page-wrapper">
    <!--Header-->
    <!--Promotion Bar-->
  <div class="notification-bar mobilehide">
      <a href="#" class="notification-bar__message"> Exceptional Quality &amp;  Unparalleled Taste   </a>
        <span class="close-announcement"><i class="anm anm-times-l" aria-hidden="true"></i></span>
    </div>
    <!--End Promotion Bar-->
    <header class="header animated header-6">
        <div class="d-flex align-items-center">
            <div class="container">        
                <div class="row">
                    <!--Mobile Icons-->
                    <div class="col-4 col-sm-4 col-md-4 d-block d-lg-none mobile-icons">
                        <!--Mobile Toggle-->
                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                            <i class="icon anm anm-times-l"></i>
                            <i class="anm anm-bars-r"></i>
                        </button>
                        <!--End Mobile Toggle-->
                        <!--Search-->
                        <div class="site-search iconset">
                            <i class="icon anm anm-search-l"></i>
                        </div>
                        <!--End Search-->
                    </div>
                    <!--Mobile Icons-->
                    
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 align-self-center d-none d-lg-block">
                                              Follow Us:
                        <ul class="header-social-icons">
                            <li><a href="https://www.facebook.com/Aauthenticity-105906601575888" target="_blank"><i class="icon icon-facebook"></i></a></li>
                            <li><a href="https://twitter.com/Authent58234234" target="_blank"><i class="icon icon-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/aauthenticityonline/" target="_blank"><i class="icon icon-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!--Desktop Logo-->
                    <div class="logo col-4 col-sm-4 col-md-4 col-lg-3 align-self-center">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>assets/website_assets/images/jewellery-logo.png" alt=" " title=" ">
                        </a>
                    </div>
                    <!--End Desktop Logo-->
                    <div class="col-4 col-sm-4 col-md-4 col-lg-5 align-self-center icons-col text-right">
                        <!--Search-->
                        <div class="site-search iconset">
                            <i class="icon anm anm-search-l"></i>
                        </div>
                        <div class="search-drawer">
                            <div class="container">
                                <span class="closeSearch anm anm-times-l"></span>
                                <h3 class="title">What are you looking for?</h3>
                                <div class="block block-search">
                                    <div class="block block-content">
                                        <form class="form minisearch" id="header-search" action="#" method="get">
                                            <label for="search" class="label"><span>Search</span></label>
                                            <div class="control">
                                                <div class="searchField">
                                                    <div class="input-box">
                                                        <input type="text" id="product_name" name="product_search" placeholder="Search for products, brands..." class="input-text" autocomplete="off">
                                                        <button type="submit" title="Search" class="action search" disabled=""><i class="icon anm anm-search-l"></i></button>
                                                    </div>
                                                </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>  

                                <div id="suggesstion-box" class="row">
                                </div>     
                                 
                            </div>
                        </div>
                        <!--End Search-->
                        <!--Setting Dropdown-->
                       
                     <?php          
                     $userdata1 = $this->session->userdata("logged_in");
                     if(empty($userdata1['user_id'])) { ?>

                        <div class="setting-link iconset">
                            <i class="icon anm anm-user-al"></i> 
                           
                        </div>
                        <div id="settingsBox">
                            <div class="customer-links">
                                <p><a href="<?php echo base_url();?>landing/login" class="btn">Login</a></p>
                                <p class="text-center">New User? <a href="<?php echo base_url();?>landing/register" class="register">Create an Account</a></p>
                                <p class="text-center"> Create or Login Account!</p>
                            </div>
 
                        </div>
                    <?php }else{?>
                            <div class="setting-link iconset">
                            ( <?php echo $userdata1['username'];?> ) 
                           
                        </div>
                        <div id="settingsBox">
                            <div class="customer-links">
                                <p><a href="<?php echo base_url();?>landing/my_account" >My Account</a></p>

                            <p><a href="<?php echo base_url();?>landing/orders" >My Order </a></p>              
                            
                            <p><a href="<?php echo base_url();?>landing/wishlist" > Wishlist </a></p>   
                                
                                 <p><a href="<?php echo base_url();?>landing/logout" >Log Out</a></p>
                            </div>
 
                        </div>

                    <?php } ?>
                        <!--End Setting Dropdown-->
                        <!--Wishlist-->
                        <div class="wishlist-link iconset">
                           <a href="<?php echo base_url();?>landing/wishlist"> <i class="icon anm anm-heart-l"></i>
                            <span class="wishlist-count wishValue">0</span> </a>
                        </div>
                        <!--End Wishlist-->
                        <!--Minicart Dropdown-->
                        <div class="header-cart iconset">
                            <a href="#" class="site-header__cart btn-minicart" data-toggle="modal" data-target="#minicart-drawer">
                                <i class="icon anm anm-basket-l"></i>
                                <span class="site-cart-count cardValue">0</span>
                            </a>
                        </div>
                        <!--End Minicart Dropdown-->
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-outer">
            <div class="container">
            <div class="row">
                <div class="col-1 col-sm-12 col-md-12 col-lg-12 align-self-center d-menu-col">
                    <!--Desktop Menu-->
                    <nav class="grid__item" id="AccessibleNav">
                        <ul id="siteNav" class="site-nav medium center hidearrow">
                            <li class="lvl1 parent megamenu"><a href="<?php echo base_url();?>">Home <i class="anm anm-angle-down-l"></i></a>
                            </li>
              
                            <?php
                                // $check = 0;            
                                $this->db->select('*');
                                $this->db->from('maincategory');  
                                $this->db->where('maincatstatus','1');
                                $this->db->order_by('updated',"desc");
                                $this->db->limit('5');
                                $query = $this->db->get();        
                                $maincat_list =  $query->result_array();
                                foreach($maincat_list as $row){
                                    $this->db->select('*');
                                    $this->db->from('category');  
                                    $this->db->where('status','1'); 
                                    $this->db->where('maincategory_id',$row['maincategory_id']);
                                    $this->db->order_by('updated',"desc");                     
                                    $this->db->limit('4');
                                    $query_cat = $this->db->get();  
                                    $cat_list =  $query_cat->result_array();
                                    ?>                
                  
                                    <li class="lvl1 parent megamenu"><a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/<?php echo $row['maincategory_id'];  ?>"> <?php echo $row['maincategory_name_en'] ?> <i class="anm anm-angle-down-l"></i></a>
                                        <div class="megamenu style4">
                                            <ul class="grid grid--uniform mmWrapper">
                                                <?php $check = 0;
                                                  foreach($cat_list as $rowcat){ ?>
                                                    <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/<?php echo $row['maincategory_id'];  ?>/<?php echo $rowcat['category_id']; ?>" class="site-nav lvl-1 menu-title"><?php echo $rowcat['name_en']; ?> </a>
                                                        <?php  $check =0;
                                                            $this->db->select('*');
                                                            $this->db->from('subcategory');   
                                                            $this->db->where('category_id',$rowcat['category_id']); 
                                                            $this->db->where('subcatstatus','1'); 
                                                            $this->db->order_by('updated',"desc");                     
                                                            $this->db->limit('10');
                                                            $query_sub = $this->db->get();  
                                                            $sub_list =  $query_sub->result_array(); ?>                                                            
                                                        <?php
                                                            if ($check == 0) {
                                                            $this->db->select('*');
                                                            $this->db->from('copied_subcategory');   
                                                            $this->db->where('maincatid',$row['maincategory_id']); 
                                                            $this->db->where('catid',$rowcat['category_id']); 
                                                            $this->db->join("subcategory", "subcategory.subcategory_id=copied_subcategory.subcategory_id");
                                                            $query_sb = $this->db->get();  
                                                            $copied =  $query_sb->result_array();
                                                            foreach($copied as $rowsb){ ?><ul class="subLinks">
                                                                <li class="lvl-2"><a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/<?php echo $row['maincategory_id'];  ?>/<?php echo $rowcat['category_id']; ?>/<?php echo $rowsb['subcategory_id'] ?>" class="site-nav lvl-2"><?php echo $rowsb['subcategory_name_en'] ?> </a></li>
                                                            </ul>
                                                        <?php } //foreach
                                                    $check =1;
                                                    }// if
                                                ?>
                                                    </li>
                                                <?php } ?>
                                           </ul>
                                        </div>
                                    </li>
              
                                <?php } ?>
                        </ul>
                    </nav>
                    <!--End Desktop Menu-->
                </div>
            </div>
        </div>
        </div>
    </header>
    <!--End Header-->
    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
        <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
            <li class="lvl1 parent"><a href="<?php echo base_url();?>">Home <i class="anm anm-plus-l"></i></a>
            </li>

            <?php
                      
                $this->db->select('*');
                $this->db->from('maincategory');  
                $this->db->where('maincatstatus','1');
                $this->db->order_by('updated',"desc");  
                $this->db->limit('5');
                $query = $this->db->get();        
                $maincat_list =  $query->result_array();
                foreach($maincat_list as $row){
                    // print_r($row);die;
                    $this->db->select('*');
                    $this->db->from('category');  
                    $this->db->where('status','1'); 
                    $this->db->where('maincategory_id',$row['maincategory_id']);  
                    $this->db->order_by('updated',"desc");                     
                    $this->db->limit('5');
                    $query_cat = $this->db->get();  
                    $cat_list =  $query_cat->result_array();
                    ?>
    
                    <li class="lvl1 parent megamenu"><a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/<?php echo $row['maincategory_id'];  ?>"><?php echo $row['maincategory_name_en'] ?> <i class="anm anm-plus-l"></i></a>
                        <ul>
                            <?php  foreach($cat_list as $rowcat){ ?>
                                <li><a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/<?php echo $row['maincategory_id'];  ?>/<?php echo $rowcat['category_id']; ?>" class="site-nav"><?php echo $rowcat['name_en']; ?><i class="anm anm-plus-l"></i></a>
                                  <ul>
                                    <?php  
                                        $this->db->select('*');
                                        $this->db->from('subcategory');   
                                        $this->db->where('category_id',$rowcat['category_id']); 
                                        $this->db->where('subcatstatus','1'); 
                                        $this->db->order_by('updated',"desc");                     
                                        $this->db->limit('10');
                                        $query_sub = $this->db->get();  
                                        $sub_list =  $query_sub->result_array();
                                        foreach($sub_list as $rowsub){ ?>
                                            <li><a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/<?php echo $row['maincategory_id'];  ?>/<?php echo $rowcat['category_id']; ?>/<?php echo $rowsub['subcategory_id'] ?>" class="site-nav"><?php echo $rowsub['subcategory_name_en'] ?></a></li>
                                        <?php } ?>    
                                  </ul>
                                </li>
                            <?php } ?> 
                        </ul>
                    </li>
                <?php } ?> 
        </ul>
    </div>
  <!--End Mobile Menu-->



      
      <script src="<?php echo base_url();?>assets/website_assets/js/js3.js"></script>
      <script src="<?php echo base_url();?>assets/website_assets/js/js11.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#product_name").keyup(function(){
            // alert('hi');
            if($(this).val()!=''){
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('landing/autocompletesearch'); ?>",
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                        $("#product_name").css("background","#FFF url(assets/frontend/images/loaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data){
         
                        $("#suggesstion-box ").html('');
                        $("#suggesstion-box").show();
                        $.each(data, function(i, data){
                            var search = data.search.replace(/[^a-z0-9\s]/gi, '').replace(/[\W_]/g, '-');
                            var imageUr = base_url+'assets/images/products/'+ data.pro_image;
                            var details = base_url+'landing/productdetails/'+ data.pro_id;
                            // alert(base_url);
                            $('#suggesstion-box ').append(
                                '<div class="col-6 col-sm-4 col-md-3 col-lg-2 item appendData">'+
                               ' <div class="product-image">'+
                                    '<a href="'+details+'" class="product-img">'+
                                        '<img class="primary blur-up lazyload" data-src="'+imageUr+'" src="'+imageUr+'" alt="" title="">'+
                                    '</a>'+
                                    '<div class="button-set style1">'+
                                        '<ul>'+
                                            '<li>'+
                                                '<form class="add" action="cart-variant1.html" method="post">'+
                                                    '<button class="btn-icon btn btn-addto-cart" onclick="addtoCart('+data.pro_id+')" type="button" tabindex="0">'+
                                                        '<i class="icon anm anm-cart-l"></i>'+
                                                        '<span class="tooltip-label">Add to Cart</span>'+
                                                    '</button>'+
                                                '</form>'+
                                            '</li>'+

                                            '<li>'+
                                                '<div class="wishlist-btn">'+
                                                    '<a class="btn-icon wishlist add-to-wishlist" href="my-wishlist.html">'+
                                                        '<i class="icon anm anm-heart-l"></i>'+
                                                        '<span class="tooltip-label">Add To Wishlist</span>'+
                                                    '</a>'+
                                                '</div>'+
                                            '</li>'+

                                        '</ul>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="product-details text-center">'+
                                    '<div class="product-name">'+
                                       '<a href="'+details+'" >'+data.search+' </a>'+
                                    '</div>'+
                                    '<div class="product-price">'+
                                            '<span class="price"> &#8360;'+data.dis_price+'</span> '+
                                            '<span class="price"> &#36; '+data.dis_usdprice+'</span>'+
                                        '</div>'+
                                '</div>'+
                            '</div>'
                            );
                        });
                        $("#product_name").css("background","#FFF");
                    }
                }); 
            }
            else
            {
                
             $("#suggesstion-box").hide();   
            }
        });
    });

function selectcity(val,pro_id) {
  //alert('hi');
var val = val.replace(/[^a-z0-9\s]/gi,' ').replace(/[\W_]/g,' ');
//$("#hotel_name").val(val);
$("#suggesstion-box").hide();

location.href = "<?php echo(site_url('landing/search')); ?>/"+pro_id;

}
</script>


<style>

.frmSearch {border: 1px solid #a8d4b1;
background-color: #c6f7d0;
margin: 2px 0px;
padding: 40px;
border-radius:4px;
}
#product-list{
margin-left: -431px;
float:left;
list-style:none;
margin-top:34px;
padding:0;
width:489px;
position: absolute;
z-index: 777;
}
#product-list li{
padding: 5px 7px; 
background: #f0f0f0; 
border-bottom: #bbb9b9 1px solid;
text-transform: capitalize;
}
#product-list li:hover{
background:#ece3d2;
cursor: pointer;
}
#search-box{
padding: 10px;
border: #a8d4b1 1px solid;
border-radius:4px;
}
#product_name{
text-transform: capitalize;
}

div#suggesstion-box {
    float: left;
    padding-left: 20px;
    max-height: calc(100% - 115px);
    overflow-y: auto;
    margin-top: 15px;
}

.item.appendData {
    padding: 0px 5px;
} 

</style>