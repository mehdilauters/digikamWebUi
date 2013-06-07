<?php
App::uses('AppController', 'Controller');
/**
 * ImageInformations Controller
 *
 * @property ImageInformation $ImageInformation
 */
class ImageInformationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageInformation->recursive = 0;
		$this->set('imageInformations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageInformation->exists($id)) {
			throw new NotFoundException(__('Invalid image information'));
		}
		$options = array('conditions' => array('ImageInformation.' . $this->ImageInformation->primaryKey => $id));
		$this->set('imageInformation', $this->ImageInformation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageInformation->create();
			if ($this->ImageInformation->save($this->request->data)) {
				$this->Session->setFlash(__('The image information has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image information could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImageInformation->Image->find('list');
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
		if (!$this->ImageInformation->exists($id)) {
			throw new NotFoundException(__('Invalid image information'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageInformation->save($this->request->data)) {
				$this->Session->setFlash(__('The image information has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image information could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageInformation.' . $this->ImageInformation->primaryKey => $id));
			$this->request->data = $this->ImageInformation->find('first', $options);
		}
		$images = $this->ImageInformation->Image->find('list');
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
		$this->ImageInformation->id = $id;
		if (!$this->ImageInformation->exists()) {
			throw new NotFoundException(__('Invalid image information'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageInformation->delete()) {
			$this->Session->setFlash(__('Image information deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image information was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
