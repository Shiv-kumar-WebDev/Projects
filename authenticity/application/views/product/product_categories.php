<div class="content-wrapper">

	<section class="content-header">

		<h1>Product Categories</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url('Product');?>"><button type="button"  class="btn btn-danger pull-left">Back</button></a>
				<a href="<?php echo base_url('AddProductCategory/'.$product_id);?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Copy Product</button></a>

				</div>
				

			</div>

            <div class="box-body table-responsive">
				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					  <th>Sr. No.</th>
					  <th class="text-center">Product Name </th>
					  <th class="text-center">Main Category</th>
					  <th class="text-center">Category</th>
                      <th class="text-center">Sub Category </th>
					  <th class="text-center">Action</th>


					</tr>

                </thead>

                <tbody>

				<?php if(isset($categories)){
					$i=1;

						foreach($categories as $row)

						{?>

					<tr>

						<td class="text-center"><?php echo $i; $i++;?></td>
						<td class="text-center"><?php echo $row['proname_en'];?></td>
						<td class="text-center"><?php echo $row['maincategory_name_en'];?></td>
						<td class="text-center"><?php echo $row['name_en'];?></td>
                        <td class="text-center"><?php echo $row['subcategory_name_en'];?></td>
						
						<td class="project-actions text-center">
	                    <a class="btn-danger btn btn-sm " href="<?php echo base_url('categories_delete/'.$row['product_id']);?>">

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

