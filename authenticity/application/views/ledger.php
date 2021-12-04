<div class="content-wrapper">

	<section class="content-header">

		<h1>Ledger</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?> 

        <div class="box">

            <div class="box-header">
	         	<form action="<?php echo base_url('Ledger'); ?>" method="post"  class="form-horizontal">

					<div class="pull-left" style="margin-left:10px;">
						<div class="col-sm-12">
							<select name="month" id="month" class="form-control" required>
				     	<option value selected disabled>SELECT MONTH</option>
				     	<?php for ($i=1; $i < 12; $i++) { ?>
				        <option value="<?php echo $last_month = date('M-Y', strtotime("-$i month")); ?>"><?php echo $last_month = date('M-Y', strtotime("-$i month")); ?></option>
				    <?php }?>
	                 </select>
						</div>
					</div>
					<h3 class="box-title">
						<button type="Submit" class="btn btn-info pull-left">FILTER</button>&nbsp;
					</h3>
				</form>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					  <th>S.No</th>
					  <th>Month</th>
					  <th>Product Name</th>
					  <th>Variant</th>
					  <th>Opening Stock</th>
					  <th>Purchase Qty</th>
					  <th>Sold Qty</th>
					  <th>Waste Qty</th>
					  <th>Final Stock</th>
					  <th>Date</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($ledger)){ $i=1;
						foreach($ledger as $row){?>
					<tr style="text-transform: uppercase;">
						<td><?php echo $i; $i++;?></td>
						<td><?php echo $row['month'];?></td>
						<td><?php echo $row['proname_en'];?></td>
						<td><?php echo $row['size'];?> - <?php echo $row['color'];?></td>
						<td><?php echo $row['opening_stock'];?></td>
						<td><?php echo $row['purchased_qty'];?></td>
						<td><?php echo $row['sold_qty'];?></td>
						<td><?php echo $row['waste_qty'];?></td>
						<td><?php echo $row['final_stock'];?></td>
						<td><?php echo $row['created'];?></td>
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

