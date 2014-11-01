





<div class="Main_banner">
	<div class="header_login">
		<?php echo $this->Element('header_buttons');?>

		<div class="clear"></div>
		<div class="h_search">
			<p class="where">Where are you looking for?</p>
			  <p class="what">What are you looking for?</p >
			<?php echo $this->Form->create('UserProperty',array('action'=>'index'))?>
				<input type="search" class="where_search" name="data[UserProperty][q]"
					placeholder="Enter City, State, Country, Zip code" /> 
					<input
					type="search" class="what_search" name="data[UserProperty][search]"
					placeholder="Enter Home, Land, property" /> <br /> 
					<input value=""	type="submit" class="search_btn" name="button" />
			<?php echo $this->Form->end();?>
			<p class="add_search">Advanced Search</p>
		</div>
	</div>


</div>

<!--Main Container-->
<div id="main_container">
	<!--Banner Search Bar-->

	<!--Banner Search Bar End-->
	<!--Left Section-->
	<div id="middle_contant">



		<div id="grid_view_section">

			<!--Top Grid-->
         <?php echo $this->Element('featured_properties');?>
                   
                 



		<!--Button Grid End-->


			<div class="clear"></div>
			<div class="clear"></div>

<?php echo $this->Element('latest_property_links')?>
    
<!--    footer up section-->

			<div class="footer_up_section">
  
 

 <?php echo $this->Element('landed_properties');?>
  
  
  
  
  
  
  
  



		<!--    footer up section end-->


			</div>









		</div>

		<!--Left Section End-->





		<!--Right Section-->


		<!--Right Section End-->






	</div>

	<!--Main Container End-->
	<div class="clear"></div>
	<div class="clear"></div>