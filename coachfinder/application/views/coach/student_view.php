<!DOCTYPE html>
<html lang="zxx">
<head>
		<!-- Meta Tag -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name='copyright' content='pavilan'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title Tag  -->
		<title> Education </title>
		
		
		<!-- Include Header -->
		<?php $this->view('website/layout/header'); ?>
        <?php $this->view('website/layout/modelhead'); ?>
		
		<!--/ End Include Header -->
		
	</head>
	<body id="bg" style="">
		
		<!-- Boxed Layout -->
		<div id="page" class="site"> 
	
		<!-- Preloader -->
		<div class="preeloader">
			<div class="preloader-spinner"></div>
		</div>
		<!--/ End Preloader -->
		
 
		
		
		<!-- Include Head -->
		<?php $this->view('website/layout/head'); ?>
		
		<!--/ End Include Head -->
		
		
		
		
		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('<?php echo base_url();?>assets/img/breadcrumb.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<!-- Bread Menu -->
							<div class="bread-menu">
								<ul>
									<li><a href="index-2.html">Home</a></li>
									<li><a href="#"> CoProfile </a></li>
								</ul>
							</div>
							<!-- Bread Title -->
							<div class="bread-title"><h2> CoProfile </h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / End Breadcrumb -->
		
		
		<?php
        if($this->session->flashdata('success'))
        {   
            echo '<div class="alert alert-success"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong>'.$this->session->flashdata('success').'</div>';
        }
        if($this->session->flashdata('error'))
        {   
            echo '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'.$this->session->flashdata('error').'</div>';
        }
        if($this->session->flashdata('warning'))
        {   
            echo '<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>warning!</strong>'.$this->session->flashdata('warning').'</div>';
        }
    ?>
		
		
		
		<!-- Blog Grid With Sidebar -->
		<section class="blog-layout news-default section-space">
			<div class="container">
				<div class="row">
				    <?php $this->view('coach/cosidebar'); ?>
					<div class="col-lg-8 col-12">
						<div class="single-news ">
							<div class="news-body">
								<div class="contact-form-area m-top-30">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-12">
										</div>
										<div class="col-lg-4 col-md-4 col-12">
											<h2><?php echo $stprofile[0]['name'];?></h2>
										</div>
										<div class="col-lg-4 col-md-4 col-12">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
											<p>Email: <?php echo $stprofile[0]['email'];?></p>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<div class="form-group">
												<p>Number: <?php echo $stprofile[0]['number'];?></p>
											</div>
										</div>
                                	</div>
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th class="text-center">S.no</th>
												<th class="text-center">Hours</th>
												<th class="text-center">Date</th>
											</tr>
										</thead>
										<?php if(isset($student)){
											$i=1;
											foreach($student as $stu){?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
													<td class="text-center"><?php echo $stu['hours'];?></td>
													<td class="text-center"><?php echo $stu['daydate'];$i++;?></td>
												</tr>
											<?php } ?>
										<?php }else{
													echo "<tr><td colspan=4 align=center>No Data Available.</td></tr>";
												}?>
										</tfoot> 
										<button class="btn btn-primary launch-modal" data-modal-id="modal-login"><i class="fa fa-plus"></i> Add Comment </button>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-login-label">Add Teaching Time</h3>
                        </div>
                        <div class="modal-body">
                            
                            <form role="form" action="<?php echo base_url();?>addtime" method="post" class="login-form">
                                <div class="form-group">
                                    <input type="text" name="hours" placeholder="Add Timing In Hours" required="" class="form-control" id="hours">
                                    <input type="hidden" name="student_id" value="<?php echo $st_id; ?>">
                                </div>
                                <div class="form-group">
                                <label><strong> Select Date </strong></label>
                                          <?php
                                            $date = date('Y-m-d');
                                            if(date('H')>=17){
                                              $date = date('Y-m-d', strtotime("+1 day"));
                                            }  ?>
                                          <input type="date" required="" name="daydate" id="daydate"  all="<?php echo $date; ?>"  >
                                </div>
                                <button type="submit" class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		</section>
		<!-- / End Blog Grid With Sidebar -->
	
		
		
		
		
		
		
		
		
 
		<!-- Include Foot -->
		<?php $this->view('website/layout/foot'); ?>
		
		<!--/ End Include Foot -->
		

		<!-- Include Footer -->
		<?php $this->view('website/layout/footer'); ?>
		
		<?php $this->view('website/layout/modelfoot'); ?>
		<!--/ End Include Footer -->
		
	</body>
	

</html>
<script>
        var base_url = "<?= base_url(); ?>";
    </script>
<script src="<?= base_url();?>assets/js/customFunction.js"></script>
<!-- <script src="<?php echo base_url();?>assets/js/js3.js"></script>
<script src="<?php echo base_url();?>assets/js/js11.js"></script> 	 -->
<script>
		function interest(id){
			var url="landing/interest"
			data={id:id};
			// alert(url);
			var pro = viewDetailsByData(data,url);
			pro.then(function (suc){
				obj = $.parseJSON(suc);
					console.log(obj)
					if(obj.count){
					// $('.cardValue').html(obj.count)
					// $('.textsuccess').html('('+obj.count+ ' item)')
					}else{
					// $('.cardValue').html(0)
					// $('.textsuccess').html('( 0 item)')
					}
			});
        }
			
</script>