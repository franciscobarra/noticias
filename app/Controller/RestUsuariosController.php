<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


class RestUsuariosController extends AppController {
   
    public $uses = array('Usuario');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Usuario->apiValidation = true;
    }
    
    public function login() {
        if ($this->Auth->user()) {
            $this->set(array(
                'message' => 'Ya estas logeado',
                '_serialize' => array('message')
            ));
        }
        if ($this->request->is('get')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
                $this->set(array(
                 'user' => $this->Auth->user(),
                 '_serialize' => array('user')
                ));
            }else{
                 $this->set(array(
                    'message' => 'error',
                    '_serialize' => array('message')
                ));
            }
        }
        $this->Session->setFlash(__('no se puede ingresar usuario'));
    }

    public function logout() {
        if ($this->Auth->logout()) {
            $this->set(array(
                'message' => array(
                    'text' => __('Logout successfully'),
                    'type' => 'info'
                ),
                '_serialize' => array('message')
            ));
        }
    }
    
    public function index() {
        $usuarios = $this->Usuario->find('all');
        $this->set(array(
            'usuarios' => $usuarios,
            '_serialize' => array('usuarios')
        ));
    }
 
    public function add() {
        
        $this->Usuario->create();
        if ($this->Usuario->saveAll($this->request->data)) {
            
             $message = 'agregado';
        } else {
            $message = 'error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
        
        
    }
     
    public function view($id) {
        $usuarios = $this->Usuario->findById($id);
        $this->set(array(
            'usuarios' => $usuarios,
            '_serialize' => array('usuarios')
        ));
    }
 
     
    public function edit($id = null) {
        $this->Usuario->id = $id;
        if ($this->Usuario->save($this->request->data)) {
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
        if ($this->Usuario->delete($id)) {
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
