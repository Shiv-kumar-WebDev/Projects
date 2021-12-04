<div class="content-wrapper">

	<section class="content-header">

		<h1>Users Review</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

        <div class="box">

            <div class="box-header">
	<?php $this->load->view("common/errors");?>
				<h3 class="box-title">DataTable View</h3>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>

					  <th>Product Name</th>

					  <th>User Name</th>

					  <th>User Email</th>

					  <th>User Rating</th>

					  <th>User Review</th>

					  <th>Submitted Date</th>

					  <th>Status</th>
					  
					    <th>Action</th>

					</tr>

                </thead>

                <tbody>

				<?php if(isset($reviews)){

						foreach($reviews as $row)

						{?>

					<tr>

						<td><?php echo $row['proname_en'];?></td>

						<td><?php echo $row['user_name'];?></td>

						<td><?php echo $row['user_email'];?></td>

						<td><?php echo $row['user_rating'];?></td>

						<td><?php echo $row['user_review'];?></td>

						<td><?php echo $row['submitted_date'];?></td>

						<td><?php if ($row['review_status'] == 1) { ?>

							<a href="<?php echo base_url('reviewStatus/'.$row['review_id']); ?>"  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('reviewStatus/'.$row['review_id']); ?>" class="btn btn-sm btn-danger">InActive</a>

						   <?php } ?></td>

					<td>	<a href="<?php echo base_url('admin/user/deletereview/'.$row['review_id']); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-lg"></i></a></td>

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

