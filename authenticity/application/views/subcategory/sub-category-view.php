<div class="content-wrapper">

	<section class="content-header">

		<h1>Sub Category</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url("AddSubCategory");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Sub Category</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					  <th>Sr. No.</th>
                      <th>Main Category Name(En)</th>
                      <th>Category Name(En)</th>
					  <th>Sub Category Name(En)</th>
					  <th>Image</th>
					  <th>Status</th>
                      <th>Action</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($subcategory)){
					$i=1;
                                    foreach($subcategory as $row)
                                    {?>
					<tr>
                                            <td><?php echo $i;$i++;?></td>
                                            <td><?php echo $row['maincategory_name_en'];?></td>
                                            <td><?php echo $row['name_en'];?></td>
											<td><?php echo $row['subcategory_name_en'];?></td>
											<td><?php if(!empty($row['subcategory_image'])) {?><img src="<?php echo base_url('assets/images/subcategory/').$row['subcategory_image'];?>" style="width:100px;height:50px;" /><?php }else{?><img src="<?php echo base_url('assets/img/placeholder.png');?>" style="width:100px;height:50px;" /><?php } ?></td>

						<td><?php if ($row['subcatstatus'] == 1) { ?>

							<a href="<?php echo base_url('SubCategoryStatus/'.$row['subcategory_id'].'/0'); ?>"  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('SubCategoryStatus/'.$row['subcategory_id'].'/1'); ?>" class="btn btn-sm btn-danger">DeActive</a>

						   <?php } ?>
						   <a href="<?php echo base_url('Copied_Subcat/'.$row['subcategory_id']); ?>"  class="btn btn-sm btn-info"><i class="fa fa-files-o"></i></a></td>

						<td>
                                                    <a class="btn-warning btn btn-sm " href="<?php echo base_url('EditSubCategory/'.$row['subcategory_id']);?>">

	                        <i class="fa fa-eye fa-lg"></i></a>&nbsp;&nbsp;<a class="btn-danger btn btn-sm" href="<?php echo base_url('DeleteSubCategory/'.$row['subcategory_id']);?>">

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

