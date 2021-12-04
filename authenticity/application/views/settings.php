<?php
    foreach ($settings as $site_settings) {
      
        if($site_settings['name'] == 'site_name')
        {
            $site_name = $site_settings['value'];
        }
        if($site_settings['name'] == 'minimum_price')
        {
            $minimum_price = $site_settings['value'];
        }
        if($site_settings['name'] == 'order_name') 
        {
            $order_name = $site_settings['value'];
        }
         if($site_settings['name'] == 'gst_no') 
        {
            $gst_no = $site_settings['value'];
        }
        if($site_settings['name'] == 'usd_price')
        {
            $usd_price = $site_settings['value'];
        }
        if($site_settings['name'] == 'product_title')
        {
            $product_title = $site_settings['value'];
        }   
    }?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Settings</h1>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view("common/errors");?>
            <form action="<?php echo base_url('admin/Settings/doSettings'); ?>" method="post" name="settingsform" enctype="multipart/form-data" class="form-horizontal">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>General Setting</b></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Site Name <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                            <input type="text" name="site_name" id="site_name" placeholder="Site Name" class="form-control" required autocomplete="off" value="<?php if(isset($site_name)){ echo $site_name; }?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Minimum Order Amount for Free Delivery <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                            <input type="number" name="minimum_price" id="minimum_price" placeholder="Minimum Price" class="form-control" required autocomplete="off" value="<?php if(isset($minimum_price)){ echo $minimum_price; }?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Order Name <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                            <input type="text" name="order_name" id="order_name" placeholder="Order Name" class="form-control" required autocomplete="off" value="<?php if(isset($order_name)){ echo $order_name; }?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">GST No <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                            <input type="text" name="gst_no" id="gst_no" placeholder="GST No" class="form-control" required autocomplete="off" value="<?php if(isset($gst_no)){ echo $gst_no; }?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Usd Price <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                            <input type="text" name="usd_price" id="usd_price" placeholder="Usd Price" class="form-control" required autocomplete="off" value="<?php if(isset($usd_price)){ echo $usd_price; }?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                            <input type="text" name="product_title" id="product_title" placeholder="Title (EX:-Offer Of The Month)" class="form-control" required autocomplete="off" value="<?php if(isset($product_title)){ echo $product_title; }?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default" style="margin-top: -21px;">
                <div class="panel-body text-center">
                    <button type="submit" class="btn btn-primary waves-effect waves-light m-b-20">
                        Save Settings
                    </button>
                </div>
                </div>
            </form>
        </div>

    </div>
    </section>
</div>