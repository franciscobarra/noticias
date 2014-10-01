<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestTamanio_PublicidadController extends AppController {
   
    public $uses = array('Tamanio_Publicidad');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $tamanio_publicidad = $this->Tamanio_Publicidad->find('all');
        $this->set(array(
            'tamanio_publicidad' => $tamanio_publicidad,
            '_serialize' => array('tamanio_publicidad')
        ));
    }
 
    public function add() {
        $this->Tamanio_Publicidad->create();
        if ($this->Tamanio_Publicidad->save($this->request->data)) {
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
        $tamanio_publicidad = $this->Tamanio_Publicidad->findById($id);
        $this->set(array(
            'tamanio_publicidad' => $tamanio_publicidad,
            '_serialize' => array('tamanio_publicidad')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Tamanio_Publicidad->id = $id;
        if ($this->Tamanio_Publicidad->save($this->request->data)) {
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
        if ($this->Tamanio_Publicidad->delete($id)) {
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
