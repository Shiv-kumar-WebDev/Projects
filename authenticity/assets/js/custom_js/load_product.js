
$(document).ready(function(){
    	var catId ='<?php echo $this->uri->segment(3); ?>';
    		//alert(catId);
            $('input:checkbox').filter('#cat_'+catId).attr('checked', 'checked');
            
    $('#room_generate_pagination').on('click','a',function(e){
        e.preventDefault(); 
        var pageno = $(this).attr('data-ci-pagination-page');
        getproduct(pageno);
        $("html, body").animate({ scrollTop: 500 }, "slow");
      });
    setTimeout(function(){
$('.variant_option').trigger('change');
    },800)
    
 getproduct(pagno,catId);
})//;
  

function getproduct(pagno,cat){
    alert(cat);

  $('#room_generate_pagination').html('');
  var selected = [];
  $("input:checked").each(function () {
    var val = $(this).val();
    selected.push($(this).val());
  });
    if(pagno=='undefined'){
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
     // console.log(obj['result'][i]['variant'])

      var option='';
      for(j=0;j<obj['result'][i]['variant'].length;j++){

          option = option+'<option price='+obj['result'][i]['variant'][j].price+' discount_price='+obj['result'][i]['variant'][j].discount_price+' discount='+obj['result'][i]['variant'][j].discount+'  variant_image='+obj['result'][i]['variant'][j].variant_image+' href="'+obj['result'][i]['variant'][j].variant_id_en+'"  value="'+obj['result'][i]['variant'][j].variant_id+'">'+obj['result'][i]['variant'][j].subunit+' '+obj['result'][i]['variant'][j].unitname+'</option>';
      }
      //var discount = (obj['result'][i].price-obj['result'][i].discount_price)*100/obj['result'][i].discount_price
      var imageUr = imageExists(base_url+'assets/images/variant/'+obj['result'][i].image);
        var html= '<div class="col-md-4 appendData" >'+
                    '<div class="product">'+
                       '<a id="href_'+obj['result'][i].product_id+'" href="javascript:void(0);">'+
                          '<div class="product-header">'+
                             '<span class="badge badge-success" id="off_'+obj['result'][i].product_id+'"> 0 % OFF</span>'+
                             '<img class="img-fluid" id="image_'+obj['result'][i].product_id+'" src="'+imageUr+'" alt="">'+
                             '<span class="veg text-success mdi mdi-circle"></span>'+
                          '</div>'+
                        '</a>'+
                          '<div class="product-body">'+
                             '<h5>'+obj['result'][i].proname_en+'</h5>'+
                              '<select class="variant_option" id="variant_'+obj['result'][i].product_id+'" onchange="getVariantDetails('+obj['result'][i].product_id+',this.value)">'+option+
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

  setTimeout(function(){
    $('.variant_option').trigger('change');
  },900)
}

function getVariantDetails(product_id,variant_id){

  $('#appBtn_'+product_id+' .appbtn').remove();
  if(variant_id){
    discount_price = $('#variant_'+product_id+' option:selected').attr('discount_price');
    price = $('#variant_'+product_id+' option:selected').attr('price');
    discount = $('#variant_'+product_id+' option:selected').attr('discount');
    variant_image = $('#variant_'+product_id+' option:selected').attr('variant_image');
    href = $('#variant_'+product_id+' option:selected').attr('href');

    var imageUr = imageExists(base_url+'assets/images/variant/'+variant_image);
    $('#off_'+product_id).html(parseFloat(discount)+' %');
    if(parseFloat(discount)>0){
      $('#off_'+product_id).show();
      $('#off_'+product_id).html(parseFloat(discount)+' %');
    }else{
      $('#off_'+product_id).hide();
    }

    $('#sales_price_'+product_id).html('₹ '+discount_price);
    $('#regular_price_'+product_id).html('₹ '+price);
    $('#image_'+product_id).attr('src',imageUr);
    $('#href_'+product_id).attr('href','single/'+href);
    $('#sbtn_'+product_id).hide()
    $('#appBtn_'+product_id).append('<button type="button" class="btn btn-secondary btn-sm float-right appbtn" id="hbtn_'+product_id+'" onclick="addtoCart('+variant_id+')"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>')
    //$('.appbtn').remove()
  }else{
    $('#off_'+product_id).html('0 %');
    $('#off_'+product_id).hide();
    $('#sales_price_'+product_id).html('₹ 0');
    $('#regular_price_'+product_id).html('₹ 0');
    $('#image_'+product_id).attr('src',base_url+'assets/no_image.png');
    $('#href_'+product_id).attr('href',"javascript:void(0)");
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