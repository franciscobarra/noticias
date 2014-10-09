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
