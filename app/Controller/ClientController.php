<?php

App::uses('HttpSocket', 'Network/Http');
class ClientController extends AppController {
    public $components = array('Security', 'RequestHandler');
     
    public function index(){
         
    }
   
    public function request_index(){
     
        // remotely post the information to the server
       $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_anuncios.json';
         
        $data = null;
        $httpSocket = new HttpSocket();
        $response = $httpSocket->get($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
     
    public function request_view($id){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_usuarios/'.$id.'.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $response = $httpSocket->get($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
     
    public function request_edit($id){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_anuncios/'.$id.'.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $data['Anuncio']['titulo'] = 'El pichulon actualizado';
        $data['Anuncio']['cuerpo'] = 'Cuerpazo actualizado';
        $data['Anuncio']['fecha_publicacion'] = '11-12-2013';
        $data['Anuncio']['fecha_vigencia'] = '11-12-2015';
        $data['Anuncio']['longitud'] = '4000';
        $data['Anuncio']['latitud'] = '5000';
        $response = $httpSocket->put($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
     
    public function request_add(){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_anuncios.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $data['Anuncio']['titulo'] = 'El pichulon';
        $data['Anuncio']['cuerpo'] = 'Cuerpazo';
        $data['Anuncio']['fecha_publicacion'] = '11-12-2013';
        $data['Anuncio']['fecha_vigencia'] = '11-12-2015';
        $data['Anuncio']['longitud'] = '4000';
        $data['Anuncio']['latitud'] = '5000';
        $response = $httpSocket->post($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
     
    public function request_delete($id){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_anuncios/'.$id.'.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $response = $httpSocket->delete($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
    
    public function request_login(){
     
        // remotely post the information to the server
        $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_usuarios.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $data['Usuario']['username'] = 'juanito';
        $data['Usuario']['password'] = '123456';
        $response = $httpSocket->get($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }
    
  
}
   