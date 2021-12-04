<div class="content-wrapper">

	<section class="content-header">

		<h1>Slider</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url("AddSlider");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Slider</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>

					  <th>Slider Image</th>
					  <th>Main Category</th>
					  <th>Category</th>
					  <th>Sub Category</th>

					  <th>Action</th>

					</tr>

                </thead>

                <tbody>

				<?php if(isset($slider)){
                    //print_r($slider);
						foreach($slider as $row)

						{?>

					<tr>

						<td><img src="<?php echo base_url('assets/images/slider/').'/'.$row['image'];?>" style="width:22em;height:9em;"  class="img-responsive"/></td>
						  <td><?php echo $row['maincategory_name_en'] ?></td>

						  <td><?php echo $row['name_en'] ?></td>
						  <td><?php echo $row['subcategory_name_en'] ?></td>

						<td><a class="btn-warning btn btn-sm" href="<?php echo base_url('EditSlider/'.$row['slider_id']);?>">

	                        <i class="fa fa-pencil fa-lg"></i></a>&nbsp;&nbsp;<a class="btn-danger btn btn-sm " href="<?php echo base_url('DeleteSlider/'.$row['slider_id']);?>">

	                        <i class="fa fa-trash fa-lg"></i></a></td>

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

