
<?php //debug($LandedProperties);?>
<?php  for($i = 0 ; $i < count($LandedProperties)  ; $i++):?>


 
 
	 
 <div class="sec_add">
          <?php 
	$imagePath = "files/user_property_image/image/".$LandedProperties[$i]['UserPropertyImage'][0]['image_dir'].DS. "vga_".$LandedProperties[$i]['UserPropertyImage'][0]['image'];
     		 
		if(file_exists($imagePath)):?>
		 	 <a href="<?php echo $this->Html->url(array('controller'=>'user_properties','action'=>'view',$LandedProperties[$i]['UserProperty']['id']));?>"><div class="sec_add_img" style="background:url(<?php echo $this->Html->url('/files/user_property_image/image/'.$LandedProperties[$i]['UserPropertyImage'][0]['image_dir'].DS. 'vga_'.$LandedProperties[$i]['UserPropertyImage'][0]['image'],true);?>);"></div>    
          </a>
		<?php else:?>
		 
	<a href="<?php echo $this->Html->url(array('controller'=>'user_properties','action'=>'view',$LandedProperties[$i]['UserProperty']['id']));?>"> <div class="sec_add_img" style="background:url(<?php echo $this->Html->url('/img/');?>images/images.jpg);"></div>    
          
		</a><?php endif;?>
           
          
           <p class="sec_add_header">Land</p>
                <div class="sec_add_img_footer">
                <p class="big_letter">  <?php echo $LandedProperties[$i]['UserProperty']['location'];?></p>
                <p class="small_letter"> <?php echo $LandedProperties[$i]['UserProperty']['address'];?></p>
                </div>
                
                <div class="cost_and_area">
                                            <p><img src="<?php echo $this->Html->url('/img/');?>images/icon/area.png" /><p class="area">	<?php echo $LandedProperties[$i]['UserProperty']['area'];?> </p></p>
                            <p class="doller_icon"><img src="<?php echo $this->Html->url('/img/');?>images/icon/price.png"  /><p class="price">	<?php echo $LandedProperties[$i]['UserProperty']['price'];?></p></p>

                </div>
            </div>

<?php endfor;?>