<?php

App::uses('HttpSocket', 'Network/Http');
class ClientController extends AppController {
    public $components = array('Security', 'RequestHandler');
     
    public function index(){
         
    }
   
    public function request_index(){
     
        // remotely post the information to the server
       $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_users.json';
         
        $data = null;
        $httpSocket = new HttpSocket();
        $response = $httpSocket->get($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
     
    public function request_view($id){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_users/'.$id.'.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $response = $httpSocket->get($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
     
    public function request_edit($id){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_users/'.$id.'.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $data['Anuncio']['id'] = $id;
        $data['Anuncio']['titulo'] = 'El  wetaa!!';
        $data['Anuncio']['cuerpo'] = 'Cuerpazo actualizado';
        $data['Anuncio']['fecha_publicacion'] = '11-12-2013';
        $data['Anuncio']['fecha_vigencia'] = '11-12-2015';
        $data['Anuncio']['longitud'] = '4000';
        $data['Anuncio']['latitud'] = '5000';
        $response = $httpSocket->post($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
     
    public function request_add(){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'users.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $data['User']['username'] = 'adm!@';
        $data['User']['password'] = '79'; //1234567
        $data['User']['nombre'] = 'ad mff';
        $data['User']['apellido_pat'] = 'ad mff';
        $data['User']['fecha_nacimiento'] = '10-10-2000';
        $data['User']['rut']= '11.102.743-9';
        $response = $httpSocket->post($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
     
    public function request_delete($id){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_users/'.$id.'.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $response = $httpSocket->delete($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }

    
  
}
   