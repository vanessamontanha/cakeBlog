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
    <div class="panel panel-warning">
                    <div class="panel-heading">Login</h3>
                   </div>
                    <div class="panel-body">
                            
                                 
                     <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $this->Form->create('User',array('class'=>'form-horizontal','inputDefaults'=>array('label'=>false)));?>
                 <div class="form-group">
                     
                            <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                              <?php echo $this->Form->input('username',array('class'=>'form-control'));?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                               <?php echo $this->Form->input('password',array('class'=>'form-control'));?>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <?php echo $this->Form->submit('Login',array('class'=>'btn btn-info'))?>
                            </div>
                          </div>
                    <?php echo $this->Form->end();?>
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
