<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ClientsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

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
		$this->Client->recursive = 0;

		if(isset($_GET['var']) && $_GET['var']=='true') {

			$this->set('toggleInactive', 'true');
		    $this->Paginator->settings = array('conditions' => array());
    	} else {
    		
    		$this->Paginator->settings = array(
    	    	'conditions' => array('Client.status' => 1)
    		);
    	}
		
		$taxes = $this->Client->Tax->find('list');
		$this->set(compact('taxes'));
	    $this->set('clients', $this->paginate());

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Client->create();
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__('The client has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'), 'flash_danger');
			}
		}
		$taxes = $this->Client->Tax->find('list');
		$this->set(compact('taxes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__('The client has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'), 'flash_danger');
			}
		} else {
			$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
			$this->request->data = $this->Client->find('first', $options);
		}
		$taxes = $this->Client->Tax->find('list');
		$this->set(compact('taxes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Client->delete()) {
			$this->Session->setFlash(__('The client has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The client could not be deleted. Please, try again.'), 'flash_danger');
		}
		return $this->redirect(array('action' => 'index'));
	}}
