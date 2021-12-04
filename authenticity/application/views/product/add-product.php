 <?php 
    $this->db->select("*");
    $this->db->from("site_settings");
    $this->db->where("name",'usd_price');
    $query = $this->db->get();
    $data = $query->result_array();
    $usd_price =$data[0]['value']; 
?>

<style>
	button.btn.btn-success.add-variant {
		margin-top: 22px;
	}

	.appe {
		float: left;
		width: 100%;
		overflow: auto;
	}

	.pip img {
		height: 200px;
	}

	.remove {
		background: black;
		color: white;
		padding: 7px;
		cursor: pointer;
	}
}
</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<div class="content-wrapper">
	<section class="content-header">
      <h1>Product</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Product/doAddProduct'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
				<!-- <form role="form" action="" method="post"  class="validate" data-parsley-validate="" enctype="multipart/form-data"> -->
			<div class="box-body">
			<div class="form-group">
					<label class="col-sm-2 control-label">Main Category</label>
					<div class="col-sm-6">
						<select class="form-control choosemaincategory select2" name="maincatid" required>
							<option value="">Select Main Category</option>
								<?php foreach ($maincategory as $row) { ?>
									<option value="<?php echo $row['maincategory_id']; ?>"><?php echo $row['maincategory_name_en']; ?></option>
								<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Category</label>
					<div class="col-sm-6">
						<select class="form-control select2 cate" name="catid" >

							<option value="">Select Category</option>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Sub Category</label>
					<div class="col-sm-6">
						<select class="form-control select2 subcatgry" name="subcatid" >

							<option value="">Select Sub Category</option>

						</select>
					</div>
				</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Product Name</label>
				<div class="col-sm-6">
				<input type="text" name="product_name_en" id="product_name_en" class="form-control" placeholder="Product Name" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Brand Name</label>
				<div class="col-sm-6">
				<input type="text" name="brand_name_en" id="brand_name_en" class="form-control" placeholder="Brand Name" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Total Price</label>
				<div class="col-sm-6">
				<input type="number" name="price" id="price" class="form-control" placeholder="Total Price" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Discount Price</label>
				<div class="col-sm-6">
				<input type="number" name="discount_price" id="discount_price" class="form-control" placeholder="Discount Price" autocomplete="off" required>
				</div>
			</div>
			<!-- <div class="form-group">
				<label class="col-sm-2 control-label">Discount (Price)</label>
				<div class="col-sm-6">
				<input type="number" name="dprice" id="dprice" class="form-control" placeholder="Discount Price">
				</div>
			</div> -->
			<div class="form-group">
				<label class="col-sm-2 control-label">Discount(%)</label>
				<div class="col-sm-6">
				<input type="text" name="discount" id="discount" class="form-control" placeholder="Discount" autocomplete="off" readonly required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Price (In USD)</label>
				<div class="col-sm-6">
				<input type="text" name="usd_price" id="usd_price" class="form-control" placeholder="Price (In USD)" autocomplete="off" readonly required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Sub-Price (In USD)</label>
				<div class="col-sm-6">
				<input type="text" name="usd_discount_price" id="usd_discount_price" class="form-control" placeholder="Discount-Price (In USD)" autocomplete="off" readonly required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Product Weight(In KG)</label>
				<div class="col-sm-6">
				<input type="number" name="product_weight" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" id="product_weight" class="form-control" placeholder="Product Weight(In KG)" autocomplete="off" required>
				<input type="hidden" id="usd__price" value="<?php echo $usd_price; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Offer Of the Month</label>
				<div class="col-sm-6">
				    <input type="checkbox" name="offer_month" id="offer_month"  >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Color</label>
				<div class="col-sm-6">
					<select class="form-control choosecolor select2" name="color_id">
						<option>Choose color</option>
					<?php foreach ($colors as $mrow) { ?>
					  <option value="<?php echo $mrow['id']; ?>"><?php echo $mrow['name']; ?></option>
					  <?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description</label>
				<div class="col-sm-6">
				    <!-- <textarea name="description_en" id="description_en" class="form-control" placeholder="Description" autocomplete="off" required></textarea> -->
                     <?php echo $this->ckeditor->editor("description_en",""); ?>
                        
				</div>
			</div>
			

			<!-- New Code by MAhipal--->

			<div class="form-group has-feedback">
	            <label for="exampleInputPassword1" class="col-sm-2 control-label">Select Main Image:</label>
	              <div class="input-group control-group after-add-more col-sm-6">
	                    <input type="file"  id="file" class="form-control" name="product_image"  accept="image/*" />
		        </div>
		     </div>
	        
			<div class="form-group has-feedback">
	            <label for="exampleInputPassword1" class="col-sm-2 control-label">Select Multiple Images:</label>
	              <div class="input-group control-group after-add-more col-sm-6">
	                    <input type="file"  id="file" class="form-control" name="product_images[]"  accept="image/*" multiple />
		        </div>
		     </div>
	         <!-- <div class="copy hide">
	         	<div class="form-group has-feedback">
		         <label for="exampleInputPassword1" class="col-sm-2 control-label" id="rmv_image">Product Images:</label>
		          <div class="control-group input-group col-sm-6 " style="margin-top:10px">
		            <input type="file" id="files[]" class="form-control" name="product_image[]" multiple >
		            <div class="input-group-btn"> 
		              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
		            </div>
		          </div>
	         	</div>
	         </div> -->
	

			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-success pull-left">Add Product</button>
				<a href="<?php echo base_url("Product");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>	
			</div>			
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function() {
		if (window.File && window.FileList && window.FileReader) {
			$("#files").on("change", function(e) {
				var files = e.target.files,
					filesLength = files.length;
				for (var i = 0; i < filesLength; i++) {
					var f = files[i]
					var fileReader = new FileReader();
					fileReader.onload = (function(e) {
						var file = e.target;
						$("<div class=\"col-md-3\"><span class=\"pip\">" +
							"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
							"<br/><span class=\"remove\">Remove image</span>" +
							"</span></div>").insertAfter("#files");
						$(".remove").click(function() {
							$('#files').val('');
							$(this).parent(".pip").remove();
						});
					});
					fileReader.readAsDataURL(f);
				}
			});
		} else {
			alert("Your browser doesn't support to File API")
		}
	});
</script>

 <script type="text/javascript">
	$(document).ready(function() {
		$(".add-more").click(function() {
			var html = $(".copy").html();
			$(".after-add-more").after(html);
		});

		$("body").on("click", ".remove", function() {
			$(this).parents(".control-group").remove();
			$('#rmv_image').hide();
		});
	});
</script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquerynew.js");?>"></script>
<script type="text/javascript">
$(document).on("change keyup blur", "#discount_price", function() 
{
    var price     = $('#price').val();
    var usd__price     = $('#usd__price').val();
    var subprice  = $('#discount_price').val();
    var dprice    = price - subprice;
    var discount  = (dprice * 100 / price).toFixed();
    var usd_price    = price / usd__price;
    var usd_discount_price    = subprice / usd__price;
    
    $('#dprice').val(dprice);
	$('#usd_price').val(usd_price);
	$('#usd_discount_price').val(usd_discount_price);
	$('#discount').val(discount);
});
</script>


<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script><script>tinymce.init({ selector:'textarea' });</script> -->