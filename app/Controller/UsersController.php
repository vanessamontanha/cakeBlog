<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP UsersController
 * @author Vanessa
 */


class UsersController extends AppController {
    
    	public $helpers = array('Html', 'Form', 'Session');
        public $components = array('Session', 'Paginator');
        
        
        
/**
 * Auth is a component of CakePHP that will allow us to specify which functions
 * are allowed to the User.
 */    

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'login', 'logout');
    }
        
        
/**Uses the configured Authorization adapters to check whether
*or not a user is authorized. Each adapter will be checked in
*sequence, if any of them return true, then the user will be
*authorized for the request.
*/
    public function isAuthorized($user){

    if (isset($user['role']) && $user['role'] === 'admin') {
    return true;
    }	

        if(in_array($this->action, array('edit', 'delete'))){
        if($user['id'] != $this->request->params['pass'][0]){
            return false;
            }
        }
            return true;
            }        
    
    
/**
 * The login function is checking if the data came through a POST request
 * and it is also checking to see if the details given match the ones recorded
 * in the database. If the details are incorrect, a flash message will be shown
 * letting the user know that username or password have been entered incorrectly.
 * 
 */    
    public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

/*
 * The logout() function will authorise the user to log out of the current 
 * session.
 */

public function logout() {
    return $this->redirect($this->Auth->logout());
}

/*
 * In the index() function, we are telling the Model (User) to go recursive = 1,
 * which means that CakePHP fetches a Group, its domain and its associated 
 * Users. We can determine the depth of our searches by setting the value to -1,
 * 0, 1 and 2. We are also telling the View we want the results to be displayed 
 * with pagination.
 * 
 */

    public function index() {
        $this->User->recursive = 1;
        $this->set('users', $this->paginate());
    }

/*
 * In the view() function we are handing an $id parameter, so the User Model 
 * can look for it and render it to the View. If the id entered is invalid, 
 * we thrown an error and break out of the code. The set() method is passing 
 * to the Controller the User that will then pass to the View in a 'user' 
 * variable. 
 */    
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }
/*
 * The add function is checking to see if it is a POST request and is letting 
 * the model know with the create() that it should get ready (be resetted) to 
 * save new data. If the request checked is POST, then it will be available
 * in $this->request->data and it will be saved in the User Model. A message 
 * will flash, letting the user know that the user has been saved and it will
 * redirect to the index action in the UsersController. If the request has not 
 * been identified as POST, a message will be displayed to the user asking him
 * to try again.
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            $data = $this->request->data['User'];
                if(!$data['user_picture']['name']) {
                    unset($data['user_picture']);
                    
                }
            
            if ($this->User->save($data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

/*
 * The edit() function is passing a parameter $id that correspond to a User in
 * the User Model. It will then go and check to see if the User is there and
 * bring back the result. If the User cannot be found, we throw a NotFoundException
 * and break out of the code. If the User is found and the type of request being
 * sent is POST or PUT(used for edit actions), save data in the request object,
 * redirect to the action index in the UsersController. If data sent is not POST
 * or PUT, display a message letting the User know that the operation could not
 * be completed. In the case that the request goes through with a GET method,
 * make sure the database is kept secure and unset password and users so they
 * are never displayed.
 * 
 */    
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data['User'];
                if(!$data['user_picture']['name']) {
                    unset($data['user_picture']);
                    
                }
            
            if ($this->User->save($data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }
    
/**
 * The delete() function will only accept HTTP POST requests. It will check the
 * parameter passed through the URL($id) and see if it matches the one in the 
 * database. If the ID is not found, throw a NotFoundException and break out of
 * the code. If id is found, delete it in the User Model, display a message 
 * letting the User know that the specified User has been deleted and redirect
 * it to the index action in the UsersController. If deletion is unsuccesful, 
 * display an error message and redirect it to the index action in the 
 * UsersController.
 */    

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
    
    

}
