<div class="imageComments form">
<?php echo $this->Form->create('ImageComment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageComment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageComment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Comments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
