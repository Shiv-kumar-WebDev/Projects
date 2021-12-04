<div class="content-wrapper">

	<section class="content-header">

		<h1>Waste</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?> 

        <div class="box">

            <div class="box-header"><h3 class="box-title"><a href="<?php echo base_url("admin/Waste/download_csv");?>"><button type="button"  class="btn btn-primary pull-left"><i class="fa fa-download"></i> DOWNLOAD CSV</button></a></h3>

				<div class="pull-right" style="margin-left:10px;">

				<a href="<?php echo base_url("AddWaste");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Waste</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					  <th>S.No</th>
					  <th>Vendor name</th>
					  <th>Vendor contact No</th>
					  <th>Waste Total</th>
					  <th>Total Items</th>
					  <th>Created</th>
                      <th>Action</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($waste)){ $i=1;
                                    foreach($waste as $row)
                                    {
                                    	$this->db->select("*");
									    $this->db->from("waste_products");
									    $this->db->where("waste_id",$row['waste_id']);
									    $query = $this->db->get();
									    $item = $query->num_rows();

                                    	?>
					<tr>
						<td><?php echo $i; $i++;?></td>
						<td><?php echo $row['v_name'];?></td>
						<td><?php echo $row['v_contact_no'];?></td>
						<td>₹ <?php echo $row['waste_total'];?></td>
						<td><?php echo $item;?></td>
						<td><?php echo date('d/m/Y',$row['waste_date']);?></td>
						<td><a href="<?php echo base_url('WasteProduct/'.$row['waste_id']); ?>"  class="btn btn-xs btn-danger">VIEW PRODUCTS</a></td>

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

