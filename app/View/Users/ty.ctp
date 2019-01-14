<h1><?php 
echo "Thank you for Registering, ";
echo $this->Session->read('name');
echo "<br>";
 echo $this->Html->link(__('Home'), array('action' => 'index'));
?></h1>