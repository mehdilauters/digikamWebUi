<?php echo $this->Form->create('Email'); ?>
	<h2>Test d'envoie d'email</h2>
	<?php
	echo $this->Form->input('email', array('label'=>'<b>Envoyer à :</b>', 'type'=>'text'));
			
	?>
<?php echo $this->Form->end(__('Submit')); ?>