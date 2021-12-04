<?php  
$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$email = $orders[0]['email'];
$mobile = $orders[0]['user_phone'];
$firstName = $orders[0]['username'];
$lastName =  '';
$totalCost = $orders[0]['total_price'];
$udf1 = $orders[0]['order_id'];
// print_r($order_id);die();
$hash         = '';
$hash_string = MERCHANT_KEY."|".$txnid."|".$totalCost."|"."productinfo|".$firstName."|".$email."|".$udf1."||||||||||".SALT;
$hash = strtolower(hash('sha512', $hash_string));
$action = PAYU_BASE_URL . '/_payment'; 
 
?>
   <div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="breadcrumbs"><a href="index.html" title="Back to the home page">Checkout</a> <span aria-hidden="true">|</span> <span>Payment</span></div>
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
               <div id="link"></div>
        <!--End Breadcrumbs-->
        <!--Page Title with Image-->
        <div class="page-title"><h1>payment </h1></div>
        <!--End Page Title with Image-->
        <div class="container">
            
            <div class="row ">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        <!-- <form id="addressForm" class="form-horizontal" method="POST" action=""> -->
                            <fieldset>
                                <!-- <h2 class="login-title mb-3">Payment</h2> -->
                                <div class="row ">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 sm-margin-30px-bottom">
                                        <div class="create-ac-content bg-light-gray padding-20px-all">
                                            <fieldset>
                                                <h2 class="login-title mb-3">Billing Address</h2>
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6 col-xl-6 ">
                                                        <h3> <?php echo $orders[0]['username'];?></h3>

                                                        <p>Mobile : <?php echo $orders[0]['user_phone'];?><br>   
                                                        Pincode : <?php echo $orders[0]['pincode'];?> <br>                                       
                                                        Address : <?php echo $orders[0]['building'];?> - <?php echo $orders[0]['street_address'];?> , <?php echo $orders[0]['city'];?> (<?php echo $orders[0]['state'];?>)</p>
                                                    </div>
                                                </div>         
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

  
                            </fieldset>


 
                        <!-- </form> -->
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        <!-- <form id="addressForm" class="form-horizontal" method="POST" action=""> -->
                            <fieldset>
                                <h2 class="login-title mb-3">Order Summary</h2>
                                <div class="row">
                                    <div class="form-group col-md-8 col-lg-8 col-xl-8 required">
                                        <label for="input-firstname">Sub Total  </label>
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4 col-xl-4 required">
                                        <label for="input-email">₹ <?php echo $orders[0]['sub_price'];?> [ $<?php echo $orders[0]['usd_sub_price'] ?> ]</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 col-lg-8 col-xl-8 required">
                                        <label for="input-firstname">Coupon Discount </label>
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4 col-xl-4 required">
                                        <label style="color: green;" for="input-email">(-) ₹ <?php echo $orders[0]['coupon_discount'];?> [ $<?php echo $orders[0]['usd_cpn_amt'] ?> ]</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 col-lg-8 col-xl-8 required">
                                        <label for="input-firstname">Shipping Charge  </label>
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4 col-xl-4 required">
                                        <label for="input-email" style="color: red;">(+) ₹ <?php echo $orders[0]['delivery_charge'];?> [ $<?php echo $orders[0]['usd_delivery_charge'] ?> ]</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 col-lg-8 col-xl-8 required">
                                        <label for="input-firstname">Total  </label>
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4 col-xl-4 required">
                                        <label for="input-email" id="gtotal">₹ <?php echo $orders[0]['total_price'];?> [ $<?php echo $orders[0]['usd_total_price'] ?> ]</label>
                                        <input type="hidden" id="order_total" value="<?php echo $orders[0]['total_price'];?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <!-- <div class="order-button-payment"> -->
                                        <form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm">
                                            <input type="hidden" name="key" value="<?php echo MERCHANT_KEY ?>" />
                                            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                                            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                                            <input type="hidden" name="amount" id="amnt" value="<?php echo $totalCost; ?>" />
                                            <!-- <input type="hidden" name="coupon_discount" id="cpn_discnt" value="0" /> -->
                                            <input type="hidden" name="firstname" id="firstname" value="<?php echo $firstName; ?>" />
                                            <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
                                            <input type="hidden" name="udf1" id="udf1" value="<?php echo $udf1; ?>" />
                                            <input type="hidden" name="phone" value="<?php echo $mobile; ?>" />
                                            <input type="hidden" name="productinfo" value="<?php echo "productinfo"; ?>" />
                                            <input type="hidden" name="surl" value="<?php echo base_url(); ?><?php echo SUCCESS_URL; ?>" />
                                            <input type="hidden" name="furl" value="<?php echo base_url(); ?><?php echo  FAIL_URL?>"/>
                                            <input type="hidden" name="service_provider" value="payu_paisa"/>
                                            <input type="hidden" name="lastname" id="lastname" value="<?php echo $lastName ?>" />
                                            <!-- <button type="submit"> submit</button> -->
                                            <button type="submit" class="btn btn-secondary mb-2 btn-lg" > Pay Now </button>
                                        </form>
                                        <!-- </div> -->
                                    </div>
                                     
                                </div>
                                <hr>

                                <h2 class="login-title mb-3">Order Details</h2>
                                <?php foreach ($pro_data as $pro) { ?>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                            <a class="product-image" href="">
                                                <img style="height: 150px;width: 150px;" src="<?php echo base_url();?>assets/images/products/<?php echo $pro['promain_image'];?>" alt="" title="">
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                            <label for="input-email" style="text-transform: uppercase;" ><?php echo $pro['proname_en'];?></label><br>

                                            <label for="input-email" style="text-transform: uppercase;" >₹ <?php echo $pro['discount_price'];?></label>
                                        </div>
                                    </div>
                                 <?php } ?>
  
                            </fieldset>

                    </div>
                </div>
            </div>
            <!--End Main Content-->        
        </div><!--End Body Container-->
        
    </div><!--End Page Wrapper-->



   <!--  <script type="text/javascript">
        
    function check_coupon(){
        var coupon = $("#coupon_val").val();
        var url="landing/check_coupon"
        data={coupon:coupon};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){
            $(".coupon_error_message").hide();
            $(".coupon_message").hide();
            var  obj = $.parseJSON(suc);
            if(Object.keys(obj['coupon_amount']) <=0){
                $(".coupon_error_message").show();
                $('.coupon_error_message').html(obj['coupon_msg']); 

            }else{
                $(".coupon_message").show();
                $('.coupon_message').html("Available");
                $('#remove_btn').show();

                var order_total = $('#order_total').val();
                var cpn_discnt = obj['coupon_amount'];
                // alert(order_total);
                var total  = (order_total - obj['coupon_amount']);
                $('#gtotal').html('₹'+total);
                $('#coupon_amount').html('₹'+obj['coupon_amount']);
                $('#cart_total').val(total);
                // $('#amnt').val(total);
                $('#cpn_discnt').val(cpn_discnt);
            }


        });
    }

    function remove_code(){
        var order_total = $('#order_total').val();
        // var total  = parseInt(cart_total) + parseInt(cpnAmt);
        $('#gtotal').html('₹ '+order_total);
        $('#coupon_field').hide();
        $(".coupon_message").hide();
        $(".coupon_error_message").hide();
        $('#coupon_val').val('');
        $('#remove_btn').hide();
        $('#coupon_amount').html('₹ 0');
        $('#amnt').val(order_total);
        $('#cpn_discnt').val(0);
    }

    </script> -->

