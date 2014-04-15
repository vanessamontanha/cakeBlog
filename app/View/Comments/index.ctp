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
    <?php foreach ($comments as $comment): ?>
<div class="container">
	
	
<div class="panel panel-danger">
  <div class="panel-heading">
      <h3 class="panel-title">
                               <?php echo h($comment['Comment']['name']); ?>&nbsp;
                                <p class="date"><span class="glyphicon glyphicon-time">
  <?php echo h($comment['Comment']['created']); ?>&nbsp;</span></p>
  </div>
		
			
    
      <div class="panel-body">
                <div class="container">
                    
                    <p class="main"><?php echo h($comment['Comment']['comment']); ?>&nbsp;</p>
                   
                    
                    
               
                    <p class="author"><span class="glyphicon glyphicon-user">
<?php echo h($comment['Comment']['name']); ?>&nbsp;</span></p>
  </div>
    <div class="panel-footer">
        <td class="actions">
		
	
		<li><?php echo $this->Html->link(__('New Comment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		
        </td>
        

    </div></div></div></div>
<?php endforeach; ?>
	
	
	<div class="paging">
            
	<div class="alert alert-success"><?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
        ?>
             
           
        </div>	
            
	
</div>
       <p class="centra"> <?php
                        echo $this->element('paginator');
                        ?></p>

    </body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <?php echo $this->Html->script('bootstrap.min'); ?> 
</html>
