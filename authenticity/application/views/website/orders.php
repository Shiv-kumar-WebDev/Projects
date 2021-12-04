
    
    <div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
        	<div class="container">
            	<div class="breadcrumbs"><a href="index.html" title="Back to the home page">Account</a> <span aria-hidden="true">|</span> <span>My Orders</span></div>
            </div>
        </div>
        <!--End Breadcrumbs-->
        <!--Page Title with Image-->
        <div class="page-title"><h1>My Orders</h1></div>
        <!--End Page Title with Image-->
        <div class="container">
            <div class="row">
				<!--Main Content-->
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<form action="#">
                        <div class="wishlist-table table-content table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    	<th class="product-name text-center alt-font">order id</th>
                                        <th class="product-price text-center alt-font">purchesed date</th>
                                        <th class="product-name alt-font">status</th>
                                        <th class="product-price text-center alt-font">total Price</th>
                                        <th class="product-price text-center alt-font">Cancel Order</th>
                                        <th class="product-price text-center alt-font">Track Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order) {?>
                                        <tr>
                                            <td class="product-remove text-center" valign="middle"> <?php echo $order['order_id']; ?></td>
                                            <td class="product-remove text-center" valign="middle"> <?php echo $order['order_date']; ?></td>
                                            <td class="product-remove text-center" valign="middle"> 
                                                <?php if($order['order_status']==0){ ?>
                                                    <span class="badge badge-warning">Pending</span>
                                                <?php }else if($order['order_status']==1){ ?>
                                                    <span class="badge badge-danger">Cancel</span>
                                                <?php }else if($order['order_status']==2){ ?>
                                                    <span class="badge badge-success">delivered</span>
                                                <?php }else if($order['order_status']==3) { ?>
                                                    <span class="badge badge-primary">Pickup</span>
                                                <?php }else if($order['order_status']==5) { ?>
                                                    <span class="badge badge-secondary">shipped</span>
                                                <?php }  ?>
                                                   </td>
                                            <td class="product-remove text-center" valign="middle"> ₹ <?php echo $order['total_price']; ?>.00</td>
                                            <td class="product-remove text-center" valign="middle">
                                            <?php if($order['order_status']==0){ ?>
                                            <a href="<?php echo base_url('landing/cancelpro'); ?>?order_id=<?php echo $order['order_id']; ?>" class="btn btn-danger" >Cancel Order</a>
                                            <?php }else if($order['order_status']==1){ ?>
                                            <a class="btn btn-warning" >Canceled</a>
                                            <?php }else if($order['order_status']==2){ ?>
                                            <a class="btn btn-success" >Delivered</a>
                                            <?php } else { ?>
                                            <a class="btn btn-primary" >Picked Up</a>
                                            <?php } ?>

                                            </td>
                                            <td class="product-remove text-center" valign="middle"> <a href="<?php echo base_url('landing/track_order'); ?>/<?php echo $order['order_id']; ?>" class="btn btn-danger" >Track Order</a></td>
                                        </tr>
                                    <?php } ?>    
                                </tbody>
                            </table>
                        </div>
                    </form>                   
               	</div>
				<!--End Main Content-->
			</div>
        
        </div><!--End Body Container-->
        
    </div><!--End Page Wrapper-->