<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestImagenes_AnunciosController extends AppController {
   
    public $uses = array('Imagenes_Anuncios');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $imagenes_anuncios = $this->Imagenes_Anuncios->find('all');
        $this->set(array(
            'imagenes_anuncios' => $imagenes_anuncios,
            '_serialize' => array('imagenes_anuncios')
        ));
    }
 
    public function add() {
        $this->Imagenes_Anuncios->create();
        if ($this->Imagenes_Anuncios->save($this->request->data)) {
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
        $imagenes_anuncios = $this->Imagenes_Anuncios->findById($id);
        $this->set(array(
            'imagenes_anuncios' => $imagenes_anuncios,
            '_serialize' => array('imagenes_anuncios')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Imagenes_Anuncios->id = $id;
        if ($this->Imagenes_Anuncios->save($this->request->data)) {
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
        if ($this->Imagenes_Anuncios->delete($id)) {
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
