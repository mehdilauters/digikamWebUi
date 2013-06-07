<?php
App::uses('AppController', 'Controller');
/**
 * ImageProperties Controller
 *
 * @property ImageProperty $ImageProperty
 */
class ImagePropertiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageProperty->recursive = 0;
		$this->set('imageProperties', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageProperty->exists($id)) {
			throw new NotFoundException(__('Invalid image property'));
		}
		$options = array('conditions' => array('ImageProperty.' . $this->ImageProperty->primaryKey => $id));
		$this->set('imageProperty', $this->ImageProperty->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageProperty->create();
			if ($this->ImageProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The image property has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image property could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImageProperty->Image->find('list');
		$this->set(compact('images'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ImageProperty->exists($id)) {
			throw new NotFoundException(__('Invalid image property'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The image property has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image property could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageProperty.' . $this->ImageProperty->primaryKey => $id));
			$this->request->data = $this->ImageProperty->find('first', $options);
		}
		$images = $this->ImageProperty->Image->find('list');
		$this->set(compact('images'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ImageProperty->id = $id;
		if (!$this->ImageProperty->exists()) {
			throw new NotFoundException(__('Invalid image property'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageProperty->delete()) {
			$this->Session->setFlash(__('Image property deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image property was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
