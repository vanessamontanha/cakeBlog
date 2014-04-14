<?php
/**
 * CakePHP User
 * @author Vanessa
 */


/*
 * We are letting the User Model know that we are using the SimplePasswordHasher
 * class that will hash every password.
 */

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

App::uses('AppModel', 'Model');

class User extends AppModel {

               

/**
 * Validation rules
 *
 * @var array
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
        ),
    
                 'user_picture' => array(
                    'uploadError' => array(
                        'rule' => 'uploadError',
                        'message' => 'The cover image upload failed.',
                        'allowEmpty' => TRUE,
                    ),
                    'mimeType' => array(
                        'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
                        'message' => 'Please only upload images (gif, png, jpg).',
                        'allowEmpty' => TRUE,
                    ),
                    'fileSize' => array(
                        'rule' => array('fileSize', '<=', '1MB'),
                        'message' => 'Cover image must be less than 1MB.',
                        'allowEmpty' => TRUE,
                    ),
                        'processCoverUpload' => array(
                        'rule' => 'processCoverUpload',
                        'message' => 'Unable to process cover image upload.',
                        'allowEmpty' => TRUE,
                    ),
                ),
	);
        
        public function processCoverUpload($check = array()) {
            if (!is_uploaded_file($check['user_picture']['tmp_name'])) {
                return FALSE;
            }
            if (!move_uploaded_file($check['user_picture']['tmp_name'], WWW_ROOT . 'img' . DS . 'uploads' . DS . $check['user_picture']['name'])) {
                return FALSE;
            }
            $this->data[$this->alias]['user_picture'] = 'uploads' . DS . $check['user_picture']['name'];
            return TRUE;
        }

         
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
  
        
         public $hasMany = array(
                'Post'=>array(
                'className' => 'Post'
        )
    );

}


