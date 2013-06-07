<div class="albumRoots index">
	<h2><?php echo __('Album Roots'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('label'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('identifier'); ?></th>
			<th><?php echo $this->Paginator->sort('specificPath'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($albumRoots as $albumRoot): ?>
	<tr>
		<td><?php echo h($albumRoot['AlbumRoot']['id']); ?>&nbsp;</td>
		<td><?php echo h($albumRoot['AlbumRoot']['label']); ?>&nbsp;</td>
		<td><?php echo h($albumRoot['AlbumRoot']['status']); ?>&nbsp;</td>
		<td><?php echo h($albumRoot['AlbumRoot']['type']); ?>&nbsp;</td>
		<td><?php echo h($albumRoot['AlbumRoot']['identifier']); ?>&nbsp;</td>
		<td><?php echo h($albumRoot['AlbumRoot']['specificPath']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $albumRoot['AlbumRoot']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $albumRoot['AlbumRoot']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $albumRoot['AlbumRoot']['id']), null, __('Are you sure you want to delete # %s?', $albumRoot['AlbumRoot']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Album Root'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>
