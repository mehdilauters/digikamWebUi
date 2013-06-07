<div class="downloadHistories index">
	<h2><?php echo __('Download Histories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('identifier'); ?></th>
			<th><?php echo $this->Paginator->sort('filename'); ?></th>
			<th><?php echo $this->Paginator->sort('filesize'); ?></th>
			<th><?php echo $this->Paginator->sort('filedate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($downloadHistories as $downloadHistory): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($downloadHistory['Image']['name'], array('controller' => 'images', 'action' => 'view', $downloadHistory['Image']['id'])); ?>
		</td>
		<td><?php echo h($downloadHistory['DownloadHistory']['identifier']); ?>&nbsp;</td>
		<td><?php echo h($downloadHistory['DownloadHistory']['filename']); ?>&nbsp;</td>
		<td><?php echo h($downloadHistory['DownloadHistory']['filesize']); ?>&nbsp;</td>
		<td><?php echo h($downloadHistory['DownloadHistory']['filedate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $downloadHistory['DownloadHistory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $downloadHistory['DownloadHistory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $downloadHistory['DownloadHistory']['id']), null, __('Are you sure you want to delete # %s?', $downloadHistory['DownloadHistory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Download History'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
