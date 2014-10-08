<?php

class Anuncio extends AppModel {
 public $primaryKey = 'Anuncio';
 var $name = 'Anuncio';
 var $belongsTo = array(
        'Usuario','Imagenes_Anuncios','Sector_Anuncios','Categoria_Anuncios'
 );
    }
    
