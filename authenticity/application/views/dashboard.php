<div class="content-wrapper">
	<section class="content-header">
      <h1>Dashboard</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $totaluser = (count($user));?></h3>
			  <p>Total User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('User');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
				<h3><?php echo $totalorder = (count($order));?></h3><p>New Orders</p>
			</div>
			<div class="icon">
			  <i class="ion ion-bag"></i>
			</div>
			<a href="<?php echo base_url('Order');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div>

		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo $totalmaincategory = (count($maincategory));?></h3><p>Total Main Category</p>
				</div>
				<div class="icon">
				  <i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?php echo base_url('maincategory');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
       
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo $totalcategory = (count($category));?></h3><p>Total Category</p>
				</div>
				<div class="icon">
				  <i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?php echo base_url('Category');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
       
       <div class="col-lg-3 col-xs-6">
		  <!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo $totalsubcategory = (count($subcategory));?></h3><p>Total Sub Category</p>
				</div>
				<div class="icon">
				  <i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?php echo base_url('Subcategory');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
        <div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-red">
			<div class="inner">
			  <h3><?php echo $totalproduct = (count($product));?></h3><p>Total Product</p>
			</div>
			<div class="icon">
			  <i class="ion ion-pie-graph"></i>
			</div>
			<a href="<?php echo base_url('Product');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
        </div>
       </div><br/><br/>
          
       
	
    </section>
</div>

	


  
