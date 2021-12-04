<footer class="clearfix">
<div class="pull-right">
</div>
<div class="pull-left">
</div>
</footer>





</div>
</div>
</div>

 

<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header text-center">
<h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
</div>
<div class="modal-body">
<form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
<fieldset>
<legend>Vital Info</legend>
<div class="form-group">
<label class="col-md-4 control-label">Username</label>
<div class="col-md-8">
<p class="form-control-static">Admin</p>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-email">Email</label>
<div class="col-md-8">
<input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
<div class="col-md-8">
<label class="switch switch-primary">
<input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked="">
<span></span>
</label>
</div>
</div>
</fieldset>
<fieldset>
<legend>Password Update</legend>
<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-password">New Password</label>
<div class="col-md-8">
<input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
<div class="col-md-8">
<input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
</div>
</div>
</fieldset>
<div class="form-group form-actions">
<div class="col-xs-12 text-right">
<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url();?>assets/admin_assets/js/vendor/jquery.min-3.6.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/vendor/bootstrap.min-3.6.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/plugins-3.8.js"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/app-3.7.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVxLoIeqnW5iqwWDOXNQ57PHPMWSqwNVU"></script>
<script src="<?php echo base_url();?>assets/admin_assets/js/helpers/gmaps.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/admin_assets/js/customFunction.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

 <script>

 	$("body").on("change",".choosecountry",function(){
       var id = $(this).val();           
        $.ajax({
            type: "POST",
            
            url: baseurl + "GetStates",
            data: {id: id},
            success: function(data) {
              var output=JSON.parse(data);
              
              var html="<option></option>";
              if(output.length > 0){
                  for(var i=0;i < output.length ; i++){
                      var markup='';
					  
                      markup="<option value='"+ output[i].id+"'>"+output[i].name+"</option>";
                      
                      html=html+markup;
                  }
              }else{
                  html="<option></option>";
              }
              html1="<option></option>";
              $('.choosestate').html(html);
              $('.choosecity').html(html1);

            }
        });
    })

	$("body").on("change",".choosestate",function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            
            url: baseurl + "GetCities",
            data: {id: id},
            success: function(data) {
              var output=JSON.parse(data);
              
              var html="<option value=''></option>";
              if(output.length > 0){
                  for(var i=0;i < output.length ; i++){
                      var markup='';
          
                      markup="<option value='"+ output[i].id+"'>"+output[i].name+"</option>";
                      
                      html=html+markup;
                  }
              }else{
                  html="<option></option>";
              }
              $('.choosecity').html(html);
            }
        });
    })

 </script>
 <script>

 	$("body").on("change",".chooseshipcountry",function(){
       var id = $(this).val();           
        $.ajax({
            type: "POST",
            
            url: baseurl + "GetStates",
            data: {id: id},
            success: function(data) {
              var output=JSON.parse(data);
              
              var html="<option></option>";
              if(output.length > 0){
                  for(var i=0;i < output.length ; i++){
                      var markup='';
					  
                      markup="<option value='"+ output[i].id+"'>"+output[i].name+"</option>";
                      
                      html=html+markup;
                  }
              }else{
                  html="<option></option>";
              }
              html1="<option></option>";
              $('.chooseshipstate').html(html);
              $('.chooseshipcity').html(html1);
            }
        });
    })

	$("body").on("change",".chooseshipstate",function(){
        var id = $(this).val();
        $.ajax({
            type: "POST",
            
            url: baseurl + "GetCities",
            data: {id: id},
            success: function(data) {
              var output=JSON.parse(data);
              
              var html="<option value=''></option>";
              if(output.length > 0){
                  for(var i=0;i < output.length ; i++){
                      var markup='';
          
                      markup="<option value='"+ output[i].id+"'>"+output[i].name+"</option>";
                      
                      html=html+markup;
                  }
              }else{
                  html="<option></option>";
              }
              $('.chooseshipcity').html(html);
            }
        });
    })

 </script>





</body>
</html>