<?php

class Categoria_Anuncios extends AppModel {

    var $name = 'Categoria_Anuncios';
    var $hasMany = 'Anuncio';
}