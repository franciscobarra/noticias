<?php

class Anuncio extends AppModel {
 public $primaryKey = 'id_anuncios';
 
 public $hasOne = array(
        'Usuario','Imagenes_Anuncios','Sector_Anuncios','Categoria_Anuncios'
 );
    }
    
