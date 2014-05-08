<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProjectsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Project->recursive = 0;
		$this->Paginator->settings = array(
	        'limit' => 25,
	        'order' => array(
	            'Project.status' => 'asc'
	        )
	    );

		$clients = $this->Project->Client->find('list');
		$this->set(compact('clients'));
		$this->set('projects', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$project = $this->Project->find('first', $options);
		$this->set('project', $project);

		$this->loadModel('Hour');
		$conditions = array("Hour.project_id" => $id);
		$this->set('hours', $this->paginate('Hour', $conditions));

		$options = array('conditions' => array(
			'status' => 1
			));		
		$services = $this->Hour->Service->find('list', $options);
		$users = $this->Hour->User->find('list');
		$this->set(compact('services', 'users'));

		//days
		$daysLeft = 0;
		$daysSpent = 0;

		if($project['Project']['init_date'] != 0 && $project['Project']['deadline'] != 0){
			$daysLeft = $this->countDaysBetween($project['Project']['init_date'], $project['Project']['deadline']);
			$daysSpent = $this->countDaysBetween($project['Project']['init_date'], date('Y-m-d', strtotime("now")));
		}

		$this->set('daysLeft', $daysLeft);
		$this->set('daysSpent', $daysSpent);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'flash_danger');
			}
		}
		$clients = $this->Project->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'flash_danger');
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
		$clients = $this->Project->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('The project has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The project could not be deleted. Please, try again.'), 'flash_danger');
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * countDaysBetween method
 * @param  date $start start date
 * @param  date $end   end date
 * @return int        days between
 */
	private function countDaysBetween($start, $end){
		$startTimeStamp = strtotime($start);
		$endTimeStamp = strtotime($end);
		$timeDiff = abs($endTimeStamp - $startTimeStamp);
		$numberDays = $timeDiff/86400;  // 86400 seconds in one day
		return intval($numberDays);
	}
}
