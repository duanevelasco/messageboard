<div class="users index">
	<h2>User Profile</h2>
	
	<?php foreach ($data as $d): ?>
	<div>
		
		<img><?php echo $this->Html->image('uploads/'. $d['image'], array(
						'height'=>'200px',
						'width'=>'200px',
						'class'=>'img-circle'
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
		<li><?php echo $this->Html->link(__('Home'), array('action'=>'index')); ?></li>
		<?php if($logged_in): ?>
		<li><?php echo $this->Html->link(__('Messages'), array('controller' => 'messages', 'action'=>'view')); ?></li>
		<?php endif; ?>
	 	<li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $data['User']['id'])); ?></li>
	</ul>
</div>  
