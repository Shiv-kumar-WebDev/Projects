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
                        <div class="news-body">
                            <div class="contact-form-area m-top-30">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="single-sidebar bizwheel_latest_news_widget">
                                            <div class="single-f-news">
                                                <div class="resume-user mb-5">
                                                    <img src="<?php echo base_url();?>assets/img/userpro.png" class="thumb" style="width:100%; height:100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-12">
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <h2><?php echo $coprofile[0]['name'];?></h2>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-12">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <i class="fa fa-star" data-index="0"></i>
                                        <i class="fa fa-star" data-index="1"></i>
                                        <i class="fa fa-star" data-index="2"></i>
                                        <i class="fa fa-star" data-index="3"></i>
                                        <i class="fa fa-star" data-index="4"></i>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <p>Number: <?php echo $coprofile[0]['number'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                    <div class="form-group">
                                            <p>Subject: <?php echo $coprofile[0]['sub_name'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                        <p>Email: <?php echo $coprofile[0]['email'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
					<div class="col-lg-12 col-12">
						  <div class="row">
                            		<div class="contact-form-area m-top-30">
                       					<table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th class="text-center">Request From</th>
													<th class="text-center">Requested Hours</th>
													<th class="text-center">Requested Date</th>
													<th class="text-center">Decision</th>
												</tr>
											</thead>
											<?php if(isset($comments)){
												$i=1;
												foreach($comments as $com){?>
													<tr>
														<td class="text-center"><?php echo $i; $i++;?></td>
														<td class="text-center"><?php echo $com['name'];?></td>
														<td class="text-center"><?php echo $com['hours'];?></td>
														<td class="text-center"><?php echo $com['daydate'];?></td>
														<td class="text-center">
														<?php if ($com['costatus'] ==0) {?> 
															<a class="btn btn-success" href="<?php echo base_url();?>student/student/coacpt/<?php echo $com['coach_id'];?>/<?php echo $com['comment_id'];?>">ACCEPT</a>
															<a class="btn btn-warning" href="<?php echo base_url();?>student/student/corjct/<?php echo $com['coach_id'];?>/<?php echo $com['comment_id'];?>">REJECT</a>
														
														<?php }elseif ($com['costatus'] ==1) {?>
															<a class="btn btn-info disabled" >ACCEPTED</a>
														<?php }else{?>
															<a class="btn btn-danger disabled">REJECTED</a>
														<?php }?>
														</td>
													</tr>
												<?php } ?>
											<?php }else{
												echo "<tr><td colspan=4 align=center>No Requests Available.</td></tr>";
											}?>
											</tfoot> 
										</table>
                                        
									
							</div>
						</div>
					</div>
				</div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group button">
                                        <a class="btn btn-danger" href="<?php echo base_url();?>Codetails"> &#8592; Back  </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
			        </div>
		        </div>
	        </div>
        </div>
    </section>
    
		<!-- / End Blog Grid With Sidebar -->
	
<script>
        var base_url = "<?= base_url(); ?>";
    </script>
<script src="<?= base_url();?>assets/js/customFunction.js"></script>
		<script src="<?php echo base_url();?>assets/js/jq.min.js"></script>
	
    <script type="text/javascript">
            var ratedIndex= -1;

            $(document).ready(function(){ 
                resetcolor();
                $('.fa-star').on('click',  function(){
                    ratedIndex= parseInt($(this).data('index'));
                    saveToDB(ratedIndex);
                });


                $('.fa-star').mouseover(function () {
                    resetcolor();
                    var currentIndex = parseInt($(this).data('index'));
                    for (var i=0; i<= currentIndex; i++)
                        $('.fa-star:eq('+i+')').css('color', 'orange');
                    
                });

                $('.fa-star').mouseleave(function () {
                    resetcolor();
                    if (ratedIndex != -1) {
                        for (var i=0; i<= ratedIndex; i++)
                        $('.fa-star:eq('+i+')').css('color', 'orange');
                    }
                });
            });
            function saveToDB(ratedIndex){
                var co_id = "<?php echo $coprofile[0]['id'];?>";
                var url="student/student/addrating"
                data={co_id:co_id,ratedIndex:ratedIndex};
                var pro = viewDetailsByData(data,url);
                pro.then(function (suc){
                    var url="Codetails"
                    data={co_id:co_id,ratedIndex:ratedIndex};
                    var pro = viewDetailsByData(data,url);
                    });
            }
            function resetcolor() {
                $('.fa-star').css('color','black');
            }

        </script>
		
		
		
		
		
		
 
		<!-- Include Foot -->
		<?php $this->view('website/layout/foot'); ?>
		
		<!--/ End Include Foot -->
		

		<!-- Include Footer -->
		<?php $this->view('website/layout/footer'); ?>
		
		<!--/ End Include Footer -->
	</body>

</html>