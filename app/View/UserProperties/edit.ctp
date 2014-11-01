<?php $this->Html->addCrumb('Edit staff');?>





<div class="page-header">
	<h1>Edit Staff</h1>
</div>

<!-- Widget Row Start grid -->
<div class="row" id="powerwidgets">

	<div class="col-md-6 bootstrap-grid sortable-grid ui-sortable">

		<!-- New widget -->

		<!-- End .powerwidget -->

		<!-- New widget -->


		<!-- End .powerwidget -->

		<div class="powerwidget dark-red powerwidget-sortable" id="forms-6"
			data-widget-editbutton="false" role="widget" style="">
			<header role="heading">
				<h2>
					Cuddles Daycare Centre <small> Power Admin</small>
				</h2>
				<div class="powerwidget-ctrls" role="menu">
					<a href="#" class="button-icon powerwidget-fullscreen-btn"><i
						class="fa fa-arrows-alt "></i></a> <a href="#"
						class="button-icon powerwidget-toggle-btn"><i
						class="fa fa-chevron-circle-up "></i></a>
				</div>
				<span class="powerwidget-loader"></span>
			</header>
			<div class="inner-spacer" role="content">
					 
							<?php  echo $this->Form->create('User',array('action'=>'/edit','method'=>'post','class'=>'form-horizontal'));?>	 
		
								<fieldset>

					<!-- Form Name -->
					<legend>Edit Staff</legend>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Email</label>
						<div class="col-md-8">
							 
									<?php echo $this->Form->email('email',array('class'=>"form-control input-md",'placeholder'=>'*Email here','required'=>true));?>
									 
							</div>
					</div>

					 

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Firstname</label>
						<div class="col-md-8">
							 
									<?php echo $this->Form->text('firstname',array('class'=>"form-control input-md",'placeholder'=>'*Firstname here','required'=>true));?>
									 
							</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Lastname</label>
						<div class="col-md-8">
							 
									<?php echo $this->Form->text('lastname',array('class'=>"form-control input-md",'placeholder'=>'*Family Name here','required'=>false));?>
									 
							</div>
					</div>


					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Phone</label>
						<div class="col-md-8">
							 
									<?php echo $this->Form->text('phone_number',array('class'=>"form-control input-md",'placeholder'=>'Phone number here','required'=>false));?>
									 
							</div>
					</div>




<?php echo $this->Form->hidden('id');?>

					<!-- Multiple Radios (inline) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="radios">Sex</label>


<?php 
if($this->data['User']['sex'] == 'M')
 
{

$selM = 'checked';
$selF = '';
			
}
else{
	$selM = '';
$selF = 'checked';
}
?>

						<div class="col-md-8">
							<label class="radio-inline" for="UserSexMale"> <input
								name="data[User][sex]" id="UserSexMale" value="M" <?php echo $selM;?> type="radio">Male
							</label> <label class="radio-inline" for="UserSexfemale"> <input
								name="data[User][sex]" id=UserSexfemale " <?php echo $selF; ?> value="F" type="radio">
								Female
							</label>
						</div>
					</div>










					<!-- Select Basic -->
					<div class="form-group">
							<?php
							$res = array (
									'staff' => 'Staff',
									'member' => 'Parent',
									'admin' => 'Admin' 
							);
							
							?>
							 
						 	<label class="col-md-4 control-label" for="selectbasic">Select
							Role</label>
						<div class="col-md-8">
								  
								
								<?php echo $this->Form->select('role',$res, array('class'=>'form-control'));?>
							</div>
					</div>

					<!-- Button (Double) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="button1id">&nbsp; </label>
						<div class="col-md-8">
							<button id="button1id" name="button1id" class="btn btn-success">Save</button>

						</div>
					</div>
				</fieldset>
						<?php echo $this->Form->end();?>
						</div>
		</div>

	</div>
	<div class="col-md-6 bootstrap-grid sortable-grid ui-sortable">

		<!-- New widget -->


		<!-- End .powerwidget -->

		<!-- New widget -->


		<!-- End .powerwidget -->



	</div>
	<!-- /Inner Row Col-md-12 -->
</div>
<!-- /Widgets Row End Grid-->
</div>
<!-- / Content Wrapper -->



<!-- scroll top -->
<div class="scroll-top-wrapper hidden-xs show">
	<i class="fa fa-angle-up"></i>
</div>
<!-- /scroll top -->





<!--Scripts-->
<!--JQuery-->
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/jquery/jquery-ui.min.js"></script>


<!--Forms-->
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/forms/jquery.form.min.js"></script>
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/forms/jquery.validate.min.js"></script>
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/jquery-steps/jquery.steps.min.js"></script>

<!--NanoScroller-->
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/nanoscroller/jquery.nanoscroller.min.js"></script>

<!--Sparkline-->
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/sparkline/jquery.sparkline.min.js"></script>

<!--Horizontal Dropdown-->
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/horisontal/cbpHorizontalSlideOutMenu.js"></script>
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/classie/classie.js"></script>

<!--PowerWidgets-->
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/powerwidgets/powerwidgets.min.js"></script>

<!--Bootstrap-->
<script type="text/javascript"
	src="<?php echo $this->Html->url('/cms/');?>js/vendors/bootstrap/bootstrap.min.js"></script>






<!--/Scripts-->



</body>