class Post extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
			'required' => true
			 'message' => 'Password must be at least 8 characters long'
        ),
        'body' => array(
            'rule' => 'notEmpty'
			'required' => true
			 'message' => 'Password must be at least 8 characters long'
        )
    );
}
