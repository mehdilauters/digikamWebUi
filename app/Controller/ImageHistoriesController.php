<?php
App::uses('AppController', 'Controller');
/**
 * ImageHistories Controller
 *
 * @property ImageHistory $ImageHistory
 */
class ImageHistoriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageHistory->recursive = 0;
		$this->set('imageHistories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageHistory->exists($id)) {
			throw new NotFoundException(__('Invalid image history'));
		}
		$options = array('conditions' => array('ImageHistory.' . $this->ImageHistory->primaryKey => $id));
		$this->set('imageHistory', $this->ImageHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageHistory->create();
			if ($this->ImageHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The image history has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image history could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImageHistory->Image->find('list');
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
		if (!$this->ImageHistory->exists($id)) {
			throw new NotFoundException(__('Invalid image history'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The image history has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageHistory.' . $this->ImageHistory->primaryKey => $id));
			$this->request->data = $this->ImageHistory->find('first', $options);
		}
		$images = $this->ImageHistory->Image->find('list');
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
		$this->ImageHistory->id = $id;
		if (!$this->ImageHistory->exists()) {
			throw new NotFoundException(__('Invalid image history'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageHistory->delete()) {
			$this->Session->setFlash(__('Image history deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image history was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
