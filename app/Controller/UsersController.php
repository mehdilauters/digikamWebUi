<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
public $uses = array('User', 'UsersAvailableAlbum', 'UsersAvailableTag','UsersForbiddenTag', 'UsersForbiddenAlbum', 'Tag', 'Album');
/**
 * index method
 *
 * @return void
 */
  public function index() {
    $this->User->recursive = 0;
    $this->set('users', $this->paginate());
  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function view($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->set('user', $this->User->find('first', $options));
  }

/**
 * add method
 *
 * @return void
 */
  public function add() {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    }
  }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function edit($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->request->data = $this->User->find('first', $options);
    }
  }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function delete($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->User->delete()) {
      $this->Session->setFlash(__('User deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('User was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
  
  
  function manage($id = null)
  {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->User->recursive = 2;
    $user = $this->User->findById($id);
    $this->set('user',$user);
  }
  
function addAlbum($available = true)
  {
    $this->layout = 'ajax';
  
    if ($this->request->is('post') || $this->request->is('put'))
    {
      $userId = $this->request->data['userId'];
      $albumId = $this->request->data['albumId'];
        
      if (!$this->Album->exists($albumId)) {
        throw new NotFoundException(__('Invalid Album'));
      }
        
      if (!$this->User->exists($userId)) {
        throw new NotFoundException(__('Invalid User'));
      }
      
      if( $available === true )
      {
        $modelName = 'UsersAvailableAlbum';
      }
      else
      {
        $modelName = 'UsersForbiddenAlbum';        
      }
      
      $$modelName = array($modelName=>array(
          'user_id' => $userId,
          'album_id' => $albumId,
      ));
      if( ! $this->$modelName->save($$modelName) )
      {
        throw new InternalErrorException(__($modelName.' not saved'));
      }
      $album = $this->Album->findById($albumId);
      $this->set('album', $album);
    }
  }
  
  
  
  
  
  
  function addTag($available = true)
  {
    $this->layout = 'ajax';
  
    if ($this->request->is('post') || $this->request->is('put'))
    {
      $userId = $this->request->data['userId'];
      $tagId = $this->request->data['tagId'];
        
      if (!$this->Tag->exists($tagId)) {
        throw new NotFoundException(__('Invalid Tag'));
      }
        
      if (!$this->User->exists($userId)) {
        throw new NotFoundException(__('Invalid User'));
      }
      
      if( $available === true )
      {
        $modelName = 'UsersAvailableTag';
      }
      else
      {
        $modelName = 'UsersForbiddenTag';        
      }
      
      $$modelName = array($modelName=>array(
          'user_id' => $userId,
          'tag_id' => $tagId,
      ));
      if( ! $this->$modelName->save($$modelName) )
      {
        throw new InternalErrorException(__($modelName.' not saved'));
      }
      $tag = $this->Tag->findById($tagId);
      $this->set('tag', $tag);
    }
  }
  
  
  function removeElement($element, $available = true)
  {
    $this->layout = 'ajax';
  
    if ($this->request->is('post') || $this->request->is('put'))
    {
      $userId = $this->request->data['userId'];
      $id = $this->request->data['id'];
      
    $Element = ucwords($element);
      if (!$this->$Element->exists($id)) {
        throw new NotFoundException(__('Invalid '.$Element));
      }
  
      if (!$this->User->exists($userId)) {
        throw new NotFoundException(__('Invalid User'));
      }

      if( $available === true )
      {
        $modelName = 'UsersAvailable'.$Element;
      }
      else
      {
        $modelName = 'UsersForbidden'.$Element;
      }
      $res = $this->$modelName->find('first', array('conditions'=>array('user_id'=>$userId, $element.'_id'=>$id)));

      if( ! $this->$modelName->delete($res[$modelName]['id']) )
      {
        throw new InternalErrorException(__($modelName.' not deleteted'));
      }
    }
  }
  
  function login()
  {
    if($this->request->is('post'))
    {
      if($this->Auth->login()){
        $cookie = array();
        $cookie['username'] = $this->data['User']['username'];
        $cookie['password'] = $this->data['User']['password'];
        $this->Cookie->name = 'DigikamWebUiUser';
        $this->Cookie->write('Auth.User', $cookie, true, '5 Days');
        
        $this->UsersAvailableTag->recursive = -1;
        
        $userAvailablesTags = $this->UsersAvailableTag->find('list', array('fields'=>array('tag_id'), 'conditions'=>array('user_id'=>$this->Auth->user('id'))));
        $userAvailablesTags = array_values($userAvailablesTags);
        
        $this->Session->write('Rights.UserAvailablesTags', $userAvailablesTags );
       
        $this->UsersForbiddenTag->recursive = -1;
        $userForbiddenTags = $this->UsersForbiddenTag->find('list', array('fields'=>array('tag_id'), 'conditions'=>array('user_id'=>$this->Auth->user('id'))));
        $this->Session->write('Rights.UserForbiddenTags', $userForbiddenTags);
       
       
        $this->UsersAvailableAlbum->recursive = -1;
        $userAvailablesAlbum = $this->UsersAvailableAlbum->find('list', array( 'fields'=>array('album_id'), 'conditions'=>array('user_id'=>$this->Auth->user('id'))));
        $this->Session->write('Rights.UserAvailablesAlbums', $userAvailablesAlbum );
        
        
        $this->UsersForbiddenAlbum->recursive = -1;
        $userForbiddenAlbum = $this->UsersForbiddenAlbum->find('list', array('fields'=>array('album_id'), 'conditions'=>array('user_id'=>$this->Auth->user('id'))));
        $this->Session->write('Rights.UserForbiddenAlbums', $userForbiddenAlbum );
        /*
        $userAvailableTags = $session->read('Rights.UserAvailablesTags');
        $userForbiddenTags = $session->read('Rights.UserForbiddenTags');
    
        $userAvailableAlbums = $session->read('Rights.UserAvailablesAlbums');
        $userForbiddenAlbums = $session->read('Rights.UserForbiddenAlbums');
        
        */
        
        
        
      $tree = $this->requestAction('/albums/getTree');
      $this->Session->write('User.cache.albumsTree', $tree );
        
      $tagsTree = $this->requestAction('/tagsTrees/getTree');
      $this->Session->write('User.cache.tagsTree', $tagsTree );

        
        
        $this->Session->setFlash('Logged as '.$this->Auth->user('username'), 'flash/ok');
         return $this->redirect($this->Auth->redirect());
      }
      else
      {
        $this->Session->setFlash('Login Error', 'flash/fail');
      }
    }
    else
    {
		$this->log('loging needed by action '.$this->referer(), 'debug');
		/*
       $this->Cookie->name = 'DigikamWebUiUser';
       $cookie = $this->Cookie->read('Auth');
        if (!is_null($cookie)) {
          debug($cookie);
            if ($this->Auth->login($cookie)) {
              
                $this->Session->destroy('Message.Auth'); # clear auth message, just in case we use it.
              $this->redirect('/');//$this->Auth->redirect());
            } else {
                $this->Cookie->destroy('Auth.User'); # delete invalid cookie

                $this->Session->setFlash('Invalid cookie');
              $this->redirect('login/');
           }
    }*/
    }
  }
  
  function logout() {
    $this->Session->destroy();
    $this->Session->setFlash('You are now disconnected!','flash/ok');
    $this->redirect($this->Auth->logout());
  }
  
  function beforeFilter() {
    parent::beforeFilter();
    if($this->Auth->loggedIn())
    {
          $this->Auth->allow('logout');  
    }
    $this->Auth->allow('login','add');  
  }
}
