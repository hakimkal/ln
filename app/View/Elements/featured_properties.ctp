
<style type="text/css">
.grid_price {
    width: 285px;
    height: 32px;
    margin-top: 135px;
    font-size: 15px;
}
  .doller_icon {
    margin-left: 175px;
    margin-top: -48px;
}


.price {
    margin-left: 209px;
    margin-top: -39px;
}

.area {
    margin-top: -41px;
    margin-left: 39px;
}
</style>
<?php  //  debug($FeaturedProperties);?>
<?php  for($i = 0 ; $i < count($FeaturedProperties)  ; $i++):?>
<div id="grid_content1">
	<div class="featured">Featured</div>
	<div class="grid_header"><?php echo $FeaturedProperties[$i]['UserProperty']['title'];?></div>
	<div class="grid_img">
		<?php 
	$imagePath = "files/user_property_image/image/".$FeaturedProperties[$i]['UserPropertyImage'][0]['image_dir'].DS. "vga_".$FeaturedProperties[$i]['UserPropertyImage'][0]['image'];
//$imagePath = 'files/user_property_image/image/21/vga_1 BEDROOM BLOCK OF FLATS.jpg';
    				//debug($imagePath);
		if(file_exists($imagePath)):?>
		<a href="<?php echo $this->Html->url(array('controller'=>'user_properties','action'=>'view',$FeaturedProperties[$i]['UserProperty']['id']));?>">
		<img src="<?php echo $this->Html->url('/files/user_property_image/image/'.$FeaturedProperties[$i]['UserPropertyImage'][0]['image_dir'].DS. 'vga_'.$FeaturedProperties[$i]['UserPropertyImage'][0]['image']);?>" class="pic" />
		</a><?php else:?>
		<a href="<?php echo $this->Html->url(array('controller'=>'user_properties','action'=>'view',$FeaturedProperties[$i]['UserProperty']['id']));?>">	<img src="<?php echo $this->Html->url('/img/images/images (1).jpg');?>" class="pic" />
	</a>
		<?php endif;?>
		<div class="img_header"><?php echo $FeaturedProperties[$i]['UserProperty']['address'] .' '. $FeaturedProperties[$i]['UserProperty']['location'];?></div>
		<div class="grid_price">
			<p>
				<img src="<?php echo $this->Html->url('/img/');?>images/icon/area.png" />
			<p class="area">
				<?php echo $FeaturedProperties[$i]['UserProperty']['area'];?>m<sup>2</sup> </p>
			
			
			</p>
                            <p class="doller_icon">
				
				<img src="<?php echo $this->Html->url('/img/');?>images/icon/price.png" />
			
			
			<p class="price"><?php echo $FeaturedProperties[$i]['UserProperty']['price'];?></p>
			
			
			</p>
                            </div>
                        </div>
                    </div>



<?php endfor;?>
 
  