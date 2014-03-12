<?php
// app/Controller/UsersController.php

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        //this.auth(component:class of cake php) Auth has method called allow. (we can find the function of add)
        //allow people access to function of add
        //allow people access to add,index,edit 
        //allow execute of code that there are functions here. 
        $this->Auth->allow('add','edit','delete','logout');
    }
    
  

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}

    public function index() {
    //model is related with User 
    //recursive is similar with find all but different method
        $this->User->recursive = 0;
        //passing the result from recursive to users(variable) to the view(index.ctp) 
        //this.paginate 
        $this->set('users', $this->paginate());
    }

	
    public function view($id = null) {
    //looking for the user id // model go to find id in database then give back to the view
        $this->User->id = $id;
        //if we cant find the user then throw erro
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        // if find user read user that has id 
        //in view has a variable of user 
        //this is current class. 
        //this is a hand over to us. 
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
    //HTTP post request (not get not add request) Post request always go to form 
    //it only post request to form 
        if ($this->request->is('post')) {
        // we prepare a model to make something
        //iniulising in model
            $this->User->create();
            //request object is a bag (data is in here) : request.data wrap a data 
            // request object is a holder data in our place. 
            
            if ($this->User->save($this->request->data)) {
            // if you add in database (successful) then setFlash of message. 
                $this->Session->setFlash(__('The user has been saved'));
                // we return redirect method to the location that we want to direct to
                //for example go to 'controller' => 'posts': tell it that go to controller>post 
                //in this case if it successful then go to index function to execute code. 
                return $this->redirect(array('action' => 'index'));
            }
            //if not successful, the setflash message of not save
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
    // tell particular user by id
    
        $this->User->id = $id;
        // if cant find user then throw exception
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        // only allowing 2 particular of post or put , but not get request. 
        
        if ($this->request->is('post') || $this->request->is('put')) {
        // save data in the request object. 
            if ($this->User->save($this->request->data)) {
            // display message
                $this->Session->setFlash(__('The user has been saved'));
                // redirect to execute code in index function. 
                return $this->redirect(array('action' => 'index'));
            }
            // else display errro message
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else { 
        // if get request from URL then do this stage. 
        // unset the password. 
        //request data in that form then we have to match data 
            $this->request->data = $this->User->read(null, $id);
        //but it doesn't set any user and password 
            unset($this->request->data['User']['password']);
        }
    }
    
    

    public function delete($id = null) {
    //only accept HTTP post request 
        $this->request->onlyAllow('post');

        
        $this->User->id = $id;
        //cant find user
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        // if it doesn't work , display the message user was not deleted. 
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
?>
