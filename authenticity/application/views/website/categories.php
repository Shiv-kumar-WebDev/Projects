
 <div class="container">	

	<div class="section home-instagram no-pt-section">
        <div class="container">
           <div class="row"> 
           
           <?php foreach ($categories as $row) {?>
                <div class="col-md-4">        
                    <div class="insta">    
                        <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/0/<?php echo $row['category_id'];  ?>"> <img class="primary blur-up lazyload"  data-src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" src="<?php echo base_url('assets/images/category/').'/'.$row['image'];?>" alt="" title=""> </a>        
                        <a href="<?php echo base_url();?>landing/shop/maincat/cat/subcat/0/<?php echo $row['category_id'];  ?>"> <?php echo $row['name_en'];?></a> 
                    </div>                   
                </div>   
                <?php }?>
                
            </div>
        </div>
    </div>   


  </div>  
  
  
  <style>
img.primary.blur-up.lazyloaded {
    height: 265px;
    width: 100%;
}   
.insta {
    padding: 12px 0px;
    text-align: center;
    font-weight: 600;
}
  </style>