<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 */
class Roles extends AppModel {
var $name = 'Roles';
var $hasMany = array(
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'users_id'
        ),

    );
}
