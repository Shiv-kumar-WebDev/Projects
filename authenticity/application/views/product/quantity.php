<div class="content-wrapper">

	<section class="content-header">

		<h1>Quantity Stock</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right"></div>
				

			</div>

            <div class="box-body table-responsive">
				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					    <th>Sr. No.</th>

					  <th class="text-center">Product Image</th>
					  <th class="text-center">Product Name </th>
					  <th class="text-center">Total Quantity </th>
					  <th class="text-center">Total Sell Quantity</th>
					  <th class="text-center">Total Left Quantity</th>
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
						<td class="text-center"><?php echo $row['added_qty'];?></td>
						<td class="text-center"><?php echo $tot = $row['added_qty']-$row['total_qty'];?></td>
						<td class="text-center"><?php echo $row['total_qty'];?></td>
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


