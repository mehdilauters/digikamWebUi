<div class="videoMetadata form">
<?php echo $this->Form->create('VideoMetadatum'); ?>
	<fieldset>
		<legend><?php echo __('Edit Video Metadatum'); ?></legend>
	<?php
		echo $this->Form->input('imageid');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('VideoMetadatum.imageid')), null, __('Are you sure you want to delete # %s?', $this->Form->value('VideoMetadatum.imageid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Video Metadata'), array('action' => 'index')); ?></li>
	</ul>
</div>
