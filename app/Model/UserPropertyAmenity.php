<?php

// app/Model/Event.php
App::uses ( 'AppModel', 'Model' );

class UserPropertyAmenity extends AppModel {
	
	public $belongsTo = array('UserProperty','PropertyAmenity');
	 
	 
	/* public $validate = array (
			'location' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							,
							'message' => 'property location is required' ),
					) 
			), */
			
			 
			 
	//);
	 
}

?>