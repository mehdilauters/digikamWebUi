<div class="imageMetadata form">
<?php echo $this->Form->create('ImageMetadatum'); ?>
	<fieldset>
		<legend><?php echo __('Add Image Metadatum'); ?></legend>
	<?php
		echo $this->Form->input('make');
		echo $this->Form->input('model');
		echo $this->Form->input('lens');
		echo $this->Form->input('aperture');
		echo $this->Form->input('focalLength');
		echo $this->Form->input('focalLength35');
		echo $this->Form->input('exposureTime');
		echo $this->Form->input('exposureProgram');
		echo $this->Form->input('exposureMode');
		echo $this->Form->input('sensitivity');
		echo $this->Form->input('flash');
		echo $this->Form->input('whiteBalance');
		echo $this->Form->input('whiteBalanceColorTemperature');
		echo $this->Form->input('meteringMode');
		echo $this->Form->input('subjectDistance');
		echo $this->Form->input('subjectDistanceCategory');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Image Metadata'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
