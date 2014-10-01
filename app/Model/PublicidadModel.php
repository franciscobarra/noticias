<?php

class Publicidad extends AppModel {

 public $hasOne = array(
        'Usuario','Categoria_Publicidad','Tamaño_Publicidad'
 );
}