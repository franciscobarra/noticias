<?php

App::uses('AppModel', 'Model');

class Publicidad extends AppModel {
var $name = 'Publicidad';
 var $belongsTo = array(
        'Usuario','Categoria_Publicidad','Tamanio_Publicidad'
 );
}