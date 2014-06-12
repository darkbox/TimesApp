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

	private $seed = 1990;

/**
 * isAuthorized method
 * @param  array  $user user currently log in
 * @return boolean      
 */
	public function isAuthorized($user = null) {
        if($user['role'] != 'overlord'){
        	return false;
        }
        return true;
    }


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Payment->recursive = 0;
		$this->set('payments', $this->Paginator->paginate());

		$options = array('conditions' => 
			array('status' => array(1, 3, 5))
		);

		$invoices = $this->Payment->Invoice->find('list', $options);
		$this->set(compact('invoices'));
		$this->set('seed', $this->seed);
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
				$this->Payment->Invoice->id = $this->request->data['Payment']['invoice_id'];

				$options = array(
					'conditions' => array(
						'Invoice.id' => $this->request->data['Payment']['invoice_id']
						),
					'fields' => array(
						'amount'
					));
				$invoice = $this->Payment->Invoice->find('first', $options);

				$totalPaid = 0;
				$totalToPay = 0;

				$totalToPay = $invoice['Invoice']['amount'];
				foreach ($invoice['Payment'] as $payment) {
					$totalPaid += $payment['amount'];
				}
				
				if($totalPaid >= $totalToPay){
					$this->Payment->Invoice->saveField('status', 4); // Pagado
				}else{
					$this->Payment->Invoice->saveField('status', 3); // Parcial
				}

				$this->Payment->Invoice->saveField('due', ($totalToPay - $totalPaid)); // DUE

				return $this->redirect(array('controller' => 'invoices', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment could not be saved. Please, try again.'), 'flash_danger');
			}
		}

		$options = array('conditions' => 
			array('status' => array(1, 3, 5))
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
	}

/**
 * getAmountByInvoice method
 *
 * @return void
 */
	public function getAmountByInvoice() {
		$this->layout = 'ajax';
		$id = $this->request->data('idInvoice');
		
		$options = array(
			'conditions' => array(
				'Invoice.id' => $id,
				),
			);
		$invoiceById = $this->Payment->Invoice->find('first', $options);
		
		if($invoiceById['Invoice']['due'] > 0) {
			$amount = $invoiceById['Invoice']['due'];
		} else {
			$amount = $invoiceById['Invoice']['amount'];
		}
		
		$currency = $invoiceById['Invoice']['currency_symbol'];
		if($invoiceById['Invoice']['currency_code']) {
			$currency .= "(" . $invoiceById['Invoice']['currency_code'] . ")";
		}
			
		$this->set('amount', $amount);
		$this->set('currency', $currency);
	}
}
