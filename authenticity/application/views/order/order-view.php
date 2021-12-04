<div class="content-wrapper">
	<section class="content-header">
		<h1>Order</h1>
	</section>
	<section class="content">
		<div class="col-ms-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">DataTable View</h3><hr/>
         	<form action="<?php echo base_url('Order/filter_order'); ?>" method="post"  class="form-horizontal">
           	 <div class="form-group-row">
				<label class="col-sm-1 control-label">Start Date</label>
				<div class="col-sm-2">
					<div class="input-group date">
						<input type="text" name="start_date" id="start_date" class="form-control pull-right datepickerdata"  placeholder="yyyy-mm-dd"  autocomplete="off">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<label class="col-sm-1 control-label">End Date</label>
				<div class="col-sm-2">
					<div class="input-group date">
						<input type="text" name="end_date" id="end_date" class="form-control pull-right datepickerdata"  placeholder="yyyy-mm-dd"  autocomplete="off">
						<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<label class="col-sm-1 control-label">Status</label>
				<div class="col-sm-2">
			     <select name="cstatus" id="cstatus" class="form-control" >
			     	<option value selected disabled>Please Select</option>
			        <option value="0">Pending</option>
			        <option value="1">Cancle</option>
			        <option value="2">Mark As Delivered</option>
			        <option value="3">Pickup</option>
			        <option value="4">Incheckout</option>
			        <option value="5">Shipped</option>
                 </select>

				</div>
			
			<div class="col-sm-3">
				<button type="Button" id="filter" class="btn btn-info pull-left">Submit</button>&nbsp;
				<button type="reset" class="btn btn-danger">Reset</button>
			</div>
			</form>  
			</div>
		  
				
			</div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
            <div class="box-body table-responsive">
			<table id="example" class="table table-bordered table-striped">

                <thead>
					<tr>
					<th>Sr. No</th>
					  <th>Order Id</th>
					  <th>Customer Name</th>
					  <th>Order date</th>
					  <th>Delivery Date</th>
					  <th>Pyment Method</th>
					  <th>Total Price</th>
					  <th>Total Item</th>
					  
					  <th>View Product Orders</th>
					  <th>Current status</th>
					 <!-- <th>Status</th>-->

					</tr>
                </thead>
             <tbody>
				<?php 
				$i=1;
				

				if(isset($order)){
						foreach($order as $row)
						{
    						$this->db->select("*");
						    $this->db->from("product_orders");
						    $this->db->where("order_id",$row['order_id']);
						    $query = $this->db->get();
						    $item = $query->num_rows();
						?>
					<tr>
						<th><?php echo $i;$i++;?></th>
						<th><?php echo $row['order_id'];?></th>
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['order_date'];?></td>
						<td><?php echo $row['delivery_date'];?></td>
					    <td><?php if($row['pyment_method']=='0'){ echo '<span class="label label-primary">NOT PAID YET</span>';} else if($row['pyment_method']=='1'){ echo '<span class="label label-danger">Net Banking</span>';}else if($row['pyment_method']=='2'){ echo '<span class="label label-success">Credit card/Debit card </span>';}else{echo '<span class="label label-warning">Wallate</span>';}?></td>
						<td><?php echo $row['total_price'];?></td>
						<td><?php echo $item;?></td>
					
						<td><a href="<?php echo base_url('OrderProduct/'.$row['order_id']); ?>"  class="btn btn-xs btn-warning"><i class="fa fa-eye fa-lg"></i></a></td>
						<td><?php   if($row['order_status']=='0')
						            { 
						                echo '<span class="label label-primary">Pending</span>';
						            } 
						            else if($row['order_status']=='1')
						            { 
						                echo '<span class="label label-danger">Cancle</span>';
						            }
						            else if($row['order_status']=='2')
						            { 
						                echo '<span class="label label-success">Mark As Delivered</span>';
						            }
						            else if($row['order_status']=='4')
						            { 
						                echo '<span class="label label-warning">Order InCheckout</span>';
						            }
						            else if($row['order_status']=='5')
						            { 
						                echo '<span class="label label-warning">Order Shipped</span>';
						            }
						            else
						            { 
						                echo '<span class="label label-info">Pickup</span>';
						          }?></td>
						
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

<script type="text/javascript">
function myStatusFunction($id,$uid) 
{
   var id  = $id;
   var uid = $uid;
   var order_status = $('#cstatus').val();
    $.ajax({
        url:"<?php echo base_url(); ?>Order/status",
        method:"POST",
        data:{id:id,uid:uid,order_status:order_status},
        success:function(data)
        {
            if(data == 1)
            {
                window.location.reload();
            }
        }
    });
}
</script>


<script type="text/javascript" src="<?php echo base_url("assets/js/jq1.js");?>"></script>
<script type="text/javascript">
    var mytable;
    $(document).ready(function () {
		//alert('hi');
        // mytable = $('#example').DataTable({
        //     "language": {                
        //              "infoFiltered": ""
        //         },
        //     "processing": true,
        //     "serverSide": true,
        //     "ordering": false,
        //     "ajax": {
        //         "url": "<?php echo site_url('admin/Order/AllorderList') ?>",
        //         "type": "POST"
        //     }
        // });
		
		
		// fill_datatable();
        function fill_datatable(cstatus,start_date,end_date) {
        mytable = $('#example').DataTable({
            "language": {                
                     "infoFiltered": ""
                },
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "ajax": {
                "url": "<?php echo site_url('admin/Order/AllorderList') ?>",
                "type": "POST",
				data: {
                        cstatus: cstatus,start_date:start_date,end_date:end_date
                    }
            }
        });
		}
		
		 $('#filter').click(function () {
            var cstatus = $('#cstatus').val();
			 var start_date = $('#start_date').val();
			  var end_date = $('#end_date').val();
           
           // alert(catname);
            if (cstatus != '' || start_date!='' || end_date!='') {
                $('#example').DataTable().destroy();
                fill_datatable(cstatus,start_date,end_date);

            } else {
                alert('Please select at least one option');
                $('#example').DataTable().destroy();
                fill_datatable();
            }
        });
		
    });
</script>
