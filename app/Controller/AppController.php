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

class AppController extends Controller {
    
    public $apiValidation = false;
    
    public $components = array(
		'Session',
                'Auth'=>array(
                    'authError'=>'No puede ingresar a esta pagina',
                    'authorize'=>array('Controller')
                ),
	);
    
    public function beforeFilter() {
        $this->Auth->authorize = array('Controller');
        $this->Auth->authenticate = array(
            'Basic'
        );
        
        $this->Auth->field = array(
            "username" => "username",
            "password" => "password"
        );
        
        $this->Auth->allow(); //autorizar
    }

   /* public function isAuthorized($usuario) {
        if (isset($usuario['roles']) && ($usuario['roles'] == 'admin')) {
            return true;
        }
        return false;
    }
   */

}

