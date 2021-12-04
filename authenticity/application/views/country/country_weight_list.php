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

				<a href="<?php echo base_url("AddCountry_Weight");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Country</button></a>

				</div>
				

			</div>

            <div class="box-body table-responsive">
                
				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
						<th>Sr. No.</th>
						<th class="text-center">Country Name</th>
						<th class="text-center">Country Weight From</th>
						<th class="text-center">Country Weight To</th>
						<th class="text-center">Weight price</th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($weightlist)){
					$i=1;

						foreach($weightlist as $row)

						{?>

					<tr>

						<td class="text-center"><?php echo $i; $i++;?></td>
						<td class="text-center"><?php echo $row['country_name'];?></td>	
						<td class="text-center"><?php echo $row['c_weight_from'];?></td>	
						<td class="text-center"><?php echo $row['c_weight_to'];?></td>	
						<td class="text-center"><?php echo $row['c_weight_price'];?></td>				
						<td class="text-center"><?php if ($row['c_weight_status'] == 1) { ?>

							<a href="<?php echo base_url('Country_WeightStatus/'); ?><?php echo $row['c_weight_id'];?> "  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('Country_WeightStatus/'); ?><?php echo $row['c_weight_id'];?> " class="btn btn-sm btn-danger">DeActive</a>

						   <?php } ?></td>

						
						<td class="project-actions text-center">
	                        <a class="btn-warning btn btn-sm " href="<?php echo base_url('EditCountry_Weight/');?><?php echo $row['c_weight_id'];?> ">

	                        <i class="fa fa-pencil fa-lg"></i></a>
							<a class="btn-danger btn btn-sm " href="<?php echo base_url('DeleteCountry_Weight/');?><?php echo $row['c_weight_id'];?> ">

	                        <i class="fa fa-trash fa-lg"></i></a>
	                    </td>
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


