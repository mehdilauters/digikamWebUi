<?php
App::uses('AppController', 'Controller');
/**
 * ImagePositions Controller
 *
 * @property ImagePosition $ImagePosition
 */
class ImagePositionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImagePosition->recursive = 0;
		$this->set('imagePositions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImagePosition->exists($id)) {
			throw new NotFoundException(__('Invalid image position'));
		}
		$options = array('conditions' => array('ImagePosition.' . $this->ImagePosition->primaryKey => $id));
		$this->set('imagePosition', $this->ImagePosition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImagePosition->create();
			if ($this->ImagePosition->save($this->request->data)) {
				$this->Session->setFlash(__('The image position has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image position could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImagePosition->Image->find('list');
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
		if (!$this->ImagePosition->exists($id)) {
			throw new NotFoundException(__('Invalid image position'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImagePosition->save($this->request->data)) {
				$this->Session->setFlash(__('The image position has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image position could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImagePosition.' . $this->ImagePosition->primaryKey => $id));
			$this->request->data = $this->ImagePosition->find('first', $options);
		}
		$images = $this->ImagePosition->Image->find('list');
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
		$this->ImagePosition->id = $id;
		if (!$this->ImagePosition->exists()) {
			throw new NotFoundException(__('Invalid image position'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImagePosition->delete()) {
			$this->Session->setFlash(__('Image position deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image position was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
