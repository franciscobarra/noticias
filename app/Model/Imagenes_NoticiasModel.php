<?php

class Categoria_Noticias extends AppModel {

    var $name = 'Categoria_Noticias';
    var $hasMany = 'Noticias';
}