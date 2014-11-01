<?php
App::uses ( 'CakeEmail', 'Network/Email' );
class UserPropertyImagesController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter ();
		// Allow users to register and logout.
		
		$this->Auth->allow ('index');
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
		$this->set ( 'title_for_layout', 'Cuddles User - Create' );
		Configure::write ( 'debug', 2 );
		
		if ($this->Auth->user ( 'role' ) != 'admin') {
			return $this->redirect ( '/users' );
		}
		if ($this->request->is ( 'post' )) {
			// debug($this->data);
			if ($this->request->data ['User'] ['password'] == $this->request->data ['User'] ['password_verify']) {
				$unencrypted_password = $this->request->data ['User'] ['password'];
			}
			$this->User->create ();
			if ($this->User->saveAll ( $this->request->data, array (
					'validates' => true 
			) )) {
				
				$this->Session->setFlash ( __ ( 'Successfully saved User.' ) );
				$this->sendNewRegistrationEmail ( $this->request->data ['User'] );
				/*
				 * return $this->redirect ( array ( 'action' => 'index' ) );
				 */
				return $this->redirect ( '/users' );
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
		$this->User->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->request->is ( 'post' ) || $this->request->is ( 'put' )) {
			if ($this->User->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The user has been saved' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
			$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
			
			$errors = 'Please correct the following errors.' . "\\n";
			// debug($this->User->validationErrors);
			foreach ( $this->User->validationErrors as $v => $k ) {
				foreach ( $k as $value ) {
					// debug($value);
					$errors .= $value . "\\n";
				}
			}
			$this->set ( 'errors', $errors );
		} else {
			$this->request->data = $this->User->read ( null, $id );
			unset ( $this->request->data ['User'] ['password'] );
		}
	}
	public function delete($id = null) {
		$this->request->onlyAllow ( 'post' );
		
		$this->User->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->User->delete ()) {
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
	public function processContact() {
		if ($this->request->is ( 'post' )) {
			
			if ($this->sendEmail ( array (
					$this->request->data ['User'] ['email'] 
			), $this->request->data ['User'] ['name'], $this->request->data ['User'] ['subject'], $this->request->data ['User'] ['message'] )) {
				$this->Session->setFlash ( 'Thank you for contacting Cuddles. A Cuddles representative will contact you shortly.' );
				return $this->redirect ( '/contact' );
			} else {
				$this->Session->setFlash ( 'We could not process your contact message, sorry!' );
				return $this->redirect ( '/contact' );
			}
		}
	}
	private function sendEmail($emailFrom = array(), $name, $subject, $message) {
		$email = new CakeEmail ();
		$email->config ( 'mandrill' );
		$email->emailFormat ( 'html' );
		
		$to = array (
				'cuddles@cuddlesdaycentre.com' 
		);
		
		$from = $emailFrom [0];
		$viewVars = array (
				'name' => $name,
				'message' => $message,
				'email' => $from,
				'subject' => $subject 
		);
		$email->addHeaders ( array (
				'X-Tags' => array (
						'test' 
				),
				'Reply-To' => $from,
				'track_opens' => true,
				'X-SubAccount' => 'cuddles-contact',
				'X-GlobalVars' => array (
						array (
								'name' => 'date',
								'content' => date ( 'Y-m-d' ) 
						) 
				),
				'X-Vars' => array (
						array (
								'rcpt' => 'cuddles@cuddlesdaycentre.com',
								'vars' => array (
										array (
												'name' => 'email',
												'content' => 'cuddles@cuddlesdaycentre.com' 
										),
										array (
												'name' => 'name',
												'content' => 'Cuddles Info Desk' 
										) 
								) 
						) 
				) 
		) );
		
		$email->template ( 'contact', 'default' );
		$email->viewVars ( $viewVars );
		$email->to ( $to );
		$email->cc ( array (
				$from => $name 
		) );
		$email->bcc ( array (
				"wdzingina@yahoo.com" => "Lami Adams",
				
				"adams2order@yahoo.com" => "Emmanuel Adams",
				"hakimkal@gmail.com" => "Abdulhakim Haliru" 
		)
		 );
		$email->from ( $from, $name );
		$email->subject ( 'Website Visitor Left A Message' );
		
		if ($email->send ()) {
			return true;
		} else {
			return false;
		}
	}
	private function sendNewRegistrationEmail($new_user = array()) {
		$email = new CakeEmail ();
		$email->config ( 'mandrill' );
		$email->emailFormat ( 'html' );
		
		$to = $new_user ['email'];
		
		$viewVars = array (
				'name' => $new_user ['firstname'] . ' ' . $new_user ['lastname'],
				'role' => $new_user ['role'],
				'pass' => $new_user ['password'],
				'email' => $new_user ['email'] 
		)
		;
		$email->addHeaders ( array (
				'X-Tags' => array (
						'test' 
				),
				
				'track_opens' => true,
				'X-SubAccount' => 'registration',
				'X-GlobalVars' => array (
						array (
								'name' => 'date',
								'content' => date ( 'Y-m-d' ) 
						) 
				),
				'X-Vars' => array (
						array (
								'rcpt' => $new_user ['email'],
								'vars' => array (
										array (
												'name' => 'email',
												'content' => $new_user ['email'] 
										),
										array (
												'name' => 'name',
												'content' => $new_user ['firstname'] . ' ' . $new_user ['lastname'] 
										) 
								) 
						) 
				) 
		) );
		
		$email->template ( 'new_user', 'default' );
		$email->viewVars ( $viewVars );
		$email->to ( $to );
		
		$email->bcc ( array (
				/* "wdzingina@yahoo.com" => "Lami Adams",
					
				"adams2order@yahoo.com" => "Emmanuel Adams", */
				"abdulhakim@leproghrammeen.com" => "Abdulhakim Haliru" 
		)
		 );
		// $email->from ( $from, $name );
		$email->subject ( 'Your Cuddles Daycentre Account Details' );
		
		if ($email->send ()) {
			return true;
		} else {
			return false;
		}
	}
}

?>