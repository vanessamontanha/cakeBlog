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
<div class="container">
	<div class="panel panel-danger">
  <div class="panel-heading">
		<h3 class="panel-title"><?php echo h($post['Post']['title']); ?>&nbsp;</h3>
               <p class="date"><span class="glyphicon glyphicon-time">
  <?php echo h($post['Post']['created']); ?>&nbsp;</span></p>
  </div>
            <div class="panel-body">
                <div class="container">
                    
                    <p class="main"><?php echo h($post['Post']['body']); ?>&nbsp;</p>
                   
                    
                    
		
                    <p class="author"><span class="glyphicon glyphicon-user">
<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?></span></p>
  </div>
            <div class="panel-footer">
               
                   <li><?php echo $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
		
            
                    
                   
		
                
            
       

</div>
</div>

		
		
</div>



	
</div>
</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <?php echo $this->Html->script('bootstrap.min'); ?> 
</html>