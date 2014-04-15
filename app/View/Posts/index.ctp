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
    

    
    
    
    <?php foreach ($posts as $post): ?>
    
    <div class="container">
	<div class="panel panel-danger">
  <div class="panel-heading">
		<h3 class="panel-title"><?php echo h($post['Post']['title']); ?>&nbsp;</h3>
  </div>
            <div class="panel-body">
                <div class="container">
                    <p class="date"> <?php echo h($post['Post']['created']); ?>&nbsp;</p>
                    <p class="main"><?php echo h($post['Post']['body']); ?>&nbsp;</p>
                   
                    
                    
		
                    <p class="author"><span class="glyphicon glyphicon-user">
<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['username'])); ?></span></p>
  </div>
            <div class="panel-footer">
                <td class="actions">
                    
                    <p><?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?></p>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
		</td>
                
            
        </div>
</div>
</div>
</div>

		
		
	</tr>
<?php endforeach; ?>
	
	
	<div class="paging">
            
	<div class="alert alert-success"><?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
        ?>
             
           
        </div>	
            
	<?php
                        echo $this->element('paginator');
                        ?>

	</div>
</div>
    

    </body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <?php echo $this->Html->script('bootstrap.min'); ?> 
</html>