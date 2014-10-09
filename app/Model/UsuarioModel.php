<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class Usuario extends AppModel {
 var $name = 'Usuario';
 var $belongsTo = array('Roles','Pais');
 var $hasMany = array('Anuncio','Publicidad');

    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        $this->_prepareValidationRules();
    }

    protected function _prepareValidationRules() {
        if (!empty($this->apiValidation)) { // for API
            $this->validate = array(
                'username' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Error in field Name'
            ));
        } else { // default behaviour
            $this->validate = array(
                'username' => array(
                    'rule' => 'notEmpty',
                    'message' =>  '1'
            ));
        }
    }

}
