<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('bootstrap.min.css');
                echo $this->Html->css('custom');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link(__('Home'),'/',array('class'=>'navbar-brand'));?>
            
            
        </div>
          
            
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              
              <li> <?php echo $this->Html->link(__('Contact'),array('controller'=>'contacts','action'=>'index'))?></li>

              <li><?php echo $this->Html->link(__('New Post'),array('controller'=>'posts','action'=>'add'))?></li>   
            <?php if(!$this->Session->check('Auth.User')):?>
            <li><?php echo $this->Html->link(__('Login'),array('controller'=>'users','action'=>'login'))?></li>
            <?php else: ?>
            <li class="dropdown">
                
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.username');?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li>
                    <?php echo $this->Html->link(__('New Post'),array('controller'=>'posts','action'=>'add'))?>
                 </li>
                 <li>
                    <?php echo $this->Html->link(__('Edit Posts'),array('controller'=>'posts','action'=>'edit'))?>
                 </li>
                 <li>
                    <?php echo $this->Html->link(__('New User'),array('controller'=>'users','action'=>'add'))?>
                 </li>
                 <li>
                    <?php echo $this->Html->link(__('View Users'),array('controller'=>'users','action'=>'index'))?>
                 </li>
                 <li>
                    <?php echo $this->Html->link(__('Log Out'),array('controller'=>'users','action'=>'logout'))?>
                 </li>
              </ul>
            </li>
            <?php endif;?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>
</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <?php echo $this->Html->script('bootstrap.min'); ?> 
</html>
