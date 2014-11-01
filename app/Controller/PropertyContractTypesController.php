<?php
App::uses ( 'CakeEmail', 'Network/Email' );
class PropertyContractTypesController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter ();
	 
		
		
		if ($this->Auth->user ( 'user_type' ) == 'staff' || $this->Auth->user('user_type')=='admin') {
			$this->layout = 'dashboard';
		} elseif ($this->Auth->user ( 'user_type' ) == 'member') {
			$this->Session->setFlash ( 'Suspicious activity detected, You may be blacklisted!' );
			$this->redirect ( '/login' );
		}
	}
	public function index() {
		 
		$this->UserProperty->recursive = 1;
		$Users = $this->UserProperty->find ( 'all' );
		$this->set ( 'Users', $Users );
		$typeOfUsers = 'All Staff';
		$this->set ( 'type_of_users', $typeOfUsers );
	}
	public function view($id = null) {
		$this->User->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		$this->set ( 'user', $this->User->read ( null, $id ) );
	}
	public function add() {
		$this->set ( 'title_for_layout', ' User - Create' );
		if($this->Auth->user('user_type')== 'admin' ||$this->Auth->user('user_type')== 'staff'){
			$this->layout ='dashboard';
		}
		//if ($this->Auth->user ( 'role' ) != 'admin') {
		//	return $this->redirect ( '/users' );
		//}
		if ($this->request->is ( 'post' )) {
			 
			$this->PropertyContractType->create ();
			if ($this->PropertyContractType->saveAll ( $this->request->data, array (
					'validates' => true 
			) )) {
				
				$this->Session->setFlash ( __ ( 'Successfully saved contract type.' ) );
				 
				 
				return $this->redirect ( '/property_contract_types' );
			}
			$errors = 'Please correct the following errors.' . "\\n";
			// debug($this->User->validationErrors);
			foreach ( $this->User->validationErrors as $v => $k ) {
				foreach ( $k as $value ) {
					// debug($value);
					$errors .= $value . "\\n";
				}
			}
			// debug($errors);
			$this->Session->setFlash ( $errors, 'flash_custom' );
		}
	}
	public function edit($id = null) {
		$this->PropertyContractType->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->request->is ( 'post' ) || $this->request->is ( 'put' )) {
			if ($this->PropertyContractType->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The user has been saved' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
			$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
			
			$errors = 'Please correct the following errors.' . "\\n";
			// debug($this->User->validationErrors);
			foreach ( $this->PropertyContractType->validationErrors as $v => $k ) {
				foreach ( $k as $value ) {
					// debug($value);
					$errors .= $value . "\\n";
				}
			}
			$this->set ( 'errors', $errors );
		} else {
			$this->request->data = $this->PropertyContractType->read ( null, $id );
			unset ( $this->request->data ['User'] ['password'] );
		}
	}
	public function delete($id = null) {
		$this->request->onlyAllow ( 'post' );
		
		$this->PropertyContractType->id = $id;
		if (! $this->PropertyContractType->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->PropertyContractType->delete ()) {
			$this->Session->setFlash ( __ ( 'User deleted' ) );
			return $this->redirect ( array (
					'action' => 'index' 
			) );
		}
		$this->Session->setFlash ( __ ( 'User was not deleted' ) );
		return $this->redirect ( array (
				'action' => 'index' 
		) );
	}
 
 
}

?>