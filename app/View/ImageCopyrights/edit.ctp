<div class="imageCopyrights form">
<?php echo $this->Form->create('ImageCopyright'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image Copyright'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('imageid');
		echo $this->Form->input('property');
		echo $this->Form->input('value');
		echo $this->Form->input('extraValue');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageCopyright.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageCopyright.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Copyrights'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
