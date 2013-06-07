<?php
App::uses('AppController', 'Controller');
/**
 * VideoMetadata Controller
 *
 * @property VideoMetadatum $VideoMetadatum
 */
class VideoMetadataController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->VideoMetadatum->recursive = 0;
		$this->set('videoMetadata', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->VideoMetadatum->exists($id)) {
			throw new NotFoundException(__('Invalid video metadatum'));
		}
		$options = array('conditions' => array('VideoMetadatum.' . $this->VideoMetadatum->primaryKey => $id));
		$this->set('videoMetadatum', $this->VideoMetadatum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->VideoMetadatum->create();
			if ($this->VideoMetadatum->save($this->request->data)) {
				$this->Session->setFlash(__('The video metadatum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video metadatum could not be saved. Please, try again.'));
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
		if (!$this->VideoMetadatum->exists($id)) {
			throw new NotFoundException(__('Invalid video metadatum'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VideoMetadatum->save($this->request->data)) {
				$this->Session->setFlash(__('The video metadatum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video metadatum could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('VideoMetadatum.' . $this->VideoMetadatum->primaryKey => $id));
			$this->request->data = $this->VideoMetadatum->find('first', $options);
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
		$this->VideoMetadatum->id = $id;
		if (!$this->VideoMetadatum->exists()) {
			throw new NotFoundException(__('Invalid video metadatum'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->VideoMetadatum->delete()) {
			$this->Session->setFlash(__('Video metadatum deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video metadatum was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
