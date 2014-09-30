<?php


App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestPublicidadController extends AppController {
   
    public $uses = array('Publicidad');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $publicidad = $this->Publicidad->find('all');
        $this->set(array(
            'publicidad' => $publicidad,
            '_serialize' => array('publicidad')
        ));
    }
 
    public function add() {
        $this->Publicidad->create();
        if ($this->Publicidad->save($this->request->data)) {
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
        $publicidad = $this->Publicidad->findById($id);
        $this->set(array(
            'publicidad' => $publicidad,
            '_serialize' => array('publicidad')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Publicidad->id = $id;
        if ($this->Publicidad->save($this->request->data)) {
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
        if ($this->Publicidad->delete($id)) {
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
