<div class="find_location">
<p class="location_h"><img src="<?php echo $this->Html->url('/img/');?>images/icon/location.png" />
<p class="findout">Find out how to feature your property</p>

</p>

</div>

<!--Footer-->
<div class="footer">
        <div class="footer_lining"></div>
    <div class="footer_cnt">
    	<div class="f_LeftSide">
        
       <nav class="footer_nav">
       <h3 class="color">Featured Locations</h3>
           
           
           <?php foreach(($ListedLocations) as $ll):?>
              <nav> <?php echo $this->Html->link( $ll['UserProperty']['location'],array('controller'=>'UserProperties','action'=>'index',$ll['UserProperty']['location'],'location'));?> </a></nav>
           <?php endforeach;?>
       </nav>
        
       <nav class="footer_nav">
       <h3 class="color">Properties for Sale</h3>
       
           <?php foreach($LatestPropertiesNames as $lpn):?>

	 <nav><?php echo $this->Html->link($lpn['PropertyType']['type'],array('controller'=>'UserProperties','action'=>'index',$lpn['PropertyType']['type'],'type'));?></nav>
	
	
 
  
<?php endforeach;?>

       </nav>

       <nav class="footer_nav">
       <h3 class="color">Properties for Lease/Rent</h3>
            
           <?php //debug($PropertiesForLease)?>
           <?php foreach (($PropertiesForLease) as $pl=>$v):?>
           
             <nav>
             <?php ?>
             <?php echo $this->Html->link($v,'#');?>
             </nav>
           <?php endforeach;?>

       </nav>
        
        
        
        
        </div>
            <div class="f_rightSide">
        <p class="latest_h">Search For Real Estate</p>
		
		<p class="news_txt">&nbsp; &nbsp; &nbsp; 
		   Time Inc. to Move <br />&nbsp; &nbsp; &nbsp;
		    Headquarters to Bookfield Place <br /> &nbsp; &nbsp; &nbsp;
			in Lower Manrattan.<br /> 
			<p class="news_date"> 2 feb 2014</h3>	</p>
            
 
 		<p class="news_txt">&nbsp; &nbsp; &nbsp; 
		   Time Inc. to Move <br />&nbsp; &nbsp; &nbsp;
		    Headquarters to Bookfield Place <br /> &nbsp; &nbsp; &nbsp;
			in Lower Manrattan.<br /> 
			<p class="news_date"> 2 feb 2014</h3>	</p>


		<p class="news_txt">&nbsp; &nbsp; &nbsp; 
		   Time Inc. to Move <br />&nbsp; &nbsp; &nbsp;
		    Headquarters to Bookfield Place <br /> &nbsp; &nbsp; &nbsp;
			in Lower Manrattan.<br /> 
			<p class="news_date"> 2 feb 2014</h3>	</p>

            
            </div>
    
    </div>
		<div class="copyright">
		<div class="copyright_p"> &copy; copyright 2014 land.net. All Right Reserved 
			<span class="footer_copy_nav">												
			<a href="<?php echo $this->Html->url('/');?>">Home</a>&nbsp; &nbsp; &nbsp;
			<a href="#">Help</a>&nbsp; &nbsp; &nbsp;
			<?php if($this->Session->read('Auth.User.id')):?>
			<a href="<?php echo $this->Html->url('/UserProperties/add');?>">List Property</a>
			<?php else:?>
				<a href="<?php echo $this->Html->url('/properties');?>">Listed Properties</a>
			<?php endif;?>
		</span>
		 </div>
		</div>
</div>
<!-- Footer End-->
