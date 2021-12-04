<div class="content-wrapper">

	<section class="content-header">

		<h1>Attribute Option</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url("AddAttr_Optn");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Option</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
                      <th>Attribute Name</th>
					  <th>Attribute Option Name</th>
					  <th>Status</th>
                      <th>Action</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($attr_optn)){
                                    foreach($attr_optn as $row)
                                    {?>
					<tr>
                                            <td><?php echo $row['attr_name'];?></td>
											<td><?php echo $row['optn_name'];?></td>

						<td><?php if ($row['optn_status'] == 1) { ?>

							<a href="<?php echo base_url('Attr_OptnStatus/'.$row['optn_id'].'/0'); ?>"  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('Attr_OptnStatus/'.$row['optn_id'].'/1'); ?>" class="btn btn-sm btn-danger">DeActive</a>

						   <?php } ?></td>

						<td><a class="btn-warning btn btn-sm " href="<?php echo base_url('EditAttr_Optn/'.$row['optn_id']);?>">

	                        <i class="fa fa-eye fa-lg"></i></a>&nbsp;&nbsp;<a class="btn-danger btn btn-sm" href="<?php echo base_url('DeleteAttr_Optn/'.$row['optn_id']);?>">

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

