<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestTamaño_PublicidadController extends AppController {
   
    public $uses = array('Tamaño_Publicidad');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $tamaño_publicidad = $this->Tamaño_Publicidad->find('all');
        $this->set(array(
            'tamaño_publicidad' => $tamaño_publicidad,
            '_serialize' => array('tamaño_publicidad')
        ));
    }
 
    public function add() {
        $this->Tamaño_Publicidad->create();
        if ($this->Tamaño_Publicidad->save($this->request->data)) {
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
        $tamaño_publicidad = $this->Tamaño_Publicidad->findById($id);
        $this->set(array(
            'tamaño_publicidad' => $tamaño_publicidad,
            '_serialize' => array('tamaño_publicidad')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Tamaño_Publicidad->id = $id;
        if ($this->Tamaño_Publicidad->save($this->request->data)) {
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
        if ($this->Tamaño_Publicidad->delete($id)) {
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
