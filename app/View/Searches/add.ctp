<div class="searches form">
<?php echo $this->Form->create('Search'); ?>
	<fieldset>
		<legend><?php echo __('Add Search'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('name');
		echo $this->Form->input('query');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Searches'), array('action' => 'index')); ?></li>
	</ul>
</div>
