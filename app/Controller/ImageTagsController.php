<?php
App::uses('AppController', 'Controller');
/**
 * ImageTags Controller
 *
 * @property ImageTag $ImageTag
 */
class ImageTagsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageTag->recursive = 0;
		$this->set('imageTags', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ImageTag->exists($id)) {
			throw new NotFoundException(__('Invalid image tag'));
		}
		$options = array('conditions' => array('ImageTag.' . $this->ImageTag->primaryKey => $id));
		$this->set('imageTag', $this->ImageTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageTag->create();
			if ($this->ImageTag->save($this->request->data)) {
				$this->Session->setFlash(__('The image tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image tag could not be saved. Please, try again.'));
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
		if (!$this->ImageTag->exists($id)) {
			throw new NotFoundException(__('Invalid image tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageTag->save($this->request->data)) {
				$this->Session->setFlash(__('The image tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ImageTag.' . $this->ImageTag->primaryKey => $id));
			$this->request->data = $this->ImageTag->find('first', $options);
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
		$this->ImageTag->id = $id;
		if (!$this->ImageTag->exists()) {
			throw new NotFoundException(__('Invalid image tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ImageTag->delete()) {
			$this->Session->setFlash(__('Image tag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
