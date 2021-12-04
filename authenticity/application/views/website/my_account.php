
  
 <div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
    	<div class="container">
        	<div class="breadcrumbs"><a href="index.html" title="Back to the home page">My Account</a> <span aria-hidden="true">|</span> <span>Welcome Back, <?php $userdata = $this->session->userdata("logged_in");
            echo $userdata['username'];?>   </span></div>
        </div>
    </div>
    <!--End Breadcrumbs-->
    <div class="container">
               
        <div class="section imgBanners style3 no-pb-section">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 img-banner-item">
                    <div class="imgBanner-grid-item" id="myac">
                        <div class="inner">
                            <a href="<?php echo base_url();?>landing/my_profile">
                             <div class="details">
                                <h3 class="title"> My Account </h3>
                                Profile / Login / Security
                            </div>
                             </a>
                        </div>
                    </div>
                </div>
 
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 img-banner-item">
                    <div class="imgBanner-grid-item"  id="myac">
                        <div class="inner">
                            <a href="<?php echo base_url();?>landing/orders">
                             <div class="details">
                                <h3 class="title"> Orders  </h3>
                                  Return / Cancel / Track
	
                            </div>
                             </a>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 img-banner-item">
                    <div class="imgBanner-grid-item" id="myac">
                        <div class="inner">
                            <a href="<?php echo base_url();?>landing/track_your_order">
                             <div class="details">
                                <h3 class="title"> Track Order </h3>
                                 	View Shipment Location
	
                            </div>
                             </a>
                        </div>
                    </div>
                </div>                

                <div class="col-12 col-sm-12 col-md-6 col-lg-4 img-banner-item">
                    <div class="imgBanner-grid-item" id="myac">
                        <div class="inner">
                            <a href="<?php echo base_url();?>landing/addresses">
                             <div class="details">
                                <h3 class="title"> Addresses </h3>
                                  	 Manage Saved Addresses
	
                            </div>
                             </a>
                        </div>
                    </div>
                </div>  


                <div class="col-12 col-sm-12 col-md-6 col-lg-4 img-banner-item">
                    <div class="imgBanner-grid-item" id="myac">
                        <div class="inner">
                            <a href="<?php echo base_url();?>landing/wishlist">
                             <div class="details">
                                <h3 class="title"> Wishlist </h3>
                                 	Items you Love
	
                            </div>
                             </a>
                        </div>
                    </div>
                </div> 
                
                
            </div>
        </div>            
    
    </div><!--End Body Container-->
</div><!--End Page Wrapper-->
    
    
    
    
    
    
    
    
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>    
  
  
 <style>
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css);
@import url(https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css);

.hm-gradient {
    background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
}
.darken-grey-text {
    color: #2E2E2E;
}
.danger-text {
    color: #ff3547; }
.default-text {
    color: #2BBBAD; 
}
.info-text {
    color: #33b5e5; 
}
.form-white .md-form label {
  color: #fff; 
}
.form-white input[type=text]:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    -webkit-box-shadow: 0 1px 0 0 #fff;
    box-shadow: 0 1px 0 0 #fff; 
}
.form-white input[type=text]:focus:not([readonly]) + label {
    color: #fff; 
}
.form-white input[type=password]:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    -webkit-box-shadow: 0 1px 0 0 #fff;
    box-shadow: 0 1px 0 0 #fff; 
}
.form-white input[type=password]:focus:not([readonly]) + label {
    color: #fff; 
}
.form-white input[type=password], .form-white input[type=text] {
    border-bottom: 1px solid #fff; 
}
.form-white .form-control:focus {
    color: #fff;
}
.form-white .form-control {
    color: #fff;
}
.form-white textarea.md-textarea:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    box-shadow: 0 1px 0 0 #fff;
    color: #fff; 
}
.form-white textarea.md-textarea  {
    border-bottom: 1px solid #fff;
    color: #fff;
}
.form-white textarea.md-textarea:focus:not([readonly])+label {
    color: #fff;
}
.ripe-malinka-gradient {
    background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
}
.near-moon-gradient {
    background-image: linear-gradient(to bottom, #5ee7df 0%, #b490ca 100%);
}     
 </style>   
    
    
    