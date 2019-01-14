<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Messageboard
	</title>
	
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
		echo $this->Html->css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		echo $this->Html->script('https://code.jquery.com/jquery-1.11.3.min.js');
		echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
		echo $this->Html->script('https://cdn.heapanalytics.com/js/heap-2625472963.js');
		echo $this->Html->script('https://static.codepen.io/assets/packs/0-e5bec1193b79081a73ef.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('js');
		
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
		
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="content">
			<div style="text-align: right">
				<?php if ($logged_in): ?>
					Welcome <?php echo $current_user['email']; ?> ,
					<?php echo $this->Html->link('logout', array('controllers'=>'users', 'action'=>'logout')); ?>
				<?php else : ?>
					<?php echo $this->Html->link('Login', array('controllers'=>'users', 'action'=>'login')); ?>
				<?php endif; ?>

			</div>
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<!-- <?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'https://cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?> -->
			<p>
				<!-- <?php echo $cakeVersion; ?> -->
			</p>
		</div>
	</div>
<!-- 	<?php echo $this->element('sql_dump'); ?> -->
</body>
</html>
