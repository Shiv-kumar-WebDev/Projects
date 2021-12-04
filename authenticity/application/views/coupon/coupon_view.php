<div class="content-wrapper">
	<section class="content-header">
		<h1>Coupon</h1>
	</section>
	<section class="content">
		<div class="col-ms-12">
		<?php $this->load->view("common/errors");?>
        <div class="box">
            <div class="box-header">
				<h3 class="box-title">DataTable View</h3>
				<div class="pull-right">
				<a href="<?php echo base_url("add_coupon");?>"><button type="button" class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Coupon</button></a>
				</div>
			</div>
            <div class="box-body table-responsive">
				<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>Coupon Code</th>
					  <th>Coupon Amount</th>
					  <th>Max Per Coupon</th>
					  <th>Minimum Amount</th>
					  <th>Start Date</th>
					  <th>Expiry Date</th>
					  <th>Status</th>
					  <th>Action</th>
					</tr>
                </thead>
                <tbody>
				<?php if(isset($coupon)){
						foreach($coupon as $row)
						{?>
					<tr>
						<td><?php echo $row['coupon_code'];?></td>
						<td><?php echo $row['coupon_amount'];?></td>
						<td><?php echo $row['usage_limit_per_user'];?></td>
						<td><?php echo $row['minimum_amount'];?></td>
						<td><?php echo $row['start_date'];?></td>
						<td><?php echo $row['expiry_date'];?></td>
						<td><?php $currdate = date('Y-m-d');
								if($currdate >= $row['expiry_date'])
								{
									echo '<div class="btn-danger btn btn-sm ">Expired</div>';
								}else{
									echo '<div class="btn-primary btn btn-sm ">Available</div>';
								}
						   ?>
							
						</td>
						<td><a class="btn-warning btn btn-sm " href="<?php echo base_url('edit_coupon/'.$row['coupon_id']);?>"><i class="fa fa-pencil fa-lg"></i></a>
							<a class="btn-danger btn btn-sm " href="<?php echo base_url('delete_coupon/'.$row['coupon_id']);?>"><i class="fa fa-trash fa-lg"></i></a></td>
					</tr>
					<?php } ?>
                    <?php }else{
                        echo "<tr><td colspan=8 align=center>No Recoreds Available.</td></tr>"; 
                    }?>
                </tfoot>
              </table>
            </div>
		</div>
		</div>
	</section>
</div>
