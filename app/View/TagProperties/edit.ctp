<div class="tagProperties form">
<?php echo $this->Form->create('TagProperty'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tag Property'); ?></legend>
	<?php
		echo $this->Form->input('tagid');
		echo $this->Form->input('property');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TagProperty.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TagProperty.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tag Properties'), array('action' => 'index')); ?></li>
	</ul>
</div>
