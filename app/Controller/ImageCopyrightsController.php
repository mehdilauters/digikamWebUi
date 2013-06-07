<?php
App::uses('AppController', 'Controller');
/**
 * ImageCopyrights Controller
 *
 * @property ImageCopyright $ImageCopyright
 */
class ImageCopyrightsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageCopyright->recursive = 0;
		$this->set('imageCopyrights', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageCopyright->exists($id)) {
			throw new NotFoundException(__('Invalid image copyright'));
		}
		$options = array('conditions' => array('ImageCopyright.' . $this->ImageCopyright->primaryKey => $id));
		$this->set('imageCopyright', $this->ImageCopyright->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageCopyright->create();
			if ($this->ImageCopyright->save($this->request->data)) {
				$this->Session->setFlash(__('The image copyright has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image copyright could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImageCopyright->Image->find('list');
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
		if (!$this->ImageCopyright->exists($id)) {
			throw new NotFoundException(__('Invalid image copyright'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageCopyright->save($this->request->data)) {
				$this->Session->setFlash(__('The image copyright has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image copyright could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageCopyright.' . $this->ImageCopyright->primaryKey => $id));
			$this->request->data = $this->ImageCopyright->find('first', $options);
		}
		$images = $this->ImageCopyright->Image->find('list');
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
		$this->ImageCopyright->id = $id;
		if (!$this->ImageCopyright->exists()) {
			throw new NotFoundException(__('Invalid image copyright'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageCopyright->delete()) {
			$this->Session->setFlash(__('Image copyright deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image copyright was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
