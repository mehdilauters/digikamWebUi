<div class="imageTags form">
<?php echo $this->Form->create('ImageTag'); ?>
	<fieldset>
		<legend><?php echo __('Add Image Tag'); ?></legend>
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

		<li><?php echo $this->Html->link(__('List Image Tags'), array('action' => 'index')); ?></li>
	</ul>
</div>
