<?php
App::uses('AppController', 'Controller');
/**
 * TagsTrees Controller
 *
 * @property TagsTree $TagsTree
 */
class TagsTreesController extends AppController {
public $components = array('Tree');
/**
 * index method
 *
 * @return void
 */
  public function index() {
	$this->TagsTree->recursive = 0;

    $this->set('tagsTrees', $this->paginate());
  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function view($id = null) {
    if (!$this->TagsTree->exists($id)) {
      throw new NotFoundException(__('Invalid tags tree'));
    }
    $options = array('conditions' => array('TagsTree.' . $this->TagsTree->primaryKey => $id));
    $this->set('tagsTree', $this->TagsTree->find('first', $options));
  }

/**
 * add method
 *
 * @return void
 */
  public function add() {
    if ($this->request->is('post')) {
      $this->TagsTree->create();
      if ($this->TagsTree->save($this->request->data)) {
        $this->Session->setFlash(__('The tags tree has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The tags tree could not be saved. Please, try again.'));
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
    if (!$this->TagsTree->exists($id)) {
      throw new NotFoundException(__('Invalid tags tree'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->TagsTree->save($this->request->data)) {
        $this->Session->setFlash(__('The tags tree has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The tags tree could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('TagsTree.' . $this->TagsTree->primaryKey => $id));
      $this->request->data = $this->TagsTree->find('first', $options);
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
    $this->TagsTree->id = $id;
    if (!$this->TagsTree->exists()) {
      throw new NotFoundException(__('Invalid tags tree'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->TagsTree->delete()) {
      $this->Session->setFlash(__('Tags tree deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('Tags tree was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
  
  public function getTree($full = false)
  {
  	$conditions = array();
	if(!$full)
	{
	  if( $this->Auth->user('id') != Configure::read('Digikam.rootUser') && !$this->isCommandLineInterface()) 
	  {
		  $conditions = array('TagsTree.id in ('.implode(', ', $this->Session->read('Rights.UserAvailablesTags')).')');
	  }
	}
  	
  	$this->recursive = -1;
  	$flatTree = $this->TagsTree->find('all', 
  			array('order'=>'TagsTree.pid asc',
  					'conditions'=>$conditions,
  			'contain'   => array('Tag.TagProperty')
  			));
  	$this->Tree->set($flatTree);
  	$tree = $this->Tree->getTree();
  	return $tree;
  }
  
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('getTree');	
	}
}
