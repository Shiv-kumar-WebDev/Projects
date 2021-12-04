<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Blog </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img\favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\css\normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\css\main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\css\bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\css\fontawesome-all.min.css">
    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\font\flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\css\animate.min.css">
    <!-- Popup CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\css\magnific-popup.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\css\meanmenu.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\blog\vendor\OwlCarousel\owl.carousel.min.css">
    <link rel="stylesheet" href="vendor\OwlCarousel\owl.theme.default.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/blog/css/style.css">
    <!-- Modernize js -->
    <script src="<?php echo base_url(); ?>assets\blog\js\modernizr-3.6.0.min.js"></script>
</head>

<body class="sticky-header">
 
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper">
        <!-- Add your site or application content here -->
        <!-- Header Area Start Here -->
        <header class="has-mobile-menu">
            <div id="rt-sticky-placeholder"></div>
            <div id="header-menu" class="header-menu menu-layout1 bg--light pr--30 pl--30">
                <div class="container-fluid">
                    <div class="row no-gutters d-flex align-items-center">
                        <div class="col-lg-2 d-flex justify-content-start">
                            <div class="logo-area">
                                <a href="<?php base_url();?>" class="temp-logo" id="temp-logo">
                                    <img src="<?php echo base_url(); ?>assets\blog\img\logo-dark.png" alt="logo" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 d-flex justify-content-center">
                            <nav id="dropdown" class="template-main-menu">
                                <ul>
                                    <li class="hide-on-mobile-menu"> <a href="#">HOME</a></li>				<?php //foreach($categories as $category){
                                        // print_r($category);die();
                                        ?>				
                                    <li>
                                    <?php
                                        // $check = 0;            
                                        $this->db->select('*');
                                        $this->db->from('category');  
                                        $this->db->where('status','1');
                                        // $this->db->order_by('updated',"desc");
                                        $this->db->limit('5');
                                        $query = $this->db->get();        
                                        $maincat_list =  $query->result_array();
                                        foreach($maincat_list as $row){
                                            $this->db->select('*');
                                            $this->db->from('subcategory');  
                                            $this->db->where('status','1'); 
                                            $this->db->where('category_id',$row['category_id']);
                                            // $this->db->order_by('updated',"desc");                     
                                            $this->db->limit('4');
                                            $query_cat = $this->db->get();  
                                            $cat_list =  $query_cat->result_array();
                                    ?>
                                    
                                        <a href="#"><?php echo $row['category_name']?></a>
                                        
                                        <ul class="dropdown-menu-col-1">
                                        <?php $check = 0;
                                            foreach($cat_list as $rowcat){ ?>
                                            <li>
                                                <a href="blog.html"> <?php echo $rowcat['name']?> </a>
                                            </li>
                                            
                                            <!-- <li>
                                                <a href="blog.html"> Blog </a>
                                            </li>
                                            <li>
                                                <a href="blog.html">Blog </a>
                                            </li> -->
                                            <?php } ?>
                                        </ul>
                                       
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="contact.html">CONTACT</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-end">
                            <div class="header-action-items">
                                <ul class="divider-style-border d-none d-xl-block">
                                    <li class="header-search-box">
                                        <a href="#header-search" title="Search">
                                            <i class="flaticon-magnifying-glass"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="item-social-layout2"> <a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="item-social-layout2"> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="item-social-layout2"> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li class="item-social-layout2"> <a href="#"><i class="fas fa-rss"></i></a></li>
                                    <li class="item-social-layout2"> <a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->