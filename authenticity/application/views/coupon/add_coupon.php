<div class="content-wrapper">
	<section class="content-header">
      <h1>Coupon</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Coupon</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Coupon/doAddCoupon'); ?>" method="post" name="cpform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Coupon Code</label>
				<div class="col-sm-6">
				<input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Coupon Code" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Discount Type</label>
				<div class="col-sm-6">
                    <select name="discount_type" id="offer_type" class="form-control select2" required>
                        <option>Select Discount Type</option>
						<option value="fixed_cart">Fixed Cart</option>
						<option value="percent">Percent</option>
                    </select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Coupon Amount</label>
				<div class="col-sm-6">
				<input type="number" name="coupon_amount" id="coupon_amount" class="form-control" placeholder="Coupon Amount" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date</label>
				<div class="col-sm-6">
					<div class="input-group date">
						<input type="text" name="start_date" class="form-control pull-right" id="datepicker" placeholder="yyyy-mm-dd" required autocomplete="off">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Expiry Date</label>
				<div class="col-sm-6">
					<div class="input-group date">
						<input type="text" name="expiry_date" class="form-control pull-right" id="datepicker1" placeholder="yyyy-mm-dd" required autocomplete="off">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Coupon Quantity</label>
				<div class="col-sm-6">
				<input type="number" name="users" id="users" class="form-control" placeholder="Coupon Quantity" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Usage Limit Per User</label>
				<div class="col-sm-6">
				<input type="number" name="usage_limit_per_user" id="usage_limit_per_user" class="form-control" placeholder="Usage Limit Per User" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Minimum Amount</label>
				<div class="col-sm-6">
				<input type="number" name="minimum_amount" id="minimum_amount" class="form-control" placeholder="Minimum Amount" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Discount Upto</label>
				<div class="col-sm-6">
				<input type="number" name="discount_upto" id="discount_upto" class="form-control" placeholder="Discount Upto" autocomplete="off" required>
				</div>
			</div>
			
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Add Coupon</button>
				<a href="<?php echo base_url("coupon");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section> 
</div>