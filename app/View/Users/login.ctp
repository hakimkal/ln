<?php
$this->Html->addCrumb ( 'Login' );
// ,$this->request->here);
?>

<div class="colorful-page-wrapper">
  <div class="center-block">
    <div class="login-block">
      
      <?php  echo $this->Form->create('User',array('id'=>"login-form",'action'=>'login','class'=>'orb-form'))?>
        <header>
          <div class="image-block"><a href="<?php echo $this->Html->url('/');?>"><img src="<?php echo $this->Html->url('/cms/');?>images/logo1.png" alt="User" />
          
          </a></div>
         
          <div class="p_s_login">
          Parent Login <br/>
           Staff Login

         </div>
          </header>
        <fieldset>
          <section>
            <div class="row">
              <label class="label col col-4">E-mail</label>
              <div class="col col-8">
                <label class="input"> <i class="icon-append fa fa-user"></i>
                 
                  <?php echo $this->Form->email('email');?>
                </label>
              </div>
            </div>
          </section>
          <section>
            <div class="row">
              <label class="label col col-4">Password</label>
              <div class="col col-8">
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                <?php echo $this->Form->password('password');?>
                </label>
                <div class="note"><a href="#">Forgot password?</a></div>
              </div>
            </div>
          </section>
          
        </fieldset>
        <footer>
          <button type="submit" class="btn btn-default">Log in</button>
        </footer>
      <?php echo $this->Form->end();?>
    </div>
    
    <div class="copyrights">  Power Admin Dashboard  <br>
      Created by Le Proghrammeen Solutions &copy; 2014 </div>
  </div>
</div>

