<div class="content-wrapper">

    <section class="content-header">

        <h1> Stock Product</h1>

    </section>

    <section class="content">

        <div class="col-ms-12">

        <?php $this->load->view("common/errors");?>

        <div class="box">

            <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url("admin/Product/download_csv");?>"><button type="button"  class="btn btn-primary pull-left"><i class="fa fa-download"></i> DOWNLOAD CSV</button></a></h3>
                <div class="pull-right">
                <a href="<?php echo base_url("AddOrder");?>"><button type="button" class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add Quantity</button></a>
                </div>

            </div>

            <div class="box-body table-responsive">

                <table id="example1" class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>Sr. No.</th>

                      <th class="text-center">Product Image</th>
                      <th class="text-center">Product Name </th>
                      <th class="text-center">Variant Type</th>
                      <th class="text-center">Quantity</th>

                    </tr>

                </thead>

                <tbody>

                <?php if(isset($product)){
                    $i=1;

                        foreach($product as $row)

                        {?>

                    <tr>

                        <td class="text-center"><?php echo $i; $i++;?></td>
                        <td><?php if(!empty($row['promain_image'])) {?><img src="<?php echo base_url('assets/images/products/').'/'.$row['promain_image'];?>" style="width:100px;height:50px;" /><?php }else{?><img src="<?php echo base_url('assets/img/placeholder.png');?>" style="width:100px;height:50px;" /><?php } ?></td>
                        <?php if ($row['stock_qty']<5) {
                            $stock = "warning";
                        }if ($row['stock_qty']<1) {
                            $stock = "danger";
                        }if ($row['stock_qty']>5){
                           $stock = "success"; 
                        } ?>
                        <td style="text-transform: uppercase;" class="text-center"><?php echo $row['proname_en'];?></td>
                        <td style="text-transform: uppercase;" class="text-center"><?php if (!empty($row['variant_id'])) { echo $row['size'].' ---> '.$row['color'];  }else{
                            echo "-";
                        };?></td>
                        <td class="text-center"><button class="btn-<?php echo $stock; ?> btn box-title"><?php echo $row['stock_qty'];?></button></td>
                    </tr>

                    <?php } ?>

                    <?php }else{

                        echo "<tr><td colspan=4 align=center>No Recoreds Available.</td></tr>";

                    }?>

                </tfoot> 

              </table>

            </div>

        </div>

        </div>

    </section>

</div>



