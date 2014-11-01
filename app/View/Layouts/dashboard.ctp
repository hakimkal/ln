

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo $this->Html->url('/');?>css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>assets/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>assets/libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>assets/libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>assets/libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->Html->url('/');?>assets/css/realia-blue.css" type="text/css" id="color-variant-default">
    <link rel="stylesheet" href="#" type="text/css" id="color-variant">

    <title>Land.Net Member Dashboard</title>
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
    
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});

function show_tab(str){
  
  if(! $("#"+str).hasClass("selected1"))
  {
  
  var alt1 = $("#"+str).attr("alt");
  $(".selected2").removeClass("selected1");
  $("#"+str).addClass("selected1");
  $("#downcontent").load(alt1);
  }
  }
</script>

<style> 
.selected1 {
 	background:#f7814d;
	color:#fff;
	font-weight:normal;
	cursor:pointer;
	padding:10px 30px;
	border-top:2px solid #3982aa;
}s
</style>


    
    
</head>
<body>
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
           <?php echo $this->Element('admin_header');?>
            <!-- NAVIGATION -->
            <div id="navigation">
<?php echo $this->Element('admin_navigation');?>
            </div>
            <!-- /.navigation -->

            <!-- CONTENT -->
 <?php echo $this->fetch('content');?>
</div><!-- /#wrapper-inner -->

</div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->

<!-- /.palette -->

<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="assets/js/jquery.currency.js"></script>
<script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/retina.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/carousel.js"></script>
<script type="text/javascript" src="assets/js/gmap3.min.js"></script>
<script type="text/javascript" src="assets/js/gmap3.infobox.min.js"></script>
<script type="text/javascript" src="assets/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="assets/libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="assets/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/js/realia.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40414414-1', 'byaviators.com');
  ga('send', 'pageview');

</script>-->
</body>
</html>



<?php   echo $this->Element('notifier');?>

