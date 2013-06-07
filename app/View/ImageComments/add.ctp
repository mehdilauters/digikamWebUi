<div class="imageComments form">
<?php echo $this->Form->create('ImageComment'); ?>
	<fieldset>
		<legend><?php echo __('Add Image Comment'); ?></legend>
	<?php
		echo $this->Form->input('imageid');
		echo $this->Form->input('type');
		echo $this->Form->input('language');
		echo $this->Form->input('author');
		echo $this->Form->input('date');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Image Comments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
