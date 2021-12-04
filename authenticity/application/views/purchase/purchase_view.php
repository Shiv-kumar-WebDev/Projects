<div class="content-wrapper">

	<section class="content-header">

		<h1>Purchased</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?> 

        <div class="box">

            <div class="box-header">

				<h3 class="box-title"><a href="<?php echo base_url("admin/Purchase/download_csv");?>"><button type="button"  class="btn btn-primary pull-left"><i class="fa fa-download"></i> DOWNLOAD CSV</button></a></h3>

				<div class="pull-right" style="margin-left:10px;">

				<a href="<?php echo base_url("AddOrder");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Order</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					  <th>S.No</th>
					  <th>Vendor name</th>
					  <th>Vendor contact No</th>
					  <th>Purchase Total</th>
					  <th>Total Item</th>
					  <th>Created</th>
					  <!-- <th>Status</th> -->
                      <th>Action</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($purchase)){ $i=1;
                                    foreach($purchase as $row)
                                    {	$this->db->select("*");
									    $this->db->from("purchased_products");
									    $this->db->where("purchase_id",$row['purchase_id']);
									    $query = $this->db->get();
									    $item = $query->num_rows();

                                    	?>
					<tr>
						<td><?php echo $i; $i++;?></td>
						<td><?php echo $row['v_name'];?></td>
						<td><?php echo $row['v_contact_no'];?></td>
						<td>₹ <?php echo $row['purchase_total'];?></td>
						<td style="color: green;"><?php echo $item;?></td>
						<td><?php echo date('d/m/Y',$row['purchased_date']);?></td>
						<td><a href="<?php echo base_url('purchasedProduct/'.$row['purchase_id']); ?>"  class="btn btn-xs btn-danger">VIEW PRODUCTS</a></td>

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

