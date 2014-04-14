<?php
App::uses('AppModel', 'Model');

/**
 * The Post class extends the parent AppModel class and therefore inherits all 
 * of its methods.
 * 
 */
class Post extends AppModel {



/* We are implementing Data Validation Rules by using the $validate variable.
 * It will tell CakePHP how to validate the data everytime the save() method is
 * called.
 * 
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a title',
				
			),
		),
		'body' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter post content',
				
			),
		),
	);

	
/**
 * belongsTo associations

 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			
		)
	);

/**
 * hasMany associations
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
			'dependent' => false,
	
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


