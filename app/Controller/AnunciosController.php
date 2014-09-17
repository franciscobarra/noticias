<?php

class AnunciosController extends AppController{
  public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
         $this->set('anuncios', $this->Anuncio->find('all'));
    }
     
    public function add() {
        if ($this->request->is('post')) {
            $this->Anuncio->create();
            if ($this->Anuncio->save($this->request->data)) {
                $this->Session->setFlash(__('The Anuncio se ha guardado.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your anuncio.'));
        }
    }
 
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid anuncio'));
        }
 
        $anuncio = $this->Anuncio->findById($id);
        if (!$anuncio) {
            throw new NotFoundException(__('Invalid anuncio'));
        }
        $this->set('anuncio', $anuncio);
    }
     
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid anuncio'));
        }
 
        $anuncio = $this->Anuncio->findById($id);
        if (!$anuncio) {
            throw new NotFoundException(__('Invalid anuncio'));
        }
 
        if ($this->request->is(array('anuncio', 'put'))) {
            $this->Anuncio->id = $id;
            if ($this->Anuncio->save($this->request->data)) {
                $this->Session->setFlash(__('Your anuncio has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your anuncio.'));
        }
 
        if (!$this->request->data) {
            $this->request->data = $anuncio;
        }
    }
     
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
 
        if ($this->Anuncio->delete($id)) {
            $this->Session->setFlash(
                __('The anuncio with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }  
    
    
    
    
}

