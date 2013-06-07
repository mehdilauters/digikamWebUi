<div class="imageProperties form">
<?php echo $this->Form->create('ImageProperty'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image Property'); ?></legend>
	<?php
		echo $this->Form->input('imageid');
		echo $this->Form->input('property');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageProperty.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageProperty.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Properties'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
