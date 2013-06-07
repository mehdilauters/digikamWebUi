<div class="videoMetadata form">
<?php echo $this->Form->create('VideoMetadatum'); ?>
	<fieldset>
		<legend><?php echo __('Add Video Metadatum'); ?></legend>
	<?php
		echo $this->Form->input('aspectRatio');
		echo $this->Form->input('audioBitRate');
		echo $this->Form->input('audioChannelType');
		echo $this->Form->input('audioCompressor');
		echo $this->Form->input('duration');
		echo $this->Form->input('frameRate');
		echo $this->Form->input('exposureProgram');
		echo $this->Form->input('videoCodec');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Video Metadata'), array('action' => 'index')); ?></li>
	</ul>
</div>
