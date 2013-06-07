<div class="imageInformations index">
	<h2><?php echo __('Image Informations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('imageid'); ?></th>
			<th><?php echo $this->Paginator->sort('rating'); ?></th>
			<th><?php echo $this->Paginator->sort('creationDate'); ?></th>
			<th><?php echo $this->Paginator->sort('digitizationDate'); ?></th>
			<th><?php echo $this->Paginator->sort('orientation'); ?></th>
			<th><?php echo $this->Paginator->sort('width'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th><?php echo $this->Paginator->sort('format'); ?></th>
			<th><?php echo $this->Paginator->sort('colorDepth'); ?></th>
			<th><?php echo $this->Paginator->sort('colorModel'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imageInformations as $imageInformation): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($imageInformation['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageInformation['Image']['id'])); ?>
		</td>
		<td><?php echo h($imageInformation['ImageInformation']['rating']); ?>&nbsp;</td>
		<td><?php echo h($imageInformation['ImageInformation']['creationDate']); ?>&nbsp;</td>
		<td><?php echo h($imageInformation['ImageInformation']['digitizationDate']); ?>&nbsp;</td>
		<td><?php echo h($imageInformation['ImageInformation']['orientation']); ?>&nbsp;</td>
		<td><?php echo h($imageInformation['ImageInformation']['width']); ?>&nbsp;</td>
		<td><?php echo h($imageInformation['ImageInformation']['height']); ?>&nbsp;</td>
		<td><?php echo h($imageInformation['ImageInformation']['format']); ?>&nbsp;</td>
		<td><?php echo h($imageInformation['ImageInformation']['colorDepth']); ?>&nbsp;</td>
		<td><?php echo h($imageInformation['ImageInformation']['colorModel']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imageInformation['ImageInformation']['imageid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imageInformation['ImageInformation']['imageid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imageInformation['ImageInformation']['imageid']), null, __('Are you sure you want to delete # %s?', $imageInformation['ImageInformation']['imageid'])); ?>
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
		<li><?php echo $this->Html->link(__('New Image Information'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
