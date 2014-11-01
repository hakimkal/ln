<?php
App::uses ( 'CakeEmail', 'Network/Email' );
class UserPropertiesController extends AppController {
	
	public $components = array('Paginator');
	public $helpers = array('Paginator');
	
	public function beforeFilter() {
		//parent::beforeFilter ();
		// Allow UserPropertys to register and logout.
		$this->Auth->allow ( 'index', 'view' );
		
		if ($this->Auth->user ( 'user_type' ) == 'staff' || $this->Auth->user ( 'user_type' ) == 'admin') {
			$this->layout = 'dashboard';
		} elseif ($this->Auth->user ( 'user_type' ) == 'member') {
			// $this->Session->setFlash ( 'Suspicious activity detected, You may be blacklisted!' );
			// $this->redirect ( '/login' );
			$this->layout = 'user_dashboard';
		} else {
			$this->layout = 'default';
		}
	}
	
	public function afterRender(){
		$this->set('FeaturedProperties',parent::getFeaturedProperties());
		$this->set('LatestPropertiesNames',parent::getListedPropertiesNames());
		$this->set('LandedProperties',parent::getLandedProperties());
		$this->set('ListedLocations',parent::getListedLocationNames());
		$this->set('PropertiesForLease',parent::getListedPropertiesForSaleOrLease());
	}
	public function index($listType = null,$propertyType=null) {
		$viewType = $this->request->query['viewType'];
		if(!$viewType){
			$viewType = 1;
		}
		// debug($listType);
		switch($viewType){
			case 1:
			$this->layout = 'list_view';
			break;
			case 2:
				 $this->layout = 'grid_view';
				 break;
				 
			case 3:
				$this->layout = 'map_view';
				break;
				default:
					break;
		}
		$this->UserProperty->recursive = 1;
		
		// debug($listType);
		
		if ($this->request->is ( 'post' )) {
			
			// debug($this->request->data['UserProperty']);
			if (! empty ( $this->request->data ['UserProperty'] ['q'] ) && empty ( $this->request->data ['UserProperty'] ['search'] )) {
				$query = $this->request->data ['UserProperty'] ['q'];
				$this->paginate = array (
						'limit' => 6,
						'order' => 'UserProperty.created Desc',
						'conditions' => array (
								'OR' => array (
										array (
												'UserProperty.title like ' => $query . '%' 
										),
										array (
												'UserProperty.location like ' => $query . '%' 
										),
										array (
												'UserProperty.address like ' => $query . '%' 
										) 
								) 
						) 
				)
				;
				$UserProperties = $this->paginate ('UserProperty');
			}
			 elseif (empty ( $this->request->data ['UserProperty'] ['q'] ) && ! empty ( $this->request->data ['UserProperty'] ['search'] )) {
				$query = $this->request->data ['UserProperty'] ['search'];
				$this->paginate = array (
						'limit' => 6,
						'order' => 'UserProperty.created Desc',
						'conditions' => array (
								'OR' => array (
										array (
												'UserProperty.title like ' => $query . '%' 
										),
										array (
												'UserProperty.location like ' => $query . '%' 
										),
										array (
												'UserProperty.address like ' => $query . '%' 
										) 
								) 
						) 
				)
				;
				$UserProperties = $this->paginate ('UserProperty');
			}
			
			if (empty ( $this->request->data ['UserProperty'] ['q'] ) && empty ( $this->request->data ['UserProperty'] ['search'] )) {
				
				$this->Session->setFlash ( 'Please provide a search criteria' );
				$this->redirect ( '/' );
				exit ();
			}
		} 

		else {
			if ($listType == 'myListing' && $this->Auth->user ( 'id' ) && ($this->Auth->user ( 'user_type' ) == 'member')) {
				$this->paginate = array (
						'limit' => 6,
						'order' => 'UserProperty.created Desc',
						'conditions' => array (
								'UserProperty.user_id' => $this->Auth->user ( 'id' ) 
						) 
				);
				$UserProperties = $this->paginate ('UserProperty');
			} 

			elseif (($listType == 'myListing') && $this->Auth->user ( 'id' ) && ($this->Auth->user ( 'user_type' ) != 'member')) {
				$this->paginate = array (
						'limit' => 6,
						'order' => 'UserProperty.created Desc' 
				);
				$UserProperties = $this->paginate ();
			} elseif ((!$listType && $this->Auth->user ( 'id' )) && ($this->Auth->user ( 'user_type' ) != 'member')) {
				$this->paginate = array (
						'limit' => 6,
						'order' => 'UserProperty.created Desc' 
				);
				$UserProperties = $this->paginate ('UserProperty');
				
				
			}

			elseif ((! $listType && $this->Auth->user ( 'id' )) && ($this->Auth->user ( 'user_type' ) == 'member')) {
				$this->paginate = array (
						'limit' =>6,
						'order' => 'UserProperty.created Desc',
						'conditions' => array (
								'UserProperty.user_id' => $this->Auth->user ( 'id' )
						)
				);
				$UserProperties = $this->paginate ('UserProperty');}
				
			 elseif ($listType == 'myListing' && !$this->Auth->user ( 'id' )) {
				$this->paginate = array (
						'limit' => 6,
						'order' => 'UserProperty.created Desc' 
				);
				$UserProperties = $this->paginate ();
			} 
			elseif (!$listType && !$this->Auth->user ( 'id' )) {
				$this->paginate = array (
						'limit' => 3,
						'order' => 'UserProperty.created Desc' 
				);
				$UserProperties = $this->paginate ();
			}
			
			elseif ( ($listType && $propertyType) && !$this->Auth->user ( 'id' )) {
						if($propertyType=='land'){
						$this->paginate = array (
								'limit' => 6,
								'order' => 'UserProperty.created Desc',
								'conditions' => array (
										'PropertyType.type' =>  $listType
								)
						);}
						elseif($propertyType=='location'){
							$this->paginate = array (
									'limit' => 6,
									'order' => 'UserProperty.created Desc',
									'conditions' => array (
											'UserProperty.location like' =>  $listType.'%'
									)
							);
						}
						elseif($propertyType=='types'){
							$this->paginate = array (
									'limit' => 6,
									'order' => 'UserProperty.created Desc',
									'conditions' => array (
											'PropertyType.type' =>  $listType
									)
							);
						}
					
				 
				$UserProperties = $this->paginate ();
			}
				
			
		}
		if (empty ( $UserProperties )) {
			$this->Session->setFlash ( "No result found" );
			$this->redirect ( '/' );
			exit ();
		}
		else{
		//debug($this->request);
		$this->set ( 'UserProperties', $UserProperties );
		$this->set ( 'listType', $listType );
		$this->set('viewType',$viewType);
		$this->set('propertyType',$propertyType);
		
		
		$this->set('LatestPropertiesNames',parent::getListedPropertiesNames());
		
		 $this->set('ListedLocations',parent::getListedLocationNames());
		  $this->set('FeaturedProperties',$this->getFeaturedProperties());
		 //$this->set('LandedProperties',parent::getLandedProperties());
		//$this->set('PropertiesForLease',parent::getListedPropertiesForSaleOrLease());
		
		
		
	}
	}
	public function view($id = null) {
		$this->UserProperty->id = $id;
		if (! $this->UserProperty->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid UserProperty' ) );
		}
		$this->set ( 'UserProperty', $this->UserProperty->read ( null, $id ) );
	}
	public function add() {
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
		
		$this->loadModel ( 'PropertyAmenity' );
		$this->set ( 'PropertyAmenities', $this->PropertyAmenity->find ( 'list', array (
				'fields' => array (
						'PropertyAmenity.id',
						'PropertyAmenity.type' 
				) 
		) ) );
		
		if ($this->request->is ( 'post' )) {
			debug ( $this->request->data );
			
			$this->UserProperty->create ();
			
			if ($this->UserProperty->saveAll ( $this->request->data, array (
					'validates' => true 
			) )) {
				
				$this->Session->setFlash ( __ ( 'Successfully listed a property.' ) );
				// / $this->sendNewRegistrationEmail ( $this->request->data ['UserProperty'] );
				/*
				 * return $this->redirect ( array ( 'action' => 'index' ) );
				 */
				return $this->redirect ( '/user_properties' );
				exit ();
			}
			$errors = 'Please correct the following errors.' . "\\n";
			// debug($this->UserProperty->validationErrors);
			foreach ( $this->UserProperty->validationErrors as $v => $k ) {
				foreach ( $k as $value ) {
					debug ( $value );
					foreach ( $value as $k => $v ) {
						$errors .= $v . "\\n";
					}
				}
			}
			// debug($errors);
			$this->Session->setFlash ( $errors, 'flash_custom' );
		}
	}
	public function edit($id = null) {
		$this->UserProperty->id = $id;
		if (! $this->UserProperty->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid UserProperty' ) );
		}
		if ($this->request->is ( 'post' ) || $this->request->is ( 'put' )) {
			if ($this->UserProperty->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The UserProperty has been saved' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			}
			$this->Session->setFlash ( __ ( 'The UserProperty could not be saved. Please, try again.' ) );
			
			$errors = 'Please correct the following errors.' . "\\n";
			// debug($this->UserProperty->validationErrors);
			foreach ( $this->UserProperty->validationErrors as $v => $k ) {
				foreach ( $k as $value ) {
					// debug($value);
					$errors .= $value . "\\n";
				}
			}
			$this->set ( 'errors', $errors );
		} else {
			$this->request->data = $this->UserProperty->read ( null, $id );
			unset ( $this->request->data ['UserProperty'] ['password'] );
		}
	}
	public function delete($id = null) {
		$this->request->onlyAllow ( 'post' );
		
		$this->UserProperty->id = $id;
		if (! $this->UserProperty->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid UserProperty' ) );
		}
		if ($this->UserProperty->delete ()) {
			$this->Session->setFlash ( __ ( 'UserProperty deleted' ) );
			return $this->redirect ( array (
					'action' => 'index' 
			) );
		}
		$this->Session->setFlash ( __ ( 'UserProperty was not deleted' ) );
		return $this->redirect ( array (
				'action' => 'index' 
		) );
	}
	public function processContact() {
		if ($this->request->is ( 'post' )) {
			
			if ($this->sendEmail ( array (
					$this->request->data ['UserProperty'] ['email'] 
			), $this->request->data ['UserProperty'] ['name'], $this->request->data ['UserProperty'] ['subject'], $this->request->data ['UserProperty'] ['message'] )) {
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
	private function sendNewRegistrationEmail($new_UserProperty = array()) {
		$email = new CakeEmail ();
		$email->config ( 'mandrill' );
		$email->emailFormat ( 'html' );
		
		$to = $new_UserProperty ['email'];
		
		$viewVars = array (
				'name' => $new_UserProperty ['firstname'] . ' ' . $new_UserProperty ['lastname'],
				'role' => $new_UserProperty ['role'],
				'pass' => $new_UserProperty ['password'],
				'email' => $new_UserProperty ['email'] 
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
								'rcpt' => $new_UserProperty ['email'],
								'vars' => array (
										array (
												'name' => 'email',
												'content' => $new_UserProperty ['email'] 
										),
										array (
												'name' => 'name',
												'content' => $new_UserProperty ['firstname'] . ' ' . $new_UserProperty ['lastname'] 
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
	
	private function getFeaturedProperties(){
			
		//	debug($property_type);
	
		 
		 $this->UserProperty->recursive=1;
		 $featured = $this->UserProperty->find('all',array('conditions'=>array( 'UserProperty.featured'=>true)));
	 
		 return $featured;
	}
}

?>