<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

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
        'Paginator',
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'posts',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'posts',
                'action' => 'index',
                'home'
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
