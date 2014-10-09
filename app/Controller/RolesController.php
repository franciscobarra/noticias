<?php

class RolesController extends AppController {
    
    public $uses = array('Roles');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
 
 
    public function index() {
        $roles = $this->Roles->find('all');
        $this->set(array(
            'roles' => $roles,
            '_serialize' => array('roles')
        ));
    }
 
    public function add() {
        $this->Roles->create();
        if ($this->Roles->save($this->request->data)) {
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
        $roles = $this->Roles->findById($id);
        $this->set(array(
            'roles' => $roles,
            '_serialize' => array('roles')
        ));
    }
 
     
    public function edit($id) {
        $this->Roles->id = $id;
        if ($this->Roles->save($this->request->data)) {
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
        if ($this->Roles->delete($id)) {
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