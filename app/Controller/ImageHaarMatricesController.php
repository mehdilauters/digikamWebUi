<?php
App::uses('AppController', 'Controller');
/**
 * ImageHaarMatrices Controller
 *
 * @property ImageHaarMatrix $ImageHaarMatrix
 */
class ImageHaarMatricesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageHaarMatrix->recursive = 0;
		$this->set('imageHaarMatrices', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageHaarMatrix->exists($id)) {
			throw new NotFoundException(__('Invalid image haar matrix'));
		}
		$options = array('conditions' => array('ImageHaarMatrix.' . $this->ImageHaarMatrix->primaryKey => $id));
		$this->set('imageHaarMatrix', $this->ImageHaarMatrix->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageHaarMatrix->create();
			if ($this->ImageHaarMatrix->save($this->request->data)) {
				$this->Session->setFlash(__('The image haar matrix has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image haar matrix could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImageHaarMatrix->Image->find('list');
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
		if (!$this->ImageHaarMatrix->exists($id)) {
			throw new NotFoundException(__('Invalid image haar matrix'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageHaarMatrix->save($this->request->data)) {
				$this->Session->setFlash(__('The image haar matrix has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image haar matrix could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageHaarMatrix.' . $this->ImageHaarMatrix->primaryKey => $id));
			$this->request->data = $this->ImageHaarMatrix->find('first', $options);
		}
		$images = $this->ImageHaarMatrix->Image->find('list');
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
		$this->ImageHaarMatrix->id = $id;
		if (!$this->ImageHaarMatrix->exists()) {
			throw new NotFoundException(__('Invalid image haar matrix'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageHaarMatrix->delete()) {
			$this->Session->setFlash(__('Image haar matrix deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image haar matrix was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
