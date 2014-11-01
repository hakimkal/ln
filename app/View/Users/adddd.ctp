<?php $this->Html->addCrumb('Add staff');?>




<div class="content-wrapper">
	<!--Content Wrapper-->
	<!--Horisontal Dropdown-->


	<!--Breadcrumb-->
		<?php echo $this->element('admin_breadcrumb');?>
			<!--/Breadcrumb-->

	<div class="page-header">
		<h1>Create Staff</h1>
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
						 
							<?php  echo $this->Form->create('User',array('action'=>'/add','method'=>'post','class'=>'form-horizontal'));?>	 
		
								<fieldset>

						<!-- Form Name -->
						<legend>New Staff</legend>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="textinput">Email</label>
							<div class="col-md-8">
							 
									<?php echo $this->Form->email('email',array('class'=>"form-control input-md",'placeholder'=>'*Email here','required'=>true));?>
									 
							</div>
						</div>

						<!-- Password input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="passwordinput">Password
								Input</label>
							<div class="col-md-8">
									<?php echo $this->Form->passowrd('password',array('class'=>"form-control input-md",'placeholder'=>'*Password here','required'=>true));?>
									 
					
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="passwordinput">Verify Password
								Input</label>
							<div class="col-md-8">
									<?php echo $this->Form->passowrd('password_verify',array('class'=>"form-control input-md",'placeholder'=>'*enter password again here','required'=>true));?>
									 
					
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="textinput">Lastname</label>
							<div class="col-md-8">
							 
									<?php echo $this->Form->text('lastname',array('class'=>"form-control input-md",'placeholder'=>'*Family Name here','required'=>true));?>
									 
							</div>
						</div>
						
						
				<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="textinput">Lastname</label>
							<div class="col-md-8">
							 
									<?php echo $this->Form->text('phone_number',array('class'=>"form-control input-md",'placeholder'=>'*Family Name here','required'=>true));?>
									 
							</div>
						</div>
		 
						
						
					 


						<!-- Multiple Radios (inline) -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="radios">Sex</label>
							 
		 	 
			 
			 
							<div class="col-md-8">
								<label class="radio-inline" for="UserSexMale"> <input
									name="data[User][sex]" id="UserSexMale" value="M"  
									type="radio">Male
								</label> 
								
								
								<label class="radio-inline" for="UserSexfemale"> <input
									name="data[User][sex]" id=UserSexfemale" value="F" type="radio"> Female
								</label>  
							</div>
						</div>

						<!-- Multiple Checkboxes (inline) -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="checkboxes">Inline
								Checkboxes</label>
							<div class="col-md-8">
								<label class="checkbox-inline" for="checkboxes-0"> <input
									name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
									1
								</label> <label class="checkbox-inline" for="checkboxes-1"> <input
									name="checkboxes" id="checkboxes-1" value="2" type="checkbox">
									2
								</label> <label class="checkbox-inline" for="checkboxes-2"> <input
									name="checkboxes" id="checkboxes-2" value="3" type="checkbox">
									3
								</label> <label class="checkbox-inline" for="checkboxes-3"> <input
									name="checkboxes" id="checkboxes-3" value="4" type="checkbox">
									4
								</label>
							</div>
						</div>

						<!-- File Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="filebutton">File
								Button</label>
							<div class="col-md-8">
								<input id="filebutton" name="filebutton" class="input-file"
									type="file">
							</div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="selectbasic">Select
								Basic</label>
							<div class="col-md-8">
								<select id="selectbasic" name="selectbasic" class="form-control">
									<option value="1">Option one</option>
									<option value="2">Option two</option>
								</select>
							</div>
						</div>

						<!-- Select Multiple -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="selectmultiple">Select
								Multiple</label>
							<div class="col-md-8">
								<select id="selectmultiple" name="selectmultiple"
									class="form-control" multiple="multiple">
									<option value="1">Option One</option>
									<option value="2">Option Two</option>
									<option value="3">Option Three</option>
									<option value="4">Option Four</option>
								</select>
							</div>
						</div>

						<!-- Prepended text-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="prependedtext">Prepended
								Text</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">prepend</span> <input
										id="prependedtext" name="prependedtext" class="form-control"
										placeholder="placeholder" type="text">
								</div>
								<p class="help-block">help</p>
							</div>
						</div>

						<!-- Appended Input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="appendedtext">Appended
								Text</label>
							<div class="col-md-8">
								<div class="input-group">
									<input id="appendedtext" name="appendedtext"
										class="form-control" placeholder="placeholder" type="text"> <span
										class="input-group-addon">append</span>
								</div>
								<p class="help-block">help</p>
							</div>
						</div>
						<!-- Prepended checkbox -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="prependedcheckbox">Prepended
								Checkbox</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon"> <input type="checkbox">
									</span> <input id="prependedcheckbox" name="prependedcheckbox"
										class="form-control" placeholder="placeholder" type="text">
								</div>
								<p class="help-block">help</p>
							</div>
						</div>

						<!-- Appended checkbox -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="appendedcheckbox">Appended
								Checkbox</label>
							<div class="col-md-8">
								<div class="input-group">
									<input id="appendedcheckbox" name="appendedcheckbox"
										class="form-control" placeholder="placeholder" type="text"> <span
										class="input-group-addon"> <input type="checkbox">
									</span>
								</div>
								<p class="help-block">help</p>
							</div>
						</div>

						<!-- Textarea -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="textarea">Text Area</label>
							<div class="col-md-8">
								<textarea class="form-control" id="textarea" name="textarea">default text</textarea>
							</div>
						</div>

						<!-- Button (Double) -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="button1id">Double
								Button</label>
							<div class="col-md-8">
								<button id="button1id" name="button1id" class="btn btn-success">Good
									Button</button>
								<button id="button2id" name="button2id" class="btn btn-danger">Scary
									Button</button>
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