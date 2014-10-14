<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

    var $name = 'User';
    var $belongsTo = array(
        'Roles' => array(
            'className'    => 'Roles',
            'foreignKey'   => 'id_roles'
        ),
        'Pais' => array(
            'className'    => 'Pais',
            'foreignKey'   => 'id_pais'
        )
    );

    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        $this->_prepareValidationRules();
    }

    protected function _prepareValidationRules() {
        if (!empty($this->apiValidation)) { // for API
            $this->validate = array(
                
        /* Nombre De Usuario  */        
                'username' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Nombre de Usuario',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre De Usuario debe tener minimo de 5 a 150 caracteres'
                    ),
                     'unique' => array(
                        'rule'    => 'isUnique',
                        'message' => 'El Nombre de Usuario ingresado, ya esta registrado'
                    ),
                     'alphaNumeric' => array(
                        'rule'     => 'alphaNumeric',
                        'required' => true,
                        'message'  => 'Se deben ingresar solo letras  y numeros'
                   )),
        
        /* Contraseña */
                    'password' => array(
                        'required' => array(
                            'rule' => array('notEmpty'),
                            'message' => 'Se Requiere Una Contraseña'
                        ),
                        'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'La Contrasenia debe tener al minimo de 5 a 150 caracteres'
                    )),
        /*Nombre*/
                'nombre' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Nombre',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre debe tener minimo de 5 a 150 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z ]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras',
                    )),
        /*Apellido Paterno*/
                'apellido_pat' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Apellido Paterno',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre debe tener minimo de 5 a 150 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras sin espacios',
                    )),
        /*Apellido Materno*/
                'apellido_mat' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar un Apellido Materno',
                        'allowEmpty' => false
                    ),
                    'between' => array( 
                        'rule' => array('between', 5, 150), 
                        'required' => true, 
                        'message' => 'El Nombre debe tener minimo de 5 a 150 caracteres'
                    ),
                    'pattern'=>array(
                        'rule'      => array('custom', '/^[a-z]*$/i'),
                        'message'   => 'Solo se pueden ingresar letras sin espacios',
                    )),
        /*Fecha De Nacimiento*/
                'fecha_nacimiento' => array(
                    'nonEmpty' => array(
                        'rule' => array('notEmpty'),
                        'required' => true,
                        'message' => 'Se Requiere ingresar una Fecha De Nacimiento',
                        'allowEmpty' => false
                    ),
                    'age' => array(
                          'rule' => 'checkMayor_Edad',
                          'message' => 'Usted debe ser mayor de 18 anios'
                    )),
        /*Rut*/        
                'rut' => array(
                        'nonEmpty' => array(
                            'rule' => array('notEmpty'),
                            'message' => 'Se Requiere ingresar el Rut de Usuario',
                            'allowEmpty' => false
                        ),
                        'between' => array( 
                            'rule' => array('between', 9, 12), 
                            'required' => true, 
                            'message' => 'El Rut Ingresado no es valido'
                        ),
                         'unique' => array(
                            'rule'    => 'isUnique',
                            'message' => 'El rut ingresado, ya está registrado'
                        ),
                        

        ),
                );
        } else { // default behaviour
            $this->validate = array(
                'username' => array(
                    'rule' => 'notEmpty',
                    'required' => true,
                    'message' =>  '1'
            ));
        }
    }
    
    public function checkMayor_Edad($check) {
  $bday = strtotime($check['fecha_nacimiento']);
  if (time() < strtotime('+18 years', $bday)) return false;
  return true;
}


}
