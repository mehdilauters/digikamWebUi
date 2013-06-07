<div class="imageHaarMatrices form">
<?php echo $this->Form->create('ImageHaarMatrix'); ?>
	<fieldset>
		<legend><?php echo __('Add Image Haar Matrix'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Image Haar Matrices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
