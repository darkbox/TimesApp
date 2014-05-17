<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

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

				if($this->request->data['User']['password'] === 'admin') {
					$this->Session->write('defaultPassword', true);
				}

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
		$this->Session->delete('defaultPassword');
		if($this->Session->check('Message.dp')){
			$this->Session->delete('Message.dp');
		}
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

/**
 * forgetpwd method
 *
 * @return void
 */
	public function forgetpwd(){
		$this->layout = 'login';

		$this->loadModel('User');
		$this->User->recursive=-1;
		if(!empty($this->data))
		{
			if(empty($this->data['User']['email']))
			{
				$this->Session->setFlash(__('Please Provide the Email Adress that You Used to Register'), 'flash_danger');
			}
			else
			{
				$email=$this->data['User']['email'];
				$fu=$this->User->find('first',array('conditions'=>array('User.email'=>$email)));
				if($fu)
				{

					if($fu['User']['status']==1)
					{
						$key = Security::hash(String::uuid(),'sha512',true);
						$hash=sha1($fu['User']['email'].rand(0,100));
						$url = Router::url( array('controller'=>'login','action'=>'reset'), true ).'/'.$key.'#'.$hash;
						$ms=$url;
						$ms=wordwrap($ms,1000);

						$fu['User']['tokenhash']=$key;
						$this->User->id=$fu['User']['id'];
						if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){

							//============Email================//
							$Email = new CakeEmail('smtp');

							$Email->to($fu['User']['email']);
							$Email->template('resetpwd');
							$Email->subject('Reset Your TimesApp Password');
							$Email->emailFormat('html');
							$Email->viewVars(array('ms' => $ms, 'username' => $fu['User']['name']));

							try {
							    $Email->send();

						        $this->Session->setFlash(__('Check Your Email To Reset your password.'), 'flash_success');

							} catch (SocketException $e) { // Exception would be too generic, so use SocketException here
							    $errorMessage = $e->getMessage();
							    $this->Session->setFlash(__('The email couldn\'t be sent. Ask the administrator.'), 'flash_danger');
							}

							//============EndEmail=============//
						}
						else{
							$this->Session->setFlash(__("Error Generating Reset link"), 'flash_danger');
						}
					}
					else
					{
						$this->Session->setFlash(__('This Account is not Active yet.'), 'flash_danger');
					}
				}
				else
				{
					$this->Session->setFlash(__('Email does Not Exist'), 'flash_danger');
				}
			}
		}
	}

/**
 * reset method
 *
 * @param token
 * @return void
 */
	public function reset($token=null){
		$this->layout = 'login';

		$this->loadModel('User');
		$this->User->recursive=-1;
		if(!empty($token)){
			$u=$this->User->findBytokenhash($token);
			if($u){
				$this->User->id=$u['User']['id'];
				if(!empty($this->data)){
					$this->User->data=$this->data;
					$this->User->data['User']['email']=$u['User']['email'];
					$new_hash=sha1($u['User']['email'].rand(0,100));//created token
					$this->User->data['User']['tokenhash']=$new_hash;
					if($this->User->save($this->User->data))
					{
						$this->Session->setFlash(__('Password Has been Updated'), 'flash_success');
						$this->redirect(array('controller'=>'login','action'=>'index'));
					}
				}
			}
			else
			{
				$this->Session->setFlash(__('Token Corrupted. Please Retry. The reset link work only for once.'), 'flash_danger');
				$this->redirect(array('controller'=>'login','action'=>'index'));
			}
		}
		else{
			$this->redirect(array('controller'=>'login','action'=>'index'));
		}
	}
}