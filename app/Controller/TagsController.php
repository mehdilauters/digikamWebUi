<?php
App::uses('AppController', 'Controller');
/**
 * Tags Controller
 *
 * @property Tag $Tag
 */
class TagsController extends AppController {

/**
 * index method
 *
 * @return void
 */
  public function index() {
    $this->Tag->recursive = 0;
    $this->set('tags', $this->paginate());
  }

  public function map($id = null)
  {
	$this->view($id);
	$this->layout = 'mapFullScreen';
  }
  
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function view($id = null) {
    if (!$this->Tag->exists($id)) {
      throw new NotFoundException(__('Invalid tag'));
    }
     if( ! ( in_array($id, $this->Session->read('Rights.UserAvailablesTags')) || $this->Auth->user('id') == 1 ))
     {
       throw new ForbiddenException('Frobidden');
     } 
    
//      $this->Tag->ImageTag->unbindModel(
//      		array('hasMany' => array('Tag'))
//      );

     
    $options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id),
    		'contain' => array ('ImageTag.Image.ImagePosition'),
// not used because of recursivity
//                     'contain'=>array('ImageTag.Image' => array('conditions'=>array('ImageTag.tagid'=>-1))
//                     		, 'ImageTag.Image.ImageTag', 'ImageTag.Image.ImageTag.Tag','ImageTagProperty', 'ImageTag.Image.Album'),
                    );
    $tag = $this->Tag->find('first', $options);

    $this->set('title_for_layout', 'Tag / '.$tag['Tag']['name']);
    
    ///// used to avoid recursivity
    $imagesId = array();
    foreach ($tag['ImageTag'] as $imageTag)
    {
    	$imagesId[] = $imageTag['imageid'];
    }
    $imagesId = implode(', ', $imagesId);
    
    $imageOptions = array(
    		'conditions' => 'Image.id in ('.$imagesId.')',
			'contain' => array ('ImageTag.Image.ImagePosition'),
    		);
    
    $this->Tag->ImageTag->Image->contain( 'ImageTag.ImageTagProperty');
    $tag['ImageTag'] = $this->Tag->ImageTag->Image->find('all',$imageOptions);
    // debug($tag);
////
    
    foreach ($tag['ImageTag'] as $id => $imageTag) {
      {
        if( in_array($imageTag['Image']['album'], $this->Session->read('Rights.UserForbiddenAlbums') ))
        {
          unset($tag['ImageTag'][$id]);
        }
      }
    }
    
    $this->set('tag', $tag);
  }

/**
 * add method
 *
 * @return void
 */
  public function add() {
    if ($this->request->is('post')) {
      $this->Tag->create();
	  $this->request->data['Tag']['icon'] = 0;
	  $this->request->data['Tag']['iconkde'] = NULL;
      if ($this->Tag->save($this->request->data)) {
        $this->Session->setFlash(__('The tag has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
      }
    }
	
	$tags = $this->Tag->find('list');
	$tags = array('0'=>'') + $tags;
	$this->set(compact('tags'));
  }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function edit($id = null) {
    if (!$this->Tag->exists($id)) {
      throw new NotFoundException(__('Invalid tag'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->Tag->save($this->request->data)) {
        $this->Session->setFlash(__('The tag has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
      $this->request->data = $this->Tag->find('first', $options);
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
    $this->Tag->id = $id;
    if (!$this->Tag->exists()) {
      throw new NotFoundException(__('Invalid tag'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Tag->delete()) {
      $this->Session->setFlash(__('Tag deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('Tag was not deleted'));
    $this->redirect(array('action' => 'index'));
  }

  
    function beforeFilter() {
    parent::beforeFilter();
    if($this->Auth->loggedIn())
    {
      $this->Auth->allow('view');  
    }
  }
}
