<!-- File: /app/View/Users/edit.ctp -->

<h1>Edit User</h1>
<?php
echo $this->Form->create('User'); // create edit form in User model to send to database
echo $this->Form->input('username'); 
echo $this->Form->input('password', array('rows' => '2'));
echo $this->Form->input('role');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>