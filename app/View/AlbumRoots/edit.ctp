<div class="albumRoots form">
<?php echo $this->Form->create('AlbumRoot'); ?>
	<fieldset>
		<legend><?php echo __('Edit Album Root'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('label');
		echo $this->Form->input('status');
		echo $this->Form->input('type');
		echo $this->Form->input('identifier');
		echo $this->Form->input('specificPath');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AlbumRoot.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AlbumRoot.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Album Roots'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>
