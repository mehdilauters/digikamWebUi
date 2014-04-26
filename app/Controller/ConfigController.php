<?php


App::uses('AppController', 'Controller');



class ConfigController extends AppController {
  var $name = 'Config';
  var $uses=array('User');
  var $publicActions=array('*');
  
  
  public function index() { 
  }
  
  
  public function setDebug($bool)
  {
  	$this->Session->write('debugMode',$bool);
  	if($bool)
  	{
  		$this->Session->setFlash('Debug enabled', 'flash/warning');
  	}
  	else
  	{
  		$this->Session->setFlash('Debug disabled','flash/warning');
  	}
  	$this->redirect($this->referer());
  }
 
  
  public function deleteSession($confirm = false) {
  	if(!$confirm)
  		return ;
  	session_destroy();
  	$this->redirect('/');
  }
  
 /* 
  function createAcos($confirm = false, $registerUsers = false)
  {
  	if(!$confirm)
  		return ;
  
  
  
  
  	$aro = $this->Acl->Aro;
  
  	// Here's all of our group info in an array we can iterate through
  	$groups = array(
  			0 => array(
  					'alias' => 'visitors'
  			),
  			1 => array(
  					'alias' => 'users'
  			),
  			2 => array(
  					'alias' => 'root'
  			),
  	);
  
  	// Iterate and create ARO groups
  	foreach ($groups as $data) {
  		// Remember to call create() when saving in loops...
  		$aro->create();
  
  		// Save data
  		$aro->save($data);
  	}
  
  
  
  
  
  
  	$aco = $this->Acl->Aco;
  
  	// Here's all of our group info in an array we can iterate through
  	$groups = array(
  			0 => array(
  					'alias' => 'visitorsActions'
  			),
  			1 => array(
  					'alias' => 'usersActions'
  			),
  			2 => array(
  					'alias' => 'rootActions'
  			),
  	);
  
  	// Iterate and create ARO groups
  	foreach ($groups as $data) {
  		// Remember to call create() when saving in loops...
  		$aco->create();
  
  		// Save data
  		$aco->save($data);
  	}
  
  
  	$this->Acl->allow('visitors', 'visitorsActions');
  
  	$this->Acl->allow('users', 'visitorsActions');
  	$this->Acl->allow('users', 'usersActions');
  
  
  	$this->Acl->allow('root', 'rootActions');
  	$this->Acl->allow('root', 'visitorsActions');
  	$this->Acl->allow('root', 'usersActions');
  
  	if($registerUsers)
  		$this->registerUsers($confirm);
  	$this->redirect($this->referer());
  }
  
  
  function registerUsers($confirm =false)
  {
  	if(!$confirm)
  		return;
  	$users = $this->User->find('all');
  	//debug($users);
  
  	foreach ($users as $user)
  	{
  		if($user['User']['id']==1)
  		{
  			$res = $this->requestAction(array('controller' => 'users', 'action' => 'changeGroup'), array('pass' => array($user['User']['id'],3)));
  			echo $user['User']['id'].'=>activated<hr>';
  		}
  		else
  		{
  			if($user['User']['isActivated']==1)
  			{
  				$res = $this->requestAction(array('controller' => 'users', 'action' => 'changeGroup'), array('pass' => array($user['User']['id'],2)));
  				echo $user['User']['id'].'=>activated <hr>';
  			}
  		}
  	}
  }
  */
  function testEmail() {
  	if($this->request->is('post'))
  	{
  /*
  		$email = new CakeEmail('default');
  		$email->from(array(EMAIL_FROM => 'Fériathèque'))
  		->to($this->request->data['Email']['email'])
  		->template('testEmail', 'default')
  		->viewVars(array(
  				'test' => 'huhuhu',
  		))
  
  		->subject('Feriatheque test Email')
  		->send('Hello world');
  		 
  
  
  		$this->Session->setFlash('email envoyé', 'flash/ok');
  		*/
  	}
  }
  
  
  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('deleteSession');  
  }
}