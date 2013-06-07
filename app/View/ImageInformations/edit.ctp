<div class="imageInformations form">
<?php echo $this->Form->create('ImageInformation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image Information'); ?></legend>
	<?php
		echo $this->Form->input('imageid');
		echo $this->Form->input('rating');
		echo $this->Form->input('creationDate');
		echo $this->Form->input('digitizationDate');
		echo $this->Form->input('orientation');
		echo $this->Form->input('width');
		echo $this->Form->input('height');
		echo $this->Form->input('format');
		echo $this->Form->input('colorDepth');
		echo $this->Form->input('colorModel');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageInformation.imageid')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageInformation.imageid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Informations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
