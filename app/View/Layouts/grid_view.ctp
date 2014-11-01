
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 	<!-- grid view  -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Land.net Properties</title>
<link href="<?php echo $this->Html->url('/');?>css/style.css" rel="stylesheet" type="text/css" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

<!-- pop up -->
	  	<link rel="stylesheet" href="<?php echo $this->Html->url('/');?>css/reveal.css">	
	 
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="<?php echo $this->Html->url('/js/');?>jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->Html->url('/');?>js/jquery.reveal.js"></script>
<!-- pop up -->

</head>

<body>
<!--Header-->

<div class="head_new">
<div class="new_one">
<div class="main_container">
<div class="main_logo">
<?php echo $this->Html->link($this->Html->image("images/logo.png"),'/login',array( 'escape'=>false  ,'style'=>'color:#000;text-decoration:none;'));?>

</div>
 <?php
  if(!$this->Session->read('Auth.User.id')):?>
<?php 	echo $this->Element('modal');?>
<div class="right_main">
<div class="right_main1">
<a href="#" class="login_right" data-reveal-id="myModal">Login</a>
</div>
<div class="right_main1">
<a href="#" class="login_right1" data-reveal-id="myModal2">Register</a>
</div>
</div>

 <?php else:?>
 <div class="right_main">
<div class="right_main1">
<a href="<?php echo $this->Html->url('/listMyPro');?>" class="login_right">List Your Property ></a>
<a href="<?php echo $this->Html->url('/logout');?>" class="login_right" >Logout</a>
</div>
</div>
 
<?php endif;?> 
 

 </div>
</div>

<div class="main_container">
 <?php echo $this->Element('listings/search')?>
</div>

</div>
<!--Header End-->

<!--Navigation-->

<!--Navigation End-->

<!--Main Container-->
<div class="main_container">
	
<div class="clear"></div>

       
<?php //echo  $this->fetch('content');
  ?>
  <!--Left Section-->
<div class="left_section">
	<div class="grid_bar">
				<?php echo $this->Element('listings/sort_form');?>     
                   
                </div>
  
  <?php  echo $this->Element('prop_grid_views');?>
  
  <div class="clear"></div>	
	 
		<div class="page_no">
		<?php
		//debug($this->Paginator->params());
		 $this->Paginator->options(array('url' => array('viewType'=>$viewType,'listType'=>$listType,'propertyType'=>$propertyType)));
		echo $this->Paginator->numbers ( array (
				'before' => '',
				'separator' => '',
				'first' => 1,
				'class' => 'page_no_grid',
				'currentTag' => 'a',
				'currentId' => 'page_no_active',
				'currentClass' => 'active',
				'tag' => 'div',
				'after' => '' 
		) );
		?>
		</div> 
		 
		 
		 
		 
		  

</div>
     
 <!--Left Section End-->
    
    
    
    
    <?php echo $this->Element('public_right_form');?>

    
    
    
</div>

<!--Main Container End-->
<div class="clear"></div>
<div class="clear"></div>

<!--Footer-->
 <!--Footer-->
<?php echo $this->Element('footer');?>
<!-- Footer End-->
 
<!-- Footer End-->


</body>
</html>
