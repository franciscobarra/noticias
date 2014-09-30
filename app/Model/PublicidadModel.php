<?php

class Publicidad extends AppModel {

 public $hasOne = array(
        'Usuario','Categoria_Publicidad'
 );
}