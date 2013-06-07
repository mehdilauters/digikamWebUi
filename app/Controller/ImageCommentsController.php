<?php
App::uses('AppController', 'Controller');
/**
 * ImageComments Controller
 *
 * @property ImageComment $ImageComment
 */
class ImageCommentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageComment->recursive = 0;
		$this->set('imageComments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageComment->exists($id)) {
			throw new NotFoundException(__('Invalid image comment'));
		}
		$options = array('conditions' => array('ImageComment.' . $this->ImageComment->primaryKey => $id));
		$this->set('imageComment', $this->ImageComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageComment->create();
			if ($this->ImageComment->save($this->request->data)) {
				$this->Session->setFlash(__('The image comment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image comment could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImageComment->Image->find('list');
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
		if (!$this->ImageComment->exists($id)) {
			throw new NotFoundException(__('Invalid image comment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageComment->save($this->request->data)) {
				$this->Session->setFlash(__('The image comment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageComment.' . $this->ImageComment->primaryKey => $id));
			$this->request->data = $this->ImageComment->find('first', $options);
		}
		$images = $this->ImageComment->Image->find('list');
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
		$this->ImageComment->id = $id;
		if (!$this->ImageComment->exists()) {
			throw new NotFoundException(__('Invalid image comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageComment->delete()) {
			$this->Session->setFlash(__('Image comment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image comment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
