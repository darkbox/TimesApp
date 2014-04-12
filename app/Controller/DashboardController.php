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

		//Retrieve all the projects
		$projects = $this->Project->find('all');
		$this->set(compact('projects'));
	}	
}