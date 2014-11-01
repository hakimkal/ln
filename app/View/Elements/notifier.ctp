<!-- Noty -->
	
		<!-- Attach necessary scripts -->
	 
 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>	
  
<script type="text/javascript"
	src="<?php echo $this->Html->url('/js/noty');?>/jquery.noty.js"></script>
<script type="text/javascript"
	src="<?php echo $this->Html->url('/js/noty');?>/layouts/top.js"></script>
<script type="text/javascript"
	src="<?php echo $this->Html->url('/js/noty');?>/themes/default.js"></script>
 
<?php if ($this->Session->check('Message.flash')):?>
 
<script type="text/javascript">
 
var $flash = "<?php  echo $this->Session->flash();?>";
//alert($flash);
$(document).ready(function(){
window.setTimeout(function () {
	 
	noty({
		text: $flash,
		type: 'success',
		timeout: 5000
	});
}, 1000);
});
</script>
 
  
<?php endif;?>

 