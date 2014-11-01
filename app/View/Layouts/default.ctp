<?php
$cakeDescription = __d ( 'cake_dev', 'Land.Net | Your Leading Property Listing Portal!  ' );
 ?>


<!DOCTYPE html>
<?php echo $this->Facebook->html(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php echo $this->Html->url('/');?>css/style.css"
	rel="stylesheet" type="text/css" />
<link href="<?php echo $this->Html->url('/');?>css/responsive.css"
	rel="stylesheet" type="text/css" />
<link href="<?php echo $this->Html->url('/');?>css/stylesheet.css"
	rel="stylesheet" type="text/css" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'
	rel='stylesheet' type='text/css'>
	<title>
		<?php echo $cakeDescription ?>:
		<?php //echo $title_for_layout; ?>
	</title> <!-- pop up -->
	<link rel="stylesheet"
	href="<?php echo $this->Html->url('/');?>css/reveal.css">

	
	
	<?php 
	
	$excluded_views = array ('/','/landNet/');
//echo $this->request->here;
	if (!in_array ( $this->request->here, $excluded_views )):?>
	
		<?php echo '<!--' . $this->request->here . '-->';?>
		 
	 
 	
   
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>css/assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>css/assets/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>css/assets/libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>css/assets/libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>css/assets/libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>css/assets/css/realia-blue.css" type="text/css" id="color-variant-default">
  
	<?php else:?>
	<?php endif;?>
<!-- Attach necessary scripts -->
<!-- <script type="text/javascript" src="<?php echo $this->Html->url('/');?>jquery-1.4.4.min.js"></script> -->
<script type="text/javascript"
	src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>js/jquery.reveal.js"></script>
<!-- pop up -->
<?php
echo $this->Html->meta ( 'icon' );

echo $this->fetch ( 'meta' );
echo $this->fetch ( 'css' );
echo $this->fetch ( 'script' );
?>
</head>

<body>


 
	
 
	
	 <?php echo $this->Element('modal');?>

			<?php  //debug($this->Session->read());
//echo $this->Session->flash();
 ?>
 
			<?php echo $this->fetch('content'); ?>
			
			
	 	
	<?php   echo $this->Element('footer');?>
	

 </body>
</html>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/jquery.currency.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/retina.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/gmap3.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/gmap3.infobox.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/libraries/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/');?>css/assets/js/realia.js"></script>


<?php   echo $this->Element('notifier');?>