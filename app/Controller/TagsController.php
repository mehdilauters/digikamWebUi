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
    $options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id),
                    'contain'=>array('ImageTag.Image', 'ImageTagProperty'),
                    );
    $tag = $this->Tag->find('first', $options);
    debug($tag);
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
      if ($this->Tag->save($this->request->data)) {
        $this->Session->setFlash(__('The tag has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
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
}
