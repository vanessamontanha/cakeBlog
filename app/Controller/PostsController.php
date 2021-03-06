<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP PostsController
 * @author Vanessa
 */

/* The PostsController is automatically linked to the Post Model
 * and posts table in the database. It also extends the parent class 
 * AppController
 */
class PostsController extends AppController { 

public $helpers = array('Session', 'Html', 'Form');


public $components = array('Paginator', 'Session');
   
   
   
   
/*
 * The isAuthorized() method in the PostsController is overriding the one we
 * defined in the AppController. It will first see if the parent class in the 
 * AppController is already authorising the user to access the requested action.
 * If permission has been denied, then the method will allow the user to add if 
 * he is the owner of the post, delete and edit it. The second bit is done by 
 * using the isOwnedBy() method that will be talking to the Model specified in 
 * "$this->Post". 
 */
 public function isAuthorized($user) {
     // All registered users can add posts
     if ($this->action === 'add') {
         return true;
     }

     // The owner of a post can edit and delete it
     if (in_array($this->action, array('edit', 'delete'))) {
    
         $postId = $this->request->params['pass'][0];
         if ($this->Post->isOwnedBy($postId, $user['id'])) {
            return true;
         }
         
     }

     return parent::isAuthorized($user);
}
/* The index function will make it possible to users to access the logic
 * contained inside the action by calling www.example.com/posts/index, in this
 * case they will be presented a list of posts. It is doing so by using set()
 * to pass data from the Controller to the View. It will have access
 * to this data by acessing the respective Model shown in $this->Post, will 
 * bring back all values that equal to the method find('all') and will present
 * them in a View called 'posts'.
 * 
 */
 
    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }
    
/*
 * In this function we are handing a parameter $id to the action. If a user
 * requests a /posts/view/5 the $id value will be 5. If the user has not 
 * entered a value we show an error message letting the user know that an error
 * has occurred. 
 * We also create one for the post id and throw an error message if the id 
 * entered does not correspond to any existent posts. If the user requests a
 * valid post(with a valid id), the findById method will check on the model 
 * specified in $this->Post for the specific post that contains the requested id 
 * and will present it to the user in the View (view.ctp). The set() method is 
 * again passing the data from the PostsController to the 'post' View.
 */    
    
    
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    
/*
 * The add() action checks to see if the request method matches the one 
 * specified in $this->request->us('post'). You could use any other request 
 * method (get, put, post, delete) or some request identifier (ajax). 
 * Continuing, if the method is POST, it will try and save the data with the
 * model specified in $this->Post. If it is not saved it will simply render
 * the view. The create() method is resetting the model's state so it is ready
 * to save new information when needed.
 * The data sent by the user through a form will be available at 
 * $this->request->data. If it is succesfully saved, we will use a Session 
 * Helper to present to the user a message saying that the post has been saved
 * and redirect the user to the index action in the PostsController. 
 * If unsuccesful, a message will be flashed saying that  
 * we were unable to add your post.
 * $this->request->data['Post']['user_id'] = $this->Auth->user('id'); has been
 * added to return the ID of the user who is currently logged in. 
 */    
    
     public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }
    
/*
 * The edit() action first determines if the user has tried to access an
 * existing record. If an error has occurred during this request, such as
 * no specified ID or invalid post, a NotFoundException is thrown and it
 * will be handled by CakePHP ErrorHandler. Then it will check what type 
 * of request is and it will let the user update the post only if is sent 
 * via POST. A flash message will be shown letting the user know that the 
 * post has been updated. If it came with another type of request, it will
 * show a flash message saying we were unable to update your post.
 */    
    
    
    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->Post->id = $id;
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}

/*
 * The delete() action deletes the post that corresponds to the specified $id. 
 * It will not allow get requests, instead it will throw a new
 * MethodNotAllowedException. If it is requested by POST, it lets the user
 * know if the deletion has been sucessful or not by showing a flash message
 * and redirects the user to the index action. 
 */


public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Post->delete($id)) {
        $this->Session->setFlash(
            __('The post with id: %s has been deleted.', h($id))
        );
        return $this->redirect(array('action' => 'index'));
    }
}


    

}




