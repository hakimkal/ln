<?php

// app/Model/Event.php
App::uses ( 'AppModel', 'Model' );

class UserPropertyImage extends AppModel {
	
	public $belongsTo = array('UserProperty');
	public $actsAs = array (
			'Upload.Upload' => array (
					
					'image' => array (
							'fields' => array (
									'dir' => 'image_dir',
									'type' => 'image_type',
									'size' => 'image_size' 
							),
							'thumbnailSizes' => array (
									
									'thumb' => '384x384', 
									 'vga' => '285x185',
                    
							),
							'deleteOnUpdate'=>true,
							'thumbnailMethod' => 'php' 
					) 
			) 
	);
	 
	 
	public function beforeSave($options = array()) {
		
		
		return true;
	}
}

?>