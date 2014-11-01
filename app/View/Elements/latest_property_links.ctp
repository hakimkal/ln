<div class="latest_property">
<h1 class="Latest_pro_h">Latest Property</h1>
<p class="property_type">
 
 
	<?php echo $this->Html->link('All',array('controller'=>'UserProperties','action'=>'index',-1));?>
	
	
<?php foreach($LatestPropertiesNames as $lpn):?>

	<?php echo $this->Html->link($lpn['PropertyType']['type'],array('controller'=>'UserProperties','action'=>'index',$lpn['PropertyType']['id']));?>
	
	
 
  
<?php endforeach;?>
  </p> 
   
   
   
</div>