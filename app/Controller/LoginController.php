<?php
App::uses('AppController', 'Controller');
/**
 * Login Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LoginController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session');

	/**
	* beforeFilter method
	*
	* @return void
	*/
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('out');
	}	

	/**
	 * in method
	 * @return  void redirection
	 */
	public function index(){
		$this->layout = 'login';

		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Wrong email or password'), 'flash_danger');
			}
		}
	}

	/**
	 * out method
	 * @return  void redirection
	 */
	public function out(){
		return $this->redirect($this->Auth->logout());
	}

/**
 * [signUp description]
 * @return [type] [description]
 */
	public function signup(){
		$this->layout = 'login';
		
		if ($this->request->is('post')) {
			$this->loadModel('User');
			$this->User->create();

			$this->request->data['User'] = $this->array_push_assoc($this->request->data['User'], 'role' , 'minion');
			$this->request->data['User'] = $this->array_push_assoc($this->request->data['User'], 'status', 0);

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user already exists.'), 'flash_danger');
			}
		}		
	}

	private function array_push_assoc($array, $key, $value){
		$array[$key] = $value;
		return $array;
	}
}