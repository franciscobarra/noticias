<?php

class Publicidad extends AppModel {

 public $hasOne = array(
        'Usuario','tags_noticias','imagenes_noticias','categoria_noticias'
 );
}
