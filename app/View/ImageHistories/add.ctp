<div class="imageHistories form">
<?php echo $this->Form->create('ImageHistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Image History'); ?></legend>
	<?php
		echo $this->Form->input('uuid');
		echo $this->Form->input('history');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Image Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
