

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url('assets/admin_assets/libs/jquery/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js"');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/metismenu/metisMenu.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/simplebar/simplebar.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/node-waves/waves.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/waypoints/lib/jquery.waypoints.min.js');?>"></script>
       
        <!-- apexcharts -->
        <script src="<?php echo base_url('assets/admin_assets/libs/apexcharts/apexcharts.min.js');?>"></script>

        <script src="<?php echo base_url('assets/admin_assets/js/pages/dashboard.init.js');?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets/admin_assets/js/app.js');?>"></script>




        <!-- Required datatable js -->
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>jszip/jszip.min.js"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url('assets/admin_assets/libs/');?>datatables.net-responsive-bs4/js\responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url('assets/admin_assets/');?>js/pages/datatables.init.js"></script>

        <script src="<?php echo base_url("assets/admin_assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js");?>"></script>
    </body>

</html>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);
    });
    $('.close').click(function(){
        $(".alert").css("display", "none");
    });


</script>
<script>
        ClassicEditor
        .create( document.querySelector( '#classic-editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>