<?php
App::uses('AppController', 'Controller');
/**
 * Hours Controller
 *
 * @property Hour $Hour
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HoursController extends AppController {

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
		$this->Hour->recursive = 0;
		$this->set('hours', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Hour->exists($id)) {
			throw new NotFoundException(__('Invalid hour'));
		}
		$options = array('conditions' => array('Hour.' . $this->Hour->primaryKey => $id));
		$this->set('hour', $this->Hour->find('first', $options));
	}

/**
 * timer method
 *
 * @return void
 */
	public function timer() {
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Hour->create();
			if ($this->Hour->save($this->request->data)) {
				$this->Session->setFlash(__('The hour has been saved.'), 'flash_success');
				return $this->redirect(array('controller' => 'projects', 'action' => 'view', $this->request->data['Hour']['project_id']));
			} else {
				$this->Session->setFlash(__('The hour could not be saved. Please, try again.'), 'flash_danger');
				return $this->redirect(array('controller' => 'projects', 'action' => 'index'));
			}
		}
		$projects = $this->Hour->Project->find('list');
		$users = $this->Hour->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Hour->exists($id)) {
			throw new NotFoundException(__('Invalid hour'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Hour->save($this->request->data)) {
				$this->Session->setFlash(__('The hour has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hour could not be saved. Please, try again.'), 'flash_danger');
			}
		} else {
			$options = array('conditions' => array('Hour.' . $this->Hour->primaryKey => $id));
			$this->request->data = $this->Hour->find('first', $options);
		}
		$projects = $this->Hour->Project->find('list');
		$users = $this->Hour->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Hour->id = $id;
		if (!$this->Hour->exists()) {
			throw new NotFoundException(__('Invalid hour'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Hour->delete()) {
			$this->Session->setFlash(__('The hour has been deleted.'), 'flash_success');
		} else {
			$this->Session->setFlash(__('The hour could not be deleted. Please, try again.'), 'flash_danger');
		}
		return $this->redirect(array('action' => 'index'));
	}}
