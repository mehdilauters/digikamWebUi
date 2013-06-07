<?php
App::uses('AppController', 'Controller');
/**
 * ImageRelations Controller
 *
 * @property ImageRelation $ImageRelation
 */
class ImageRelationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageRelation->recursive = 0;
		$this->set('imageRelations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageRelation->exists($id)) {
			throw new NotFoundException(__('Invalid image relation'));
		}
		$options = array('conditions' => array('ImageRelation.' . $this->ImageRelation->primaryKey => $id));
		$this->set('imageRelation', $this->ImageRelation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageRelation->create();
			if ($this->ImageRelation->save($this->request->data)) {
				$this->Session->setFlash(__('The image relation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image relation could not be saved. Please, try again.'));
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
		if (!$this->ImageRelation->exists($id)) {
			throw new NotFoundException(__('Invalid image relation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageRelation->save($this->request->data)) {
				$this->Session->setFlash(__('The image relation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image relation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageRelation.' . $this->ImageRelation->primaryKey => $id));
			$this->request->data = $this->ImageRelation->find('first', $options);
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
		$this->ImageRelation->id = $id;
		if (!$this->ImageRelation->exists()) {
			throw new NotFoundException(__('Invalid image relation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageRelation->delete()) {
			$this->Session->setFlash(__('Image relation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image relation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
