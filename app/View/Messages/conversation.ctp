<div class="users view">
	<?php echo $this->Html->css('conversation'); ?>
		 <h2><?php echo __('Conversation'); ?></h2> 
		 	<?php 
		 		echo $this->Form->create('Message'); 
		 		echo $this->Form->input('content');
		 		echo $this->Form->end('Send');
		 	?>
		 <br>

	  <div class="col-sm-7 col-sm-offset-1 frame">
	  <ul id="myList">

	<?php foreach($conversationList as $conversation): ?>
            	<li>
            		<div>
							<?php 
								if ($conversation['User_from']['id'] == $current_user['id']){
									echo "<div class='msj-rta macro'>";
										echo "<div class='avatar'>";
					            		echo "<p>";
					            		echo $this->Html->link(
										$this->Html->image('uploads/' . $conversation['User_from']['image'], array('height'=>'50px', 'width'=>'50px', 'class'=>'img img-circle')),
										array(
										'controller' => 'users',
										'action'=>'profile',
										$conversation['User_from']['id']
										),array('escape'=>false)
										);
										echo "</p>";
										echo "</div>";
										echo "<div class='text text-r'>";
											echo "<div>";
											echo "<p>";
											echo "<small>" . $current_user['name'] . "&nbsp;&nbsp;</small>";

											echo "<small>" .  $this->Time->format(
													'h:i:A M-d',
													$conversation['Message']['created']
											);
											echo "</small>";
											echo "<p>" . $conversation['Message']['content'] . "</p>";
											echo "</p>";
											echo "</div>";
										echo "</div>";
									echo "</div>";
								 } else {
								 	echo "<div class='msj macro'>";
									 	echo "<div class='avatar'>";
					            		echo "<p>";
					            		echo $this->Html->link(
										$this->Html->image('uploads/' . $conversation['User_from']['image'], array('height'=>'50px', 'width'=>'50px', 'class'=>'img img-circle')),
										array(
										'controller' => 'users',
										'action'=>'profile',
										$conversation['User_from']['id']
										),array('escape'=>false)
										);
										echo "</p>";
										echo "</div>";
										echo "<div class='text text-l'>";
											echo "<div>";
											echo "<p>";
											echo "<small>" . $conversation['User_from']['name'] . "&nbsp;&nbsp;</small>"; 
											echo "<small>";
											echo $this->Time->format(
													'h:i:A M-d',
													$conversation['Message']['created']
											);
											echo "</small>";
											echo "<p>" . $conversation['Message']['content'] . "</p>";
											echo "</p>";
											echo "</div>";
										echo "</div>";
									echo "</div>";


								}

							?>
					
				</div>
			</li>
	<?php endforeach; ?>
	</ul>
	</div>

<a class="btn btn-default col-sm-7 col-sm-offset-1" id="loadMore">Load More</a>
</div>
<div class="actions">
	<h3><?php echo __('Messages'); ?></h3>
	
		<?php echo $this->Html->link('Home', array('controller'=>'users', 'action'=>'index'),array('class'=>'col-sm-12')); ?></li>
		<br><br>
		<?php echo $this->Html->link('View Message List', array('action' => 'view'),array('class'=>'col-sm-12')); ?></li>
	
</div>
<script>
$(document).ready(function () {
    size_li = $("#myList li").size();
    x=5;
    $('#myList li:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+5 <= size_li) ? x+5 : size_li;
        $('#myList li:lt('+x+')').show();
         $('#showLess').show();
        if(x == size_li){
            $('#loadMore').hide();
        }
    });
});
</script>
<!-- 
// JsHelper should be loaded in $helpers in controller
// Form ID: #ContactsContactForm
// Div to use for AJAX response: #contactStatus
// $data = $this->Js->get('#ReplyConversationForm')->serializeForm(array('isForm' => true, 'inline' => true));
// $this->Js->get('#ReplyConversationForm')->event(
//    'submit',
//    $this->Js->request(
//     array('action' => 'conversation', 'controller' => 'messages'),
//     array(
//     	'update'=>'#list',
//         'data' => $data,
//         'async' => true,    
//         'dataExpression'=>true,
//         'method' => 'POST'
//     )
//   )
// );
// echo $this->Js->writeBuffer();  -->
