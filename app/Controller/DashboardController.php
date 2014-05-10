<?php
App::uses('AppController', 'Controller');
/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController {

	/**
	 * Index method
	 * @return void
	 */
	public function index(){
		$this->layout = 'dashboard';

		$this->loadModel('Project');
		$this->loadModel('Invoice');
		$this->loadModel('Hour');
		$this->loadModel('User');
		$this->loadModel('Payment');

		//Retrieve all the projects
		$projects = $this->Project->find('all');
		//Retrieve all the projects
		$users = array(
			'active' => $this->User->find('count', array('conditions' => array('status' => 1))),
			'inactive' => $this->User->find('count', array('conditions' => array('status' => 0))),
			);
		$this->set('users', $users);
		
		//Retrieve all the invoices
		$invoices = $this->Invoice->find('all');

		$this->set(compact('projects', 'invoices'));

		//Retrieve all the hours
		$hours = $this->Hour->find('all');

		$this->set(compact('projects', 'hours'));

		//Retrieve lastest payments
		$payments = $this->Payment->find('all', array(
			'order' => array('Payment.date' => 'desc'),
			'limit' => 3
			));
		$this->set('payments', $payments);

		// Settings
		$appSettings = include APP_SETTINGS;
		$this->set('appSettings', $appSettings);
	}	

/**
 * download method
 * @return response [description]
 */
	public function download() {
	    $this->response->file(WWW_ROOT . 'files' . DS . 'android' . DS . 'TimesApp.apk', array('download' => true, 'name' => 'TimesApp.apk'));
	    return $this->response;
	}
}