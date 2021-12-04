<div class="content-wrapper">
	<section class="content-header">
		<h1>Stock</h1>
	</section>
	<section class="content">
		<div class="col-ms-12">
        <div class="box">
            <div class="box-header">
				<h3 class="box-title">DataTable View</h3>
			</div>
            <div class="box-body table-responsive">
				<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>Product Name(EN)</th>
					  <th>View Stock</th>
					</tr>
                </thead>
                <tbody>
				<?php if(isset($stock)){
						foreach($stock as $row)
						{?>
					<tr>
						<td><?php echo $row['proname_en'];?></td>
						<td><a href="<?php echo base_url('viewstock/'.$row['product_id']); ?>"  class="btn btn-sm btn-info">View Stock</a></td>
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
