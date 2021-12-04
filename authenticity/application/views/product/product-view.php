<div class="content-wrapper">

	<section class="content-header">

		<h1>Product</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url("AddProduct");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Product</button></a>

				</div>
				

			</div>

            <div class="box-body table-responsive">
                <form action="<?php echo base_url('Getbycat');?>" method="post" class="form-horizontal">
           	 <div class="form-group-row">
				<input type="hidden" id="orderid" name="orderid" value="58">
                <input type="hidden" id="uid" name="uid" value="30">
				<label class="col-sm-4 control-label">Category</label>
				<div class="col-sm-4">
			    <select class="form-control choosecat select2" name="cat" id="catname" required>
                 <option value="">Select Category</option>
				<?php foreach ($category as $row) { ?>
				  <option value="<?php echo $row['category_id']; ?>"><?php echo $row['name_en']; ?></option>
				  <?php } ?>
				</select>

				</div>
			
			<div class="col-sm-3">
				<button type="Submit" id="filter" class="btn btn-info pull-left">Submit</button>&nbsp;
				
			</div>
			  
			</div></form>

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					    <th>Sr. No.</th>

					  <th class="text-center">Product Image</th>
					  <th class="text-center">Product Name </th>
					  <th class="text-center">Brand Name </th>
					  <th class="text-center">New Arrival</th>
					  <th class="text-center">Main Category</th>
					  <th class="text-center">Category</th>
                      <th class="text-center">Sub Category </th>
					  <th class="text-center">Status</th>
					  <th class="text-center">Action</th>


					</tr>

                </thead>

                <tbody>

				<?php if(isset($product)){
					$i=1;

						foreach($product as $row)

						{?>

					<tr>

						<td class="text-center"><?php echo $i; $i++;?></td>
						<td><?php if(!empty($row['promain_image'])) {?><img src="<?php echo base_url('assets/images/products/').'/'.$row['promain_image'];?>" style="width:100px;height:50px;" /><?php }else{?><img src="<?php echo base_url('assets/img/placeholder.png');?>" style="width:100px;height:50px;" /><?php } ?></td>
						<td class="text-center"><?php echo $row['proname_en'];?></td>
						<td class="text-center"><?php echo $row['brand_name_en'];?></td>

						<td class="text-center"><?php if ($row['new_arr'] == 1) { ?>

							<a href="<?php echo base_url('ProductArrival/'.$row['product_id']); ?>" class="badge badge-danger"><i class="font-13 fa fa-star"></i> </a>

						   <?php } else { ?>

							<a href="<?php echo base_url('ProductArrival/'.$row['product_id']); ?>" class="btn btn-sm btn-primary"><i class="font-13 fa fa-bookmark "></i> Old Product</a>

						   <?php } ?></td>
						<td class="text-center"><?php echo $row['maincategory_name_en'];?></td>
						<td class="text-center"><?php echo $row['name_en'];?></td>
                        <td class="text-center"><?php echo $row['subcategory_name_en'];?></td>
					

						
						<td class="text-center"><?php if ($row['prostatus'] == 1) { ?>

							<a href="<?php echo base_url('ProductStatus/'.$row['product_id']); ?>"  class="btn btn-sm btn-success">Active</a>
							<a href="<?php echo base_url('Product_Categories/'.$row['product_id']); ?>"  class="btn btn-sm btn-info"><i class="fa fa-files-o"></i></a>

						   <?php } else { ?>

							<a href="<?php echo base_url('ProductStatus/'.$row['product_id']); ?>" class="btn btn-sm btn-danger">DeActive</a>
							<a href="<?php echo base_url('Product_Categories/'.$row['product_id']); ?>"  class="btn btn-sm btn-info"><i class="fa fa-files-o"></i></a>

						   <?php } ?></td>
						<td class="project-actions text-center">
							<a class="btn-primary btn btn-sm" href="<?php echo base_url('variant/'.$row['product_id']);?>"><i class="fa fa-eye fa-lg"></i></a>
							<a class="btn-warning btn btn-sm" href="<?php echo base_url('EditProduct/'.$row['product_id']);?>">

	                        <i class="fa fa-pencil fa-lg"></i></a>
	                    <a class="btn-danger btn btn-sm " href="<?php echo base_url('ProductStatus_delete/'.$row['product_id']);?>">

	                        <i class="fa fa-trash fa-lg"></i></a></td>
					</tr>

					<?php } ?>

                    <?php }else{

                        echo "<tr><td colspan=4 align=center>No Recoreds Available.</td></tr>";

                    }?>

                </tfoot> 

              </table>

            </div>

		</div>

		</div>

	</section>

</div>



<!-- <script type="text/javascript" src="<?php echo base_url("assets/js/jq.js");?>"></script>
<script type="text/javascript">
    var mytable;
    $(document).ready(function () {
		//alert('hi');
		// $('#example1').DataTable().destroy();
		
		 $('#example1').dataTable().fnClearTable();
         $('#example1').dataTable().fnDestroy();
        mytable = $('#example1').DataTable({
			
            "language": {                
                     "infoFiltered": ""
                },
            "processing": true,
            "serverSide": true,
            "ordering": false,
            "ajax": {
                "url": "<?php echo site_url('admin/product/AllproductList') ?>",
                "type": "POST"
            }
        });
		
		
		
		// fill_datatable();
        function fill_datatable(catname) {
        mytable = $('#example1').DataTable({
            "language": {                
                     "infoFiltered": ""
                },
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "ajax": {
                "url": "<?php echo site_url('admin/product/AllproductList') ?>",
                "type": "POST",
				data: {
                        catname: catname
                    }
            }
        });
		}
		
		 $('#filter').click(function () {
            var catname = $('#catname').val();
           
           // alert(catname);
            if (catname != '') {
                $('#example1').DataTable().destroy();
                fill_datatable(catname);

            } else {
                alert('Please select at least one option');
                $('#example1').DataTable().destroy();
                fill_datatable();
            }
        });
    });
</script> -->

