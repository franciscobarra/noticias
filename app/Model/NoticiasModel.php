<?php

class Publicidad extends AppModel {

 public $belongsTo = array(
        'Usuario','tags_noticias','imagenes_noticias','categoria_noticias'
 );
}
