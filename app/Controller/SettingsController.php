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
			if(file_put_contents(APP_SETTINGS, '<?php return ' . var_export($this->request->data['Settings'], true) . ';')){
				$this->Session->setFlash(__('Yours settings has been saved.'), 'flash_success');
			}else{
				$this->Session->setFlash(__('An error has occurred while saving.'), 'flash_danger');
			}
		}

		// Lee la configuracción por defecto
		$appSettings = include APP_SETTINGS;
		$this->set('s', $appSettings);
	}

}