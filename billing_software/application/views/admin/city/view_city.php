<div id="page-content">
<div class="content-header">
<div class="header-section">
<h1> view city </h1>
</div>
</div>

 
<div class="row">
<div class="col-md-12">
  
<!-- start page title -->
<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <br><br>

                                   

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                            
                                    
                                    <a href="<?php echo base_url('addCity') ?>">
                                        <button type="button" class="btn btn-success waves-effect waves-light mb-3 my-5"><i class="mdi mdi-plus me-1"></i> Add New City</button>
                                    </a>
                                    <br><br>
                                </div>
                                <div class="table-responsive mb-4">
                                    <table id="myTable"  class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                        <thead>
                                            <tr class="bg-transparent">
                                                
                                                <th>S.no</th>
                                                <th>City Name</th>
                                                <th style="width: 120px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i=1; foreach($cities as $city){ ?>
                                            <tr>
                                                
                                                
                                                <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $i++ ?></a> </td>
                                                <td>
                                                <?php echo $city['name'] ?>
                                                </td>
                                                
                                                
                                               
                                                
                                                <td>
                                                    <a href="<?php echo base_url('City/editCity') ?>/<?php echo $city['id'] ?>" class="px-3 text-white btn btn-info"><i class="uil uil-pen font-size-18">Edit</i></a>
                                                    <a href="<?php echo base_url('City/deleteCity') ?>/<?php echo $city['id'] ?>" class="px-3 text-white btn btn-danger">Del<i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end row -->

</div>
</div>

<!--  
 <div class="buttons sticked">
    <button type="submit" class="btn btn-action btn-check">Save</button>
    <a href="#" class="btn1" data-ember-action="" data-ember-action-1122="1122">Cancel</a>
  </div> -->
 
 
</div>
