
<?php echo $this->Form->create('PropertyType',array('type'=>'file'))?>
	<div class="row">
		<div class="span4">
			<h3>
				<strong>1.</strong> <span>Property Type</span>
			</h3>

			<div class="control-group">
				<label class="control-label" for="inputPropertyFirstName"> Type <span class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
					 
					<?php echo $this->Form->text('type')?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->

			<div class="control-group">
				<label class="control-label" for="inputPropertySurname"> Description <span
					class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
				<?php echo $this->Form->text('description')?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->

			 

			 
			
				<div class="control-group">
				 
				<div class="controls">
					<button class="btn btn-success  login_right" type="submit">Save</button>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
		</div>
		<!-- /.span4 -->

		 
		 
	</div>
	<!-- /.row -->
<?php echo $this->Form->end();?>