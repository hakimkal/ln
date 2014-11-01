<div id="myModal" class="reveal-modal">
			
			<div class="main_popup">
			<div class="main_popup1">
			<div class="main_popup1_1">
			<h1>Login</h1>
			</div>
			<?php echo $this->Form->create('User',array('action'=>'login'))?>
			<div class="main_popup1_1">
			<p>Email</p>
			</div>
			<div class="main_popup1_1">
			 
			<?php  echo $this->Form->text('User.email',array('class'=>'main_input'));?>
			</div>
			<div class="main_popup1_1">
			<p>Password</p>
			</div>
			<div class="main_popup1_1">
			  
			<?php   echo $this->Form->password('User.password',array('class'=>'main_input_pass'));?>
			
			</div>
			<div class="main_popup1_1_button">
			 
			 
<?php echo $this->Form->button('Login',array('class'=>'login_button','type'=>'submit'));?>
			 <?php echo $this->Form->end();?>
			</div>
 
			<div class="main_popup1_1_button1">
			 
			</div>
			<div class="main_popup1_1_button">
			<a href="#" class="fogot">Forgot Password</a> | <a href="<?php echo $this->Html->url('/users/add');?>" class="fogot">Sign Up</a>
			</div>
			</div>
			</div>
			
			<a class="close-reveal-modal"><img src="<?php echo $this->Html->url('/img/images');?>/cross.png"></a>
		
		</div>

		
		<div id="myModal2" class="reveal-modal">
			
			<div class="main_popup">
			<div class="main_popup1">
			<div class="main_popup1_1">
			<h1>Register</h1>
			</div>
			<div class="main_popup1_1_reg">
			<p>Join the Number one property listing website. </p>
			</div>
			<?php echo $this->Form->create('User',array('action'=>'registerUser'));?>
			<div class="main_popup1_1">
			<p>Email</p>
			</div>
			<div class="main_popup1_1">
			 
				<?php echo $this->Form->text('User.email',array('class'=>'main_input'));?>
			</div>
			<div class="main_popup1_1">
			<p>Password</p>
			</div>
			<div class="main_popup1_1">
		 
				<?php echo $this->Form->password('User.password',array('class'=>'main_input_pass'));?>
			</div>
			
			<div class="main_popup1_1">
			<p>Password</p>
			</div>
			<div class="main_popup1_1">
		 
				<?php echo $this->Form->password('User.password_verify',array('class'=>'main_input_pass'));?>
			</div>
			<div class="main_popup1_check">
			<div class="checkbox">
		 <input type="hidden" name="data[User][user_type]" value='member'/>
			<?php echo $this->Form->checkbox('User.agreed',array('id'=>'checkbox','checked'=>true));?>
			</div>
			<div class="checkbox1">
			<a href="#" class="fogot">You agree to our <b>terms of use</b></a>
			</div>
			</div>
			
			<div class="main_popup1_1_button">
			<button type="submit" id="button" name="button" class="sign_button">Sign Up</button>
			</div>
			 
			 <?php echo $this->Form->end();?>
			</div>
			</div>
			
			<a class="close-reveal-modal"><img src="<?php echo $this->Html->url('/img/images/');?>cross.png"></a>
		
		</div>
		
		