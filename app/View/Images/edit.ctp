<div class="images form">
<?php echo $this->Form->create('Image'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('album');
		echo $this->Form->input('name');
		echo $this->Form->input('status');
		echo $this->Form->input('category');
		echo $this->Form->input('modificationDate');
		echo $this->Form->input('fileSize');
		echo $this->Form->input('uniqueHash');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Image.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Image.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Haar Matrices'), array('controller' => 'image_haar_matrices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Haar Matrix'), array('controller' => 'image_haar_matrices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Positions'), array('controller' => 'image_positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Position'), array('controller' => 'image_positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Comments'), array('controller' => 'image_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Comment'), array('controller' => 'image_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Copyrights'), array('controller' => 'image_copyrights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Copyright'), array('controller' => 'image_copyrights', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Informations'), array('controller' => 'image_informations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Information'), array('controller' => 'image_informations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Properties'), array('controller' => 'image_properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Property'), array('controller' => 'image_properties', 'action' => 'add')); ?> </li>
	</ul>
</div>
