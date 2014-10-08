<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 */
class Pais extends AppModel {
var $name = 'Pais';
var $hasMany = 'Usuario';
}
