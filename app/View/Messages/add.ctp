<?php
	echo $this->Html->css('select2');
	echo $this->Html->script('select2');
	
 ?>
<div class="users view" id="success">
	<!-- <?php
	echo $this->Form->create('Message');
	echo $this->Form->input('To', array('name'=>'data[Message][to_id]'));
	echo $this->Form->input('Message Body', array('row'=>'4','name'=>'data[Message][content]'));
	echo $this->Form->end('Send');
	?>  -->
	
	 <form class="form-horizontal" id="MessageAddForm" method="post" action="../messages/add">
		<div class="form-group col-sm-3">
			<label for="toEmail">To:</label>

			
			<select id="e1" class="col-md-12" name="data[Message][to_id]">
				<?php foreach($email as $e): ?>
				<option value="<?php echo $e['User']['email']; ?>"><?php echo $e['User']['email']; ?></option>
				<?php endforeach; ?>
			</select>
			
		</div>
		<div class="form-group col-sm-8 ">
			<label for="body">body:</label>
			<textarea type="text" name="data[Message][content]"></textarea>
		</div>
		<div >
		 <button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form> 
</div>

	
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<?php if($logged_in): ?>
		<li><?php echo $this->Html->link(__('Back'), array('controller' => 'messages', 'action'=>'view')); ?></li>
		<?php endif; ?>
	</ul>

</div>
 <script>
        $(document).ready(function() { $("#e1").select2(); });
 </script>