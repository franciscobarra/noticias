<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestCategoria_AnunciosController extends AppController {
   
    public $uses = array('Categoria_Anuncios');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $categoria_anuncios = $this->Categoria_Anuncios->find('all');
        $this->set(array(
            'categoria_anuncios' => $categoria_anuncios,
            '_serialize' => array('categoria_anuncios')
        ));
    }
 
    public function add() {
        $this->Categoria_Anuncios->create();
        if ($this->Categoria_Anuncios->save($this->request->data)) {
             $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function view($id) {
        $categoria_anuncios = $this->Categoria_Anuncios->findById($id);
        $this->set(array(
            'categoria_anuncios' => $categoria_anuncios,
            '_serialize' => array('categoria_anuncios')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Categoria_Anuncios->id = $id;
        if ($this->Categoria_Anuncios->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function delete($id) {
        if ($this->Categoria_Anuncios->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

}
