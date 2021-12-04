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
									<li><a href="#"> StProfile </a></li>
								</ul>
							</div>
							<!-- Bread Title -->
							<div class="bread-title"><h2> StProfile </h2></div>
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
				<?php $this->view('student/stsidebar'); ?>
					<div class="col-lg-8 col-12">
						<div class="row">

								<!-- Single Blog -->
								<div class="single-news ">
									<div class="news-body">
                       <div class="contact-form-area m-top-30">
                       <table id="example1" class="table table-bordered table-striped">

                <thead>

					<tr>
					  <th>Sr. No.</th>
					  <th class="text-center">Coach Name</th>
					  <th class="text-center">Contact No.</th>
					  <th class="text-center">Email Address</th>
					  <th class="text-center">Subject</th>
					  <th class="text-center">Action</th>
                    </tr>

                </thead>

                <tbody><?php $co_id=[];?>
				<?php foreach($interestdata as $details){
					$co_id[]=$details['coach_id'];
				}?>
				<?php if(isset($codetails)){
					$i=1;

						foreach($codetails as $codata){?>

					<tr>
						<td class="text-center"><?php echo $i; $i++;?></td>
						<td class="text-center"><?php echo $codata['name'];?></td>
						<td class="text-center"><?php echo $codata['number'];?></td>
						<td class="text-center"><?php echo $codata['email'];?></td>
						<td class="text-center"><?php echo $codata['sub_name'];?></td>
						<td class="text-center">
						<?php if(in_array($codata['id'],$co_id)) {?>
								<button class="btn btn-primary disabled">REQUESTED</button>
								<a href="<?php echo base_url();?>student/student/codata/<?php echo $codata['id'];?>" class="btn btn-warning">View</i></a>
						<?php }else{?>
								<a class="btn btn-success" href="<?php echo base_url();?>student/student/interest/<?php echo $codata['id'];?>">INTERESTED</a>
						<?php }?>

						</td>
					
					</tr>

					<?php } ?>

                    <?php }else{

                        echo "<tr><td colspan=4 align=center>No Recoreds Available.</td></tr>";

                    }?>

                </tfoot> 

              </table>
 
							
						</div>
									</div>
								 
							</div>
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