<!-- <meta http-equiv="refresh" content="5; URL="<?php WWW_ROOT ?>"> -->
<div class="messages view" >
	 <h2><?php echo __('Messages'); ?></h2>
	<table id="viewTable">
		<thead>
			<tr>
				<!-- <th><?php echo $this->Paginator->sort('conversation_id', 'ID') ?></th>
				<th><?php echo $this->Paginator->sort('from_id', 'Sender') ?></th>
				<th><?php echo $this->Paginator->sort('content', 'Message') ?></th>
				<th><?php echo $this->Paginator->sort('created') ?></th> -->
				<th>Conversation ID</th>
				<th>Sender</th>
				<th>Message</th>
				<th>Time</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="tableView">
			<?php foreach($messages as $message): ?>
			<tr>
				

				<td><?php echo $message['Message']['conversation_id']; ?></td>
				<td><?php echo $message['User_from']['email']; ?></td>
				<td><?php echo $message['Message']['content']; ?></td>
				<td><?php echo $message['Message']['created']; ?></td>
				<td><?php echo $this->html->link('View', array('action'=>'conversation', $message['Message']['conversation_id'])); ?> ||
					<?php echo $this->Form->postLink(__('Delete'), array('action'=>'delete', $message['Message']['conversation_id']), array('confirm' => __('Are you sure you want to delete # %s?', $message['Message']['conversation_id']))); ?>
				</td>
			</tr>
		</tbody>
		<?php endforeach; ?>
	</table>
	<p>
	<?php
	// echo $this->Paginator->counter(array(
	// 	// 'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
	// 	'format'=>'range'
	// ));
	?>	</p>
	<!-- <button class="btn btn-primary" id="more">Load More</button> -->
	<!-- <div class="paging">
	<?php
		echo $this->Paginator->numbers();
	?>
	</div> -->
</div>
<div class="actions">
	<h3><?php echo __('Messages'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('Home'), array('controller'=>'users', 'action'=>'index')); ?></li>
		<?php if($logged_in): ?>
		<li><?php echo $this->Html->link(__('Create New Message'), array('action'=>'add')); ?></li>
		<?php endif; ?>
		 <li><?php echo $this->Html->link(__('View Messages'), array('action' => 'view')); ?></li>
	</ul>
</div>

<script>
	$(function() {
  /* initial variables */
  var numRows = $('#viewTable').find('tr').length;
  var SHOWN = 10;
  var MORE = 10;

  /* get how many more can be shown */
  var getNumMore = function(ns) {
      var more = MORE;
      var leftOver = numRows - ns;
      if ((leftOver) < more) {
        more = leftOver;
      }
      return more;
    }
    /* how many are shown */
  var getInitialNumShown = function() {
      var shown = SHOWN;
      if (numRows < shown) {
        shown = numRows;
      }
      return shown;
    }
    /* set how many are initially shown */
  var numShown = getInitialNumShown();

  /* set the numMore if less than 20 */
  var numMore = getNumMore(numShown);

  /* set more html */
  if (numMore > 0) {
    var more_html = '<p><button class="btn btn-primary" id="more" style:"text-align:center;">Show <span style="font-weight: bold;">' + numMore + '</span> More...</button></p>';
    $('#viewTable').find('tr:gt(' + (numShown - 1) + ')').hide().end().after(more_html);
  } 

  $('#more').click(function() {
    /* determine how much more we should update */
    numMore = getNumMore(numShown);
    /* update num shown */
    numShown = numShown + numMore;
    $('#viewTable').find('tr:lt(' + numShown + ')').show();

    /* determine if to show more and how much left over */
    numMore = getNumMore(numShown);
    if (numMore > 0) {
      $('#more span').html(numMore);
    } else {
      $('#more').remove();
    }
  });

  

});
</script>

				
		