<?php
App::uses('AppController', 'Controller');
/**
 * ImageTagProperties Controller
 *
 * @property ImageTagProperty $ImageTagProperty
 */
class ImageTagPropertiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageTagProperty->recursive = 0;
		$this->set('imageTagProperties', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageTagProperty->exists($id)) {
			throw new NotFoundException(__('Invalid image tag property'));
		}
		$options = array('conditions' => array('ImageTagProperty.' . $this->ImageTagProperty->primaryKey => $id));
		$this->set('imageTagProperty', $this->ImageTagProperty->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageTagProperty->create();
			if ($this->ImageTagProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The image tag property has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image tag property could not be saved. Please, try again.'));
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
		if (!$this->ImageTagProperty->exists($id)) {
			throw new NotFoundException(__('Invalid image tag property'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageTagProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The image tag property has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image tag property could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageTagProperty.' . $this->ImageTagProperty->primaryKey => $id));
			$this->request->data = $this->ImageTagProperty->find('first', $options);
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
		$this->ImageTagProperty->id = $id;
		if (!$this->ImageTagProperty->exists()) {
			throw new NotFoundException(__('Invalid image tag property'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageTagProperty->delete()) {
			$this->Session->setFlash(__('Image tag property deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image tag property was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
