<style>
.trtotal{
    font-size: 14px;
    font-family: monospace;
    color: black;
}
.trttotal{
    font-size: 15px;
    font-family: monospace;
    color: #d61414
}    
.table-bordered {
    border: 1px solid #757575 !important;

}
</style>
<?php 
		 $order_id=$this->uri->segment(2);
		$this->db->select("*");
        $this->db->from("orders");
		$this->db->where("order_id", $order_id);
        $query = $this->db->get();
        $result= $query->row_array();
		//print_r($result);
			?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Product Order</h1>
	</section>
	
	<section class="content">
		<div class="col-ms-12">
        <div class="box">
            <div class="box-header">
				
			<div class="pull-right">
				<a href="<?php echo base_url("Order");?>"><button type="button"  class="btn btn-danger pull-left"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>&nbsp;

			<!-- <a href="javascript:void(0);" id="print_button2" onclick="printPageArea('content')">/ -->
					<!-- <button id="printpage"  class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button> -->
				<!-- </a>  -->
				
				<button type="button"  class="btn btn-success" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print</button> 
					<a target="_blank" href="<?php echo base_url("Orderpdf/").$order_id;?>"><button type="button"  class="btn btn-warning" ><i class="fa fa-print" aria-hidden="true"></i> PDF</button></a>
				
				</div>
			</div>
			
            <div class="box-body table-responsive" id="content">
                
                	<form action="<?php echo base_url('admin/Order/status') ?>" method="post" class="form-horizontal">
           	 <div class="form-group-row">
				<input type="hidden" id="orderid" name="orderid" value="<?php echo $result['order_id'] ?>">
                <input type="hidden" id="uid" name="uid" value="<?php echo $result['userid'] ?>">
				<label class="col-sm-4 control-label">Change Status</label>
				<div class="col-sm-4">
			     <select name="cstatus" id="cstatus" class="form-control">
			     	<option value="" selected="" disabled="">Please Select</option>
			       <option value="pending" <?php if($result['order_status'] == 'pending'){ echo 'selected = "selected"';}?>>Pending</option>
    						        <option value="cancel" <?php if($result['order_status'] == 'cancel'){ echo 'selected = "selected"';}?>>Cancle</option>
    						        <option value="delivered" <?php if($result['order_status'] == 'delivered'){ echo 'selected = "selected"';}?>>Mark As Delivered</option>
    						        <option value="pickup" <?php if($result['order_status'] == 'pickup'){ echo 'selected = "selected"';}?>>Pickup</option>
                 </select>

				</div>
			
			<div class="col-sm-3">
				<button type="submit" class="btn btn-info pull-left">Submit</button>&nbsp;
				
			</div>
			  
			</div></form>
			
			<br><br>
			<div id="con">
                
            <table id="example1" class="table table-bordered table-striped">
            
            <tbody>
            
            <?php 

            $CI =& get_instance();
			$data['settings']=$CI->Settings_model->getsettings();

			//print_r($data['settings']);


            foreach ($data['settings'] as $site_settings)
            {
            	 if($site_settings['name'] == 'order_name') 
			    {
			        $order_name = $site_settings['value'];
			    }
			     if($site_settings['name'] == 'gst_no') 
			    {
			        $gst_no = $site_settings['value'];
			    }
            }
            if(isset($orderproduct)){
			?>
            <tr style="border: solid 1px;">
            <td>
            	<strong style="text-transform: uppercase;"><?php echo $order_name;?></strong><br>
            	<strong>Customer Mobile:</strong> +91-<?php echo $details[0]['user_phone'];?><br>
            	<strong>GST : <?php echo $gst_no;?></strong>
            </td>
			<td>
				<strong>Customer Name:</strong> <?php echo $details[0]['username'];?><br>
				<strong>Order No:</strong> <?php echo $details[0]['order_id'];?><br>
				<strong>Order Placed On:</strong> <?php echo $details[0]['order_date'];?><br>
				<strong>Address:</strong> <?php echo $details[0]['street_address'];?>,<br><?php echo $details[0]['pincode'];?>,<?php echo $details[0]['city'];?>,<?php echo $details[0]['state'];?><br>
			</td>
            				            
            </tr>
            			        
            <?php } ?>
            
            </tbody>
            </table>
            
            			    
				<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr >
					  
					  <th colspan="6">Product Name</th>
					  <th>Product Price</th>
					  <th>Qty</th>
					  <th>Total Price</th>

					</tr>
                </thead>
                <tbody>
                    
				<?php if(isset($orderproduct)){
						$discount = 0;
						foreach($orderproduct as $row)
						{?>
					<tr>
						<td colspan="6"><?php echo $row['proname_en'];?></td>
						<td >₹ <?php echo $row['disct_price'];?></td>						
						<td><?php echo $row['po_qty']?></td>
						<td>₹ <?php echo  $row['po_total_price'];?></td>
					</tr>
					
					<?php $tprice[]=$row['po_total_price'];?>
					<?php } ?>
					<tr class="trtotal">
					    <td colspan="8" style="text-align: right;">Total Price</td>
					    <td>₹ <?php echo $details[0]['sub_price'];?></td>
					</tr>
					<tr class="trtotal">
					    <td colspan="8" style="text-align: right;">Delivery Charges</td>
					    <td>(+)₹ <?php echo $details[0]['delivery_charge'];?></td>
					</tr>
					<tr class="trtotal">
					    <td colspan="8" style="text-align: right;">Discount</td>
					    <td>(-)₹ <?php echo $details[0]['coupon_discount'];?></td>
					</tr>
					<?php if(!empty($row['coupon_code'])){?>
					<tr class="trtotal">
					    <td colspan="8" style="text-align: right;">Coupon - <?php echo $row['coupon_code'];?> - Discount</td>
					    <td>₹ <?php echo $row['coupon_discount'];?></td>
					</tr>
					<?php } ?>
					<tr class="trttotal">
					    <td colspan="8" style="text-align: right;">Total Order Amount</td>
					    <td>₹ <?php echo $details[0]['total_price'];?></td>
					</tr>
                    <?php }else{
                        echo "<tr><td colspan=11 align=center>No Recoreds Available.</td></tr>";
                    }?>
                </tfoot>
              </table>
            </div>

			</div>
		</div>
		</div>
	</section>
	
</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/jq.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>
<script type="text/javascript">
//   function printPageArea(areaID){
//     var printContent = document.getElementById(areaID);
//     var WinPrint = window.open('', '', 'width=900,height=650');
//     WinPrint.document.write(printContent.innerHTML);
//     WinPrint.document.close();
//     WinPrint.focus();
//     WinPrint.print();
//     WinPrint.close();
// }
$('#printpage').click(function(){
	$('.con').print();
	var printContent = document.getElementById('con');
    var WinPrint = window.open('', '', 'width=900,height=700');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
})
</script>
