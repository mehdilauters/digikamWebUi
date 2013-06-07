<?php
App::uses('AppController', 'Controller');
/**
 * Searches Controller
 *
 * @property Search $Search
 */
class SearchesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Search->recursive = 0;
		$this->set('searches', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Search->exists($id)) {
			throw new NotFoundException(__('Invalid search'));
		}
		$options = array('conditions' => array('Search.' . $this->Search->primaryKey => $id));
		$this->set('search', $this->Search->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Search->create();
			if ($this->Search->save($this->request->data)) {
				$this->Session->setFlash(__('The search has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search could not be saved. Please, try again.'));
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
		if (!$this->Search->exists($id)) {
			throw new NotFoundException(__('Invalid search'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Search->save($this->request->data)) {
				$this->Session->setFlash(__('The search has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The search could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Search.' . $this->Search->primaryKey => $id));
			$this->request->data = $this->Search->find('first', $options);
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
		$this->Search->id = $id;
		if (!$this->Search->exists()) {
			throw new NotFoundException(__('Invalid search'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Search->delete()) {
			$this->Session->setFlash(__('Search deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Search was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
