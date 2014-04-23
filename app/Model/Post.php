<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Post
 * @author Vanessa
 */

/**
 * The Post class extends the parent AppModel class and therefore inherits all 
 * of its methods.
 * 
 */

class Post extends AppModel {
    
    
    	public $belongsTo = array(
            'User' => array(
            'className' => 'User',
            'foreignKey'=> 'user_id'
    )
            
);
        
        
	
 
/* We are implementing Data Validation Rules by using the $validate variable.
 * It will tell CakePHP how to validate the data everytime the save() method is
 * called.
 * 
 */
        
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
    
/*
 * The isOwnedBy function is the saparated bit of the one we defined 
 * in the PostsController. It will be talking directly to the database and 
 * will look for the id and see if it matches and bring the result back to the
 * Controller that will render it on the View.
 * 
 */    
    public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
}

}
