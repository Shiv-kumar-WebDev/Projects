<?php 
    $this->db->select("*");
    $this->db->from("site_settings");
    $this->db->where("name",'site_name');
    $query = $this->db->get();
    $data = $query->result_array();
    $sitename =$data[0]['value']; 
?>
<footer class="main-footer">

    <strong>Copyright &copy; <?php echo date('Y')?> <?php echo ucfirst($sitename);?>  All rights reserved.

</footer>

</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/jq.js");?>"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery2.min.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>-->

<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.dataTables.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/select2.full.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-timepicker.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/dataTables.bootstrap.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/adminlte.min.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/ckeditor/ckeditor.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-datepicker.min.js");?>"></script>
       <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>  

<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   -->



<script>

  $(function () {

    $('#example1').DataTable()
	
	$('#DataTableDesc').DataTable( {
        "order": [[ 0, "desc" ]]
    } );

	$('.select2').select2()

	CKEDITOR.replace('editor1')

  })
  
  $("body").on("change",".choosecat",function(){
       var id = $(this).val();
           
            $.ajax({
                type: "POST",
                
                url: baseurl + "Getsubcategory",
                data: {id: id},
                success: function(data) {
                  var output=JSON.parse(data);
                  
                  var html="<option value=''>Select Sub Category</option>";
                  if(output.length > 0){
                      for(var i=0;i < output.length ; i++){
                          var markup='';
						  
                          markup="<option value='"+ output[i].subcategory_id+"'>"+output[i].subcategory_name_en+"---->"+output[i].subcategory_name_ar+"</option>";
                          
                          html=html+markup;
                      }
                  }else{
                      html="<option value=''>Subcategory not available</option>";
                  }
                  $('.subcat').html(html);
                }
            });
        })

</script>
<script>
$("body").on("change",".choosemaincat",function(){
       var id = $(this).val();
           
            $.ajax({
                type: "POST",
                
                url: baseurl + "Getcategory",
                data: {id: id},
                success: function(data) {
                  var output=JSON.parse(data);
                  
                  var html="<option value=''>Select Category</option>";
                  if(output.length > 0){
                      for(var i=0;i < output.length ; i++){
                          var markup='';
              
                          markup="<option value='"+ output[i].category_id+"'>"+output[i].name_en+"</option>";
                          
                          html=html+markup;
                      }
                  }else{
                      html="<option value=''>Category not available</option>";
                  }
                  $('.ctgry').html(html);
                }
            });
        })
</script>
<script>
$("body").on("change",".choosemaincategory",function(){
       var id = $(this).val();
           
            $.ajax({
                type: "POST",
                
                url: baseurl + "Getcategory",
                data: {id: id},
                success: function(data) {
                  var output=JSON.parse(data);
                  
                  var html="<option value=''>Select Category</option>";
                  if(output.length > 0){
                      for(var i=0;i < output.length ; i++){
                          var markup='';
              
                          markup="<option value='"+ output[i].category_id+"'>"+output[i].name_en+"</option>";
                          
                          html=html+markup;
                      }
                  }else{
                      html="<option value=''>Category not available</option>";
                  }
                  $('.cate').html(html);
                }
            });
        })
</script>
<script>
$("body").on("change",".cate",function(){
       var id = $(this).val();
           // alert(id);
            $.ajax({
                type: "POST",
                
                url: baseurl + "Getsbcategory",
                data: {id: id},
                success: function(data) {
                  var output=JSON.parse(data);
                  
                  var html="<option value=''>Select Sub Category</option>";
                  if(output.length > 0){
                      for(var i=0;i < output.length ; i++){
                          var markup='';
              
                          markup="<option value='"+ output[i].subcategory_id+"'>"+output[i].subcategory_name_en+"</option>";
                          
                          html=html+markup;
                      }
                  }else{
                      html="<option value=''> Sub Category not available</option>";
                  }
                  $('.subcatgry').html(html);
                }
            });
        })
</script>
<script>
$("body").on("change",".chooseunit",function(){
       var id = $(this).val();
           
            $.ajax({
                type: "POST",
                
                url: baseurl + "Product/getSubunit",
                data: {id: id},
                success: function(data) {
                  var output=JSON.parse(data);
                  
                  var html="<option value=''>Select Subunit</option>";
                  if(output.length > 0){
                      for(var i=0;i < output.length ; i++){
                          var markup='';
						  
                          markup="<option value='"+ output[i].subunit_id+"'>"+output[i].subunit_option_en+"---->"+output[i].subunit_option_ar+"</option>";
                          
                          html=html+markup;
                      }
                  }else{
                      html="<option value=''>Subunit not available</option>";
                  }
                  $('.subunit').html(html);
                }
            });
        })

</script>
<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
  })
  $('#datepicker1').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
  })
</script>
<script type="text/javascript">
  $('.datepickerdata').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
  })
    
</script>
</body>

</html>