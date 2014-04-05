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
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Wrong username or password'), 'flash_danger');
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
}