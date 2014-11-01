<?php
App::uses ( 'CakeEmail', 'Network/Email' );
class PropertyTypesController extends AppController {
	public function beforeFilter() {
		//parent::beforeFilter ();
		
		if ($this->Auth->user ( 'user_type' ) == 'staff') {
			$this->layout = 'dashboard';
		} elseif ($this->Auth->user ( 'user_type' ) == 'member') {
			$this->Session->setFlash ( 'Suspicious activity detected, You may be blacklisted!' );
			$this->redirect ( '/login' );
		}
		
		// $this->Auth->allow ( );
	}
	public function index() {
		$this->PropertyType->recursive = 1;
		$s = $this->PropertyType->find ( 'all' );
		$this->set ( 'PropertyTypes', $PropertyTypes );
		$typeOfs = 'All Staff';
		$this->set ( 'type_of_s', $typeOfs );
	}
	public function view($id = null) {
		
		$this->PropertyType->id = $id;
		if (! $this->PropertyType->exists ()) {
			throw new NotFoundException ( __ ( 'PropertyType Invalid ' ) );
		}
		$this->set ( 'PropertyType', $this->PropertyType->read ( null, $id ) );
	}
	public function add() {
		$this->set ( 'title_for_layout', ' Property Type - Create' );
		if($this->Auth->user('user_type')== 'admin' ||$this->Auth->user('user_type')== 'staff'){
			$this->layout ='dashboard';
		}
		if ($this->request->is ( 'post' )) {
			
			$this->PropertyType->create ();
			if ($this->PropertyType->save ( $this->request->data, array (
					'validates' => true 
			) )) {
				
				$this->Session->setFlash ( __ ( 'Successfully saved .' ) );
				
				return $this->redirect ( '/PropertyTypes' );
			} 
			else {
				$errors = 'Please correct the following errors.' . "\\n";
				// debug($this->->validationErrors);
				foreach ( $this->PropertyType->validationErrors as $v => $k ) {
					foreach ( $k as $value ) {
						// debug($value);
						$errors .= $value . "\\n";
					}
				}
				// debug($errors);
				$this->Session->setFlash ( $errors, 'flash_custom' );
			}
			
		}
	}
	public function edit($id = null) {
		$this->PropertyType->id = $id;
		if (! $this->PropertyType->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid ' ) );
		}
		if ($this->request->is ( 'post' ) || $this->request->is ( 'put' )) {
			if ($this->PropertyType->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The  has been saved' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
			$this->Session->setFlash ( __ ( 'The  could not be saved. Please, try again.' ) );
			
			$errors = 'Please correct the following errors.' . "\\n";
			// debug($this->->validationErrors);
			foreach ( $this->PropertyType->validationErrors as $v => $k ) {
				foreach ( $k as $value ) {
					// debug($value);
					$errors .= $value . "\\n";
				}
			}
			$this->set ( 'errors', $errors );
		} else {
			$this->request->data = $this->PropertyType->read ( null, $id );
		}
	}
	public function delete($id = null) {
		$this->request->onlyAllow ( 'post' );
		
		$this->PropertyType->id = $id;
		if (! $this->PropertyType->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid ' ) );
		}
		if ($this->PropertyType->delete ()) {
			$this->Session->setFlash ( __ ( ' deleted' ) );
			return $this->redirect ( array (
					'action' => 'index' 
			) );
		}
		$this->Session->setFlash ( __ ( 'selected item was not deleted' ) );
		return $this->redirect ( array (
				'action' => 'index' 
		) );
	}
}
?>