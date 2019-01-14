<div class="users index">
	<h2>User Profile</h2>
	
	<?php foreach ($user as $d): ?>
	<div>
		
		<img><?php echo $this->Html->image('uploads/'. $d['image'], array(
						'height'=>'200px',
						'width'=>'200px'
			)); ?></img>
		<p><?php echo "<h4>ID:</h4>"; echo h($d['id']);  ?></p>
		<p><?php echo "<h4>Name:</h4>"; echo "<h3>".($d['name']). "</h3>"; ?></p>
		<p><?php echo "<h4>Email:</h4>"; echo h($d['email']);  ?></p>
		<p><?php echo "<h4>Gender:</h4>"; 
		// debug($d['gender']);
		if($d['gender'] == 1){
		echo 'Male';  
		} elseif($d['gender'] == 2) {
			echo 'Female';
		} else echo "";
		?></p>
		<p><?php echo "<h4>Birthdate:</h4>"; echo h($d['birthdate']);  ?></p>
		<p><?php echo "<h4>Hubby:</h4>"; echo h($d['hubby']);  ?></p>
		
	</div>
		
	<?php endforeach; ?> 
</div>

 <div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('controller'=>'messages', 'action'=>'view')); ?></li>
	</ul>
</div>  
