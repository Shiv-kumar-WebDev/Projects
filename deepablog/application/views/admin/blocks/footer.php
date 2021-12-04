
        
       

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar="" class="h-100">

                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>



                <!-- Settings -->
                <hr class="mt-0">
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked="">
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->


        
        <script src="<?php echo base_url('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/admin/libs/metismenu/metisMenu.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/admin/libs/simplebar/simplebar.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/admin/libs/node-waves/waves.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/admin/libs/waypoints/lib/jquery.waypoints.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/admin/libs/jquery.counterup/jquery.counterup.min.js'); ?>"></script>
        
        <!-- apexcharts -->
        <script src="<?php echo base_url('assets/admin/libs/apexcharts/apexcharts.min.js'); ?>"></script>
        
        <script src="<?php echo base_url('assets/admin/js/pages/dashboard.init.js'); ?>"></script>
        
        <!-- App js -->
        <script src="<?php echo base_url('assets/admin/js/app.js'); ?>"></script>
        
        
        <script src="<?php echo base_url('assets/admin/libs/jquery/jquery.min.js'); ?>"></script>

        <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->


        <script>    
            $(document).ready(function(){

                $('#Categoryname').change(function(){
                    var category_id = $('#Categoryname').val();
                    if(category_id!=''){
                        $.ajax({
                            url:"<?php echo base_url('admin/blog/Blog/fetch_subcategory'); ?>",
                            method:"POST",
                            data:{category_id:category_id},
                            success:function(data){
                                $('#subcategoryname').html(data);
                            }
                        });
                    }
                });

            });
        </script>
    </body>

</html>