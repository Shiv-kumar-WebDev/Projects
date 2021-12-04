
	
    <div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
        	<div class="container">
            	<div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Register </span></div>
            </div>
        </div>
        <?php
            if($this->session->flashdata('success'))
            {   
                echo '<div class="alert alert-success"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('success').'</div>';
            }
            if($this->session->flashdata('error'))
            {   
                echo '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('error').'</div>';
            }
            if($this->session->flashdata('warning'))
            {   
                echo '<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;'.$this->session->flashdata('warning').'</div>';
            }
        ?>
        <!--End Breadcrumbs-->
        <!--Page Title with Image-->
        <div class="page-title"><h1> Register </h1></div>
        <!--End Page Title with Image-->
        <div class="container">
            <div class="row">
				<!--Main Content-->
				
				<div class="col-12 col-sm-12 col-md-3 col-lg-3 box">
				</div>
				
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 box">
                	<div class="mb-4">
                       <form onsubmit="return validate()" action="<?php echo base_url();?>landing/doregister"  class="form" method="POST">	
                          <div class="row">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="Customername"> Name  <span >*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Enter Full Name"  required="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
							
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email <span >*</span></label>
                                    <input type="email" name="email" placeholder="Enter Email Address" id="CustomerEmail" required="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
							
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="Customernumber"> Phone Number <span >*</span></label>
                                    <input type="number"  name="contact_number" id="contact_number" placeholder="Enter Contact Number" required=""> 
                                     <a href="#" id="sendOTP" name="sendOTP" class="requestOTP" style="display:none;position:absolute;right:16px;" >Request OTP</a>
                                                        <div class="requestsuccmsg" style="display: none;color: #008000;"></div>
                                                        <div class="requesterrormsg" style="display: none;color: #ff0000;"></div>                      	
                                </div>
                                <div class="getOTP" style="display:none;">
                                                        <div class="form-group">
                                                            <label class="control-label">Verify OTP</label>
                                                            <input type="text" name="otp" class="form-control otp" placeholder="Enter 4 digit OTP" required="">
                                                            <a href="#" type="button" class="btn mb-3 " name="verifyOTP" id="verifyOTP" style="position:absolute;right:16px;" >Verify OTP</a> 
                                                        </div>
                                                    </div> 
                            </div>		
							
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Create Password <span >*</span></label>
                                    <input type="password" value="" name="password" placeholder="Create Password" id="CustomerPassword" required="">                        	
                                </div>
                            </div>
                            <span id="msg" style="color: #ff0000;"></span>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="ConfirmPassword">Confirm Password <span >*</span></label>
                                    <input type="password" value="" name="confirm_password" placeholder="Confirm Password" id="ConfirmPassword" required="">                         
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                                <a type="button" class="btn mb-3 nextBtnfirst nextfirst"> Send OTP</a>
                                <a type="button" class="btn mb-3 nextBtnfirst resend" style="display: none;"> ReSend OTP</a>
                                <input type="submit" class="btn mb-3 subb" value="Register" style="display: none;">
                                   <p class="mb-4">
									<a href=""> Already Register</a> &nbsp; | &nbsp;
								    <a href="<?php echo base_url();?>landing/login" id="customer_register_link">Login</a>
                                </p>
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
				<!--End Main Content-->
			</div>
        
        </div><!--End Body Container-->
        
    </div><!--End Page Wrapper-->

    <script>
        function validate(){
            var x= document.getElementById("CustomerPassword").value;
            var y= document.getElementById("ConfirmPassword").value;
            if (x!=y) {
                document.getElementById("msg").innerHTML="** Password Does Not Match **";
                return false;
            }else{
                return true;
            }
            
        }
        
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        jQuery(document).ready(function(){
            //jQuery('.nextBtnfirst').prop('disabled', true);
            var base_url = '<?php echo base_url(); ?>'; 
            jQuery('.nextBtnfirst').click(function(event) {
                event.preventDefault();
                var mobile      = jQuery("#contact_number").val();
                // alert(mobile);
                if (mobile != '') {
                var count_mobile = mobile.toString().length;

                    if (count_mobile >= 10) {
                        jQuery.ajax({
                            url: base_url+"landing/get_contactOtp/"+mobile,
                            data: {mobile: mobile},
                            type: 'get',
                            success: function(html) {
                                
                                var jsonData    = jQuery.parseJSON(html);
                                var msg         = jsonData['msg'];
                                var status      = jsonData['status'];
        
                                if(status == 0){
                                    jQuery(".requesterrormsg").show();
                                    jQuery(".requesterrormsg").text(msg);
                                    jQuery('.requesterrormsg').delay(500).fadeOut();
                                    setTimeout(function() {
                                        jQuery(".requesterrormsg").hide('blind', {}, 500)
                                    }, 5000);
                                } else { 
                                    jQuery(".getOTP").show();
                                    jQuery("#sendOTP").hide();
                                    jQuery(".requestsuccmsg").show();
                                    jQuery(".requestsuccmsg").text(msg);
                                    jQuery('.requestsuccmsg').delay(500).fadeOut();
                                    setTimeout(function() {
                                        jQuery(".requestsuccmsg").hide('blind', {}, 500)
                                    }, 5000);
                                    jQuery(".resend").show();
                                    jQuery(".nextfirst").hide();
                                }
        
                             }
                        });
                    }else{
                        jQuery(".requesterrormsg").show();
                        jQuery(".requesterrormsg").text('Mobile number not valid.');
                        jQuery('.requesterrormsg').delay(500).fadeOut();
                        setTimeout(function() {
                            jQuery(".requesterrormsg").hide('blind', {}, 500)
                        }, 5000);
                    }
                }else{
                    jQuery(".requesterrormsg").show();
                    jQuery(".requesterrormsg").text('Please fill mobile number.');
                    jQuery('.requesterrormsg').delay(500).fadeOut();
                    setTimeout(function() {
                        jQuery(".requesterrormsg").hide('blind', {}, 500)
                    }, 5000);
                }
            });

            jQuery('#verifyOTP').click(function(event) {
                event.preventDefault();
                var otp  = jQuery(".otp").val();
                // alert(otp);
                jQuery.ajax({
                    url: base_url+"landing/verify_otp/"+otp,
                    data: {otp: otp},
                    type: 'get',
                    success: function(html) {
                        var jsonData    = jQuery.parseJSON(html);
                        var msg         = jsonData['msg'];
                        var status      = jsonData['status'];
                       // alert(status);
                        if(status == 0){
                            jQuery(".requesterrormsg").show();
                            jQuery(".requesterrormsg").text(msg);
                            jQuery('.requesterrormsg').delay(500).fadeOut();
                            setTimeout(function() {
                                jQuery(".requesterrormsg").hide('blind', {}, 500)
                            }, 5000);
                        } else { 
                            jQuery(".requestsuccmsg").show();
                            jQuery(".requestsuccmsg").text(msg);
                            jQuery('.requestsuccmsg').delay(500).fadeOut();
                            setTimeout(function() {
                                jQuery(".requestsuccmsg").hide('blind', {}, 500)
                            }, 5000);
                            
                                    jQuery("#getOTP").hide();
                                    jQuery(".subb").show();
                                    jQuery(".nextfirst").hide();
                        }

                        if(status == 0){
                            jQuery('.getOTP').show();
                        } else {
                            jQuery('.getOTP').hide();
                            jQuery(".subb").show();
                            jQuery(".resend").hide();
                            jQuery(".nextfirst").hide();
                            jQuery('.requestOTP').hide();
                            // jQuery('.nextBtnfirst').prop('disabled', false);
                        } 
                    }
                });
            });

            jQuery('.contact_number').blur(function(event) {
                event.preventDefault();
                var mobile      = jQuery("#contact_number").val();
                if(mobile !=''){
                    jQuery(".requestOTP").show();
                } else {
                    jQuery(".requestOTP").hide();
                }

            });
            
        });
    </script>
    
 