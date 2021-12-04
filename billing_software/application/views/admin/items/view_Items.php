




<div id="page-content">
<div class="block full">
<?php $this->load->view("admin/common/errors");?>
<div class="table-responsive">
<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
<thead>
<tr>
<th>   Name </th>
<th> 	Description </th>
<th>	Type </th>
<th>  Unit </th>
<th> Quantity </th>
<th> Status </th>
<th class="text-center"> Actions </th>
</tr>
</thead>
<tbody>
<?php foreach ($items as $value) {?>
<tr>
<td> <?php echo $value['name']; ?> </td>
<td> <?php echo $value['description']; ?> </td>
<td> <?php if ($value['type']==1) {
	echo "Product";
}else{
	echo "Service";
}
?> 
</td>
<td> <?php echo $value['unit']; ?> </td>
<td> <?php echo $value['qty']; ?> </td>
<td><?php if ($value['status']==1) { ?>
			<a href="<?php echo base_url('ItemStatus/'.$value['id'].'/0'); ?>"  class="btn btn-sm btn-success">Active</a>
			<?php }else{ ?>
					<a href="<?php echo base_url('ItemStatus/'.$value['id'].'/1'); ?>" class="btn btn-sm btn-danger">DeActive</a>
			<?php }?>

</td>
<td class="text-center">
<div class="btn-group">
<a href="<?php echo base_url('EditItem/'.$value['id']); ?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
<a href="<?php echo base_url('ItemDelete/'.$value['id']); ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
</div>
</td>
</tr>
<?php } ?>
 
 
 
 
 
 
 
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


