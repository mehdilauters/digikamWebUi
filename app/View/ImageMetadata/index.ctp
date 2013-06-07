<div class="imageMetadata index">
	<h2><?php echo __('Image Metadata'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('imageid'); ?></th>
			<th><?php echo $this->Paginator->sort('make'); ?></th>
			<th><?php echo $this->Paginator->sort('model'); ?></th>
			<th><?php echo $this->Paginator->sort('lens'); ?></th>
			<th><?php echo $this->Paginator->sort('aperture'); ?></th>
			<th><?php echo $this->Paginator->sort('focalLength'); ?></th>
			<th><?php echo $this->Paginator->sort('focalLength35'); ?></th>
			<th><?php echo $this->Paginator->sort('exposureTime'); ?></th>
			<th><?php echo $this->Paginator->sort('exposureProgram'); ?></th>
			<th><?php echo $this->Paginator->sort('exposureMode'); ?></th>
			<th><?php echo $this->Paginator->sort('sensitivity'); ?></th>
			<th><?php echo $this->Paginator->sort('flash'); ?></th>
			<th><?php echo $this->Paginator->sort('whiteBalance'); ?></th>
			<th><?php echo $this->Paginator->sort('whiteBalanceColorTemperature'); ?></th>
			<th><?php echo $this->Paginator->sort('meteringMode'); ?></th>
			<th><?php echo $this->Paginator->sort('subjectDistance'); ?></th>
			<th><?php echo $this->Paginator->sort('subjectDistanceCategory'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imageMetadata as $imageMetadatum): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($imageMetadatum['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageMetadatum['Image']['id'])); ?>
		</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['make']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['model']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['lens']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['aperture']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['focalLength']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['focalLength35']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['exposureTime']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['exposureProgram']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['exposureMode']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['sensitivity']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['flash']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['whiteBalance']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['whiteBalanceColorTemperature']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['meteringMode']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['subjectDistance']); ?>&nbsp;</td>
		<td><?php echo h($imageMetadatum['ImageMetadatum']['subjectDistanceCategory']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imageMetadatum['ImageMetadatum']['imageid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imageMetadatum['ImageMetadatum']['imageid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imageMetadatum['ImageMetadatum']['imageid']), null, __('Are you sure you want to delete # %s?', $imageMetadatum['ImageMetadatum']['imageid'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Image Metadatum'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
