<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 */
class Pais extends AppModel {
    var $name = 'Pais';
    var $hasMany = array(
            'User' => array(
                'className'    => 'User',
                'foreignKey'   => 'id'
            ),

        );
     public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        $this->_prepareValidationRules();
    }
        
    protected function _prepareValidationRules() {
        if (!empty($this->apiValidation)) { 
            $this->validate = array(
        
        /*Nombre*/
                'nombre' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Nombre',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre debe tener minimo de 5 a 150 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z ]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras',
                    )),
        /*Codigo*/
                'codigo' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Codigo',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Codigo debe tener minimo de 5 a 150 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z ]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras',
                    ))        

                );
        }
    }
}
