<?php

App::uses('AppModel', 'Model');

App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 */
class User extends AppModel {

    /**
     * Validation rules
     */
    public $validate = array(
        'nome' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'sobrenome' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            ),
        ),
        'foto_usuario' => array(
            'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
            'message' => 'Informe uma imagem válida (gif, jpeg, jpg, png).'
        )
    );

    /**
     * belongsTo associations
     *
     */
    public $belongsTo = array(
    );

    /**
     * hasMany associations
     *
     */
    public $hasMany = array(
    );

}
