<div class="content-wrapper">
	<section class="content-header">
		<h1>View Stock</h1>
	</section>
	<section class="content">
		<div class="col-ms-12">
        <div class="box">
            <div class="box-header">
				<h3 class="box-title">DataTable View</h3>
				<div class="pull-right">
				<a href="<?php echo base_url("Stock");?>"><button type="button" class="btn btn-danger">Back</button></a>

				</div>
			</div>
            <div class="box-body table-responsive">
				<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>Product Name(En)</th>
					  <th>Unit(En)</th>
					  <th>Variant</th>
					  <th>Total qty</th>
					</tr>
                </thead>
                <tbody>
				<?php if(isset($viewstock)){
						foreach($viewstock as $row)
						{?>
					<tr>
						<td><?php echo $row['proname_en'];?></td>
						<td><?php echo $row['unit_option_en'];?></td>
						
						<td><?php echo $row['subunit'];?></td>
						<td><?php echo $row['total_qty'];?></td>
					</tr>
					<?php } ?>
                    <?php }else{
                        echo "<tr><td colspan=7 align=center>No Recoreds Available.</td></tr>";
                    }?>
                </tfoot>
              </table>
            </div>
		</div>
		</div>
	</section>
</div>
