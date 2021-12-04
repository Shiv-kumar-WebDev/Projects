<div class="content-wrapper">
 
	<section class="content-header">

		<h1>Category</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url("AddCategory");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Category</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>

					  <th>Sr. No.</th>
					  <th>Main Category Name</th>
					  <th>Name(En)</th>
					  <th>Image</th>
					  <th>Website Grid</th>
					  <th>Status</th>

					  <th>Action</th>

					</tr>

                </thead>

                <tbody>

				<?php if(isset($category)){
					$i=1;
						foreach($category as $row)

						{?>

					<tr>

						<td><?php echo $i;$i++;?></td>
						<td><?php echo $row['maincategory_name_en'];?></td>
						<td><?php echo $row['name_en'];?></td>
						<td><?php if(!empty($row['image'])) {?><img src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" style="width:100px;height:50px;" /><?php }else{?><img src="<?php echo base_url('assets/img/placeholder.png');?>" style="width:100px;height:50px;" /><?php } ?></td>
						<td><?php if ($row['cat_grid'] == 1) { ?>

							<a href="<?php echo base_url('GridStatus/'.$row['category_id']); ?>"  class="btn btn-sm btn-success">Already Added </a>

						   <?php } else { ?>

							<a href="<?php echo base_url('GridStatus/'.$row['category_id']); ?>" class="btn btn-sm btn-primary">Add to Grid</a>

						   <?php } ?></td>
						<td><?php if ($row['status'] == 1) { ?>

							<a href="<?php echo base_url('CategoryStatus/'.$row['category_id']); ?>"  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('CategoryStatus/'.$row['category_id']); ?>" class="btn btn-sm btn-danger">DeActive</a>

						   <?php } ?></td>

						<td><a class="btn-warning btn btn-sm" href="<?php echo base_url('EditCategory/'.$row['category_id']);?>">

	                        <i class="fa fa-pencil fa-lg"></i></a>
	                        
	                        <a href="<?php echo base_url('admin/Category/deleteStatus/'.$row['category_id']); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-lg"></i></a>
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

