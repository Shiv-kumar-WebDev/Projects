
    <div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="breadcrumbs"><a href="index.php" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span> Shop </span></div>
            </div>
        </div>
        <!--End Breadcrumbs-->
        <div class="container">
            <div class="row">
                <!--Sidebar-->
                <?php  $this->load->view('website/filter'); ?>  
                <!--End Sidebar-->
                
                
                
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                   <!--  <div class="page-title"><h1> Cake Server Set </h1></div> -->
         
                    <!--Toolbar-->
                    <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                    <!-- <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-6 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count total">Showing: </span> 
                                    <span class="filters-toolbar__product-count "> Results</span>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6 text-right">
                                    <div class="filters-toolbar__item">
                                        <label for="SortBy" class="hidden">Sort</label>
                                        <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                                            <option value="title-ascending" selected="selected">Sort by New Arrivals</option>
                                            <option> Arrivals </option>
                                            <option>Best Selling</option>
                                            <option>Alphabetically</option>
                                            <option>Price - low to high</option>
                                            <option>Price -  high to low</option>
                                        </select>
                                        <input class="collection-header__default-sort" type="hidden" value="manual">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!--End Toolbar-->
                    
                    
                    
                    <!--Product Grid-->
                    <div class="product-load-more1">
                        <div class="grid-products grid--view-items">
                            <div class="row no-gutters" id="productList">
                                <!-- helo -->
                             <!-- <div class="row no-gutters" id="productList"></div>  -->
                                
                            </div>

                 
                        </div>
                        <!--End Product Grid-->
                        <!--Load More Button-->
                        <!-- <div class="infinitpaginOuter">
                            <div class="infinitpagin">  
                                 <div style='margin-top: 48px;margin-left: 36%;' id='room_generate_pagination' class="pull-right"> pagination </div>
                            </div>
                        </div> -->
                        <!--End Load More Button-->
                    </div>
                </div>
                <!--End Main Content-->
            </div>
        
        </div><!--End Body Container-->
        <input type="hidden" name="maincatid" id="maincatid" value="<?php echo $this->uri->segment(6); ?>">
        <input type="hidden" name="catid" id="catid" value="<?php echo $this->uri->segment(7); ?>">
        <input type="hidden" name="subcatid" id="subcatid" value="<?php echo $this->uri->segment(8); ?>">
    </div><!--End Page Wrapper-->
     <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->

     <script src="<?php echo base_url();?>assets/website_assets/js/main.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/jquery.min.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/js3.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/js11.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/customFunction.js?v=2"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/search.js?v=1"></script>

 <style>
.item.appendData {
    padding: 0px 5px;
}     
 </style>


