<div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
    	<div class="container">
        	<div class="breadcrumbs"><a href="" title="Back to the home page">My Addresses</a></div>
        </div>
    </div>
    <!--End Breadcrumbs-->
    <div class="container">
        <div class="row">       
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 ">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> +  Add New Billing Address </button>
                    </div>
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 ">
                <div class="section imgBanners style3 no-pb-section">
                    <div class="row">
                        <?php foreach ($address as $add) {?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 img-banner-item">
                                <div class="imgBanner-grid-item">
                                    <div class="inner">
                                        <a>
                                         <div class="details">
                                            <h3 class="title"> <?php echo $add['username']; ?> </h3>
                                                <button type="button" class="btn btn-sm btn-success button" id="remove_address" onclick="editaddress('<?php echo $add['address_id'];  ?>')">
                                                    <i class="fa fa-remove"></i>
                                                </button>
                                            <p>Mobile : <?php echo $add['user_phone']; ?><br>   
                                                Pincode : <?php echo $add['pincode']; ?> <br>                                       
                                                Address :<?php echo $add['building']; ?> - <?php echo $add['street_address']; ?> , <?php echo $add['city']; ?> (<?php echo $add['state']; ?>)</p>
                                        </div>
                                         </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div> 
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-md-8">
                                <h4 class="modal-title" style="text-align: center;"> Add Billing Address </h4> 
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="close" data-dismiss="modal" style="color: #fff;font-weight: 100;font-size: 28px;opacity: 1;">&times;</button>  
                            </div>            
                        </div>
                        <div class="modal-body">
                            <form  id="addressForm" class="form-horizontal" method="POST" action="<?php echo base_url();?>landing/savemyAddress">
                                <div class="form-group col-md-12 col-lg-12 col-xl-12  ">
                                    <label for="input-firstname">  Name <span  >*</span></label>
                                    <input type="text" name="username" id="input-firstname"  required="">
                                </div>
                                <div class="form-group col-md-12 col-lg-12 col-xl-12  ">
                                    <label for="input-email">  E-Mail <span  >*</span></label>
                                    <input type="email" name="email" id="input-email" required="">
                                </div>
                                <div class="form-group col-md-12 col-lg-12 col-xl-12  ">
                                    <label for="input-telephone">  Mobile Number <span  >*</span></label>
                                    <input type="number" name="user_phone" id="input-telephone" required="">
                                </div>
                                <div class="form-group col-md-12 col-lg-12 col-xl-12  ">
                                    <label for="input-postcode"> Address <span  >*</span></label> 
                                    <input name="building" value="" required="" id="input-postcode" placeholder="Flat / House No. / Floor / Building" type="text">
                                </div>
                                <div class="form-group col-md-12 col-lg-12 col-xl-12  ">
                                    <input name="street" value="" required="" id="input-postcode" placeholder="Colony / Street / Locality" type="text">
                                </div>  
                                <div class="form-group col-md-12 col-lg-12 col-xl-12  ">
                                    <input name="pincode" value="" required="" id="input-postcode" placeholder="Pincode" type="number">
                                </div>  
                                <div class="form-group col-md-12 col-lg-12 col-xl-12  "> 
                                    <label for="input-postcode"> City <span  >*</span></label> 
                                    <input name="city" value="" id="input-postcode" placeholder="city" required="" type="text">
                                </div>   

                                <div class="form-group col-md-12 col-lg-12 col-xl-12  ">
                                    <label for="input-postcode"> State <span  >*</span></label> 
                                    <input name="state" value="" id="input-postcode" placeholder="state" required="" type="text"> 
                                </div>    
                                <div class="text-center">
                                   <button class="btn btn-default waves-effect waves-light"> Submit</button>
                                </div>
                            </form>
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
    
    
    