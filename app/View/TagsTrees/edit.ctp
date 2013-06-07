<div class="tagsTrees form">
<?php echo $this->Form->create('TagsTree'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tags Tree'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TagsTree.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TagsTree.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tags Trees'), array('action' => 'index')); ?></li>
	</ul>
</div>
