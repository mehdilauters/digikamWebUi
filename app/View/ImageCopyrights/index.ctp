<div class="imageCopyrights index">
	<h2><?php echo __('Image Copyrights'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('imageid'); ?></th>
			<th><?php echo $this->Paginator->sort('property'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('extraValue'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imageCopyrights as $imageCopyright): ?>
	<tr>
		<td><?php echo h($imageCopyright['ImageCopyright']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($imageCopyright['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageCopyright['Image']['id'])); ?>
		</td>
		<td><?php echo h($imageCopyright['ImageCopyright']['property']); ?>&nbsp;</td>
		<td><?php echo h($imageCopyright['ImageCopyright']['value']); ?>&nbsp;</td>
		<td><?php echo h($imageCopyright['ImageCopyright']['extraValue']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imageCopyright['ImageCopyright']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imageCopyright['ImageCopyright']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imageCopyright['ImageCopyright']['id']), null, __('Are you sure you want to delete # %s?', $imageCopyright['ImageCopyright']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Image Copyright'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
