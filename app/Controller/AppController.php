<?php


App::uses('Controller', 'Controller');



/*
 * The AppController class extends the Controller class.
 * To add the AuthComponent that will handle login and logout functions, we 
 * need to insert it in our application in our AppController. We also need to 
 * specify which URL's are going to be loaded every time a login/logout action
 * happens. In our AppController we have directed the user to the index action
 * in posts once he is logged in and the display action on our PagesController
 * when he is logged out. 
 * The 'authorize' is used to configure authorization handler in the Controller.
 * You can specify it on your Controller's beforeFilter or in the components 
 * array.
 */

class AppController extends Controller {
    
    	public $components = array(

        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'posts',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'authorize' => array('Controller')
        )
    );

    
/** The beforeFilter() function let the AuthComponent know that a login is not
 *  required for index and view actions. We do this to determine what parts of
 *  our application will be public. We are setting this in the AppController so
 * our Controllers will inherit this function.
 */    
   public function beforeFilter(){
$this->Auth->allow('index','logout', 'display');
}

/**
 * isAuthorized() is a callback method that will bring a boolean as to whether 
 * the user specified is allowed to access what has been requested. In this case
 * we are saying that if the active user is an admin he has unrestricted access.
 */

public function isAuthorized($user) {
    // Admin can access every action
    if (isset($user['role']) && $user['role'] === 'admin') {
        return true;
    }

    // Default deny
    return false;
}
}
