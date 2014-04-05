<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SettingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session');

	/**
	 * index method
	 * Muestra la configruación de la aplicación
	 * @return void
	 */
	public function index(){
		if($this->request->is('POST')){
			Configure::write('TimesApp', $this->request->data['Settings']);
			$this->Session->setFlash(__('Yours settings has been saved.'), 'flash_success');
		}

		// Lee la configuracción por defecto
		$appSettings = Configure::read('TimesApp');
		$this->set('s', $appSettings);
	}

}