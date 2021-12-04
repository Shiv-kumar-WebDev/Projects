<?php 
    $this->db->select("*");
    $this->db->from("site_settings");
    $this->db->where("name",'usd_price');
    $query = $this->db->get();
    $data = $query->result_array();
    $usd_price =$data[0]['value']; 
?>
<?php 
    $this->db->select("*");
    $this->db->from("site_settings");
    $this->db->where("name",'minimum_price');
    $query = $this->db->get();
    $data = $query->result_array();
    $min_shippingprice =$data[0]['value']; 
?>
    <div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Checkout</span></div>
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
        <div class="page-title"><h1>Checkout </h1></div>
        <!--End Page Title with Image-->
        <div class="container">
            
            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    
                    
                    
                    
                    <div class="bg-light-gray padding-20px-all" >
                        <!-- <form id="orderForm" name="orderForm" action="" method="post"> -->

                  <?php          
                     $userdata1 = $this->session->userdata("logged_in");
                     if(empty($userdata1['user_id'])) { ?>
                        <h4> Registered users will get reward points on every order placed. </h4>
                        <form action="<?php echo base_url();?>landing/check_compare"  class="form" method="POST">
                            <div class="row">
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="exampleInputEmail1">Email address <span  >*</span></label>
                                    <input type="email" name="email" placeholder="Enter Your Email Address" id="CustomerEmail" required="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="exampleInputPassword1">Password <span  >*</span></label>
                                    <input type="password" value="" name="password" placeholder="Enter Your Password" id="CustomerPassword" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                                    <input type="submit" class="btn mb-3" value="login">
                                 
                                    <p class="mb-4">
                                        <a href="<?php echo base_url();?>landing/forgot">Forgot your password?</a> &nbsp; | &nbsp;
                                        <a href="<?php echo base_url();?>landing/register" id="customer_register_link">Create account</a>
                                    </p>
                                </div>
                             </div>
                        </form>

                        <h2>OR Checkout as a guest</h2>
                        <form action="<?php echo base_url();?>landing/guest_login"  class="form" method="POST">
                            <div class="row">
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="exampleInputEmail1">User Name <span  >*</span></label>
                                    <input type="text" name="name" placeholder="Enter Your Name" id="name" required="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="exampleInputEmail1">Email address <span  >*</span></label>
                                    <input type="email" name="email" placeholder="Enter Your Email Address" id="CustomerEmail" required="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="exampleInputPassword1">Mobile  <span  >*</span></label>
                                    <input type="number" value="" name="contact_number" placeholder="Enter Your Mobile number" id="contact_number" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </div>
                            </div>
                        </form>  

                        <?php }else{ ?>
                            <fieldset>
                                <div class="your-order">
                                    <?php 
                                        $this->db->select("*");
                                        $this->db->from("country");
                                        $query = $this->db->get();
                                        $country = $query->result_array();
                                    ?>
                                <h2 class="order-title mb-4">Select Country</h2>

                                <div class="table-responsive-sm order-table"> 
                                    
                                    <div class="row">
                                        <div class="form-group col-md-8 col-lg-8 col-xl-8 required">
                                            <select class="form-control choosecountry select2" name="maincatid" required>
                                                <option value="">Select Country</option>
                                                    <?php foreach ($country as $row) { ?>
                                                        <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <h2 class="login-title mb-3">Billing Addresds </h2>
                                <?php $total = (count($address));?>
                                <?php if($total > 0){?>
                                    <form id="orderForm" name="orderForm" action="" method="post">
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> +  Add New Billing Address </button>
                                        </div>
                                        <div class="row">
                                            <?php foreach ($address as $add) {?>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required" style="    border: 1px solid #f1e8e8;">
                                                <input name="address_id" id="input-firstname" type="radio" value="<?php echo $add['address_id']; ?>" >
                                                <h3><?php echo $add['username']; ?></h3>
                                                <button type="button" class="btn btn-sm btn-success button" id="remove_address" onclick="editaddress('<?php echo $add['address_id'];  ?>')">
                                                    <i class="fa fa-remove"></i>
                                                </button>
                                                <p>Mobile : <?php echo $add['user_phone']; ?><br>   
                                                Pincode : <?php echo $add['pincode']; ?> <br>                                       
                                                Address :<?php echo $add['building']; ?> - <?php echo $add['street_address']; ?> , <?php echo $add['city']; ?> (<?php echo $add['state']; ?>)</p>
                                            </div>
                                            <?php } ?>
                                        <div class="col-md-12">
                                        <input type="hidden" id="min_shippingprice" name="min_shippingprice" value="<?php echo $min_shippingprice; ?>"/>
                                        <input type="hidden" id="grand_total" name="grand_total" value="0"/>
                                        <input type="hidden" id="usd_grand_total" name="usd_grand_total" value="0"/>
                                        <input type="hidden" id="shipping_charges" name="shipping_charges" value="0"/>
                                        <input type="hidden" id="usd_shipping_charges" name="usd_shipping_charges" value="0"/>
                                        <input type="hidden" id="usd_sub_total" name="usd_sub_total" value="0"/>
                                        <input type="hidden" id="usd_cpn_amt" name="usd_cpn_amt" value="0"/>
                                        <input type="hidden" id="cpn_amt" name="cpn_amt" value="0"/>
                                        <input type="hidden" id="usd__price" value="<?php echo $usd_price; ?>">
                                        <input type="hidden" name="coupon_code" id="coupon_code" value="">

                                        <div class="your-payment">
                                            <div class="payment-method">

                                                <div class="order-button-payment">
                                                    <button type="button" type="button" class="btn btn-secondary mb-2 btn-lg" onclick="orderNow()">continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>        
                                <?php }else{?>
                                <div class="row">
                                        <input type="hidden" id="min_shippingprice" name="min_shippingprice" value="<?php echo $min_shippingprice; ?>"/>
                                        <input type="hidden" id="grand_total" name="grand_total" value="0"/>
                                        <input type="hidden" id="usd_grand_total" name="usd_grand_total" value="0"/>
                                        <input type="hidden" id="shipping_charges" name="shipping_charges" value="0"/>
                                        <input type="hidden" id="usd_shipping_charges" name="usd_shipping_charges" value="0"/>
                                        <input type="hidden" id="usd_sub_total" name="usd_sub_total" value="0"/>
                                        <input type="hidden" id="usd_cpn_amt" name="usd_cpn_amt" value="0"/>
                                        <input type="hidden" id="cpn_amt" name="cpn_amt" value="0"/>
                                        <input type="hidden" id="usd__price" value="<?php echo $usd_price; ?>">
                                        <input type="hidden" name="coupon_code" id="coupon_code" value="">
                                    <form  id="addressForm" class="form-horizontal" method="POST" action="<?php echo base_url();?>landing/saveAddress">
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
                            <?php }?>
                            </fieldset>

                <?php } ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="your-order-payment">
                            
                             <h2 class="order-title mb-4">  Coupon Offers </h2>
                            
                            <div class="offer-item">
											<div  class="offer-title">No Shipping Fee on 1st Order &nbsp;<!----><span>Signup required</span></div>
											<div class="offer-desc">
												<div  class="offerdescin"><p>Free shipping on first order with no minimum purchase. Applicable only on prepaid order.</p></div> 
												
												
												<div class="pointer _copyCode displayInline posR">Use code:&nbsp;<span class="offer-code">Aauthenticity Love</span>
													<span  class="_copyIcon">
														<img class="_copyIcon" height="10" src="assets/images/copy.svg" width="10">
													</span>
													<span  class="_copiedSucc">Copied</span>
												</div>
										
											</div> 
										</div>
										
										
										
										
                            <div class="your-order">
                               

                                <div class="table-responsive-sm order-table"> 
                                  <?php          
                                    $userdata1 = $this->session->userdata("logged_in");
                                    if(!empty($userdata1['user_id'])) { ?>   
                                    <div class="row">
                                        <div class="form-group col-md-8 col-lg-8 col-xl-8 required">
                                            <input type="text" placeholder="Apply Coupon" id="coupon_val" />
                                        </div>
                                        <div class="form-group col-md-4 col-lg-4 col-xl-4 required">
                                                <button class="btn btn-secondary mb-2 btn-lg" onclick="check_coupon()"> Apply </button>
                                        </div>
                                    </div>
                                <?php }?>
                                <span style="color: green;" class="coupon_message"></span>
                                <span style="color: red;" class="coupon_error_message"></span>
                                </div>
                            </div>
                            <hr>
                            <div class="your-order">
                                <h2 class="order-title mb-4">Your Order</h2>

                                <div class="table-responsive-sm order-table"> 
                                    <table class="bg-white table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-left" >Product Image</th>
                                                <th>Product Name</th>
                                                <th>Variant Name</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cartdata">
                                            
                                            
                                        </tbody>
                                        <tfoot class="font-weight-600">
                                            <tr>
                                                <td colspan="4" class="text-right">Coupon <span onclick="remove_code()" id="remove_btn" style="display:none; color:red;"> - (X)</span></td>
                                                <td id="coupon_amount"> - </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Shipping Charge</td>
                                                <td id="delivery_charage"> - </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Total</td>
                                                <td id="total_order_amount"> </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div id="totaldata"></div>
                                <div id="ttlusdhdn"></div>
                            </div>
                        
                        
                        </div>
                    </div>
                </div>
            
            
            
            
            
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
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
            <form  id="addressForm" class="form-horizontal" method="POST" action="<?php echo base_url();?>landing/saveAddress">
                
                
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
            
            
            
            
            <!--End Main Content-->        
        </div><!--End Body Container-->
        
    </div><!--End Page Wrapper-->
     <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
   </script>
   <script src="<?php echo base_url();?>assets/website_assets/js/vendor/jquery-3.3.1.min.js"></script>
   <script src="<?php echo base_url();?>assets/website_assets/js/jquery-3.5.1.min.js"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/vendor/js.cookie.js"></script>
     <!-- Including Javascript -->
     <script src="<?php echo base_url();?>assets/website_assets/js/plugins.js?"></script>
    
     <script src="<?php echo base_url();?>assets/website_assets/js/main.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/jquery.min.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/js3.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/js11.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/sweetalert.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/sweetalert.min.js?"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/customFunction.js?v=2"></script>
     <script src="<?php echo base_url();?>assets/website_assets/js/checkout.js?v=1"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            cart_data();
            // alert("hello");
        });

        function cart_data(){
            var url="landing/getcart"
            var pro = viewGridView(url);
            pro.then(function (suc){
                obj = $.parseJSON(suc);
                var total = obj['total'];
                var usd_total = 0;
                var usd_val=1;
                $('#grand_total').val(total);
                $('#cartdata .productListInCartappend').remove();
                $.each(obj['cart'], function(key,value){
                    var variant = value.options.size_name+'-'+value.options.color_name;
                    // alert(variant);
                    var imageUrl = base_url+'assets/images/products/'+value.pro_image;
                    cartdata = '<tr>'+
                                    '<td><img style="height: 50px;width:50px;" src="'+imageUrl+'"> </img></td>'+
                                    '<td>'+value.name+'</td>'+
                                    '<td>'+variant+'</td>'+
                                    '<td>'+value.qty+'</td>'+
                                    '<td>₹ '+value.subtotal+'($'+value.qty*value.usd_variant_price+')</td>'+
                                '</tr>';
                                // alert(obj['product'][x].price);
                    $('#cartdata').append(cartdata);
                    usd_val=value.qty*value.usd_variant_price;
                    usd_total+=usd_val;
                });
                $('#usd_grand_total').val(usd_total);
                $('#usd_sub_total').val(usd_total);
                $('#total_order_amount').html('₹'+total+'($'+usd_total+')');
                var ttlhdn ='<input type="hidden" id="order_total" value="'+total+'"/>';
                $('#totaldata').append(ttlhdn);
                var ttlusdhdn ='<input type="hidden" id="ttlusd" value="'+usd_total+'"/>';
                $('#ttlusdhdn').append(ttlusdhdn);
            });
            
            // $('#delivery_charage').html(obj.delivery_charge);
        }


        $("body").on("change",".choosecountry",function(){
       var country_id = $(this).val();
       // var country_id = $("#country_id").val();
           
            $.ajax({
                type: "POST",
                
                url: baseurl + "landing/getcountryweight",
                data: {country_id: country_id},
                success: function(data) {
                    var obj=JSON.parse(data);
                    // alert(usd__price);
                    var order_total = $('#grand_total').val();
                    var min_shippingprice = $('#min_shippingprice').val();
                    if (order_total >= min_shippingprice) {
                        var shipping_charges = 0;
                        var usd_shipping_charges =  0;
                        var total_usd = $('#usd_grand_total').val();
                        var usd_total = Number(total_usd) + Number(usd_shipping_charges);
                        var order_total = $('#grand_total').val();
                        var total  = Number(order_total)+Number(shipping_charges);
                    }else{                        
                        var shipping_charges = obj['shipping_charges'];
                        var usd__price     = $('#usd__price').val();
                        var usd_shipping_charges =  parseInt(shipping_charges/usd__price);
                        var total_usd = $('#usd_grand_total').val();
                        var usd_total = Number(total_usd) + Number(usd_shipping_charges);
                        var order_total = $('#grand_total').val();
                        var total  = Number(order_total)+Number(shipping_charges);
                    }
                    $('#total_order_amount').html('₹'+total+'($'+usd_total+')');
                    $('#grand_total').val(total);
                    $('#usd_grand_total').val(usd_total);

                    $('#shipping_charges').val(shipping_charges);
                    $('#usd_shipping_charges').val(usd_shipping_charges);
                    $('#delivery_charage').html('₹'+shipping_charges+'($'+usd_shipping_charges+')');
                }
            });
        })



    </script>

    <script type="text/javascript">
        
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

                var order_total = $('#grand_total').val();
                var total_usd = $('#usd_grand_total').val();
                var usd__price     = $('#usd__price').val();
                var cpn_discnt = obj['coupon_amount'];
                var usd_dis = parseInt(cpn_discnt/usd__price);
                var usd_total = total_usd-usd_dis;
                // alert(usd_total);
                var total  = (order_total - obj['coupon_amount']);
                $('#total_order_amount').html('₹'+total+'($'+usd_total+')');
                $('#coupon_amount').html('₹'+obj['coupon_amount']+'($'+usd_dis+')');
                $('#cart_total').val(total);
                $('#grand_total').val(total);
                $('#usd_grand_total').val(usd_total);
                $('#usd_cpn_amt').val(usd_dis);
                $('#cpn_amt').val(cpn_discnt);
                $('#coupon_code').val(coupon);
            }


        });
    }

    function remove_code(){
        var order_totl = $('#order_total').val();
        var shipping_charges= $('#shipping_charges').val();
        var order_total =Number(shipping_charges)+Number(order_totl);
        
        var usd_totl = $('#ttlusd').val();
        var usd_shipping_charges= $('#usd_shipping_charges').val();
        var usd_total =Number(usd_shipping_charges)+Number(usd_totl);
        // var total  = parseInt(cart_total) + parseInt(cpnAmt);
        $('#total_order_amount').html('₹ '+order_total+'($'+usd_total+')');
        $('#coupon_field').hide();
        $(".coupon_message").hide();
        $(".coupon_error_message").hide();
        $('#coupon_val').val('');
        $('#remove_btn').hide();
        $('#coupon_amount').html('-');
        $('#grand_total').val(order_total);
        $('#usd_grand_total').val(usd_total);
        $('#cpn_discnt').val(0);
        $('#usd_cpn_amt').val(0);
        $('#cpn_amt').val(0);
        $('#coupon_code').val('');
    }

    </script>




<style>
    
.offer-item {
    border: 1px dashed #999;
    border-radius: 5px;
    font-size: .55rem;
    padding: 8px;
    color: #999;
    margin: 10px 0;
}  
.offer-title {
    font-size: .7rem;
    font-weight: 700;
    color: #000;
}

.offer-title  span  {
    color: #e7a700;
    font-size: .6rem;
    cursor: pointer;
    vertical-align: text-bottom;
    text-decoration: underline;
}

.offerdescin p {
    margin-bottom: 0;
}

span.offer-code {
    font-size: 12px;
    color: #000;
}

.pointer._copyCode.displayInline.posR {
    font-size: 12px;
}
.offerdescin p {
    font-size: 12px;
}

</style>