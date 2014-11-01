  <!-- CONTENT -->
            <div id="content">
<div class="container">
    <div>
        <div id="main">
            <div class="list-your-property-form">
    <h2 class="page-header">Edit Profile</h2>

    <div class="content">
         

       <?php echo $this->Form->create('User',array('type'=>'file'));?>
            <div class="row">
                <div class="span6">
                    <h3><strong>1.</strong> <span>Personal info</span></h3>

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyFirstName">
                            First name
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <?php echo  $this->Form->text('firstname');?>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertySurname">
                            Surname
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                           <?php echo  $this->Form->text('lastname');?>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyEmail">
                            Email
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                         <?php echo  $this->Form->text('email');?>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyPhone">
                            Phone
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                              <?php echo  $this->Form->text('phone');?>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                </div><!-- /.span4 -->

                 
                <div class="span6">
                    <h3><strong>3.</strong> <span>Image upload</span></h3>

                    <div class="fileupload fileupload-new control-group" data-provides="fileupload">
                        <label class="control-label" for="inputPropertyPrice">
                            Image files
                        </label>

                        <div class="input-append">
                            <div class="uneditable-input">
                                <i class="icon-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                                                <span class="btn btn-file">
                                                    <span class="fileupload-new">Select file</span>
                                                    <span class="fileupload-exists">Change</span>
                                                     <?php echo  $this->Form->hidden('id');?>
                           
                                                   <?php echo  $this->Form->file('image',array('required'=>false));?>
                                                </span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div><!-- /.input-append -->
                    </div><!-- .fileupload -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyNotes">
                            Your Biography
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                              <?php echo  $this->Form->textarea('profile');?>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                    
                    
                    <div class="control-group">
				 
				<div class="controls">
				<input type="hidden" name="data[User][user_type]" value='member'/>
					<button class="btn btn-success  login_right" type="submit">Submit Property</button>
				</div>
				<!-- /.controls -->
			</div>
			<!-- /.control-group -->
                </div><!-- /.span4 -->
            </div><!-- /.row -->
       <?php echo $this->Form->end();?>
    </div><!-- /.content -->
</div><!-- /.list-your-property-form -->        </div>
    </div>
</div>

    </div><!-- /#content -->