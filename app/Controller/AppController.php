<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package    app.Controller
 * @link    http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
  var $components    = array('DebugKit.Toolbar','Session','Auth'=>array('Form' => array()),'RequestHandler', 'Cookie');
  var $helpers = array('MyHtml');
  var $uses = array('User');

  public function beforeRender()
  {
//     return true;

    /*  $tree = $this->requestAction('/albums/getTree');
      $this->set('albumTree',$tree);    
        
      $tagsTree = $this->requestAction('/tagsTrees/getTree');
      $this->set('tagsTree', $tagsTree);
  
    */
  }

  function isAuthorized() {
    if($this->Auth->user('id') == Configure::read('Digikam.rootUser'))
    {
      return true;
    }
    return false;
  }
  
  function beforeFilter() {
	static $firstCall = true;
    parent::beforeFilter();
    $this->Auth->authError = "Sorry, this page is not available for you!";
    $this->Auth->loginError = "Your password is wrong!";
    $this->Auth->authorize = 'Controller';
    
	if(!$this->Session->check('Rights') && $firstCall)
	{
		$firstCall = false;
		$user = $this->User->findById(1);
		$this->requestAction('/users/getTokens/'.$user['User']['id']);
	}
     if($this->Auth->user('id') == Configure::read('Digikam.rootUser'))
     {
       $this->Auth->allow('*');
     }
    
  }
  
}
