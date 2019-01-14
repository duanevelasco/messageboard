 <div class="actions">
	<h3><?php echo __('Messages'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), array('controller'=>'users', 'action'=>'index')); ?></li>
		<?php if($logged_in): ?>
		<li><?php echo $this->Html->link(__('Create New Message'), array('action'=>'add')); ?></li>
		<?php endif; ?>
		 <li><?php echo $this->Html->link(__('View Messages'), array('action' => 'view')); ?></li>
	 	<!-- <li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li> -->
	</ul>
</div>  
