<?php
App::uses('AppController', 'Controller');
/**
 * DownloadHistories Controller
 *
 * @property DownloadHistory $DownloadHistory
 */
class DownloadHistoriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DownloadHistory->recursive = 0;
		$this->set('downloadHistories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DownloadHistory->exists($id)) {
			throw new NotFoundException(__('Invalid download history'));
		}
		$options = array('conditions' => array('DownloadHistory.' . $this->DownloadHistory->primaryKey => $id));
		$this->set('downloadHistory', $this->DownloadHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DownloadHistory->create();
			if ($this->DownloadHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The download history has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The download history could not be saved. Please, try again.'));
			}
		}
		$images = $this->DownloadHistory->Image->find('list');
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
		if (!$this->DownloadHistory->exists($id)) {
			throw new NotFoundException(__('Invalid download history'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DownloadHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The download history has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The download history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DownloadHistory.' . $this->DownloadHistory->primaryKey => $id));
			$this->request->data = $this->DownloadHistory->find('first', $options);
		}
		$images = $this->DownloadHistory->Image->find('list');
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
		$this->DownloadHistory->id = $id;
		if (!$this->DownloadHistory->exists()) {
			throw new NotFoundException(__('Invalid download history'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DownloadHistory->delete()) {
			$this->Session->setFlash(__('Download history deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Download history was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
