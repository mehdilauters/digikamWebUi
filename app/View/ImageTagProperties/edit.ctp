<div class="imageTagProperties form">
<?php echo $this->Form->create('ImageTagProperty'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image Tag Property'); ?></legend>
	<?php
		echo $this->Form->input('imageid');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageTagProperty.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageTagProperty.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Tag Properties'), array('action' => 'index')); ?></li>
	</ul>
</div>
