
$(document).ready(function(){
  $('#room_generate_pagination').on('click','a',function(e){
      e.preventDefault(); 
      var pageno = $(this).attr('data-ci-pagination-page');
      getproduct(pageno);
      $("html, body").animate({ scrollTop: 500 }, "slow");
    });

viewAddress()
  $('input[name=payment_method]').change(function(){
    if($("input[name=payment_method]:checked").val()=='card'){
      $('#card_payment').show();
    }else{
      $('#card_payment').hide();
    }
  });
  var dis_coup = $('#dis_amt').val();
  if(dis_coup){
    $('#delivery_charage').after("<br><strong> Coupon Amount :- </strong> "+dis_coup);
  }

});


function viewcoupon(){
  showModal('couponModal');
}

function validateCoupon(formId,url){
  var form = $('#'+formId)[0];
  var formData = new FormData(form);

  formData.append("payable_amt",$('#payable_amt').val());
  
    $.ajax({
        url: base_url+'landing/'+url,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        data: formData,
         beforeSend: function(){
           // showLoader();
          }, 
        success: function (obj)
        {

        hideLoader();
         
      if (obj.err == 0)
        {
          appendMessageBody(formId);
          showSuccessMessage(formId,obj.msg);
          $('#dis_amt').val(obj.discount);
          $('#delivery_charage').after("<br><strong> Coupon Amount :- </strong> "+obj.discount);
        }
        if (obj.err == 1)
        { 
          showErrorMessage(formId,obj.msg);   
        }
    
        if (obj.err == 2)
        {
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg);  
        }
      }
    });
  }

function adderssView(){
  lockModal('createAddressModal')
  showModal('createAddressModal');
  $('#addressForm')[0].reset();
}

function viewAddress(){
  $('#addressList .appendAddress').remove();
   $.post(base_url + 'landing/viewAddress')
    .done(function(response){
      obj = $.parseJSON(response);
        if(obj.length>0){
          for(i=0;i<obj.length;i++){
            $('#addressList').append('<div class="radio-add appendAddress"><div class="col-lg-10"><div class="deliver-add1"><input type="radio" name="addressId" value="'+obj[i].address_id+'">&nbsp; '+obj[i].address+'<br>City : '+obj[i].cityName+' Socity: '+obj[i].societyName+'<br>Phone: '+obj[i].phoneno+' <br>Line 1 Address: '+obj[i].line_one+'<br> Line 2 Address: '+obj[i].line_two+'</label></div></div><div class="col-lg-2 edit-text"><a href="javascript:void(0);" onclick="editAddress('+obj[i].address_id+');"><i class="fa fa-pencil" aria-hidden="true" style="font-size: 14px;color:#51aa1b;"></i></a> &nbsp;<a href="javascript:void(0);" onclick="deleteAddress('+obj[i].address_id+');"><i class="fa fa-remove" aria-hidden="true" style="font-size: 14px;color:red;"></i></a></div></div>');
        }
      }else{
        $('#addressList').append('<div class="radio-add appendAddress"><div class="col-lg-10"> No Address </div></div>');
      }
    });
  }

  function editAddress(address_id){
    lockModal('createAddressModal')
    showModal('createAddressModal')
     $.post(base_url + 'landing/editAddress',{address_id:address_id})
    .done(function(response){
      obj = $.parseJSON(response);
      $('#mobile_a').val(obj[0].phoneno);
      $('#city').val(obj[0].city);
      $('#alt_mobile').val(obj[0].alt_mobile);
      $('#line_one').val(obj[0].line_one);
      $('#line_two').val(obj[0].line_two);
      getSociety(obj[0].city)
      $('#address_id').val(obj[0].address_id);
      setTimeout(function(){
        $('#society').val(obj[0].state);
      },1000)
    })
  }
  

  function showLogin(){
    showModal('bd-example-modal')
    close_modal('bd-example-modal')
  }

  function getSociety(cityid){
    var url="landing/getSociety";
    data={cityid:cityid};
    var pro = viewDetailsByData(data,url);
    pro.then(function (suc){
    obj = $.parseJSON(suc);
      for(k=0;k<obj['cities'].length;k++){
        $('#society').append('<option value='+obj['cities'][k].society_id+'>'+obj['cities'][k].society_name+'</option>');
      }
   });
  }
  
  
 function getzipcode(socityid){
		//alert(socityid);
    var url="landing/zipcode";
    data={socityid:socityid};
    var pro = viewDetailsByData(data,url);
    pro.then(function (suc){
    obj = $.parseJSON(suc);
      for(k=0;k<obj['socities'].length;k++){
        $('#zipe_code').append('<option value='+obj['socities'][k].zipcode+'>'+obj['socities'][k].zipcode+'</option>');
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
      console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {

        //window.location=base_url+'landing/orderlist';
         $('#btn3').click();
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
          setTimeout(function(){
            $('#login-form-link').click();
          },2000)
       
        }

        if (obj.err == 1)
        { 
          $('#btn1').click();   
        swal({
          type: 'warning',
          title: 'Please Fill out all field.',
          showConfirmButton: false,
          timer: 2000
        });
          $('.checkout-step-two').click();   
          showErrorMessage(formId,obj.msg);   
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
  function reorderNow(){
    formId = 'orderForm';
    url='landing/reorderNow';
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
      console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {

        //window.location=base_url+'landing/orderlist';
         $('#btn3').click();
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
          setTimeout(function(){
            $('#login-form-link').click();
          },2000)
       
        }

        if (obj.err == 1)
        { 
          $('#btn1').click();   
        swal({
          type: 'warning',
          title: 'Please Fill out all field.',
          showConfirmButton: false,
          timer: 2000
        });
          $('.checkout-step-two').click();   
          showErrorMessage(formId,obj.msg);   
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

  function saveAddress(formId,url){
  
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
      console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {
        
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
        viewAddress()
        }

        if (obj.err == 1)
        { 
          showErrorMessage(formId,obj.msg);   
        }
        if (obj.err == 2)
        { 
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg); 
        }
		  location.reload(true);
      }
    });
  }

function getproduct(pagno){

  $('#room_generate_pagination').html('');
  var selected = [];
  $("input:checked").each(function () {
    var val = $(this).val();
    selected.push($(this).val());
  });
    if(pagno==undefined){
      pagno=0;
    }
  var url="landing/load_product/"+pagno;
  data={catid:selected};
  var pro = viewDetailsByData(data,url);
  pro.then(function (suc){
     obj = $.parseJSON(suc);
 //console.log(obj.pagination);
    $('#room_generate_pagination').html(obj.pagination);

    $('#productList .appendData').remove();


    for(i=0;i<obj['result'].length;i++)
    { 
      

      var option='';
      for(j=0;j<obj['result'][i]['variant'].length;j++){
         console.log(obj['result'][i]['variant'][j].price)

          option = option+'<option price='+obj['result'][i]['variant'][j].price+' discount_price='+obj['result'][i]['variant'][j].discount_price+' discount='+obj['result'][i]['variant'][j].discount+'  variant_image='+obj['result'][i]['variant'][j].variant_image+'  value="'+obj['result'][i]['variant'][j].variant_id+'">'+obj['result'][i]['variant'][j].subunit+' '+obj['result'][i]['variant'][j].unitname+'</option>';
      }
      //var discount = (obj['result'][i].price-obj['result'][i].discount_price)*100/obj['result'][i].discount_price
      var imageUr = imageExists(base_url+'assets/images/variant/'+obj['result'][i].image);
        var html= '<div class="col-md-4 appendData" >'+
                    '<div class="product">'+
                       '<a href="'+base_url+'landing/single/'+obj['result'][i].product_id_en+'">'+
                          '<div class="product-header">'+
                             '<span class="badge badge-success" id="off_'+obj['result'][i].product_id+'"> 0 % OFF</span>'+
                             '<img class="img-fluid" id="image_'+obj['result'][i].product_id+'" src="'+imageUr+'" alt="">'+
                             '<span class="veg text-success mdi mdi-circle"></span>'+
                          '</div>'+
                        '</a>'+
                          '<div class="product-body">'+
                             '<h5>'+obj['result'][i].proname_en+'</h5>'+
                              '<select id="variant_'+obj['result'][i].product_id+'" onchange="getVariantDetails('+obj['result'][i].product_id+',this.value)">'+
                                '<option value="" selected> Please Select </option>'+option+
                              '</select>'+
                             // '<h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - '+obj['result'][i].total_qty+' '+obj['result'][i].unitname+'</h6>'+
                          '</div>'+

                          '<div class="product-footer">'+
                             '<button type="button" class="btn btn-secondary btn-sm float-right" id="sbtn_'+obj['result'][i].product_id+'"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>'+
                             '<div id="appBtn_'+obj['result'][i].product_id+'"></div>'+

                            ' <p> <span class="offer-price mb-0" id="sales_price_'+obj['result'][i].product_id+'">₹ 0 </span><br><span class="regular-price" id="regular_price_'+obj['result'][i].product_id+'">₹ 0 </span></p>'+
                          '</div>'+
                    '</div>'+
                 '</div>';
      $('#productList').append(html);
    }


  });
}

function getTime(dateId){
  var url="landing/getTime";
    data={dateId:dateId};
    var pro = viewDetailsByData(data,url);
    pro.then(function (suc){
      $('#delivery_time .custom').remove();
    obj = $.parseJSON(suc);

      for(k=0;k<obj['delivery_time'].length;k++){
        $('#delivery_time').append('<option class="custom" value='+obj['delivery_time'][k].delivery_time_id+'>'+obj['delivery_time'][k].start_time+' To '+obj['delivery_time'][k].end_time+' </option>');
      }
   });
}

function getVariantDetails(product_id,variant_id){
  if(variant_id){
    discount_price = $('#variant_'+product_id+' option:selected').attr('discount_price');
    price = $('#variant_'+product_id+' option:selected').attr('price');
    discount = $('#variant_'+product_id+' option:selected').attr('discount');
    variant_image = $('#variant_'+product_id+' option:selected').attr('variant_image');

    var imageUr = imageExists(base_url+'assets/images/variant/n'+variant_image);
    $('#off_'+product_id).html(parseFloat(discount)+' %');
    $('#sales_price_'+product_id).html('₹ '+discount_price);
    $('#regular_price_'+product_id).html('₹ '+price);
    $('#image_'+product_id).attr('src',imageUr);
    $('#sbtn_'+product_id).hide()
    $('#appBtn_'+product_id).append('<button type="button" class="btn btn-secondary btn-sm float-right appbtn" id="hbtn_'+product_id+'" onclick="addtoCart('+variant_id+')"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>')
  }else{
    $('#off_'+product_id).html('0 %');
    $('#sales_price_'+product_id).html('₹ 0');
    $('#regular_price_'+product_id).html('₹ 0');
    $('#image_'+product_id).attr('src',base_url+'assets/no_image.png');
    $('#sbtn_'+product_id).show();
    $('.appbtn').remove()
  }
}



function imageExists(image_url){
    var http = new XMLHttpRequest();
    http.open('HEAD', image_url, false);
    http.send();
    if(http.status == 404){
      return base_url+'assets/no_image.png';
    }else{
      return image_url
    }
   // return http.status != 404;
}