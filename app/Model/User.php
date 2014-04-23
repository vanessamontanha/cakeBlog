<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP User
 * @author Vanessa
 */


/*
 * We are letting the User Model know that we are using the SimplePasswordHasher
 * class that will hash every password.
 */

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


class User extends AppModel {
    
    	public $hasMany = array(
                'Post'=>array(
                'className' => 'Post'
        )
    );
    
/*
 * We are using the $validation variable to declare validation rules for the
 * specified fields.
 */    
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
    
/*
 * This function executes immediately after model data has been successfully
 * validated, but just before the data is saved. So in the case below, before
 * the password is saved it will be hashed.
 */    
    
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new SimplePasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}
}
