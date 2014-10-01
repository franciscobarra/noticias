<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestNoticiasController extends AppController {
   
    public $uses = array('Noticias');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $noticias = $this->Noticias->find('all');
        $this->set(array(
            'noticias' => $noticias,
            '_serialize' => array('noticias')
        ));
    }
 
    public function add() {
        $this->Noticias->create();
        if ($this->Noticias->save($this->request->data)) {
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
        $noticias = $this->Noticias->findById($id);
        $this->set(array(
            'noticias' => $noticias,
            '_serialize' => array('noticias')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Noticias->id = $id;
        if ($this->Noticias->save($this->request->data)) {
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
        if ($this->Noticias->delete($id)) {
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
