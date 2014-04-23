<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link(__('Super Fantastisch'),'/',array('class'=>'navbar-brand'));?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li> <?php echo $this->Html->link(__('Contact'),array('controller'=>'contacts','action'=>'index'))?></li> 
            
            <li> <?php echo $this->Html->link(__('Register'),  array('controller' => 'users', 'action' => 'add'));?></li>
    
  
    


            
            <?php if(!$this->Session->check('Auth.User')):?>
            <li><?php echo $this->Html->link(__('Login'),array('controller'=>'users','action'=>'login'))?></li>
            <?php else: ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.username');?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li>
                    <li> <?php echo $this->Html->link(__('Users'),array('controller'=>'users','action'=>'index'))?></li>
                 <li>
                    <?php echo $this->Html->link(__('New Post'),array('controller'=>'posts','action'=>'add'))?>
                 </li>
                 <li>
                    <?php echo $this->Html->link(__('New User'),array('controller'=>'users','action'=>'add'))?>
                 </li>
                 <li>
                    <?php echo $this->Html->link(__('Logout'),array('controller'=>'users','action'=>'logout'))?>
                 </li>
              </ul>
            </li>
            <?php endif;?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>
-