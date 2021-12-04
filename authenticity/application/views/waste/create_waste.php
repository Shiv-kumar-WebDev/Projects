<div class="content-wrapper">
  <section class="content-header">
      <h1> Waste Order</h1>
    </section>
  <section class="content">

 <form class="form-horizontal" action="<?php echo base_url('admin/Waste/createwaste'); ?>" method="POST" name ="shipping">
  <div class="row">
    <div class="col-md-12">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Waste Order</h3>
            </div>
      <div class="col-md-12">
      <div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
      </div>
      </div>
      <div class="box-body">
       
        <div class="form-group">
          <div class="col-md-1">
          </div>
          <div class="col-md-5">
            <label for="exampleInputPassword1" class="col-2 control-label">Vendor Contact Number</label>
                    <input class="form-control" placeholder="Vendor Contact Number" name="cn" id="cn" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off" required>
          
          </div>
          <div class="col-md-5">
            <label for="exampleInputPassword1" class="col-2 control-label">Vendor Name</label>
                    <input class="form-control" placeholder="Vendor Name" name="name" id="name" type="text" required="" autocomplete="off">
          </div>
        </div>
        
      <div class="form-group">
          <div class="col-md-1">
          </div>
          <div class="col-md-5">
            <label for="exampleInputPassword1" class=" control-label">Vendor Address</label>
          <textarea class="form-control" placeholder="Vendor Address" name="address" id="address" required></textarea>
          </div>
          <div class="col-md-5">
            <label for="exampleInputPassword1" class="col-2 control-label">Purchase Date</label>
                    <input class="form-control datepickerdata" placeholder="" name="date" id="date" type="text" required="" autocomplete="off" >
          </div>
        </div>
    </div>
    <div class="row">
               
                <div class="col-md-12">
                    <h4>Add Product</h4>
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Qty(kg)</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="cart_detail">
                         
                          <tr>
                            <td><input type="text" id="pro_name" class="pro_name form-control" name="pro[]" required=""> </td>
                            <td><input type="text" id="pro_price" name="pro_price[]" class="form-control"> </td>
                            <td><input type="text" onchange="subtotalCal()" id="qty" name="qty[]" class="form-control"  > </td>
                            <td><input type="text" id="subtotal" name="subtotal[]" readonly class="form-control">          
                            <input type="hidden" id="variant_id" name="variant_id[]" value="0"></td>
                            <input type="hidden" id="pid" name="pid[]" ></td>
                            
                            <td><button type="button" onclick="addrows()"> Add</button>  </td>
                          </tr>

                        </tbody>
                    </table>
                </div>
                <!-- </div> -->

                <div class="col-md-12">
                   <button type="submit"  class="btn btn-primary">Save Order</button>
                </div>
            </div>
    </div>
  </div>      
      </form> 

  </section>

</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jq.js");?>"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.dataTables.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/select2.full.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-timepicker.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/dataTables.bootstrap.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/adminlte.min.js");?>"></script>


<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-datepicker.min.js");?>"></script>

<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery2.min.js"></script>
<script src="YourJquery source path"></script>
<!-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script> -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>  

<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   -->
<script type="text/javascript">

    $(function() {
        // var products = '<?php echo base_url();?>admin/Purchase/all_products';
        // var searchcustomer_arr = [{label:"ASD CUSTOMER",value:1},
        //                   {label:"Customer 2",value:2},{label:"hello 2",value:4}]
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/Purchase/all_products" ,

            success: function (result) {
                var all_prodata = JSON.parse(result);
                $( "#pro_name" ).autocomplete({
                    source: all_prodata,
                    // source: availableTags,
                    minLength: 2,
                    select: function (event, ui) {
                        var name=ui.item.value;
                        var variant_id=ui.item.variant_id;
                        $.ajax({

                            type: "POST",
                            url: "<?php echo base_url(); ?>admin/Purchase/productdetail",
                            data:{variant_id:variant_id,name:name},
                            success: function (result) {
                                var re = JSON.parse(result);
                                // $('#pro_price').val(re.prodat.price);
                                $('#qty').val(0);
                                $('#pid').val(re.prodat.product_id);
                                if (re.prodat.variant_id>0) {
                                    $('#variant_id').val(re.prodat.variant_id);
                                }
                                var subtotal = Number.parseFloat((re.prodat.price * 0)).toFixed(2);
                                $('#subtotal').val(subtotal);

                                if(re.prodat.price != ''){
                                //$('#pro_price').prop("readonly", true);
                                }
                            },
                            error: function (err) {
                                console.log(err);
                            }
                        });               
                    },
                    change: function (event, ui) {
                        if(!ui.item){
                            $(this).val("");
                        }
                    }       
                });

            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>
<script type="text/javascript">
var rid = 0;
 function addrows(){
 rid++;
        $('#myTable').append('<tr><td><input type="text" id="pro_name'+rid+'" name="pro[]" class="form-control"> </td>            <td><input type="text" name="pro_price[]" id="pro_price'+rid+'" class="form-control"> </td>            <td><input type="text" name="qty[]" id="qty'+rid+'" class="form-control"  onchange="subtotalCal('+rid+')"> </td>            <td><input type="text" name="subtotal[]" class="form-control" id="subtotal'+rid+'" readonly> <input type="hidden" id="pid'+rid+'" name="pid[]" ><input type="hidden" id="variant_id'+rid+'" name="variant_id[]" value="0"></td>   <td><button type="button"   onclick="addrows()"> Add</button><input type="button" value="Delete" id="deleteRowButton" />  </td>          </tr>');

            // var availableTags = '<?php echo base_url();?>admin/Purchase/search';



            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/Purchase/all_products" ,

                success: function (result) {
                    var all_prodata = JSON.parse(result);
                    $("#pro_name"+rid+"").focusin(function(){
                        $(this).autocomplete({
                            source: all_prodata,
                            select: function (event, ui) {
                                var name=ui.item.value;
                                var variant_id=ui.item.variant_id;
                                $.ajax({

                                    type: "POST",
                                    url: "<?php echo base_url(); ?>admin/Purchase/productdetail",
                                    data:{variant_id:variant_id,name:name},
                                    success: function (result) {
                                        console.log(result);
                                        var re = JSON.parse(result);
                                      // $('#pro_price'+rid+'').val(re.prodat.price);
                                        $('#qty'+rid+'').val(0);
                                        $('#pid'+rid+'').val(re.prodat.product_id);
                                        if (re.prodat.variant_id>0) {
                                            $('#variant_id'+rid+'').val(re.prodat.variant_id);
                                        }
                                      var subtotal = Number.parseFloat((re.prodat.price * 0)).toFixed(2);
                                      $('#subtotal'+rid+'').val(subtotal);
                                       
                                       if(re.prodat.price != ''){
                                         // $('#pro_price'+rid+'').prop("readonly", true);
                                                     }
                                     
                                    },
                                    error: function (err) {
                                        console.log(err);
                                    }
                                });               
                            },
                            change: function (event, ui) {
                                if(!ui.item){
                                    $(this).val("");
                                }
                            }
                        });
                    });

                },
                error: function (err) {
                    console.log(err);
                }
            });



            
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

$("#myTable").on('click', 'input[id="deleteRowButton"]', function(event) {
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


<script type="text/javascript">
   
   $("#shipping").on("submit", function(e){
    
           var totalitem = $('#myTable tr').length-1;
        url  = '<?php echo base_url(); ?>admin/Purchase/createporder';
        if(totalitem > 0){
            var result =  confirm('Do you really want to create order ?');
        if(result == true){
                $.ajax({

                        type: "POST",
                        url: url,
                        data: $('#shipping').serialize(), // serializes the form's elements.
                        success: function(result1){
                            // alert(data);
                          // console.log(result1);
                          // if(result1 == 1){
                          //    location.reload();
                          //   //window.location = "<?php echo base_url(); ?>shopping/orderList";
                          // }      
                        }
                });
             }
             
    }
   
    });
// location.reload();
  $( function() {
    $( "#date" ).datepicker();
    $( "#datepicker1" ).datepicker();
  } );
 
  </script>

  


<style>
button {
    background: #0077d3;
    color: #fff;
}


input#deleteRowButton {
        background: #0077d3;
    color: #fff;
}


  label.error
  {
    text-shadow:none !important;
    color: red !important;
    font-style : normal !important;
    float: left;
  }

 .requireds{
    color: red;
    font-size: 16px;
 } 
  </style>