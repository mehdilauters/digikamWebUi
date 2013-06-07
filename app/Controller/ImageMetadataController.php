<?php
App::uses('AppController', 'Controller');
/**
 * ImageMetadata Controller
 *
 * @property ImageMetadatum $ImageMetadatum
 */
class ImageMetadataController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageMetadatum->recursive = 0;
		$this->set('imageMetadata', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageMetadatum->exists($id)) {
			throw new NotFoundException(__('Invalid image metadatum'));
		}
		$options = array('conditions' => array('ImageMetadatum.' . $this->ImageMetadatum->primaryKey => $id));
		$this->set('imageMetadatum', $this->ImageMetadatum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageMetadatum->create();
			if ($this->ImageMetadatum->save($this->request->data)) {
				$this->Session->setFlash(__('The image metadatum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image metadatum could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImageMetadatum->Image->find('list');
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
		if (!$this->ImageMetadatum->exists($id)) {
			throw new NotFoundException(__('Invalid image metadatum'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageMetadatum->save($this->request->data)) {
				$this->Session->setFlash(__('The image metadatum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image metadatum could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageMetadatum.' . $this->ImageMetadatum->primaryKey => $id));
			$this->request->data = $this->ImageMetadatum->find('first', $options);
		}
		$images = $this->ImageMetadatum->Image->find('list');
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
		$this->ImageMetadatum->id = $id;
		if (!$this->ImageMetadatum->exists()) {
			throw new NotFoundException(__('Invalid image metadatum'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageMetadatum->delete()) {
			$this->Session->setFlash(__('Image metadatum deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image metadatum was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
