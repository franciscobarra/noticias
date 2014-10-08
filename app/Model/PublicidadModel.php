<?php

class Publicidad extends AppModel {

 public $belongsTo = array(
        'Usuario','Categoria_Publicidad','Tamaño_Publicidad'
 );
}