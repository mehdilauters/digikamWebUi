<div class="imagePositions form">
<?php echo $this->Form->create('ImagePosition'); ?>
	<fieldset>
		<legend><?php echo __('Add Image Position'); ?></legend>
	<?php
		echo $this->Form->input('latitude');
		echo $this->Form->input('latitudeNumber');
		echo $this->Form->input('longitude');
		echo $this->Form->input('longitudeNumber');
		echo $this->Form->input('altitude');
		echo $this->Form->input('orientation');
		echo $this->Form->input('tilt');
		echo $this->Form->input('roll');
		echo $this->Form->input('accuracy');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Image Positions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
