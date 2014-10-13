<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

 var $name = 'User';
 var $belongsTo = array(
        'Roles' => array(
            'className'    => 'Roles',
            'foreignKey'   => 'id_roles'
        ),
        'Pais' => array(
            'className'    => 'Pais',
            'foreignKey'   => 'id_pais'
        )
    );
    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        $this->_prepareValidationRules();
    }

    protected function _prepareValidationRules() {
        if (!empty($this->apiValidation)) { // for API
            $this->validate = array(
                'username' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Nombre de Usuario',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre De Usuario debe tener minimo de 5 a 15 caracteres'
                    ),
                     'unique' => array(
                        'rule'    => 'isUnique',
                        'message' => 'El Nombre de Usuario ingresado, ya esta registrado'
                    ),
                     'alphaNumeric' => array(
                        'rule'     => 'alphaNumeric',
                        'required' => true,
                        'message'  => 'Se deben ingresar solo letras  y numeros'
                   )
                
                
                ));
        } else { // default behaviour
            $this->validate = array(
                'username' => array(
                    'rule' => 'notEmpty',
                    'required' => true,
                    'message' =>  '1'
            ));
        }
    }

}
