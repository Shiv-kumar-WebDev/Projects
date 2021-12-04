<div class="content-wrapper">

	<section class="content-header">

		<h1>Users</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

	<?php $this->load->view("common/errors");?>
        <div class="box">

            <div class="box-header">
            	<h3 class="box-title"><a href="<?php echo base_url("admin/User/download_csv");?>"><button type="button"  class="btn btn-primary pull-left"><i class="fa fa-download"></i> DOWNLOAD CSV</button></a></h3>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>

					  <th>Sr. No.</th>
					  <th>User Name</th>

					  <th>Email</th>

					  <th>Phone No</th>

					  <th>Total Orders</th>

					  <th>Total Purchase</th>

					  <th>Create Date</th>

					  <th>Status</th>
					  
					    <th>Action</th>

					</tr>

                </thead>

                <tbody>

				<?php if(isset($user)){
						$i=1;
						foreach($user as $row)
						{
							$this->db->select("orders.*");
						    $this->db->from("orders");
						    $this->db->where("userid",$row['user_id']);
						    $query = $this->db->get();
						    $item = $query->result_array();
						    $ttlorder = count($item);
						    $total_purchase = 0;
						    if ($ttlorder) {
						    	foreach ($item as $value) {
						    		$total_purchase += $value['total_price'];
						    	}
						    }
						?>

					<tr>

						<td><?php echo $i;$i++;?></td>
						<td><?php echo $row['username'];?></td>

						<td><?php echo $row['email'];?></td>

						<td><?php echo $row['user_phone'];?></td>

						<td><?php echo $ttlorder;?></td>
						<td><?php echo $total_purchase;?></td>

						<td><?php echo $row['user_create_date'];?></td>

						<td><?php if ($row['user_status'] == 1) { ?>

							<a href="<?php echo base_url('UserStatus/'.$row['user_id']); ?>"  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('UserStatus/'.$row['user_id']); ?>" class="btn btn-sm btn-danger">DeActive</a>

						   <?php } ?></td>

					<td>	<a href="<?php echo base_url('admin/user/DeleteStatus/'.$row['user_id']); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-lg"></i></a></td>

					</tr>

					<?php } ?>

                    <?php }else{

                        echo "<tr><td colspan=6 align=center>No Recoreds Available.</td></tr>";

                    }?>

                </tfoot>

              </table>

            </div>

		</div>

		</div>

	</section>

</div>

