<div class="imageHaarMatrices form">
<?php echo $this->Form->create('ImageHaarMatrix'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image Haar Matrix'); ?></legend>
	<?php
		echo $this->Form->input('imageid');
		echo $this->Form->input('modificationDate');
		echo $this->Form->input('uniqueHash');
		echo $this->Form->input('matrix');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageHaarMatrix.imageid')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageHaarMatrix.imageid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Haar Matrices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
