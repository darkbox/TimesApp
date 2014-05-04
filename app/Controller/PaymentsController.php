<?php
App::uses('AppController', 'Controller');
/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PaymentsController extends AppController {

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
		$this->Payment->recursive = 0;
		$this->set('payments', $this->Paginator->paginate());

		$options = array('conditions' => 
			array('status' => array(1, 2, 3))
		);

		$invoices = $this->Payment->Invoice->find('list', $options);
		$this->set(compact('invoices'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Payment->create();
			if ($this->Payment->save($this->request->data)) {
				$this->Session->setFlash(__('The payment has been saved.'), 'flash_success');

				// Actualizar factura aquí


				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'), 'flash_danger');
			}
		}

		$options = array('conditions' => 
			array('status' => array(1, 2, 3))
		);

		$invoices = $this->Payment->Invoice->find('list', $options);
		$this->set(compact('invoices'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Payment->id = $id;
		if (!$this->Payment->exists()) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Payment->delete()) {
			$this->Session->setFlash(__('The payment has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The payment could not be deleted. Please, try again.'), 'flash_danger');
		}
		return $this->redirect(array('action' => 'index'));
	}}
