
<div class="grid_view_section" style="min-height: 800px;">

	<!--Top list_view-->
         <?php //debug($UserProperties);?>
         <?php foreach ($UserProperties as $up):?>
<div class="list_view">
		<div class="list_view_img">

			<img
				src="<?php echo $this->Html->url('/files/user_property_image/image/'.$up['UserPropertyImage'][0]['image_dir'].DS.'thumb_'.$up['UserPropertyImage'][0]['image']);?>" />
		</div>
		<div class="list_view_pri">
			<p class="view_cost">
			
			
			<p class="area_img">
				<img
					src="<?php echo $this->Html->url('/img/')?>images/icon/area.png" />
			</p>
			<p class="area_list"><?php echo $up['UserProperty']['area'];?>m<sup>2</sup>
			</p>
			<p class="doller_img">
				<img
					src="<?php echo $this->Html->url('/img/');?>images/icon/price.png" />
			</p>
			<p class="list_price"><?php
										// setlocale(LC_MONETARY, 'en_US');
										echo ($up ['UserProperty'] ['price']);
										?>
				</p>
			</p>
		</div>

		<div class="list_view_cnt">
			<h2 class="proj_name"><?php echo $up['UserProperty']['title'];?></h2>
			<p class="proj_add"> <?php if(!empty($up['UserProperty']['address'])){ echo $up['UserProperty']['address'].',';}?><?php echo $up['UserProperty']['location'];?></p>

			<p class="proj_contant"><?php echo $up['UserProperty']['notes'];?> 
	</p>
			<p><?php echo $this->Html->link('<img src="'.$this->Html->url("/img/").'images/icon/readmore.png" />',array('action'=>'view',$up['UserProperty']['id']),array('escape'=>false));?></p>
		</div>
	</div>

<?php endforeach;?>
<!--Top list End-->






</div>