<?php


App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestCategoriaPublicidadController extends AppController {
   
    public $uses = array('Categoria_Publicidad');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $categoria_publicidad = $this->Categoria_Publicidad->find('all');
        $this->set(array(
            'categoria_publicidad' => $categoria_publicidad,
            '_serialize' => array('categoria_publicidad')
        ));
    }
 
    public function add() {
        $this->Categoria_Publicidad->create();
        if ($this->Categoria_Publicidad->save($this->request->data)) {
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
        $categoria_publicidad = $this->Categoria_Publicidad->findById($id);
        $this->set(array(
            'categoria_publicidad' => $categoria_publicidad,
            '_serialize' => array('categoria_publicidad')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Categoria_Publicidad->id = $id;
        if ($this->Categoria_Publicidad->save($this->request->data)) {
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
        if ($this->Categoria_Publicidad->delete($id)) {
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
