<!-- <div class="inner_page">
 <iframe name="the_iframe" onLoad="calcHeight();" scrolling="no" width="100%" id="the_iframe" src="inner_page/list-your-property.html" frameborder="0" allowtransparency="true"></iframe>	
</div>-->

                     <div id="content">
<div class="container">
    <div>
        <div id="main">
            <div class="list-your-property-form" id="downcontent">
    <h2 class="page-header">My Profile</h2>

    <div class="content">
        <div class="row">
        
        
          <div class="profile_main">
          <div class="profile_main1_1">
          
          <?php 
          //Configure::write('debug',2);
          //debug($User['User']['image']);
          ?>
          <?php if(isset($User['User']['image'])):?>
            <img src="<?php echo $this->Html->url('/files/user/image'.DS.$User['User']['image_dir'].DS.'thumb_'.$User['User']['image']);?>" />
          <?php else:?>
          <img src="<?php echo $this->Html->url('/');?>assets/img/avatar-large.jpg">
          <?php endif;?>
          </div>
          	
          	
          
	 	   </div>
          <div class="profile_main1">
          <div class="profile_main1_1">
 
           <div class="profile_main1_3"><h1><?php echo $User['User']['firstname']. ' '. $User['User']['lastname'];?></h1></div>
           <div class="profile_main1_3">
           <div class="first"><b>Profile</b>  </div>
         
          	<p><?php echo $this->Html->link(("Edit Profile"),'/users/edit/'.$this->Session->read('Auth.User.id'),array( 'escape'=>false  ,'class'=>'login_right'));?></p>
       
           </div>
           
           
           <div class="profile_main1_3">
           <p>
       
       <?php echo $User['User']['profile'];?>
       </p>
           </div>
           
 
          
          
           
            
           
          </div>
          </div>
        </div><!-- /.row -->

        
    </div><!-- /.content -->
</div><!-- /.list-your-property-form -->        </div>
    </div>
</div>

    </div><!-- /#content -->