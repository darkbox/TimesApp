<?php
App::uses('AppController', 'Controller');
/**
 * Invoices Controller
 *
 * @property Invoice $Invoice
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InvoicesController extends AppController {

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
		$this->Invoice->recursive = 0;
		$this->set('invoices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
		$this->set('invoice', $this->Invoice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Invoice->create();
			if ($this->Invoice->save($this->request->data)) {
				$this->Session->setFlash(__('The invoice has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.'), 'flash_danger');
			}
		}
		$projects = $this->Invoice->Project->find('list');
		$this->loadModel('Service');
		$this->loadModel('Product');
		$options = array('conditions' => array('status' => 1));
		$services = $this->Service->find('list', $options);
		$products = $this->Product->find('list', $options);
		$this->set(compact('projects','services', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Invoice->save($this->request->data)) {
				$this->Session->setFlash(__('The invoice has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.'), 'flash_danger');
			}
		} else {
			$options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
			$this->request->data = $this->Invoice->find('first', $options);
		}
		$projects = $this->Invoice->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Invoice->delete()) {
			$this->Session->setFlash(__('The invoice has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The invoice could not be deleted. Please, try again.'), 'flash_danger');
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * getLine method for Ajax request
 * @param  number $type type of line
 * @param  number $id   id of line
 * @return void       
 */
	public function getLine($type=null, $id=null){
		switch ($type) {
			case 1: // service
				$this->loadModel('Service');
				if (!$this->Service->exists($id)) {
					throw new NotFoundException(__('Invalid service'));
				}
				$options = array('conditions' => array('Service.' . $this->Service->primaryKey => $id));
				$this->set('service', $this->Service->find('first', $options));
				break;
			case 2: // product
				$this->loadModel('Product');
				if (!$this->Product->exists($id)) {
					throw new NotFoundException(__('Invalid product'));
				}
				$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
				$this->set('product', $this->Product->find('first', $options));
				break;
			
			default:

				break;
		}
	}
}