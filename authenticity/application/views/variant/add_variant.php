<?php 
    $this->db->select("*");
    $this->db->from("site_settings");
    $this->db->where("name",'usd_price');
    $query = $this->db->get();
    $data = $query->result_array();
    $usd_price =$data[0]['value']; 
?>
<div class="content-wrapper">
	<section class="content-header">
      <h1>Variant</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Variant</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Product/doAddVariant/'.$varid); ?>" method="post" name="vform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
			<div class="form-group">
            <label class="col-sm-2 control-label">Product Name:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $productname['proname_en']; ?>" disabled >
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Variant Size</label>
			<div class="col-sm-6">                
                <input type="text" name="size" id="size" class="form-control" placeholder="Variant Size" autocomplete="off" required>
			</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">Variant Color</label>
			<div class="col-sm-6">
                <input type="text" name="color" id="color" class="form-control" placeholder="Variant Color" autocomplete="off" required>
			</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Variant Weight (In KG)</label>
				<div class="col-sm-6">
				<input type="number" name="variant_weight" id="variant_weight" class="form-control" placeholder="Variant Weight" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Variant List Price</label>
				<div class="col-sm-6">
				<input type="number" name="list_price" id="list_price" class="form-control" placeholder="Add List Price" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Variant Price</label>
				<div class="col-sm-6">
				<input type="number" name="variant_price" id="variant_price" class="form-control" placeholder="Variant Price" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">List Price (In USD)</label>
				<div class="col-sm-6">
				<input type="text" name="usd_list_price" id="usd_list_price" class="form-control" placeholder="List Price (In USD)" autocomplete="off" required readonly>
				<input type="hidden" id="usd__price" value="<?php echo $usd_price; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Variant Price (In USD)</label>
				<div class="col-sm-6">
				<input type="text" name="usd_variant_price" id="usd_variant_price" class="form-control" placeholder="Price (In USD)" autocomplete="off" required readonly>
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Add Variant</button>
				<a href="<?php echo base_url("variant/".$varid);?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquerynew.js");?>"></script>
<script type="text/javascript">
$(document).on("change keyup blur", "#variant_price", function() 
{
    var price     = $('#list_price').val();
    var usd__price     = $('#usd__price').val();
    var subprice  = $('#variant_price').val();
    var dprice    = price - subprice;
    var discount  = (dprice * 100 / price).toFixed();
    var usd_price    = price / usd__price;
    var usd_discount_price    = subprice / usd__price;
    
    $('#dprice').val(dprice);
	$('#usd_list_price').val(usd_price);
	$('#usd_variant_price').val(usd_discount_price);
});
$(document).on("change keyup blur", "#list_price", function() 
{
    var price     = $('#list_price').val();
    var usd__price     = $('#usd__price').val();
    var subprice  = $('#variant_price').val();
    var dprice    = price - subprice;
    var discount  = (dprice * 100 / price).toFixed();
    var usd_price    = price / usd__price;
    
    $('#dprice').val(dprice);
	$('#usd_list_price').val(usd_price);
	$('#usd_variant_price').val(usd_discount_price);
});
</script>