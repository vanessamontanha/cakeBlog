<!-- File: /app/View/Posts/view.ctp -->
<!-- We are creating our view View and customising it  
with a mix of PHP and HTML tags-->



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
    
    
    <table>
<tr>
    <th>Username</th>
    <th>Created</th>
    <th>Role</th>

</tr>

<!-- Here is where we loop through our $posts array, printing out post info -->


<tr>
    <td><?php echo $user['User']['username']; ?> </td>


<td><?php echo $user['User']['created']; ?></td>

<td><?php echo $user['User']['role']; ?> </td>



</tr>


</table>
    
   

</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <?php echo $this->Html->script('bootstrap.min'); ?> 
</html>