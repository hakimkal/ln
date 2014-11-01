<?php

// app/Model/User.php
App::uses ( 'AppModel', 'Model' );
App::uses ( 'SimplePasswordHasher', 'Controller/Component/Auth' );
// App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
	public $hasMany = array (
			'UserProperty' 
	);
	
	public $actsAs = array (
			'Upload.Upload' => array (
						
					'image' => array (
							'fields' => array (
									'dir' => 'image_dir',
									'type' => 'image_type',
									'size' => 'image_size'
							),
							'thumbnailSizes' => array (
										
									'thumb' => '392x392'
							),
							'deleteOnUpdate'=>true,
							'thumbnailMethod' => 'php'
					)
			)
	);
	
	public $validate = array (
			'email' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'An email  is required' 
					),
					'login' => array (
							'rule' => 'isUnique',
							'message' => 'This email has already been taken.' 
					) 
			),
			'password' => array (
					'required' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'A password is required' 
					) 
			),
			'user_type' => array (
					'valid' => array (
							'rule' => array (
									'inList',
									array (
											'staff',
											'member',
											'admin' 
									) 
							),
							'message' => 'Please enter a valid user category',
							'allowEmpty' => false 
					) 
			),
			//'image' => array (
						
				//	'rule' => 'isFileUploadOrHasExistingValue',
					//'message' => 'Avatar is missing from submission'
			//)
	);
	public function beforeFind($query) {
		if (isset ( $query ['conditions'] [$this->alias] ['email'] )) {
			$query ['conditions'] [$this->alias] ['email'] = strtolower ( $query ['conditions'] [$this->alias] ['email'] );
		}
		return $query;
	}
	public function beforeSave($options = array()) {
		if (isset ( $this->data [$this->alias] ['password'] )) {
			
			$passwordHasher = new SimplePasswordHasher ();
			
			$this->data [$this->alias] ['password'] = $passwordHasher->hash ( $this->data [$this->alias] ['password'] );
			$this->data [$this->alias] ['email'] = strtolower ( $this->data [$this->alias] ['email'] );
		}
		return true;
	}
}

?>