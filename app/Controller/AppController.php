<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses ( 'Controller', 'Controller' );
 
App::import('Vendor', 'phrets');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array (
			'DebugKit.Toolbar',
			'Security'=>array('csrfExpires'=>'+1 hour','csrfUseOnce'=>false),
			'Session',
			'Facebook.Connect',
			
			'Paginator',
			'Auth' => array (
					'loginAction' => array(
            'controller' => 'users',
            'action' => 'login',
            
        ),
					'authError' => 'Did you really think you are allowed to see that?',
					
					'authenticate' => array (
							'Form' => array (
									'fields' => array (
											'username' => 'email',
											'password' => 'password' 
									),
									'passwordHasher' => 'Simple',
									'userModel' => 'User' 
							// 'passwordHasher' => 'Blowfish'
														) 
					) 
			) 
			
			
	);
	
	// ...
	public $helpers = array (
			
			'Facebook.Facebook',
			'Html',
			'Time',
			'Paginator',
			'Cache',
			'Session' 
	);
	
	
	public function beforeFilter() {
		//parent::beforeFilter ();
		//$this->set('rets_server_version',$this->get_rets_info());
		$this->Security->blackHoleCallback = 'blackHole';
		 $this->set('FeaturedProperties',$this->getFeaturedProperties());
		 $this->set('LatestPropertiesNames',$this->getListedPropertiesNames());
		 $this->set('LandedProperties',$this->getLandedProperties());
		 $this->set('ListedLocations',$this->getListedLocationNames());
		 $this->set('PropertiesForLease',$this->getListedPropertiesForSaleOrLease());
		 
		$this->Auth->allow ( 'index', 'view', 'display' );
	}
	public function  userSwitch(){
		 
			return $this->redirect ( '/login');
		 exit();
		
	}
	
	public function get_rets_info(){
	 $rets = new PHRETS;
	
	 $connect = $rets->Connect(Configure::read('MLSLI_URL'), Configure::read('MLSLI_USERNAME'), Configure::read('MLSLI_PASSWORD'));
		return $rets->GetServerInformation();
	}
	public function blackHole($type){
		debug($type);
		if($type == 'auth'){
			return true;
		}
		else{
			
			$this->Session->setFlash('Invalid Request| Suspected Forge request!');
  $this->redirect('/');
			return false;
		}
	}
	private function getFeaturedProperties(){
		 
	//	debug($property_type);
	 
		$this->loadModel('UserProperty');
		$this->UserProperty->recursive=1;
		$this->paginate = array('conditions'=>array( 'featured'=>true));
		$featured =$this->paginate('UserProperty');
		return $featured;
	}
	public function getListedPropertiesNames(){
		$this->loadModel('PropertyType');
	 
		 
		//$this->UserProperty->paginate = array('conditions'=>array('status'=>'pending','property_type_id != '=>$property_type_id));
		$this->PropertyType->recursive=0;
		$featured =$this->PropertyType->find('all',array('fields'=>array('id','type'),'order'=>'type DESC'));
		return $featured;
	}
	
	private function getLandedProperties(){
		
		$this->loadModel('PropertyType');
		$this->PropertyType->recursive=0;
		$property_type= $this->PropertyType->find('first',array('conditions'=>array('type '=>'land')));
			//debug($property_type);
		$property_type_id = $property_type['PropertyType']['id'];
		$this->loadModel('UserProperty');
		$this->UserProperty->recursive=1;
		$this->paginate = array('conditions'=>array('featured'=>false,'property_type_id'=>$property_type_id));
		$lands =$this->paginate('UserProperty');
		//debug($featured);
		return $lands;
		
	}
	
	
	public function getListedLocationNames(){
		$this->loadModel('UserProperty');
	
			
		//$this->UserProperty->paginate = array('conditions'=>array('status'=>'pending','property_type_id != '=>$property_type_id));
		$this->UserProperty->recursive=0;
		$featured =$this->UserProperty->find('all',array('fields'=>array('DISTINCT (UserProperty.location),UserProperty.id')
		)
		);
		return $featured;
	}
	
	private function getListedPropertiesForSaleOrLease(){
	
		$this->loadModel('PropertyContractType');
		$this->PropertyContractType->recursive=0;
		$property_type= $this->PropertyContractType->find('all',array('conditions'=>array('OR'=>array(array('type'=>'rental'),array('type'=>'lease')))));
		// debug($property_type);
		$property_type_id = array();
		for ($p=0; $p < count($property_type); $p++){
			$property_type_id[$p] = $property_type[$p]['PropertyContractType']['id'];
			
		}
	// debug($property_type_id);
		
		
		$this->loadModel('UserProperty');
		$this->UserProperty->recursive=2;
		$this->paginate = array('fields'=>array('Distinct (UserProperty.property_contract_type_id),UserProperty.id,UserProperty.property_type_id,location'),'conditions'=>array('status'=>'pending','property_type_id'=>$property_type_id));
		
		$lands =$this->paginate('UserProperty');
		//debug($lands);
		$leases = array();
		foreach (($lands) as $pl =>$v){
			$leases[$pl]=$v['PropertyType']['type'];
			
		}
		return (array_unique($leases));
		//return $lands;
		
	
	}
}
