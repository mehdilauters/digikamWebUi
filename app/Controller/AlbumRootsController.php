<?php
App::uses('AppController', 'Controller');
/**
 * AlbumRoots Controller
 *
 * @property AlbumRoot $AlbumRoot
 */
class AlbumRootsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AlbumRoot->recursive = 0;
		$this->set('albumRoots', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlbumRoot->exists($id)) {
			throw new NotFoundException(__('Invalid album root'));
		}
		$options = array('conditions' => array('AlbumRoot.' . $this->AlbumRoot->primaryKey => $id));
		$this->set('albumRoot', $this->AlbumRoot->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlbumRoot->create();
			if ($this->AlbumRoot->save($this->request->data)) {
				$this->Session->setFlash(__('The album root has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album root could not be saved. Please, try again.'));
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
		if (!$this->AlbumRoot->exists($id)) {
			throw new NotFoundException(__('Invalid album root'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AlbumRoot->save($this->request->data)) {
				$this->Session->setFlash(__('The album root has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album root could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlbumRoot.' . $this->AlbumRoot->primaryKey => $id));
			$this->request->data = $this->AlbumRoot->find('first', $options);
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
		$this->AlbumRoot->id = $id;
		if (!$this->AlbumRoot->exists()) {
			throw new NotFoundException(__('Invalid album root'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AlbumRoot->delete()) {
			$this->Session->setFlash(__('Album root deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Album root was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
