<div id="page-content">        
        <!--Body Container-->
        <!--Breadcrumbs-->
        <div class="breadcrumbs-wrapper">
        	<div class="container">
            	<div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span> Tracking Order </span></div>
            </div>
        </div>
        <!--End Breadcrumbs-->
        <!--Page Title with Image-->
        <div class="page-title"><h1> Tracking Order  </h1></div>
 
 
 <div class="container px-1 px-md-4 py-5 mx-auto">
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER <span class="text-primary font-weight-bold">#Z<?php echo $orders[0]['order_id']; ?>3XD<?php echo $orders[0]['order_id']; ?>HR</span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <p class="mb-0">Expected Arrival <span> <?php echo $orders[0]['delivery_date']; ?></span></p>
                <p>USPS <span class="font-weight-bold">2340<?php echo $orders[0]['order_id']; ?>9672424<?php echo $orders[0]['order_id']; ?>2898</span></p>
            </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">

            <?php 
                $pending = $shipped = $pending = $cancel = $delivered = " ";

                if ($orders[0]['order_status'] == 0) { 
                    $pending = "active";
                }elseif ($orders[0]['order_status'] == 1) {
                    $shipped = "active";
                    $pending = "active";
                    $cancel = "active";
                }elseif ($orders[0]['order_status'] == 5) {
                    $pending = "active";
                    $shipped = "active";
                }elseif ($orders[0]['order_status'] == 2) {
                    $shipped = "active";
                    $pending = "active";
                    $cancel = "active";
                    $delivered = "active";
                }
            ?>
                <ul id="progressbar" class="text-center">
                    <li class="<?php echo $pending; ?> step0"></li>
                    <li class="<?php echo $shipped; ?> step0"></li>
                    <li class="<?php echo $cancel; ?> step0"></li>
                    <li class="<?php echo $delivered; ?> step0"></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Shipped</p>
                </div>
            </div>
            <?php if ($orders[0]['order_status'] == 1) { ?>
                <div class="row d-flex icon-content"> <img class="icon" src="https://user-images.githubusercontent.com/45173737/62929883-a5d14480-bdbb-11e9-830e-ebd95e64dd60.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Cancelled</p>
                </div>
            </div>

            <?php }else{ ?>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>In Route</p>
                </div>
            </div>

            <?php } ?>
            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>delivered</p>
                </div>
            </div>
        </div>
    </div>
</div>

 
 
 
 <style>
 

.card {
    z-index: 0;
    background-color: #ECEFF1;
    padding-bottom: 20px;
    margin-top: 90px;
    margin-bottom: 90px;
    border-radius: 10px
}

.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #fff
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #C5CAE9;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #651FFF
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c"
}

.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
}     
 </style>       
    </div><!--End Page Wrapper-->