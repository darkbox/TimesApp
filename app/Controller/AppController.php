<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

// Path del fichero de configuración
define('APP_SETTINGS', APP . DS .  'Config' . DS . 'timesAppSettings.php');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
		'Auth' => array(
		'loginAction' => array(
            'controller' => 'login',
            'action' => 'index',
        ),
		'loginRedirect' => array('controller' => 'dashboard', 'action' => 'index'),
		'logoutRedirect' => array('controller' => 'login', 'action' => 'index'),
		'authError' => 'You don\'t have enough permissions.',
		'authenticate' => array(
			'Basic' => array('userModel' => 'User'),
            'Form' => array(
            	'userModel' => 'User',
                'fields' => array('username' => 'email'),
                'scope' => array('User.status' => 1),
            ),

        ),
		'authorize' => array('Controller')
		)
	);


	/**
	* beforeFilter method
	*
	* @return void
	*/
	public function beforeFilter() {
		// Permite acceder sin realizar login
		$this->Auth->allow('signup');
		$this->Auth->authorize = 'controller';
		// Variable local accesibles en todas las vistas
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
	}

	/**
	* isAuthorized method
	*
	* @return boolean
	*/
	public function isAuthorized($user) {
		return true;
	}
}
