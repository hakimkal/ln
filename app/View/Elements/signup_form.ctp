
<?php echo $this->Form->create('UserProperty',array('type'=>'file'))?>
	<div class="row">
		 

		<div class="span4">
			<h3>
				<strong>1.</strong> <span>Property info</span>
			</h3>
			 <?php if($this->Session->read('Auth.User.user_type')== 'admin'):?>
			 
			<div class="control-group">
				<label class="control-label" for="inputPropertyLocation">Is this a featured property <span
					class="form-required"  title="This field is required.">*</span>
				</label>
				<div class="controls">
				
					<?php echo $this->Form->checkbox('featured',array('required'=>false));?>
					
				</div>
				<!-- /.controls -->
			
			</div>
			<!-- /.control-group -->
			
				<?php endif;?>
<div class="control-group">
				<label class="control-label" for="inputPropertyLocation">Title <span
					class="form-required"  title="This field is required.">*</span>
				</label>
				<div class="controls">
				 
					<?php echo $this->Form->text('title');?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
			<div class="control-group">
				<label class="control-label" for="inputPropertyLocation"> Location <span
					class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
				 
					<?php echo $this->Form->text('location');?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->

			<div class="property-type control-group">
				<label class="control-label" for="inputPropertyPropertyType">
					Property type <span class="form-required"
					title="This field is required.">*</span>
				</label>
				<div class="controls">
					<select required id="inputPropertyPropertyType" name="data[UserProperty][property_type_id]" style="width: 180px;">
					
						<option id="apartments-1"  value="-1"></option>
					<?php 
					
						foreach ($PropertyTypes as $pc=>$value):?>
						<option id="apartments<?php echo $pc;?>"  value="<?php echo $pc;?>"><?php echo $value;?></option>
						 
						
						<?php endforeach;?>
					</select>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->

			<div class="contract-type control-group">
				<label class="control-label" for="inputPropertyContractType">
					Contract type <span class="form-required"
					title="This field is required.">*</span>
				</label>
				<div class="controls">
				
				<?php 	// print_r($PropertyContractTypes);?>
					<select id="inputPropertyContractType" required  name="data[UserProperty][property_contract_type_id]" style="width: 180px;">
						<option id="apartment-1"  value="-1"></option>
						
						<?php 
					
						foreach ($PropertyContractTypes as $pc=>$value):?>
						<option id="apartment<?php echo $pc;?>"  value="<?php echo $pc;?>"><?php echo $value;?></option>
						 
						
						<?php endforeach;?>
					</select>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->

			<div class="bedrooms control-group">
				<label class="control-label" for="inputPropertyBedrooms"> Bedrooms <span
					class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
				 
				<?php echo $this->Form->text('bedrooms');?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->

			<div class="bathrooms control-group">
				<label class="control-label" for="inputPropertyBathrooms"> Bathrooms
					<span class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
				 
					<?php echo $this->Form->text('bathrooms');?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
 
			<div class="bathrooms area1 control-group" style="float: left;">
			
				<label class="control-label" for="inputPropertyArea"> Area <span
					class="form-required"  title="This field is required.">*</span>
				</label>
				<div class="controls">
					 
					<?php echo $this->Form->text('area',array('required'=>true));?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->

			<div class="price control-group " style="float: right;">
				<label class="control-label" for="inputPropertyPrice"> Price <span
					class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
				 
					<?php echo $this->Form->text('price',array('required'=>true));?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
		</div>
		<!-- /.span4 -->

		<div class="span4">
			 
			 
<div class="control-group">
				<label class="control-label" for="inputPropertyNotes"> Address <span
					class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
				 
					
					<?php echo $this->Form->textarea('address');?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
			
			<div class="control-group">
				<label class="control-label" for="inputPropertyNotes"> notes <span
					class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
				 
					
					<?php echo $this->Form->textarea('notes');?>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
			
			 
			<div class="control-group">
				<label class="control-label" for="inputPropertyNotes">  Amenities <span
					class="form-required" title="This field is required.">*</span>
				</label>
				<div class="controls">
				 
					
				<select id="inputPropertyContractType"   multiple="multiple" name="data[UserPropertyAmenity][][property_amenity_id]" style="width: 360px;">
						 
						 
						<?php 
					
						foreach ($PropertyAmenities as $pc=>$value):?>
						<option id="apartment<?php echo $pc;?>"  value="<?php echo $pc;?>"><?php echo $value;?></option>
						 
						
						<?php endforeach;?>
					</select>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
		</div>
		<!-- /.span4 -->
		
		<div class="span4">
			<h3>
				<strong>3.</strong> <span>Image(s) upload</span>
			</h3>
<?php for($i=0; $i<5;$i++):?>
			<div class="fileupload fileupload-new control-group"
				data-provides="fileupload">
				<label class="control-label" for="inputPropertyPrice"> Image files </label>

				<div class="input-append">
					<div class="uneditable-input">
						<i class="icon-file fileupload-exists"></i> <span
							class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"> <span class="fileupload-new">Select
							file</span> <span class="fileupload-exists">Change</span> 
						 <?php if($i==0):?>
						<?php echo $this->Form->file('UserPropertyImage.'.$i.'.image',array('required'=>true));?>
						<?php else:?>
						<?php echo $this->Form->file('UserPropertyImage.'.$i.'.image',array('required'=>false));?>
						<?php endif;?>
					</span> <a href="#" class="btn fileupload-exists"
						data-dismiss="fileupload">Remove</a>
				</div>
				<!-- /.input-append -->
			</div>
			<!-- .fileupload -->
<?php endfor;?>
			 
			
			<div class="control-group">
				 
				<div class="controls">
				<input type="hidden" name="data[UserProperty][user_id]" value="<?php echo $this->Session->read('Auth.User.id');?>"/>
					<button class="btn btn-success  login_right" type="submit">Submit Property</button>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
		</div>
		<!-- /.span4 -->
	</div>
	<!-- /.row -->
<?php echo $this->Form->end();?>