<?php

class RestPaisController extends AppController {
    public $uses = array('Pais');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
 
 
    public function index() {
        $pais = $this->Pais->find('all');
        $this->set(array(
            'pais' => $pais,
            '_serialize' => array('pais')
        ));
    }
 
    public function add() {
        $this->Pais->create();
        if ($this->Pais->save($this->request->data)) {
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
        $pais = $this->Pais->findById($id);
        $this->set(array(
            'pais' => $pais,
            '_serialize' => array('pais')
        ));
    }
 
     
    public function edit($id) {
        $this->Pais->id = $id;
        if ($this->Pais->save($this->request->data)) {
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
        if ($this->Pais->delete($id)) {
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
