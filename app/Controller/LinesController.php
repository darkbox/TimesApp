<?php
App::uses('AppController', 'Controller');
/**
 * Lines Controller
 *
 * @property Line $Line
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LinesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Line->recursive = 0;
		$this->set('lines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Line->exists($id)) {
			throw new NotFoundException(__('Invalid line'));
		}
		$options = array('conditions' => array('Line.' . $this->Line->primaryKey => $id));
		$this->set('line', $this->Line->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Line->create();
			if ($this->Line->save($this->request->data)) {
				$this->Session->setFlash(__('The line has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The line could not be saved. Please, try again.'));
			}
		}
		$invoices = $this->Line->Invoice->find('list');
		$taxes = $this->Line->Tax->find('list');
		$this->set(compact('invoices', 'taxes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Line->exists($id)) {
			throw new NotFoundException(__('Invalid line'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Line->save($this->request->data)) {
				$this->Session->setFlash(__('The line has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The line could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Line.' . $this->Line->primaryKey => $id));
			$this->request->data = $this->Line->find('first', $options);
		}
		$invoices = $this->Line->Invoice->find('list');
		$taxes = $this->Line->Tax->find('list');
		$this->set(compact('invoices', 'taxes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Line->id = $id;
		if (!$this->Line->exists()) {
			throw new NotFoundException(__('Invalid line'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Line->delete()) {
			$this->Session->setFlash(__('The line has been deleted.'));
		} else {
			$this->Session->setFlash(__('The line could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
