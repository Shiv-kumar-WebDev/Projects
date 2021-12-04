<div class="content-wrapper">

	<section class="content-header">

		<h1>Country</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url("AddCountry");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Country</button></a>

				</div>
				

			</div>

            <div class="box-body table-responsive">
                
				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
						<th>Sr. No.</th>
						<th class="text-center">Country Name</th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($countrylist)){
					$i=1;

						foreach($countrylist as $row)

						{?>

					<tr>

						<td class="text-center"><?php echo $i; $i++;?></td>
						<td class="text-center"><?php echo $row['country_name'];?></td>				
						<td class="text-center"><?php if ($row['country_status'] == 1) { ?>

							<a href="<?php echo base_url('CountryStatus/'); ?><?php echo $row['country_id'];?> "  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('CountryStatus/'); ?><?php echo $row['country_id'];?> " class="btn btn-sm btn-danger">DeActive</a>

						   <?php } ?></td>

						
						<td class="project-actions text-center">
							<a class="btn-danger btn btn-sm " href="<?php echo base_url('DeleteCountry/');?><?php echo $row['country_id'];?> ">

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


