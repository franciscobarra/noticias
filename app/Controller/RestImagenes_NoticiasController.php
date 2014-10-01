<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestImagenes_NoticiasController extends AppController {
   
    public $uses = array('Imagenes_Noticias');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $imagenes_noticias = $this->Imagenes_Noticias->find('all');
        $this->set(array(
            'imagenes_noticias' => $imagenes_noticias,
            '_serialize' => array('imagenes_noticias')
        ));
    }
 
    public function add() {
        $this->Imagenes_Noticias->create();
        if ($this->Imagenes_Noticias->save($this->request->data)) {
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
        $imagenes_noticias = $this->Imagenes_Noticias->findById($id);
        $this->set(array(
            'imagenes_noticias' => $imagenes_noticias,
            '_serialize' => array('imagenes_noticias')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Imagenes_Noticias->id = $id;
        if ($this->Imagenes_Noticias->save($this->request->data)) {
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
        if ($this->Imagenes_Noticias->delete($id)) {
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
