<div class="content-wrapper">
	<section class="content-header">
      <h1>Attribute Option</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Attribute Option</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Attr_Optn/doAddAttr_Optn'); ?>" method="post" name="cform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
                            
                                <div class="form-group">
					<label class="col-sm-2 control-label">Attribute</label>
					<div class="col-sm-6">
                                            <select name="attr_id" class="form-control select2" required>
                                                <option value="">Select Attribute</option>
                                                <?php 
                                                	foreach ($attribute as $attr) {?>
                                                   		<option value="<?php echo($attr['attr_id']);?>"><?php echo($attr['attr_name']);?></option>
                                                	<?php }?>
                                            </select>
					
					</div>
				</div>
                            
				<div class="form-group">
					<label class="col-sm-2 control-label">Attribute Option Name</label>
					<div class="col-sm-6">
					<input type="text" name="optn_name" class="form-control" placeholder="Attribute Option Name" autocomplete="off" required>
					</div>
				</div>
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Add Option</button>
				<a href="<?php echo base_url("Attr_Optn");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>