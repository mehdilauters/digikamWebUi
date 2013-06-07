<?php
App::uses('AppController', 'Controller');
/**
 * TagProperties Controller
 *
 * @property TagProperty $TagProperty
 */
class TagPropertiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TagProperty->recursive = 0;
		$this->set('tagProperties', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TagProperty->exists($id)) {
			throw new NotFoundException(__('Invalid tag property'));
		}
		$options = array('conditions' => array('TagProperty.' . $this->TagProperty->primaryKey => $id));
		$this->set('tagProperty', $this->TagProperty->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TagProperty->create();
			if ($this->TagProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The tag property has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag property could not be saved. Please, try again.'));
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
		if (!$this->TagProperty->exists($id)) {
			throw new NotFoundException(__('Invalid tag property'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TagProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The tag property has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag property could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TagProperty.' . $this->TagProperty->primaryKey => $id));
			$this->request->data = $this->TagProperty->find('first', $options);
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
		$this->TagProperty->id = $id;
		if (!$this->TagProperty->exists()) {
			throw new NotFoundException(__('Invalid tag property'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TagProperty->delete()) {
			$this->Session->setFlash(__('Tag property deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tag property was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
