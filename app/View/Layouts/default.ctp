<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        If I live to see the seven wonders...
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
      
    <?php echo $this->element('navigation');?>
    <div id="header">
                    <div id="container">
                        
                    
                       
                        <div class="img-responsive"><?php echo $this->Html->image('logo.png', $options = array());?></div>
	
  
                      
  
                        </div>
                    </div>
   
    <div class="container">
      <?php echo $this->Session->flash(); ?>
 
      <?php echo $this->fetch('content'); ?>
       
      <hr>
     
       
    </div> <!-- /container -->
     
     
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<?php echo $this->fetch('scriptBottom'); ?>
	
</body>
</html>
