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
        <h1>Purchased Product</h1>
    </section>
    
    <section class="content">
        <div class="col-ms-12">
        <div class="box">
            <div class="box-header">
                
            <div class="pull-right">
                <a href="<?php echo base_url("purchased");?>"><button type="button"  class="btn btn-danger pull-left"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>&nbsp;

            <!-- <a href="javascript:void(0);" id="print_button2" onclick="printPageArea('content')">/ -->
                    <!-- <button id="printpage"  class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button> -->
                <!-- </a>  -->
                
                <!-- <button type="button"  class="btn btn-success" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>  -->
                    <!-- <a target="_blank" href="<?php echo base_url("Orderpdf/").$order_id;?>"><button type="button"  class="btn btn-warning" ><i class="fa fa-print" aria-hidden="true"></i> PDF</button></a> -->
                
                </div>
            </div>
            
            <div class="box-body table-responsive" id="content">
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
                <strong>Vendor Mobile:</strong> +91-<?php echo $details[0]['v_contact_no'];?><br>
                <strong>Vendor Address:</strong> <?php echo $details[0]['v_address'];?><br>
            </td>
            <td>
                <strong>Vendor Name:</strong> <?php echo $details[0]['v_name'];?><br>
                <strong>Purchased Date:</strong> <?php echo date('d/m/Y',$details[0]['purchased_date']);?><br>
            </td>
                                        
            </tr>
                                
            <?php } ?>
            
            </tbody>
            </table>
            
                            
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr >
                      
                      <th colspan="6">Product Name</th>
                      <th>Variant Type</th>
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
                        <td style="text-transform: uppercase;" class="text-center"><?php if (!empty($row['purchased_variantid'])) { echo $row['size'].' ---> '.$row['color'];  }else{
                            echo "-";
                        };?></td>
                        <td >₹ <?php echo $row['purchased_price'];?></td>                       
                        <td><?php echo $row['purchased_qty']?></td>
                        <td>₹ <?php echo  $row['total_product_price'];?></td>
                    </tr>
                    <?php } ?>
                    <tr class="trttotal">
                        <td colspan="9" style="text-align: right;">Total Amount</td>
                        <td>₹ <?php echo $details[0]['purchase_total'];?></td>
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
