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
<div class="content-wrapper">
	<section class="content-header">
		<h1>Product Order</h1>
	</section>
	
	<section class="content">
		<div class="col-ms-12">
        <div class="box">
            <div class="box-header">
				
			<div class="pull-right">
				<a href="<?php echo base_url("Order");?>"><button type="button"  class="btn btn-success pull-left"></i> Back</button></a>
				<a href="javascript:void(0);" id="print_button2" onclick="printPageArea('content')"><button type="button"  class="btn btn-success pull-left"></i> Print</button></a>
				
				</div>
			</div>
            <div class="box-body table-responsive" id="content">
                
            <table id="example1" class="table table-bordered table-striped">
            
            <tbody>
            
            <?php if(isset($orderproduct)){
						foreach($orderproduct as $row)
						?>
            <tr style="border: solid 1px;">
            <td><strong>M/s Narang Brothers</strong><br><strong>Mobile:</strong> +91-9728888877<br><strong>GST: 06AISPN9520A1Z8</strong></td>
			<td><strong>Customer Name:</strong> <?php echo $row['first_name'].'  '.$row['last_name'];?><br><strong>Address:</strong> <?php echo $row['address'];?> <br><strong>Mobile:</strong> <?php echo $row['user_phone'];?><br><strong>Order No:</strong> <?php echo $row['order_id'];?><br><strong>Order Place On:</strong> <?php echo $row['order_date'];?><br><strong>Delivery Date:</strong> <?php echo $row['delivery_date'];?></td>
            				            
            </tr>
            			        
            <?php } ?>
            
            </tbody>
            </table>
            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr >
					  
					  <th colspan="6">Product Name</th>
					  <th>Variant</th>
					  <th>Qty</th>
					  <th>Price</th>
					  <th>Total Price</th>

					</tr>
                </thead>
                <tbody>
                    
				<?php if(isset($orderproduct)){
						foreach($orderproduct as $row)
						{?>
					<tr>
						<td colspan="6"><?php echo $row['proname_en'];?></td>
						
						<td><?php echo $row['subunit'];?> <?php echo $row['unit_option_en'];?></td>
						<td><?php echo $row['po_qty'];?></td>
						<td><?php echo $row['discount_price'];?></td>
						<td><?php echo $row['po_qty'] * $row['discount_price'];?></td>
					</tr>
					
					<?php $tprice[]=$row['po_qty'] * $row['discount_price'];?>
					<?php } ?>
					
					<tr class="trtotal">
					    <td colspan="9" style="text-align: right;">Total Price</td>
					    <td><?php echo array_sum($tprice);?></td>
					</tr>
					<tr class="trtotal">
					    <td colspan="9" style="text-align: right;">Delivery Charges</td>
					    <td><?php echo $row['delivery_charge'];?></td>
					</tr>
					<?php if(!empty($row['coupon_code'])){?>
					<tr class="trtotal">
					    <td colspan="9" style="text-align: right;">Coupon - <?php echo $row['coupon_code'];?> - Discount</td>
					    <td><?php echo $row['coupon_discount'];?></td>
					</tr>
					<?php } ?>
					<tr class="trttotal">
					    <td colspan="9" style="text-align: right;">Total Order Amount</td>
					    <td><?php echo $row['sub_total'];?></td>
					</tr>
                    <?php }else{
                        echo "<tr><td colspan=11 align=center>No Recoreds Available.</td></tr>";
                    }?>
                </tfoot>
              </table>
            </div>
		</div>
		</div>
	</section>
	
</div>

<script type="text/javascript">
  function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=900,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
</script>
