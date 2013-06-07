<div class="imageTags form">
<?php echo $this->Form->create('ImageTag'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image Tag'); ?></legend>
	<?php
		echo $this->Form->input('imageid');
		echo $this->Form->input('tagid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageTag.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageTag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Tags'), array('action' => 'index')); ?></li>
	</ul>
</div>
