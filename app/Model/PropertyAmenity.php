<?php

// app/Model/Event.php
App::uses ( 'AppModel', 'Model' );
// App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class PropertyAmenity extends AppModel {
	 
	 public $hasMany = array('UserPropertyAmenity');
	public $validate = array (
			'type' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'A title is required' 
					) ,
					
					'uniqueVal' => array (
							'rule' => 'isUnique',
							'message' => 'duplicate amenity type is not allowed.'
					),
			),
			
			// 'role' => array(
			// 'valid' => array(
			// 'rule' => array('inList', array('admin', 'author')),
			// 'message' => 'Please enter a valid role',
			// 'allowEmpty' => false
			// )
			// ),
			
			 
	);
	public function beforeSave($options = array()) {
		$this->data [$this->alias] ['type'] = ucwords ( $this->data [$this->alias] ['type'] );
		
		return true;
	}
}

?>