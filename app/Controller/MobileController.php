<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MobileController extends AppController {

	function beforeFilter(){
	    parent::beforeFilter();
	    $this->Auth->allow(array('login', 'listActivities'));
	}

/**
 * add method
 */
	public function add(){
		$this->layout = 'ajax';
		$this->render('index');

	}

/**
 * listActivities method
 * @return JSON response
 */
	public function listActivities($id = null){
		
		$response = array();

		// List hours from a user
		$this->loadModel('Hour');
		$options = array(
			'conditions' => array(
				'user_id' => $id,
				),
			'order' => array(
				'Hour.created' => 'desc'
				),
			'limit' => 20,
			);
		$hours = $this->Hour->find('all', $options);

		$response['success'] = 1;
		$response['activities'] = array();

		foreach ($hours as $hour) {
			$activity = array();
			$activity['project'] = $hour['Project']['code'];
			$activity['date']    = $hour['Hour']['created'];
			$activity['hours']   = $hour['Hour']['hours'];
			array_push($response['activities'], $activity);
		}
				
		$this->set('response', json_encode($response));
		$this->layout = 'ajax';
		$this->render('index');
	}

/**
 * login mobile method
 * @return JSON response
 */
	public function login(){
		$response = array();

		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$password = AuthComponent::password($password);

			$this->loadModel('User');
			$options = array(
				'conditions' => array(
					'User.email' => h($username),
					'User.password' => $password, 
					)
				);
			
			if($user = $this->User->find('first', $options)){
				// Login con exito
				$response['success'] = 1;
				$response['name'] = $user['User']['name'];
				$response['id'] = $user['User']['id'];
				$response['message'] = "Access granted";
				$response = $this->getData($response);
			}else{
				$response['success'] = 0;
				$response['message'] = "Oops! Wrong username or password";
			}
		}else{
			$response['success'] = 0;
			$response['message'] = "Oops! Seems you are missing some fields";
		}

		$this->layout = 'ajax';
		$this->set('response', json_encode($response));
		$this->render('index');
	}

/**
 * getData method
 * @param  array $response [description]
 * @return array           [description]
 */
	private function getData($response){
		$this->loadModel('Project');
		$this->loadModel('Service');
		$options = array(
			'conditions' => array(
				'status' => 1,
				)
			);
		$projects = $this->Project->find('list', $options);
		$services = $this->Service->find('list', $options);

		$response['projects'] = array();
		$response['services'] = array();

		foreach ($projects as $key => $project) {
			$item = array();
			$item['id'] = $key;
			$item['code'] = $project;
			array_push($response['projects'], $item);
		}

		foreach ($services as $key => $service) {
			$item = array();
			$item['id'] = $key;
			$item['code'] = $service;
			array_push($response['services'], $item);
		}

		return $response;
	}
}