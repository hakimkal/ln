<?php
class DashboardController extends AppController {
	public $uses = array ();
	public function index() {
	$this->layout = 'dashboard';
		//debug($this->Auth->user());
	$this->loadModel('User');
		$this->set('User', $this->User->read ( null, $this->Auth->user('id') ));
		//$this->layout = 'user_dashboard';
	}
	public function beforeFilter() {
	  parent::beforeFilter ();
		if ($this->Auth->user ( 'user_type' ) == 'staff') {
			 $this->layout = 'dashboard';
		}
		elseif($this->Auth->user('user_type')=='member'){
			$this->Session->setFlash('Suspicious activity detected, You may be blacklisted!');
			$this->redirect('/login');
			
		}		
		// $this->Auth->allow ( );
	}
}
?>