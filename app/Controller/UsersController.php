<?php
App::uses ( 'CakeEmail', 'Network/Email' );
// app/Controller/UsersController.php
class UsersController extends AppController {
	public function beforeFilter() {
		// parent::beforeFilter ();
		// Allow users to register and logout.
		parent::beforeFilter ();
		// Allow Members to register and logout.
		
		if ($this->Auth->user ( 'id' ) != null) {
			$this->layout = 'user_dashboard';
		}
		
		$this->Auth->allow ( 'processContact', 'login', 'logout', 'registerUser' );
	}
	public function login() {
		$this->set ( "title_for_layout", "Login" );
		
		if ($this->request->is ( 'post' ) || $this->Auth->user ( 'id' ) != null) {
			// debug ( $this->request->data );
			if ($this->Auth->login ()) {
				$this->Session->write ( 'USER_ID', $this->Auth->user ( 'id' ) );
				// return $this->redirect($this->Auth->redirect());
				if ($this->Auth->user ( 'user_type' ) == 'member') {
					return $this->redirect ( '/profile' );
				}
				if (($this->Auth->user ( 'user_type' ) == 'admin') || ($this->Auth->user ( 'user_type' ) == 'staff')) {
					
					return $this->redirect ( '/dashboard' );
				}
			} else {
				// debug($this->data);
				$this->Session->setFlash ( __ ( 'Invalid username or password, try again' ) );
				$this->redirect ( '/' );
			}
		} else {
			$this->Session->setFlash ( __ ( 'Restricted to  Registered Agents' ) );
			$this->redirect ( '/' );
		}
	}
	public function logout() {
		$this->Session->setFlash ( 'Goodbye, See you soon' );
		// return $this->redirect($this->Auth->logout());
		
		$this->Auth->logout ();
		$_SESSION ['USER_ID'] = "";
		
		$this->Session->destroy ();
		return $this->redirect ( '/' );
	}
	public function profile() {
		$this->layout = 'user_dashboard';
		// debug($this->Auth->user());
		// $this->Session->setFlash('Thank you ' . $this->Auth->user('email'));
		$this->set ( 'User', $this->User->read ( null, $this->Auth->user ( 'id' ) ) );
	}
	public function index() {
		if (! $this->Auth->user ( 'id' )) {
			$this->redirect ( '/' );
		}
		$this->User->recursive = 1;
		$Users = $this->User->find ( 'all' );
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
	public function registerUser() {
		if ($this->request->is ( 'get' )) {
			// $this->Session->setFlash('Invalid request','flash_custom');
			$this->Session->setFlash ( 'Invalid request' );
			$this->redirect ( '/' );
		}
		if ($this->request->is ( 'post' )) {
			// debug ( $this->data );
			if (($this->request->data ['User'] ['agreed'] == 1) && ($this->request->data ['User'] ['password'] == $this->request->data ['User'] ['password_verify'])) {
				$unencrypted_password = $this->request->data ['User'] ['password'];
			}
			$this->User->create ();
			
			if ($this->User->save ( $this->request->data, array (
					'validates' => true 
			) )) {
				
				$this->Session->setFlash ( __ ( 'You have successfully signed up on Land.Net as a Realtor/Investor.' ) );
				// $this->sendNewRegistrationEmail ( $this->request->data ['User'] );
				/*
				 * return $this->redirect ( array ( 'action' => 'index' ) );
				 */
				return $this->redirect ( '/' );
			} else {
				$errors = 'Please correct the following errors.' . "\\n";
				debug ( $this->User->validationErrors );
				foreach ( $this->User->validationErrors as $v => $k ) {
					foreach ( $k as $value ) {
						// debug($value);
						$errors .= $value . "\\n";
					}
				}
				debug ( $errors );
				// $this->Session->setFlash ( $errors,'flash_custom' );
				$this->Session->setFlash ( $errors );
				return $this->redirect ( '/' );
			}
		}
	}
	public function add() {
		$this->redirect ( '/profile' );
		$this->set ( 'title_for_layout', 'Land.Net User - Create' );
		$this->loadModel ( 'PropertyType' );
		$this->set ( 'PropertyTypes', $this->PropertyType->find ( 'list', array (
				'fields' => array (
						'PropertyType.id',
						'PropertyType.type' 
				) 
		) ) );
		$this->loadModel ( 'PropertyContractType' );
		$this->set ( 'PropertyContractTypes', $this->PropertyContractType->find ( 'list', array (
				'fields' => array (
						'PropertyContractType.id',
						'PropertyContractType.type' 
				) 
		) ) );
		
		if ($this->Auth->user ( 'role' ) != 'admin') {
			// return $this->redirect ( '/users' );
		}
		if ($this->request->is ( 'post' )) {
			debug ( $this->data );
			if ($this->request->data ['User'] ['password'] == $this->request->data ['User'] ['password_verify']) {
				$unencrypted_password = $this->request->data ['User'] ['password'];
			}
			$this->User->create ();
			
			if ($this->User->saveAll ( $this->request->data, array (
					'validates' => true 
			) )) {
				
				$this->Session->setFlash ( __ ( 'Successfully saved User.' ) );
				// $this->sendNewRegistrationEmail ( $this->request->data ['User'] );
				/*
				 * return $this->redirect ( array ( 'action' => 'index' ) );
				 */
				// return $this->redirect ( '/users' );
			}
			$errors = 'Please correct the following errors.' . "\\n";
			debug ( $this->User->validationErrors );
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
				$this->Session->setFlash ( __ ( 'your profile has successfully been saved' ) );
				return $this->userSwitch();
			} else {
				$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
				
				$errors = 'Please correct the following errors.' . "\\n";
				// debug($this->User->validationErrors);
				foreach ( $this->User->validationErrors as $v => $k ) {
					foreach ( $k as $value ) {
						// debug($value);
						$errors .= $value . "\\n";
					}
				}
				$this->Session->setFlash ( $errors, 'flash_custom' );
			}
		} 

		else {
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
		) );
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
		);
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
		) );
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