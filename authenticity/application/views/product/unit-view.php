<div class="content-wrapper">

	<section class="content-header">

		<h1>Unit</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add Unit</button>
				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>

					  <th>Unit Name(En)</th>
					 

					</tr>

                </thead>

                <tbody>

				<?php if(isset($unit)){

						foreach($unit as $row)

						{?>

					<tr>

						<td><?php echo $row['unit_option_en'];?></td>
						
						<!--td><a class="btn-success btn btn-xs btn-flat" href="<?php //echo base_url('Subunit/'.$row['id']);?>">Show Subunit</a-->
						</td>
						
					</tr>

					<?php } ?>

                    <?php }else{

                        echo "<tr><td colspan=3 align=center>No Recoreds Available.</td></tr>";

                    }?>

                </tfoot>

              </table>

            </div>

		</div>

		</div>

	</section>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Unit</h4>
      </div>
      <div class="modal-body">
         <form action="<?php echo base_url('Product/doAddunit'); ?>" method="post" name="uform" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Unit Name(En):</label>
            <input type="text" class="form-control" id="unti_en" name="unit_en" placeholder="unit" autocomplete="off" required>
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