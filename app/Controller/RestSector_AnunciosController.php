<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestSector_AnunciosController extends AppController {
   
    public $uses = array('Sector_Anuncios');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $sector_anuncios = $this->Sector_Anuncios->find('all');
        $this->set(array(
            'sector_anuncios' => $sector_anuncios,
            '_serialize' => array('sector_anuncios')
        ));
    }
 
    public function add() {
        $this->Sector_Anuncios->create();
        if ($this->Sector_Anuncios->save($this->request->data)) {
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
        $sector_anuncios = $this->Sector_Anuncios->findById($id);
        $this->set(array(
            'sector_anuncios' => $sector_anuncios,
            '_serialize' => array('sector_anuncios')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Sector_Anuncios->id = $id;
        if ($this->Sector_Anuncios->save($this->request->data)) {
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
        if ($this->Sector_Anuncios->delete($id)) {
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
