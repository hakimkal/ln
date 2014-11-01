<?php $this->Html->addCrumb('Join Us','/register');?>
<div id="main" class="site-main container_16">
	<div class="inner">

		<div class="register_form">
			<div class="reg_header">
				<br />
				<p class="form_heading">GOTNI Registration Form</p>
				<p class="sign_btn">
					<!-- <a href="#"  onclick="popup();"><span><img src="<?php echo $this->Html->url('/img');?>/Facebook_signin.png"/></span></a>
				
				
				 
				
					<a href="#"><span><img src="<?php echo $this->Html->url('/img');?>/twitter_signin.png"/></span></a>
					-->
				</p>
			</div>
			<p class="form_heading1">OR</p>
			<p class="form_heading1">Create a New One</p>
			<?php  echo $this->Form->create('Member',array('action'=>'/register','method'=>'post','type'=>'file'));?>
			<div class="text_box">
				<p>
					<img src="<?php echo $this->Html->url('/img');?>/name.png" />
				</p>
				<p class="input_box">
			<?php echo $this->Form->textField('firstname',array('class'=>'text_input','placeholder'=>'First Name','required'=>true) ,array('div'=>'false'));?>
			</p>
			</div>

			<div class="text_box">
				<p>
					<img src="<?php echo $this->Html->url('/img');?>/name.png" />
				</p>
				<p class="input_box">
			 	<?php echo $this->Form->textField('middlename',array('class'=>'text_input','placeholder'=>'Middle Name') ,array('div'=>'false'));?>
		
			</p>
			</div>


			<div class="text_box">
				<p>
					<img src="<?php echo $this->Html->url('/img');?>/name.png" />
				</p>
				<p class="input_box">
			<?php echo $this->Form->textField('lastname',array('class'=>'text_input','placeholder'=>'Last Name','required'=>'required') ,array('div'=>'false'));?>
			
			
			</p>
			</div>

			<div class="text_box">
				<p>
					<img src="<?php echo $this->Html->url('/img');?>/PHONE.png" />
				</p>
				<p class="input_box">
			
		 		<?php echo $this->Form->textField('phone_number',array('class'=>'text_input','placeholder'=>'Phone Number','required'=>'required') ,array('div'=>'false'));?>
		
			
			</p>
			</div>


			<div class="text_box">
				<p>
					<img src="<?php echo $this->Html->url('/img');?>/EMAIL.png" />
				</p>
				<p class="input_box">
			
			
			 
				<?php echo $this->Form->email('email',array('class'=>'text_input','placeholder'=>'Email Address','required'=>'true') ,array('div'=>'false'));?>
		
			</p>
			</div>
			<p class="radio_btn">Your Sex:
		 	 
			 	<?php echo $this->Form->radio('sex',array('Male'=>"Male",'Female'=>'Female') ,array('div'=>'false','label'=>false,'legend'=>false,'required'=>true));?>
		
			 </p>
			<p class="radio_btn"> Your Age: 
			
			 
											
											<?php
											
											$age = array ();
											for($i = 18; $i < 50; $i ++) {
												$age [$i] = $i;
											}
											echo $this->Form->select ( 'age', $age, array (
													'class' => 'select',
													'required' => true 
											) );
											?>
											</p>

			<div class="text_box">
				<p>
					<img src="<?php echo $this->Html->url('/img');?>/org.png" />
				</p>
				<p class="input_box">
				<?php echo $this->Form->textField('organization',array('class'=>'text_input','placeholder'=>'Organization / Academic Institution','required'=>'required','div'=>'false'));?>
			
		</p>

			</div>

			<p class="radio_btn"> State of Residence:
	<?php echo $this->Form->textField('state_of_residence',array('class'=>'text_input','placeholder'=>'Phone Number','required'=>'required','div'=>'false'));?>
		
</p>

			<p class="radio_btn"> Country of Residence: 

	<?php echo $this->Form->textField('country_of_residence',array('class'=>'text_input','placeholder'=>'Phone Number','required'=>'required','div'=>'false'));?>
		
</p>



			<p class="radio_btn">Why should we approve your application:


<?php echo $this->Form->textarea('reasons_for_approval');?>

</p>


			<p class="radio_btn">
				Upload your CV:<br />
<?php echo $this->Form->file('cv_path',array('class'=>'file_upload'));?>
 
</p>		
 
<?php echo $this->Form->submit('',array('class'=>'submit'));?>
<br />
<?php echo $this->Form->end();?>
	 
			
			</div>



		<div class="right_side_cnt">
			<h4>Why Join Us</h4>
			<br />

			<h5>Today’s reality: Leadership Crisis</h5>
			<br /> In 2007, Mario Costa, Executive Director, United Nations
			Office on Drugs and Crimes (UNODC), made a shocking revelation when
			he noted that between independence and the present day, Nigeria has
			lost over USD 400 billion to her corrupt leaders.<br /> Indeed, world
			over, the socio-political and economic advancement of nations depend
			on the leadership capital quality of the people entrusted with the
			position of leadership. For nearly five decades now, the Nigerian
			experience has been a tale of crushed hopes and missed opportunities.
			As renowned novelist Chinua Achebe rightly put it, "The trouble with
			Nigeria is simply and squarely a failure of leadership.<br /> <br />

			<h5>TODAY’S RESPONSE: GUARDIANS OF THE NATION INTERNATIONAL (GOTNI)</h5>
			<br /> The burning desire and growing need to groom, mentor and train
			genuine “servant leaders” who will deliver quality leadership to the
			Nigerian people necessitated the birth of Guardians of the Nation
			International (GOTNI) over a decade ago. GOTNI is a not-for-profit
			Youth Leadership Development Organisation with a passion to transform
			not just our nation Nigeria but societies in Africa and across the
			world.<br /> <br />

			<h5>TODAY’S REQUEST: INVEST IN THE FUTURE</h5>
			<br /> A new face in the crowd. He is young. He thinks he is small
			and insignificant. But he is not. He is growing bigger and stronger
			everyday. Soon he will become a leader at the forefront of economic
			policy, business and politics. His decisions will change lives,
			industries, communities, nations, Africa and the world. He may not
			know it but all he would ever become is being shaped by his
			environment right now; what he sees, what he hears, what he believes,
			what he is exposed to. His time may be in the future but the building
			blocks for his future are laid now. Good or bad, whatever he
			becomes……he looks to you for his future. This is why we must ensure
			that his mind is transformed.<br /> <br /> Join us to help transform
			Nigeria. One young mind at a time. Become a guardian of the nation.<br />
			<br /> Join GOTNI today as a mentor, volunteer, member, associate
			member.




		</div>






		<div class="clear"></div>
	</div>
</div>

<script type="text/javascript">

		function popup()
		{

		    popupWindow = window.open('<?php echo $this->Html->url("/facebookRegister");?>','name','width=600,height=600');
		    popupWindow.focus();
		}
		
<!--

//-->
</script>
