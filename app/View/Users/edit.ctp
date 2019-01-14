<div class="users form">
	<fieldset>
	<legend><?php echo __('Edit User'); ?></legend>
    <?php 
    	echo "<img class='img-circle' id='imgPreview' height='200px' width='200px'></img>";
		echo $this->Form->create('Image', array('enctype' => 'multipart/form-data', 'url'=>'fileUpload'));
		echo $this->Form->file('Document.submittedfile', array('id'=>'imgInp')); 
		echo $this->Form->end('Upload');
	?>

<?php echo $this->Form->create('User') ; ?>		
	<?php
		echo $this->Html->image('image', array('height'=>'200px', 'width'=>'200px'));
		
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('password', array('placeholder'=>'password', 'value'=>''));
		echo $this->Form->input('confirmPassword', array('type'=>'password', 'placeholder'=>'confirm password'));
		echo $this->Form->input('gender', array(
			'options'=> array('1'=>'Male','2'=>'Female'),
			'class'=>'radio'
		));
		echo $this->Form->input('hubby');

		?>
		<div class="form-group col-md-2">
        	<label class="control-label" for="date">Birthdate</label>
        	<input class="form-control" id="date" name="data[User][birthdate]" type="date">
  		</div>
		<!-- <div class="form-group col-md-4">
    			<label for="email">User ID</label>
    			<input type="email" disabled="true" value="<?php echo $current_user['id']; ?>" name="data[User][email]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  		</div>

		<div class="form-group col-md-4">
    			<label for="email">Email address</label>
    			<input type="email" disabled="true" value="<?php echo $current_user['email']; ?>" name="data[User][email]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  			
  		</div>

  		<div class="form-group col-md-4">
    			<label for="name">Name</label>
    			<input type="text" value="<?php echo $current_user['name']; ?>" name="data[User][name]" class="form-control sm-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  		</div>
		// echo $this->Form->input('birthdate', array('id'=>'dPicker','class'=>'', )); 
		
      <div class="form-group col-md-2">  Date input 
        	<label class="control-label" for="date">Birthdate</label>
        	<input class="form-control" id="date" name="data[User][birthdate]" type="date">
  	</div>
         <div class="form-group col-md-6">  Date input
        	<label class="control-label">Hubby</label>
        	<input class="form-control" type="text" name="data[User][hubby]" value="<?php echo $current_user['hubby']; ?>">
  	</div> -->
		<!-- // echo "<input type='date'></input>";
		
		// echo $this->Form->input('last_login_time');
		// echo $this->Form->input('created_ip');
		// echo $this->Form->input('modified_ip'); -->
	
	</fieldset>
<?php echo $this->Form->end(__('Update', array('class'=>'btn btn-primary'))); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), array('action'=>'index', 'class'=>'btn btn-default')); ?></li>
		<?php if($logged_in): ?>
		<li><?php echo $this->Html->link(__('Messages'), array('controller' => 'messages', 'action'=>'view')); ?></li>
		<?php endif; ?>
	</ul>

</div>
<script type="text/javascript">
	function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imgPreview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.users form').length>0 ? $('.users form').parent() : "body";
      var options={
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>