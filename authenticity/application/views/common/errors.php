<?php
	if($this->session->flashdata('errors'))
	{

?>

				<div class="alert alert-danger" style="margin-top:5px; width:100%">
					<button type="button" class="close" data-dismiss="alert">×</button>
	   				<strong>
  						<?php echo $this->session->flashdata('errors'); ?>
  					</strong>
  					
  				</div>

  <?php } else if($this->session->flashdata('success')) {
  ?>
  

	
	<div class="alert alert-success" style="margin-top: 16px;text-align: center; width:100%">
	
	  	<button type="button" class="close" data-dismiss="alert">×</button>
	   		<strong>
	   		<?php echo  $this->session->flashdata('success'); ?>
	   		</strong>
	</div>
	 
					
<?php
	}
	else 
	{
?>
		
		
<?php 
	}
?>