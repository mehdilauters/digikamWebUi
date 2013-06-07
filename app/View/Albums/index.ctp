<div class="albums index">
	<h2><?php echo __('Albums'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('albumRoot'); ?></th>
			<th><?php echo $this->Paginator->sort('relativePath'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('caption'); ?></th>
			<th><?php echo $this->Paginator->sort('collection'); ?></th>
			<th><?php echo $this->Paginator->sort('icon'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($albums as $album): ?>
	<tr>
		<td><?php echo h($album['Album']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($album['AlbumRoot']['id'], array('controller' => 'album_roots', 'action' => 'view', $album['AlbumRoot']['id'])); ?>
		</td>
		<td><?php echo h($album['Album']['relativePath']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['date']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['caption']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['collection']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['icon']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $album['Album']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $album['Album']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $album['Album']['id']), null, __('Are you sure you want to delete # %s?', $album['Album']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Album'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Album Roots'), array('controller' => 'album_roots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album Root'), array('controller' => 'album_roots', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
