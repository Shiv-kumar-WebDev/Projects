<div class="content-wrapper">
	<section class="content-header">
      <h1>Page</h1>
    </section>
	<section class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Page</h3>
            </div>
			<div class="col-md-12">
			<div class="col-sm-8">
            <?php $this->load->view("common/errors");?>
			</div>
			</div>
			<form action="<?php echo base_url('admin/Page/doAddPage'); ?>" method="post" name="pform" enctype="multipart/form-data" class="form-horizontal">
			<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Title</label>
				<div class="col-sm-6">
				<input type="text" name="title" id="title" class="form-control" placeholder="Title" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Slug</label>
				<div class="col-sm-6">
				<input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" autocomplete="off" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description</label>
				<div class="col-sm-6">
				<textarea class="form-control" rows="13" name="description" id="editor1" placeholder="Description" required></textarea>
				</div>
			</div>
			
			<div class="col-sm-2"></div>
			<div class="box-footer col-sm-6">
				<button type="submit" class="btn btn-info pull-left">Add Page</button>
				<a href="<?php echo base_url("Page");?>"><button type="button" class="btn btn-danger pull-right">Back</button></a>
			</div>				
			</form>  
		</div>
		</div>
	</div>
	</section>
</div>