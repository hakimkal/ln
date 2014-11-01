<?php

// app/Model/Event.php
App::uses ( 'AppModel', 'Model' );

class UserProperty extends AppModel {
	
	public $belongsTo = array('User','PropertyType','PropertyContractType');
	 public  $hasMany = array('UserPropertyImage','UserPropertyAmenity');
	 
	public $validate = array (
			
			'title' => array (
					'required' => array (
							'rule' => array (
									'notEmpty'
									,
									'message' => 'property title is required' ),
					)
			),
			'location' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							,
							'message' => 'property location is required' ),
					) 
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
		$this->data [$this->alias] ['location'] = ucwords ( $this->data [$this->alias] ['location'] );
		$this->data [$this->alias] ['title'] = ucwords ( $this->data [$this->alias] ['title'] );
		$this->data [$this->alias] ['address'] = ucwords ( $this->data [$this->alias] ['address'] );
		
		return true;
	}
}

?>