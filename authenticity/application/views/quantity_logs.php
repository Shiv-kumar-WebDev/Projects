<div class="content-wrapper">

	<section class="content-header">

		<h1>Quantity Logs</h1>

	</section>

	<section class="content"> 

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?> 

        <div class="box">

            <div class="box-header">
            	<h3 class="box-title">
            		<?php if (empty($date)) {?>
            			<a href="<?php echo base_url("admin/Dashboard/download_csv");?>"><button type="button"  class="btn btn-primary pull-left"><i class="fa fa-download"></i> DOWNLOAD CSV</button></a>
            		<?php }else{ ?>
            			<a href="<?php echo base_url("admin/Dashboard/download_csv/".$date);?>"><button type="button"  class="btn btn-primary pull-left"><i class="fa fa-download"></i> DOWNLOAD CSV</button></a>
            		<?php } ?>

            	</h3>
            <hr/>
         	<form action="<?php echo base_url('Quantity_Log'); ?>" method="post"  class="form-horizontal">
           	 <div class="form-group-row">
				<label class="col-sm-1 control-label">From</label>
				<div class="col-sm-2">
					<div class="input-group date">
						<input type="text" name="start_date" required id="start_date" class="form-control pull-right datepickerdata"  placeholder="yyyy-mm-dd"  autocomplete="off">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<label class="col-sm-1 control-label">To</label>
				<div class="col-sm-2">
					<div class="input-group date">
						<input type="text" name="end_date" required id="end_date" class="form-control pull-right datepickerdata"  placeholder="yyyy-mm-dd"  autocomplete="off">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					</div>
				</div>			
			<div class="col-sm-6">
				<button type="Submit" class="btn btn-info pull-left">FILTER</button>&nbsp;
			</div>
			</form>  
				<div class="pull-right" style="margin-left:10px;">
				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					  <th>S.No</th>
					  <th>Type</th>
					  <th>Product Name</th>
					  <th>Variant</th>
					  <th>Total Quantity</th>
					  <th>Date</th>
					</tr>

                </thead>

                <tbody>

				<?php if(isset($logs)){ $i=1;
                    foreach($logs as $row){?>
					<tr style="text-transform: uppercase;">
						<td><?php echo $i; $i++;?></td>
						<td><?php echo $row['type'];?></td>
						<td><?php echo $row['proname_en'];?></td>
						<td><?php echo $row['size'];?> - <?php echo $row['color'];?></td>
						<td><?php echo $row['quantity'];?></td>
						<td><?php echo date('d/m/Y',$row['created']);?></td>
					</tr>

					<?php } ?>

                    <?php }else{

                        echo "<tr><td colspan=10 align=center>No Recoreds Available.</td></tr>";

                    }?>

                </tfoot>

              </table>

            </div>

		</div>

		</div>

	</section>

</div>

