<div class="content-wrapper">
	<section class="content-header">
		<h1>Page</h1>
	</section>
	<section class="content">
		<div class="col-ms-12">
		<?php $this->load->view("common/errors");?>
        <div class="box">
            <div class="box-header">
				<h3 class="box-title">DataTable View</h3>
				<div class="pull-right">
				<a href="<?php echo base_url("AddPage");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Page</button></a>
				</div>
			</div>
            <div class="box-body table-responsive">
				<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>Title</th>
					  <th>Slug</th>
					  <th>Description</th>
					  <th>Action</th>
					</tr>
                </thead>
                <tbody>
				<?php if(isset($page)){
						foreach($page as $row)
						{?>
					<tr>
						<td><?php echo $row['page_title'];?></td>
						<td><?php echo $row['page_slug'];?></td>
						<td><?php echo $row['page_description'];?></td>
						<td><a class="btn-danger btn btn-sm " href="<?php echo base_url('EditPage/'.$row['page_id']);?>">
	                        <i class="fa fa-pencil fa-lg"></i></a></td>
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
