<div class="content-wrapper">

	<section class="content-header">

		<h1>Logo</h1>

	</section>

	<section class="content">

		<div class="col-ms-12">

		<?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">

				<h3 class="box-title">DataTable View</h3>

				<div class="pull-right">

				<a href="<?php echo base_url("Addlogo");?>"><button type="button"  class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Logo</button></a>

				</div>

			</div>

            <div class="box-body table-responsive">

				<table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>

					  <th>Logo Image</th>
					  <th>Site name</th>
					  

					  <th>Action</th>

					</tr>

                </thead>

                <tbody>

				<?php if(isset($logo)){
                    //print_r($logo['site']);//die;
						?>

					<tr>

						<td><img src="<?php echo base_url('assets/logo').'/'.$logo['logo'];?>" style="width:13em;height:4em;"  class="img-responsive"/></td>

						  <td><?php echo $logo['site'] ?></td>
						  
						<td><a class="btn-danger btn btn-sm " href="<?php echo base_url('Editlogo/'.$logo['id']);?>">

	                        <i class="fa fa-pencil fa-lg"></i></a>&nbsp;&nbsp;
							</td>

					</tr>

					

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

