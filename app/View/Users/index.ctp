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
	  <div class="col-lg-8">
    <p class="date">
        <?php echo $this->Html->link(__('Add User'),array('action'=>'add'),array('class'=>'btn btn-primary'))?>
    </p>
  </div>
</div> 
 
 
<div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Author</th>
                    <th>Role</th>
                    <th>Posts</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                   
                </tr>
            </thead>
             
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                   
                    <td>
                        <?php echo h($user['User']['id']); ?>
                                             
                    </td>
                    <td><?php echo h($user['User']['username']); ?>
                    </td>
                    <td><?php echo h($user['User']['role']); ?>
                    </td>
                    
                    <td>
                       <?php
                        echo count($user['Post']);
                       ?>
                    </td>
                    <td><?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?></td>
                    <td><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?></td>
			<td><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?></td>
                    
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="pull-right">
            <?php
                echo $this->element('paginator');
            ?>
         </div>

	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	
</div>

  </body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <?php echo $this->Html->script('bootstrap.min'); ?> 
</html>
