<div class="imageRelations form">
<?php echo $this->Form->create('ImageRelation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image Relation'); ?></legend>
	<?php
		echo $this->Form->input('subject');
		echo $this->Form->input('object');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageRelation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageRelation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Relations'), array('action' => 'index')); ?></li>
	</ul>
</div>
