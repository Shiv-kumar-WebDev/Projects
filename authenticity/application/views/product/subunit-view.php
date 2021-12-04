
<div class="content-wrapper">

	<section class="content-header">

		<h1>Subunit</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				
				<div class="pull-right" style="margin-left: 10px;">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal11" ><i class="fa fa-plus"></i> Add SubUnit</button>

				</div>
				<div class="pull-right">
				<a href="<?php echo base_url("Unit");?>"><button type="button" class="btn btn-danger">Back</button></a>

				</div>
				
			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>

					  <th>Unit Name(En)</th>
					  <th>Subunit Name(En)</th>
					   <th>Status</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($subunit)){

						foreach($subunit as $row)

						{?>

					<tr>
						<td><?php echo $row['unit_option_en'];?></td>
						<td><?php echo $row['subunit_option_en'];?></td>
							<td><?php if ($row['subunit_status'] == 1) { ?>
							<a href="<?php echo base_url('subunitStatus/'.$row['subunit_id']); ?>"  class="btn btn-xs btn-warning">Active</a>
						   <?php } else { ?>
							<a href="<?php echo base_url('subunitStatus/'.$row['subunit_id']); ?>" class="btn btn-xs btn-warning">DeActive</a>
						   <?php } ?></td>
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



<div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Subunit</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Product/doAddsubunit/'.$unitid); ?>" method="post" name="suform" enctype="multipart/form-data">
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Unit:</label>
            <input type="text" class="form-control" id="unit_id" name="unit_id" placeholder="Subunit" value="<?php echo $unit[0]['unit_option_en'].'---->'.$unit[0]['unit_option_ar']; ?>" disabled >
          </div>
		  
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subunit Name(En):</label>
            <input type="text" class="form-control" id="subunit_en" name="subunit_en" placeholder="Subunit" autocomplete="off" required>
          </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
	  </form>
      </div>
    </div>
  </div>
</div>