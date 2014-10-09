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
            'foreignKey'   => 'users_id'
        ),

    );
}
