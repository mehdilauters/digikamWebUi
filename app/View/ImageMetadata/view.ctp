<div class="imageMetadata view">
<h2><?php  echo __('Image Metadatum'); ?></h2>
	<dl>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageMetadatum['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageMetadatum['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Make'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['make']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lens'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['lens']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aperture'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['aperture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FocalLength'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['focalLength']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FocalLength35'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['focalLength35']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ExposureTime'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['exposureTime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ExposureProgram'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['exposureProgram']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ExposureMode'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['exposureMode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sensitivity'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['sensitivity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flash'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['flash']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('WhiteBalance'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['whiteBalance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('WhiteBalanceColorTemperature'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['whiteBalanceColorTemperature']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MeteringMode'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['meteringMode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SubjectDistance'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['subjectDistance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SubjectDistanceCategory'); ?></dt>
		<dd>
			<?php echo h($imageMetadatum['ImageMetadatum']['subjectDistanceCategory']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Metadatum'), array('action' => 'edit', $imageMetadatum['ImageMetadatum']['imageid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Metadatum'), array('action' => 'delete', $imageMetadatum['ImageMetadatum']['imageid']), null, __('Are you sure you want to delete # %s?', $imageMetadatum['ImageMetadatum']['imageid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Metadata'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Metadatum'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
