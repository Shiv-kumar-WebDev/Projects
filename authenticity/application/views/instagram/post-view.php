<div class="content-wrapper">

	<section class="content-header">

		<h1>Product</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url("AddPost");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Instagram Post</button></a>

				</div>
				

			</div>

            <div class="box-body table-responsive">
                
				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
						<th>Sr. No.</th>
						<th class="text-center">Post Image</th>
						<th class="text-center">Post Url </th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($instapost)){
					$i=1;

						foreach($instapost as $row)

						{?>

					<tr>

						<td class="text-center"><?php echo $i; $i++;?></td>
						<td><?php if(!empty($row['post_image'])) {?><img src="<?php echo base_url('assets/images/instagram/').'/'.$row['post_image'];?>" style="width:100px;height:50px;" /><?php }else{?><img src="<?php echo base_url('assets/img/placeholder.png');?>" style="width:100px;height:50px;" /><?php } ?></td>
						<td class="text-center"><?php echo $row['post_url'];?></td>
					

						
						<td class="text-center"><?php if ($row['poststatus'] == 1) { ?>

							<a href="<?php echo base_url('PostStatus/'); ?><?php echo $row['instagram_id'];?> "  class="btn btn-sm btn-success">Active</a>

						   <?php } else { ?>

							<a href="<?php echo base_url('PostStatus/'); ?><?php echo $row['instagram_id'];?> " class="btn btn-sm btn-danger">DeActive</a>

						   <?php } ?></td>

						
						<td class="project-actions text-center">
							<a class="btn-danger btn btn-sm " href="<?php echo base_url('DeletePost/');?><?php echo $row['instagram_id'];?> ">

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


