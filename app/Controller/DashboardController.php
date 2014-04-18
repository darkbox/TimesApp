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
		$this->loadModel('User');

		//Retrieve all the projects
		$projects = $this->Project->find('all');
		//Retrieve all the projects
		$users = array(
			'active' => $this->User->find('count', array('conditions' => array('status' => 1))),
			'inactive' => $this->User->find('count', array('conditions' => array('status' => 0))),
			);
		$this->set('users', $users);
		$this->set(compact('projects'));
	}	
}