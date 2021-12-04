<div class="content-wrapper">

	<section class="content-header">

		<h1>Copied Sub-Category</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url('Subcategory');?>"><button type="button"  class="btn btn-danger pull-left">Back</button></a>
				<a href="<?php echo base_url('Copy_Subcat/'.$subcatid);?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Copy Sub-category</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					  <th>Sr. No.</th>
					  <th>Sub Category Name</th>
                      <th>Main Category Name</th>
                      <th>Category Name</th>
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
											<td><?php echo $row['subcategory_name_en'];?></td>
                                            <td><?php echo $row['maincategory_name_en'];?></td>
                                            <td><?php echo $row['name_en'];?></td>

						<td>
                             <a class="btn-danger btn btn-sm" href="<?php echo base_url('DeleteSubCategory/'.$row['subcategory_id']);?>">

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

