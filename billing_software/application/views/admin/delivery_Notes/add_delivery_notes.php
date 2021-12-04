



<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1>  Add New Delivery Note </h1>
</div>

<div class="block">
 
<div class="title">
<form action="<?php echo base_url();?>Delivery_notes/doadd_note" method="post" class="form-horizontal form-bordered">
<fieldset>
 
<div class="form-group">
<label class="col-md-2 control-label" for="example-select2"> Client Name </label>
<div class="col-md-4">
<select id="example-select2" required name="client_id" class="select-select2 select2-hidden-accessible" style="width: 100%;" data-placeholder="Choose one.." tabindex="-1" aria-hidden="true">
<option></option>
<?php foreach ($clients as $value) { ?>
    <option value="<?php echo $value['id']; ?>"><?php echo $value['company_name']; ?></option>
<?php }?>
</select> 
</div>

<div class="col-md-2">
<a href="<?php echo base_url('AddClient'); ?>" class="btn btn-sm btn-primary"> + Add New Client </a>
</div>

</div>
</fieldset>



<div class="form-group">
<label class="col-md-2 control-label" for="exampl"> Proforma No.</label>
<div class="col-md-3">
<input type="text" class="form-control" name="proforma_no" placeholder="" required>
</div>

<label class="col-md-2 control-label" for="example-datepicker"> Proforma Date</label>

<div class="col-md-2">
<input type="text" id="example-datepicker" required name="proforma_date" class="form-control input-datepicker" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
</div>
</div>



<div class="form-group">

<label class="col-md-2 control-label" for=""> Enquary No.</label>
<div class="col-md-3">
<input type="text" class="form-control" name="enquiry_no" placeholder="Enquary No." required>
</div>

<label class="col-md-2 control-label" for="">  Valid Unit </label>

<div class="col-md-2">
<input type="text" name="valid_unit" class="form-control " placeholder="" required>
</div>
</div>





 
</div>
</div>


 


</div>
 
 
<div class="block">
<div class="table-responsive">
<table id="myTable1" class="table table-vcenter table-striped">
<thead>

<tr>
<th>Item Name </th>
<th> Unit </th>
<th> HSN/SAC </th>
<th> QTY </th>
<th> Price </th>
<th> Discount (%) </th>
<th> CGST </th>
<th> SGST </th>
<th> IGST </th>
<th> CESS </th>
<th> Total	 </th>
<th class="text-center">Actions</th>
</tr>

</thead>
<tbody>
    <tr>
        <td><input type="text" id="item_name" name="item_name[]" class="form-control" placeholder="" required><input type="hidden" id="item_id" name="item_id[]" ></td>
        <td> <input type="number" id="item_unit" name="item_unit[]" class="form-control" placeholder="" required>  </td>
        <td> <input type="text" id="item_hsn" name="item_hsn[]" class="form-control" placeholder="" required>  </td>
        <td> <input type="number" id="item_qty" name="item_qty[]" class="form-control" placeholder=" " required>  </td>
        <td> <input type="number" id="item_price" name="item_price[]" class="form-control" placeholder=" " required>   </td>
        <td> <input type="number" id="item_dis" name="item_dis[]" class="form-control" placeholder=" " required>  </td>
        <td> <input type="text" id="item_cgst" name="item_cgst[]" class="form-control" placeholder=" " required>  </td>
        <td> <input type="text" id="eitem_sgst" name="item_sgst[]" class="form-control" placeholder=" " required>  </td>
        <td> <input type="text" id="item_igst" name="item_igst[]" class="form-control" placeholder=" " required>  </td>
        <td> <input type="text" id="item_cess" name="item_cess[]" class="form-control" placeholder=" " required>   </td>
        <td> <input type="number" id="item_total" name="item_total[]" class="form-control" placeholder=" " required>  </td>
        <td><a onclick="addrows()" title="Add line" class="btn btn-blue btn-add" data-ember-action="" data-ember-action-2373="2373">+ Add line</a></td>
    </tr>
</tbody>
</table>
</div>
</div>






<div class="block">
<div class="row">

<div class="col-md-6"> 

<div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span>Total quantity</span></label>
</div>

<div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span> Add shipping charges </span></label>
</div>
 
 
<div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span> Add discount to all </span></label>
</div>

<div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span> Show CESS</span></label>
</div> 

 <div id="ember2386" class="field checkbox-field field-filled-in ember-view"><label>
<input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"><span> Subject to reverse charge </span></label>
</div> 

</div>




<div class="col-md-6"> 
 <div class="totals">
 
 
    <div id="subtotal" class="row">
      <label>Subtotal:</label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>
	
    <div id="subtotal" class="row">
      <label> CGST: </label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>	

    <div id="subtotal" class="row">
      <label> SGST: </label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>	

    <div id="subtotal" class="row">
      <label> IGST: </label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>	
	
    <div id="subtotal1" class="row">
      <label> Total: </label>
      <span class="amount"><span id="ember2411" class="ember-view">  <span id="ember2412" class="ember-view">₹ <span id="ember2413" class="ember-view">1,234.00</span></span>
</span></span>
    </div>	
	
	
	
</div>
</div>
 
</div>
</div>







<div class="block" style="padding-bottom: 20px;">
<div class="row">

<div class="col-md-6"> 
<legend><i class="fa fa-angle-right"></i>Terms & Conditions </legend>
<textarea id="val_bio" name="term_con" rows="6" class="form-control" placeholder="Terms & Conditions.." required></textarea>
</div>

<div class="col-md-6"> 
<legend><i class="fa fa-angle-right"></i> Private notes (not shown to client) </legend>
<textarea id="val_bio" name="p_notes" rows="6" class="form-control" placeholder="Private notes (not shown to client).." required></textarea>
</div>


</div>
</div>

 <div class="buttons" style="text-align: center;">
    <button type="submit" class="btn btn-action btn-check">SAVE </button>
  </div>
 
</form> 

</div>





<style>
a.btn.btn-blue.btn-add {
    color: #fff;
    background: #282e45;
}
.totals .row span.amount {
    float: right;
}
input#example-inline-checkbox1 {
    position: inherit;
}
.row label, .document-form #summary .totals .row span.amount {
 
    color: #072d45;
    font-size: 14px;
    font-weight: 700;
    line-height: 1.4285714286em;
    padding-bottom: 0.625em;
}
 
 span#ember2413 {
    font-weight: 700;
}

.field.checkbox-field label {
    display: block;
    margin-bottom: 0;
    line-height: 3.3846153846em;
    position: relative;
    font-size: 16px;
    font-weight: 500;
}

input#example-inline-checkbox1 {
    font-size: 14px;
    width: 1.5em;
    height: 1.5em;
    border-radius: 3px;
    background-color: #fff;
    margin-right: 30px;
}


</style>

<script src="<?php echo base_url();?>assets/admin_assets/js/vendor/jquery.min-3.6.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/vendor/bootstrap.min-3.6.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/plugins-3.8.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/app-3.7.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVxLoIeqnW5iqwWDOXNQ57PHPMWSqwNVU"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/helpers/gmaps.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/admin_assets/js/customFunction.js"></script>

<script type="text/javascript">
var rid = 0;
 function addrows(){
 rid++;
        $('#myTable1').append('<tr><td><input type="text" id="item_name'+rid+'" name="item_name[]" class="form-control" placeholder=""><input type="hidden" id="item_id'+rid+'" name="item_id[]" ></td><td> <input type="number" id="item_unit'+rid+'" name="item_unit[]" class="form-control" placeholder="">  </td><td> <input type="text" id="item_hsn'+rid+'" name="item_hsn[]" class="form-control" placeholder="">  </td><td> <input type="number" id="item_qty'+rid+'" name="item_qty[]" class="form-control" placeholder=" ">  </td><td> <input type="number" id="item_price'+rid+'" name="item_price[]" class="form-control" placeholder=" ">   </td><td> <input type="number" id="item_dis'+rid+'" name="item_dis[]" class="form-control" placeholder=" ">  </td><td> <input type="text" id="item_cgst'+rid+'" name="item_cgst[]" class="form-control" placeholder=" ">  </td><td> <input type="text" id="item_sgst'+rid+'" name="item_sgst[]" class="form-control" placeholder=" ">  </td><td> <input type="text" id="item_igst'+rid+'" name="item_igst[]" class="form-control" placeholder=" ">  </td><td> <input type="text" id="item_cess'+rid+'" name="item_cess[]" class="form-control" placeholder=" ">   </td><td> <input type="number" id="item_total'+rid+'" name="item_total[]" class="form-control" placeholder=" ">  </td><td><a onclick="addrows()" title="Add line" class="btn btn-blue btn-add" data-ember-action="" data-ember-action-2373="2373">+ Add line</a> <input class="btn btn-blue btn-add" type="button" value="DELETE" id="deleteRowButton" /></td></tr>');



        

            // var availableTags = '<?php echo base_url();?>admin/Purchase/search';



            // $.ajax({
            //     type: "POST",
            //     url: "<?php echo base_url(); ?>admin/Purchase/all_products" ,

            //     success: function (result) {
            //         var all_prodata = JSON.parse(result);
            //         $("#pro_name"+rid+"").focusin(function(){
            //             $(this).autocomplete({
            //                 source: all_prodata,
            //                 select: function (event, ui) {
            //                     var name=ui.item.value;
            //                     var variant_id=ui.item.variant_id;
            //                     $.ajax({

            //                         type: "POST",
            //                         url: "<?php echo base_url(); ?>admin/Purchase/productdetail",
            //                         data:{variant_id:variant_id,name:name},
            //                         success: function (result) {
            //                             console.log(result);
            //                             var re = JSON.parse(result);
            //                           // $('#pro_price'+rid+'').val(re.prodat.price);
            //                             $('#qty'+rid+'').val(0);
            //                             $('#pid'+rid+'').val(re.prodat.product_id);
            //                             if (re.prodat.variant_id>0) {
            //                                 $('#variant_id'+rid+'').val(re.prodat.variant_id);
            //                             }
            //                             var subtotal = Number.parseFloat((re.prodat.price * 0)).toFixed(2);
            //                             $('#subtotal'+rid+'').val(subtotal);

            //                             if(re.prodat.price != ''){
            //                              // $('#pro_price'+rid+'').prop("readonly", true);
            //                                          }
                                     
            //                         },
            //                         error: function (err) {
            //                             console.log(err);
            //                         }
            //                     });               
            //                 },
            //                 change: function (event, ui) {
            //                     if(!ui.item){
            //                         $(this).val("");
            //                     }
            //                 }
            //             });
            //         });

            //     },
            //     error: function (err) {
            //         console.log(err);
            //     }
            // });



            
            // $("#pro_name"+rid+"").focusin(function(){
            //     $(this).autocomplete({
            //         source: availableTags,
            //         select: function (event, ui) {
            //             $.ajax({
            //                 type: "GET",
            //                 url: "<?php echo base_url(); ?>admin/Purchase/productdetail/" + encodeURIComponent(window.btoa(ui.item.label)),

            //                 success: function (result) {
            //                   console.log(result);
            //                   var re = JSON.parse(result);
            //                   // $('#pro_price'+rid+'').val(re.prodat.price);
            //                   $('#qty'+rid+'').val(0);
            //                   $('#pid'+rid+'').val(re.prodat.product_id);
            //                   var subtotal = Number.parseFloat((re.prodat.price * 0)).toFixed(2);
            //                   $('#subtotal'+rid+'').val(subtotal);
                               
            //                    if(re.prodat.price != ''){
            //                      // $('#pro_price'+rid+'').prop("readonly", true);
            //                                  }
                             
            //                 },
            //                 error: function (err) {
            //                     console.log(err);
            //                 }
            //             });               
            //         },
            //         change: function (event, ui) {
            //             if(!ui.item){
            //                 $(this).val("");
            //             }
            //         }
            //     });
            // });
        }

$("#myTable1").on('click', 'input[id="deleteRowButton"]', function(event) {
    $(this).parent().parent().remove();

});

function subtotalCal(rid=''){
  var price = $('#pro_price'+rid).val();
  var qty   = $('#qty'+rid).val();
  var total = 0.00;
  total     = (price * qty).toFixed(2);
  $('#subtotal'+rid).val(total);    

}
</script>
