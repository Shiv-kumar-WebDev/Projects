<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
	<div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
	<div class="sidebar_tags">
		<!--Categories-->
		<div class="sidebar_widget categories filter-widget">
			<div class="widget-title"><h2>Categories</h2></div>
			<div class="widget-content" style="">
				<ul class="sidebar_categories">
					<?php
                      
                        $this->db->select('*');
                        $this->db->from('maincategory');  
                        $this->db->where('maincatstatus','1');
                        $this->db->order_by('updated',"desc");
                        $query = $this->db->get();        
                        $maincat_list =  $query->result_array();
                        foreach($maincat_list as $row){
                            $this->db->select('*');
                            $this->db->from('category');  
                            $this->db->where('status','1'); 
                            $this->db->where('maincategory_id',$row['maincategory_id']);
                            $this->db->order_by('updated',"desc");                     
                            $this->db->limit('4');
                            $query_cat = $this->db->get();  
                            $cat_list =  $query_cat->result_array();
                    ?>
					<li class="level1 sub-level"><a href="#;" class="site-nav"><?php echo $row['maincategory_name_en'] ?></a>
						
						<ul class="sublinks" style="display: none;">
							<?php  foreach($cat_list as $rowcat){ ?>
								<label><input type="checkbox" class="productDetail category" value="<?php echo $rowcat['category_id']; ?>"  > <?php echo $rowcat['name_en']; ?></label>
							<?php } ?>
						</ul>
						
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<!--Categories-->
		<!--Price Filter-->
		<div class="sidebar_widget filterBox filter-widget">
			<div class="widget-title">
				<h2>Price</h2>
			</div>
			<div id="slider-range"></div>
			<div class="row">
				<div class="col-6">
					<p class="no-margin"><input id="amount" type="text" readonly=""></p>
					<input type="hidden" id="minPrice" value="12" />
					<input type="hidden" id="maxPrice" value="200" />   
				</div>
				<!-- <div class="col-6 text-right margin-25px-top">
					<button class="btn btn-secondary btn--small">filter</button>
				</div> -->
			</div>
		</div>
		<!--End Price Filter-->
 
		<!--Color Swatches-->
		<div class="sidebar_widget filterBox filter-widget">
			<div class="widget-title"><h2>Color</h2></div>
			<div class="filter-color swacth-list clearfix">
				<ul class="sidebar_categories">
					<?php
                      
                        $this->db->select('*');
                        $this->db->from('colors');  
                        $this->db->where('status','1');
                        $query = $this->db->get();        
                        $colors =  $query->result_array();
                        foreach($colors as $color){
                    ?>
                    <label><input type="checkbox" class="productDetail color" value="<?php echo $color['id']; ?>"  > <?php echo $color['name']; ?></label>    
				<?php } ?>

				</ul>
			</div>
		</div>

	</div>
</div>

