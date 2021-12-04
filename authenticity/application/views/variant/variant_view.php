<div class="content-wrapper">

	<section class="content-header">

		<h1>Variant</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?> 

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right" style="margin-left:10px;">

				<a href="<?php echo base_url("Addvariant/".$product_id);?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Variant</button></a>

				</div>
				<div class="pull-right">
				<a href="<?php echo base_url("Product");?>"><button type="button" class="btn btn-danger">Back</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
                      <th>Size</th>
					  <th>Color</th>
					  <th>List Price</th>
					  <th>Variant Price</th>
					  <th>List Price (In USD)</th>
					  <th>Variant Price (In USD)</th>
					  <th>Variant Weight</th>
					  <th>Status</th>
                      <th>Action</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($variant)){
                                    foreach($variant as $row)
                                    {?>
					<tr>
                                            <td><?php echo $row['size'];?></td>
											<td><?php echo $row['color'];?></td>
											<td><?php echo $row['list_price'];?></td>
											<td><?php echo $row['variant_price'];?></td>
											<td>$<?php echo $row['usd_list_price'];?></td>
											<td>$<?php echo $row['usd_variant_price'];?></td>
											<td><?php echo $row['variant_weight'];?> KG</td>

						<td><?php if ($row['variant_status'] == 1) { ?>

							<a href="<?php echo base_url('variantStatus/'.$row['variant_id']); ?>"  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('variantStatus/'.$row['variant_id']); ?>" class="btn btn-sm btn-danger">DeActive</a>

						   <?php } ?></td>

						<td>
                            <a class="btn-warning btn btn-sm btn-flat" href="<?php echo base_url('Editvariant/'.$row['variant_id'].'/'.$product_id);?>"><i class="fa fa-pencil fa-lg"></i></a>

	                       </td>

					</tr>

					<?php } ?>

                    <?php }else{

                        echo "<tr><td colspan=10 align=center>No Recoreds Available.</td></tr>";

                    }?>

                </tfoot>

              </table>

            </div>

		</div>

		</div>

	</section>

</div>

