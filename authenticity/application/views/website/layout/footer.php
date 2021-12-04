  <!--Footer-->
    <div class="footer footer-2">
          <div class="footer-top clearfix">
            <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                            <h4 class="h4">Informations</h4>
                            <ul>

                                <?php
                                  $this->db->select('*');
                                  $this->db->from('page');  

                                  $this->db->limit('5');
                                  $query_page = $this->db->get();        
                                  $page_list =  $query_page->result_array();
                                  foreach($page_list as $row){
                              ?>
                                      <li><a href="<?php echo base_url(); ?>landing/page/<?php echo $row['page_slug'] ?>"><?php echo $row['page_title'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                            <h4 class="h4">Customer Services</h4>
                            <ul>
                                
                                <li><a href="<?php echo base_url(); ?>landing/category_details"> Category Details  </a></li>
                                
                                <li><a href="<?php echo base_url(); ?>landing/contact"> Contact us </a></li>
                                
                                <li><a href="<?php echo base_url(); ?>landing/login">Login</a></li>
                                <li><a href="<?php echo base_url(); ?>landing/my_account">My Account</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 footer-links">
                            <h4 class="h4">Stay Connected</h4>
                            <ul class="list--inline social-icons">
                                <li><a href="https://www.facebook.com/Aauthenticity-105906601575888" target="_blank"><i class="icon icon-facebook"></i> Facebook</a></li>
                                <li><a href="https://twitter.com/Authent58234234" target="_blank"><i class="icon icon-twitter"></i> Twitter</a></li>
                                <li><a href="https://www.instagram.com/aauthenticityonline/" target="_blank"><i class="icon icon-instagram"></i> Instagram</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 about-us-col">
                            <h4 class="h4">Contact Us</h4>
                            <p><i class="anm anm-map-marker-al" aria-hidden="true"></i> 942, I-THUM TOWERS-B, SECTOR-62,NOIDA (NCR DELHI),UP-201301,INDIA </p>
                            <p><i class="anm anm-phone-l" aria-hidden="true"></i> +91-9891475003 </p>
                            <p><i class="anm anm-envelope-l" aria-hidden="true"></i> <a href="#"><span class="__cf_email__" data-cfemail="#">sales@aauthenticity.com</span></a></p>
                            <p><i class="anm anm-envelope-l" aria-hidden="true"></i> <a href="#"><span class="__cf_email__" data-cfemail="#">care@aauthenticity.com</span></a></p>
                          
                        </div>
                    </div>
              </div>
            </div>
            <div class="footer-bottom clearfix">
              <div class="container">
                    <div class="copytext">
                      &copy; 2020-21 Aauthenticity. All Rights Reserved.
                    </div>
                </div>
            </div>
    </div>
    <!--End Footer-->
    
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-arw-up"></i></span>
    <!--End Scoll Top-->
    
  
  
  
    <!--MiniCart Drawer-->
    <div class="minicart-right-drawer modal right fade" id="minicart-drawer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="cart-drawer" class="block block-cart">
                    <a href="javascript:void(0);" class="close-cart" data-dismiss="modal" aria-label="Close"><i class="anm anm-times-r"></i></a>
                    <h4>Your cart <span class="text-success textsuccess">(0 items)</span></h4>
                    <!-- <div class="cart-sidebar-body" id="productListInCart"></div> -->
                    <div class="minicart-content">
                        <ul class="clearfix">
                    <div class="cart-sidebar-body" id="productListInCart"></div>
                            
                            
                        </ul>
                    </div>
                    <div class="minicart-bottom">
                        <div class="subtotal list">
                            <span>Sub Total:</span>
                            <span class="product-price" id="subtotal">0</span>
                        </div>
                        <div class="subtotal list">
                            <span>Your total savings :</span>
                            <span class="product-price" id="savingAmount">0</span>
                        </div>
                        <div class="subtotal">
                            <span>Amount to be paid:</span>
                            <span class="product-price" id="payable_amount">0</span>
                        </div>
                       <a href="<?php echo base_url();?>landing/checkout"> <button type="button" class="btn proceed-to-checkout">Proceed to Checkout</button> </a>
                      <a href="<?php echo base_url();?>landing/wishlist">  <button type="button" class="btn btn-secondary cart-btn">View WishList</button> </a>
                    </div>
                </div>
        </div>
      </div>
    </div>
    <!--End MiniCart Drawer-->
    
 
<!-- add-to-cart -->
<div class="modal loginmodal commonmodal " id="addcart">
      <div class="modal-dialog width650">
        <div class="modal-content bgimgmodal">
           <div class="white-bgmodal">
          <!-- Modal Header -->
          <div>
            <h4 style="color:#000!important;text-align: center;padding: 12px 0px; border-bottom: 1px solid;">Edit/Update Product</h4>
            <button type="button" class="close custumclose" data-dismiss="modal" style="width: 10%;position: absolute;right: 0;top: 7px;font-size: 30px;">×</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
             <div class="mobliform-box">
                  <div class="tab-content" style="text-align: center; position: relative;left: 130px;">
                    <div id="vardata"></div>
                    
                   <div class="buttonblocks"></div>
                  </div>
                  
               </form>
             </div>
          </div>
      </div>
     </div>
    </div>
  </div>
<!-- add-to-cart -->

     <!-- Including Jquery -->
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
     

      <script>
        function getvar(product_id){
          // alert(product_id);
        var url="landing/getvar"
        data={product_id:product_id};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){
            obj = $.parseJSON(suc);
            $('#vardata').html(obj.html);
        });
      }


        function checksizelist(size_id,product_id){
            // alert(size_id);
            var url="landing/getcolor"
            data={size_id:size_id,product_id:product_id};
            var pro = viewDetailsByData(data,url);
            pro.then(function (suc){
            obj = $.parseJSON(suc);
            // var len = Object.keys(obj['product']).length;
            // console.log(obj);
                // if(obj['product'].length==0){
                //     console.log(error);
                // }else{
                $('#dimen').remove();
                    $('#dimension .append_data').remove();
                    var  prodata = ''
                    for(x=0;x<obj.length;x++){
                        var prodata ='<div class="size-input append_data" >'+
                                       '<input type="radio"  onclick="getvar_data(\''+obj[x].product_id+'\',\''+obj[x].size+'\',\''+obj[x].color+'\')" value="'+obj[x].color+'" name="color" class="variant_input" id="dim'+obj[x].color+'" required>'+
                                    '<label for="dim'+obj[x].color+'" class="sizelabel">'+obj[x].color+'</label>'+
                                    '</div>'; 
                                     $('#dimension').append(prodata);
                    }
                // }
                
             });
        }

        function getvar_data(product_id,size_id,color_id){
            // alert(product_id);
            var url="landing/getvar_data"
            data={size_id:size_id,color_id:color_id,product_id:product_id};
            var pro = viewDetailsByData(data,url);
            pro.then(function (suc){
            obj = $.parseJSON(suc);
            $('.list_price').html(obj.list_price);
            $('.price').html('₹'+obj.price+ '/-');
            var product_id =obj['product'][0].product_id;
            var variant_id =obj['product'][0].variant_id;
            var size =obj['product'][0].size;
            var color =obj['product'][0].color;
            // $('.buttonblock').remove();

            $('.buttonblock .addcart').remove();
            var html= '<button onclick="addtocart(\''+product_id+'\',\''+variant_id+'\',\''+size+'\',\''+color+'\')" class="btn btn-blue addcart">Add To Cart</button>';
            $('.buttonblock').html(html);
                
             });
        }
      </script>

  <script>
        var base_url="<?php echo base_url();?>";
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

       <script>
          var baseurl="<?php echo base_url();?>"
      </script>
        <script type="text/javascript">

        $(document).ready(function(){
            // alert('hello');

             mini_cart();
                   
        });

    $("body").on("change",".choosesize",function(){
       var size_id = $(this).val();
       var product_id = $("#product_id").val();
           
            $.ajax({
                type: "POST",
                
                url: baseurl + "landing/getcolor",
                data: {size_id: size_id,product_id: product_id},
                success: function(data) {
                  var output=JSON.parse(data);
                  var html="<option value=''>Select Color</option>";
                  if(output.length > 0){
                      for(var i=0;i < output.length ; i++){
                          var markup='';
              
                          markup="<option value='"+ output[i].color+"'>"+output[i].color+"</option>";
                          
                          html=html+markup;
                      }
                  }else{
                      html="<option value=''>Color not available</option>";
                  }
                  $('.choosecolor').html(html);
                }
            });
        })
    $("body").on("change",".choosecolor",function(){
       var color_id = $(this).val();
       var size_id = $("#size_id").val();
       var product_id = $("#product_id").val();
           // alert(size_id);
            $.ajax({
                type: "POST",
                
                url: baseurl + "landing/getvar_data",
                data: {size_id: size_id,color_id: color_id,product_id: product_id},
                success: function(data) {
                  var obj=JSON.parse(data);
                  $('.list_price').html('₹'+obj.list_price);
                  $('.price').html('₹'+obj.price+ '/-');
                  // alert("hello");
                  var html='<button type="button" name="add" onclick="addtocart(\''+obj['product'][0].product_id+'\',\''+obj['product'][0].variant_id+'\',\''+obj['product'][0].size+'\',\''+obj['product'][0].color+'\')" class="btn product-form__cart-submit">'+
                        '<span>Add to cart</span>'+
                        '</button>';
                  $('.buttonblock').html(html);
                }
            });
        })

        </script>

        <script type="text/javascript">
   
   function removeCart(rowId){
    // alert(product_id);
     var url="landing/removeCart"
     data={key:rowId};
     var pro = viewDetailsByData(data,url);
     pro.then(function (suc){
      obj = $.parseJSON(suc);
        mini_cart()
      });
   }


function updateCart(id){
    var token = $("input[name=_token]").val();
    var url="landing/updateCart";
    // alert(id);
    var qty = parseInt($('.qty_'+id).val());
// alert(qty);
    if(qty<1){
      swal({
        title: "Not allow less then 1.",
        showConfirmButton: false,
        timer: 1000
      });
      //$('#qty_'+id).val(qty)
      viewcart()
      return false
    }
    formData={rowId:id,qty:qty};
    $.ajax({
      url: base_url+url,
      type: "POST",
      data: formData,
      beforeSend: function(){
        //showLoader();
      }, 
      success: function (suc)
      {
 obj = $.parseJSON(suc);
      hideLoader();
        if (obj.err == 0)
        {
        //appendMessageBody(formId);
        //showSuccessMessage(formId,obj.msg);
        swal({
          title: "Product Quantity Updated",
          showConfirmButton: false,
          timer: 1000
        });
          setTimeout(function(){ 
           mini_cart()
          },1000)
        }

        if (obj.err == 1)
        {          
          //showErrorMessage(formId,obj.msg);
          setTimeout(function(){ 
            viewcart();
          },1000)
          
        }
        if (obj.err == 2)
        { 
          //appendMessageBody(formId);
          //showDatabaseErrorMessage(formId,obj.msg);  
        }
      }
    });
}


function orderNow(){
    formId = 'orderForm';
    url='landing/orderNow';
    $('.err-msg').remove();
    var form = $('#'+formId)[0];
    var formData = new FormData(form);
    //console.log(formData);

    $.ajax({
      url: base_url+url,
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: formData,
      beforeSend: function(){
        showLoader();
      }, 
      success: function (obj)
      {
      // console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {
          var url=base_url+"landing/payment/"+obj.order_id 
           window.location.assign(url);
        }
        if (obj.err == 2)
        { 
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg);
          $('#link').html(obj.link) 
        }
      }
    });
  }


</script>

  <script type="text/javascript">
   addtoWishlist()
   function addtoWishlist(product_id){
     var url="landing/addtoWishlist"
     data={product_id:product_id};
     var pro = viewDetailsByData(data,url);
     pro.then(function (suc){
      obj = $.parseJSON(suc);
      console.log(obj)
         if(obj.count){
            $('.wishValue').html(obj.count)
            // $('.textsuccess').html('('+obj.count+ ' item)')
         }else{
            $('.wishValue').html(0)
            // $('.textsuccess').html('( 0 item)')
         }
        if(product_id){
          //$('#cardListBtn').addClass('open');
          //$('#cardListBtn').click();
          swal({
            title: obj.msg,
            showConfirmButton: false,
            timer: 1000
          });
        }else{
          //alert('fd')
        }
         $('#productListInWishlist .productListInWishlistappend').remove();
         $('#productListInWishlist_order .productListInWishlistappend').remove();
         totalprice=[];


         for(x=0;x<obj['product'].length;x++){

            var imageUr = base_url+'assets/images/products/'+obj['product'][x].promain_image;
            if(parseFloat(obj['product'][x].discount)>0){
              var off= '<span class="badge badge-success" id="off">'+parseFloat(obj['product'][x].discount)+ ' % OFF</span>';
            }else{
              var off=''
            }
            productListInWishlist = '<tr>'+
                                    '<td class="product-remove text-center" valign="middle"><a onclick="removeWishlist('+obj['product'][x].product_id+');"><i class="icon icon anm anm-times-l"></i></a></td>'+
                                      '<td class="product-thumbnail text-center">'+
                                          '<a href="#"><img src="'+imageUr+'" alt="" title=""></a>'+
                                      '</td>'+
                                      '<td class="product-name"><h4 class="no-margin"><a >'+obj['product'][x].proname_en+'</a></h4></td>'+
                                      '<td class="product-price text-center"><span class="amount">₹ '+obj['product'][x].discount_price+'.00</span></td>'+
                                      '<td class="stock text-center">'+
                                          '<span class="in-stock">in stock</span>'+
                                      '</td>'+
                                      '<td class="product-subtotal text-center"><button type="button" class="btn btn-small" onclick="addtocart('+obj['product'][x].product_id+');">Add To Cart</button></td>'+
                                '</tr>';
            $('#productListInWishlist').append(productListInWishlist);
            $('#productListInWishlist_order').append(productListInWishlist);

         }

      }); 
   }
   function removeWishlist(product_id){
    // alert(product_id);
     var url="landing/removeWishlist"
     data={product_id:product_id};
     var pro = viewDetailsByData(data,url);
     pro.then(function (suc){
      obj = $.parseJSON(suc);
        location.reload();
      });
   }

</script>

<script type="text/javascript">
    function editaddress(address_id){
        // alert(address_id);
        var url="landing/remove_address"
        data={address_id:address_id};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){
            obj = $.parseJSON(suc);
            location.reload();
        });
    }




    function addtocart(product_id,variant_id,size,color){
        var qty = $("#qty").val();
         var url="landing/addtocart"
         data={product_id:product_id,variant_id:variant_id,size:size,color:color,qty:qty};
         var pro = viewDetailsByData(data,url);
         pro.then(function (suc){
            obj = $.parseJSON(suc);
            swal({
            title: "Item Added In cart",
            showConfirmButton: false,
            timer: 1000
          });
             mini_cart();
        });
      }


    function mini_cart(){
        var url="landing/getcart"
        var pro = viewGridView(url);
        pro.then(function (suc){
        obj = $.parseJSON(suc);
        var cartsubtotal = obj['cartsubtotal'];
        var total = obj['total'];
        var cart_save = obj['cart_save'];
        // console.log(total);
        // console.log(obj);

        // if(total){
        //     $('#subtotal').html('₹ '+total); 
        // }else{
        //     $('#subtotal').html('₹ 0');
        // }
        // if(total){
        //     $('#payable_amount').html('₹ '+total); 
        // }else{
        //     $('#payable_amount').html('₹ 0');
        // }
        var item = Object.keys(obj['cart']).length;
        var usd_total = 0;
        var usd_val=1;
        var usd_sub_total = 0;
        var usd_subtotal=1;
        var usd_cartsave = 0;
        // var usd_val=1;
        if(item){
            $('.cardValue').html(item)
            $('.textsuccess').html('('+item+ ' item)')
        }else{
            $('.cardValue').html(0)
            $('.textsuccess').html('( 0 item)')
        }
        $('#productListInCart .productListInCartappend').remove();
        $('#productListInCart_order .productListInCartappend').remove();
        if(Object.keys(obj['cart']).length==0){
            $('#productListInCart').append("<div class='row productListInCartappend'><div class='col-md-12'><strong style='margin-left: 33%;color: red;'> No item in your cart </strong></div></div>");

            $('#productListInCart_order').append("<div class='row productListInCartappend'><div class='col-md-12'><strong style='margin-left: 33%;color: red;'> No item in your cart </strong></div></div>");
        }
        $.each(obj['cart'], function(key,value){
            var row = key;
            // console.log("key :", row);
            var imageUrl = base_url+'assets/images/products/'+value.pro_image;
            var productListInCart = '<li class="item clearfix productListInCartappend">'+
                                    '<a class="product-image" href="">'+
                                        '<img src="'+imageUrl+'" alt="" title="">'+
                                    '</a>'+
                                    '<div class="product-details">'+
                                        '<a onclick="removeCart(\''+row+'\');" class="remove"><i class="anm anm-times-sql" aria-hidden="true"></i></a>'+
                                        '<a class="product-title" >'+value.name+'</a>'+
                                        '<div class="variant-cart">'+value.options.color_name+' / '+value.options.size_name+'</div>'+
                                        '<div class="wrapQtyBtn">'+
                                           ' <div class="qtyField">'+
                                                '<a class="qtyBtn minus" onclick="update_minus_one(\''+row+'\','+value.qty+');" href="javascript:void(0);"><i class="anm anm-minus-r" aria-hidden="true"></i></a>'+
                                                '<input type="text" name="quantity" value="'+value.qty+'" class="qty qty_'+value.product_id+'" id="qty_'+value.product_id+'" readonly>'+
                                                '<a class="qtyBtn plus" onclick="update_one(\''+row+'\','+value.qty+');" href="javascript:void(0);"><i class="anm anm-plus-r" aria-hidden="true"></i></a>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="priceRow">'+
                                            '<div class="product-price">'+
                                                '<span class="money">₹'+value.price+'  ($'+value.usd_variant_price+')</span>'+
                                            '</div>'+
                                         '</div>'+
                                    '</div>'+
                                '</li>';
            $('#productListInCart').append(productListInCart);
            $('#productListInCart_order').append(productListInCart);
            usd_val=value.qty*value.usd_variant_price;
            usd_total+=usd_val;
            usd_sub_total=value.qty*value.usd_list_price;
            usd_subtotal+=usd_sub_total;
         });
            usd_cartsave=usd_subtotal-usd_total;
        if(total){
            $('#subtotal').html('₹ '+cartsubtotal+'($'+usd_subtotal+')'); 
            $('#savingAmount').html('₹ '+cart_save+'($'+usd_cartsave+')'); 
        }else{
            $('#subtotal').html('₹ 0');
            $('#savingAmount').html('₹ 0');
        }
        if(total){
            $('#payable_amount').html('₹ '+total+'($'+usd_total+')'); 
        }else{
            $('#payable_amount').html('₹ 0');
        }
         
      });  
   }

    function update_one(rowId,qty) {
        var url = "landing/update_one"
        data    = {rowId:rowId,qty:qty};
        var pro = viewDetailsByData(data,url);
        pro.then(function (suc){

            swal({
            title: "Quantity updated !",
            showConfirmButton: false,
            timer: 1000
            });
                mini_cart();
        });
    }
    function update_minus_one(rowId,qty) {
        if (qty==1) {
            swal({
            title: "Not Allow Less Than 1 !",
            showConfirmButton: false,
            timer: 1000
            });
        }else{
            var url = "landing/update_minus_one"
            data    = {rowId:rowId,qty:qty};
            var pro = viewDetailsByData(data,url);
            pro.then(function (suc){
                swal({
            title: "Quantity Decreased !",
            showConfirmButton: false,
            timer: 1000
          });
                mini_cart();
            });

        }
    }
</script>
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

span.money.list_price {
    color: #fa0b0b;
}

s#ComparePrice-product-template {
    color: #fa0b0b;
}
.save{color:#219653;}
</style>
</div>
</body>
</html>