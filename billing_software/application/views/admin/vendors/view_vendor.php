
<div id="page-content">
<div class="block full">
<?php $this->load->view("admin/common/errors");?>
<div class="table-responsive">
<table id="myTable" class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th> Company Name </th>
<th> Contact No </th>
<th> Email </th>
<th> Status </th>
<th class="text-center"> Actions </th>
</tr>
</thead>
<tbody>
	<?php if (!empty($vendors)) {
		foreach ($vendors as $value) {?>

		<tr>
		<td> <?php echo $value['company_name']; ?> </td>
		<td> <?php echo $value['phone']; ?> </td>
		<td> <?php echo $value['email']; ?> </td>
		<td><?php if ($value['status']==1) { ?>
			<a href="<?php echo base_url('VendorStatus/'.$value['id'].'/0'); ?>"  class="btn btn-sm btn-success">Active</a>
			<?php }else{ ?>
					<a href="<?php echo base_url('VendorStatus/'.$value['id'].'/1'); ?>" class="btn btn-sm btn-danger">DeActive</a>
			<?php }?>

		</td>
		<td class="text-center">
		<div class="btn-group">
		<a href="<?php echo base_url('EditVendor/'.$value['id']); ?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
		<a href="<?php echo base_url('VendorDelete/'.$value['id']); ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</div>
		</td>
		</tr>

		<?php }}?>







 
 
 
 
 
 
 
</tbody>
</table>
</div>
</div>
</div>



<style>
thead {
    background: #eaedf18a;
}

</style>


