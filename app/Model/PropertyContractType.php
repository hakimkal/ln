<?php

// app/Model/Event.php
App::uses ( 'AppModel', 'Model' );
// App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class PropertyContractType extends AppModel {
	
	public $hasMany = array('UserProperty');
	public $validate = array (
			'type' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'An title is required' 
					),
					
					'uniqueVal' => array (
							'rule' => 'isUnique',
							'message' => 'duplicate property contract type is not allowed.' 
					) 
			) 
	
	 
		)

	;
	public function beforeSave($options = array()) {
		$this->data [$this->alias] ['type'] = ucwords ( $this->data [$this->alias] ['type'] );
		
		return true;
	}
}

?>