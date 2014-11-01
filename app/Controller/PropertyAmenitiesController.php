<?php
App::uses ( 'CakeEmail', 'Network/Email' );
class PropertyAmenitiesController extends AppController {
	public function beforeFilter() {
		 
	if($this->Auth->user('user_type')== 'admin' ||$this->Auth->user('user_type')== 'staff'){
			$this->layout ='dashboard';
		}
		else{$this->Auth->login(); exit();}
	}
	public function index() {
		 
		$this->PropertyAmenity->recursive = 1;
		$PropertyAmenities = $this->PropertyAmenity->find ( 'all' );
		$this->set ( 'PropertyAmenities', $PropertyAmenities );
		$typeOfs = 'All Staff';
		$this->set ( 'type_of_s', $typeOfs );
	}
	public function view($id = null) {
		$this->PropertyAmenity->id = $id;
		if (! $this->PropertyAmenity->exists ()) {
			throw new NotFoundException ( __ ( 'PropertyAmenity Invalid ' ) );
		}
		$this->set ( 'PropertyAmenity', $this->PropertyAmenity->read ( null, $id ) );
	}
	public function add() {
		$this->set ( 'title_for_layout', ' Property Type - Create' );
		 
	 
		if ($this->request->is ( 'post' )) {
			// debug($this->data);
			 
			$this->PropertyAmenity->create ();
			if ($this->PropertyAmenity->saveAll ( $this->request->data, array (
					'validates' => true 
			) )) {
				
				$this->Session->setFlash ( __ ( 'Successfully saved .' ) );
			 
			 
				return $this->redirect ( '/PropertyAmenities' );
			}
			$errors = 'Please correct the following errors.' . "\\n";
			// debug($this->->validationErrors);
			foreach ( $this->PropertyAmenity->validationErrors as $v => $k ) {
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
		$this->PropertyAmenity->id = $id;
		if (! $this->PropertyAmenity->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid ' ) );
		}
		if ($this->request->is ( 'post' ) || $this->request->is ( 'put' )) {
			if ($this->PropertyAmenity->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The  has been saved' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
			$this->Session->setFlash ( __ ( 'The  could not be saved. Please, try again.' ) );
			
			$errors = 'Please correct the following errors.' . "\\n";
			// debug($this->->validationErrors);
			foreach ( $this->PropertyAmenity->validationErrors as $v => $k ) {
				foreach ( $k as $value ) {
					// debug($value);
					$errors .= $value . "\\n";
				}
			}
			$this->set ( 'errors', $errors );
		} else {
			$this->request->data = $this->PropertyAmenity->read ( null, $id );
		 
		}
	}
	public function delete($id = null) {
		$this->request->onlyAllow ( 'post' );
		
		$this->PropertyAmenity->id = $id;
		if (! $this->PropertyAmenity->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid ' ) );
		}
		if ($this->PropertyAmenity->delete ()) {
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