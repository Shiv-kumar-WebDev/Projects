 <style>
	button.btn.btn-success.add-variant {
		margin-top: 22px;
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
	#img_container {
    position:relative;
    display:inline-block;
    text-align:center;
    border:1px solid green;
    padding: 10px;
    margin: 5px;
    border-radius: 5px;
    height: 120px;

}
 img{
 	width:100px;
 	height:100px;
 }
.button {
    position:absolute;
    bottom:1px;
    right:1px;
    width:30px;
    height:30px;
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
              <h3 class="box-title">Edit Product</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			
			</div>
			</div>
			<form action="<?php echo base_url('admin/Product/doUpdateProduct/'.$editproduct['product_id']); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
			<div class="form-group">
			<label class="col-sm-2 control-label">Main Category</label>
			<div class="col-sm-6">
				<select class="form-control choosemaincategory select2" name="maincatid">
				<?php foreach ($maincategory as $mrow) { ?>
				  <option value="<?php echo $mrow['maincategory_id']; ?>" <?php if ($mrow['maincategory_id'] == $editproduct['maincatid']) {
                                                echo 'selected="selected"'; } ?>><?php echo $mrow['maincategory_name_en']; ?></option>
				  <?php } ?>
				</select>
			</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">Category</label>
			<div class="col-sm-6">
				<select class="form-control cate select2" name="catid">
				<?php foreach ($category as $row) { ?>
				  <option value="<?php echo $row['category_id']; ?>" <?php if ($row['category_id'] == $editproduct['catid']) {
                                                echo 'selected="selected"'; } ?>><?php echo $row['name_en']; ?></option>
				  <?php } ?>
				</select>
			</div>
			</div>
                            
            <div class="form-group">
                <label class="col-sm-2 control-label">SubCategory</label>
                <div class="col-sm-6">
                        <select class="form-control select2 subcatgry" name="subcatid" >
                        
                          <option value="">Select Sub Category</option>
                          <?php for($i=0;$i<count($subcategory);$i++){?>
                          <option value="<?php echo $subcategory[$i]['subcategory_id'] ;?>" <?php if($subcategory[$i]['subcategory_id'] == $editproduct['subcatid']){ echo 'selected="selected"';}?>><?php echo $subcategory[$i]['subcategory_name_en'];?></option>
                          <?php                                      
                          }?>
                        </select>
                </div>
			</div>
                            
			<div class="form-group">
				<label class="col-sm-2 control-label">Product Name</label>
				<div class="col-sm-6">
				<input type="text" name="product_name_en" id="product_name_en" class="form-control" value="<?php echo $editproduct['proname_en'];?>" autocomplete="off" required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Brand Name</label>
				<div class="col-sm-6">
				<input type="text" name="brand_name_en" id="brand_name_en" class="form-control" value="<?php echo $editproduct['brand_name_en'];?>" autocomplete="off" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Product Weight(In KG)</label>
				<div class="col-sm-6">
				<input type="number" name="product_weight" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" id="product_weight" class="form-control"  value="<?php echo $editproduct['product_weight'];?>" placeholder="Product Weight(In KG)" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Color</label>
				<div class="col-sm-6">
					<select class="form-control choosecolor select2" name="color_id">
						<option>Choose color</option>
					<?php foreach ($colors as $mrow) { ?>
					  <option value="<?php echo $mrow['id']; ?>" <?php if ($mrow['id'] == $editproduct['color_id']) {
	                                                echo 'selected="selected"'; } ?>><?php echo $mrow['name']; ?></option>
					  <?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Total Price</label>
				<div class="col-sm-6">
				<input type="number" name="price" id="price" value="<?php echo $editproduct['price']; ?>" class="form-control" placeholder="Total Price" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Discount Price</label>
				<div class="col-sm-6">
				<input type="number" name="discount_price" value="<?php echo $editproduct['discount_price']; ?>" id="discount_price" class="form-control" placeholder="Discount Price" autocomplete="off" required>
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
				<input type="text" name="discount" id="discount" value="<?php echo $editproduct['discount']; ?>" class="form-control" placeholder="Discount" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Price (In USD)</label>
				<div class="col-sm-6">
				<input type="text" name="usd_price" id="usd_price" value="<?php echo $editproduct['usd_price']; ?>" class="form-control" placeholder="Price (In USD)" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Sub-Price (In USD)</label>
				<div class="col-sm-6">
				<input type="text" name="usd_discount_price" value="<?php echo $editproduct['usd_discount_price']; ?>" id="usd_discount_price" class="form-control" placeholder="Discount-Price (In USD)" autocomplete="off" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Description(En)</label>
				<div class="col-sm-6">
				    <!-- <textarea name="description_en" id="description_en" class="form-control" placeholder="Description" autocomplete="off" required><?php echo $editproduct['description_en'];?></textarea> -->
				    <?php echo $this->ckeditor->editor("description_en",$editproduct['description_en']); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Offer Of the Month</label>
				<div class="col-sm-6">
				    
				    <input type="checkbox" name="offer_month" id="offer_month" <?php echo ($editproduct['offer_month']==1)?'checked':'';  ?> >
				</div>
			</div>
			
			<div class="form-group has-feedback">
	            <label for="exampleInputPassword1" class="col-sm-2 control-label">Product Main Image:</label>
	            <div class="input-group control-group col-sm-6">

					<div id="img_container">
						<img src="<?php echo base_url('');?>assets/images/products/<?php echo $editproduct['promain_image'];?>" >
						<button type="button" class="btn btn-sm btn-success button" id="remove_img"><i class="fa fa-check" style="font-size:10px"></i></button>
					</div>
				</div>
		    </div>
			<!-- New Code by jitendra--->

			<div class="form-group has-feedback">
	            <label for="exampleInputPassword1" class="col-sm-2 control-label">Product Images:</label>
	            <div class="input-group control-group col-sm-6">
	                
	                
	                <?php 
	                $path =  base_url().'assets/images/products/';
	                foreach ($product_img as $img) {
	                	$img_name=$img['pro_image_name'];
                        if($img_name !=''){
                                   ?>
                        <span class="pip"><span  class="btn btn-default btn-sm" onclick="del_pro(<?php echo $img['pro_image_id']; ?>,'<?php echo $img_name; ?>')" style="float: right;">&times;</span><img style="width: 175px;height: 175px;" class="imageThumb1" src="<?php echo $path.$img_name; ?>" title="<?php echo $img_name; ?>"  />
                            <br/>
                        </span>
                    <?php } } ?>
		       
		        </div>
		    </div>

			
			<div class="form-group has-feedback">
	            <label for="exampleInputPassword1" class="col-sm-2 control-label">Select Main Image:</label>
	              <div class="input-group control-group after-add-more col-sm-6">
	                    <input type="file"  id="file" class="form-control" name="product_image" accept="image/*"/>
		        </div>
		     </div>
	        
			<div class="form-group has-feedback">
	            <label for="exampleInputPassword1" class="col-sm-2 control-label">Select Multiple Images:</label>
	              <div class="input-group control-group after-add-more col-sm-6">
	                    <input type="file"  id="file" class="form-control" name="product_images[]"  accept="image/*"/ multiple />
		        </div>
		     </div>
	        

			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Update Product</button>
				<a href="<?php echo base_url("Product");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
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

<script type="text/javascript">
    function del_pro(id,name){

        var result = confirm('Do you really want to delete ?');
        if (result == true) {
	        $.ajax({

	            type: "GET",
	            url: "<?php echo base_url(); ?>admin/product/productImgdelete/" + id ,
	            success: function (result) {
	                console.log(result);
	                location.reload();

	            },
	            error: function (err) {
	                console.log(err);
	            }
	        });
        }
 	}
</script>

<style type="text/css">
    input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.imageThumb1 {
  max-height: 175px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>