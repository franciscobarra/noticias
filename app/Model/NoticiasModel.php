<?php

class Publicidad extends AppModel {

 var $belongsTo = array(
        'Usuario','tags_noticias','imagenes_noticias','categoria_noticias'
 );
}
