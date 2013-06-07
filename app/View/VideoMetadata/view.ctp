<div class="videoMetadata view">
<h2><?php  echo __('Video Metadatum'); ?></h2>
	<dl>
		<dt><?php echo __('Imageid'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['imageid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AspectRatio'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['aspectRatio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AudioBitRate'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['audioBitRate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AudioChannelType'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['audioChannelType']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AudioCompressor'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['audioCompressor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FrameRate'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['frameRate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ExposureProgram'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['exposureProgram']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('VideoCodec'); ?></dt>
		<dd>
			<?php echo h($videoMetadatum['VideoMetadatum']['videoCodec']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video Metadatum'), array('action' => 'edit', $videoMetadatum['VideoMetadatum']['imageid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video Metadatum'), array('action' => 'delete', $videoMetadatum['VideoMetadatum']['imageid']), null, __('Are you sure you want to delete # %s?', $videoMetadatum['VideoMetadatum']['imageid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Metadata'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Metadatum'), array('action' => 'add')); ?> </li>
	</ul>
</div>
