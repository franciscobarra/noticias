<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestTags_NoticiasController extends AppController {
   
    public $uses = array('Tags_Noticias');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

 
    public function index() {
        $tags_noticias = $this->Tags_Noticias->find('all');
        $this->set(array(
            'tags_noticias' => $tags_noticias,
            '_serialize' => array('tags_noticias')
        ));
    }
 
    public function add() {
        $this->Tags_Noticias->create();
        if ($this->Tags_Noticias->save($this->request->data)) {
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
        $tags_noticias = $this->Tags_Noticias->findById($id);
        $this->set(array(
            'tags_noticias' => $tags_noticias,
            '_serialize' => array('tags_noticias')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Tags_Noticias->id = $id;
        if ($this->Tags_Noticias->save($this->request->data)) {
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
        if ($this->Tags_Noticias->delete($id)) {
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
