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
 * isAuthorized method
 * @param  array  $user user currently log in
 * @return boolean      
 */
	public function isAuthorized($user = null) {
        if($user['role'] != 'overlord'){
        	return false;
        }
        return true;
    }

	/**
	 * index method
	 * Muestra la configruación de la aplicación
	 * @return void
	 */
	public function index(){
		if($this->request->is('POST')){
			// Recupera los valores
			$appSettings = include APP_SETTINGS;
			$appSettings = array_merge($appSettings, $this->request->data['Settings']);
			if(file_put_contents(APP_SETTINGS, '<?php return ' . var_export($appSettings, true) . ';')){
				$this->Session->setFlash(__('Yours settings has been saved.'), 'flash_success');
			}else{
				$this->Session->setFlash(__('An error has occurred while saving.'), 'flash_danger');
			}
		}

		// Lee la configuracción por defecto
		$appSettings = include APP_SETTINGS;
		$this->set('s', $appSettings);
	}

	public function invoices(){
		if($this->request->is('POST')){
			// Recupera los valores
			$appSettings = include APP_SETTINGS;

			if(isset($this->request->data['Settings']['display_country'])){
				$this->request->data['Settings']['display_country'] = true;
			}else{
				$this->request->data['Settings']['display_country'] = false;
			}

			$appSettings = array_merge($appSettings, $this->request->data['Settings']);
			if(file_put_contents(APP_SETTINGS, '<?php return ' . var_export($appSettings, true) . ';')){
				$this->Session->setFlash(__('Yours settings has been saved.'), 'flash_success');
			}else{
				$this->Session->setFlash(__('An error has occurred while saving.'), 'flash_danger');
			}
		}

		// Lee la configuracción por defecto
		$appSettings = include APP_SETTINGS;
		$this->set('s', $appSettings);
	}

	public function email(){
		if($this->request->is('POST')){
			// Recupera los valores
			$appSettings = include APP_SETTINGS;

			$appSettings = array_merge($appSettings, $this->request->data['Settings']);
			if(file_put_contents(APP_SETTINGS, '<?php return ' . var_export($appSettings, true) . ';')){
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