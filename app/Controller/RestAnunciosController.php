<?php

class RestAnunciosController extends AppController {
    public $uses = array('Anuncio');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
 
 
    public function index() {
        $anuncios = $this->Anuncio->find('all');
        $this->set(array(
            'anuncios' => $anuncios,
            '_serialize' => array('anuncios')
        ));
    }
 
    public function add() {
        $this->Anuncio->create();
        if ($this->Anuncio->save($this->request->data)) {
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
        $anuncio = $this->Anuncio->findById($id);
        $this->set(array(
            'anuncio' => $anuncio,
            '_serialize' => array('anuncio')
        ));
    }
 
     
    public function edit($id) {
        $this->Anuncio->id = $id;
        if ($this->Anuncio->save($this->request->data)) {
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
        if ($this->Anuncio->delete($id)) {
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
