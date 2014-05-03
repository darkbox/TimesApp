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

		// Settings
		$appSettings = include APP_SETTINGS;
		$this->set('appSettings', $appSettings);
	}	
}