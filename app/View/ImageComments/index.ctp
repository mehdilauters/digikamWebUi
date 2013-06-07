<div class="imageComments index">
	<h2><?php echo __('Image Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('imageid'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('language'); ?></th>
			<th><?php echo $this->Paginator->sort('author'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imageComments as $imageComment): ?>
	<tr>
		<td><?php echo h($imageComment['ImageComment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($imageComment['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageComment['Image']['id'])); ?>
		</td>
		<td><?php echo h($imageComment['ImageComment']['type']); ?>&nbsp;</td>
		<td><?php echo h($imageComment['ImageComment']['language']); ?>&nbsp;</td>
		<td><?php echo h($imageComment['ImageComment']['author']); ?>&nbsp;</td>
		<td><?php echo h($imageComment['ImageComment']['date']); ?>&nbsp;</td>
		<td><?php echo h($imageComment['ImageComment']['comment']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imageComment['ImageComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imageComment['ImageComment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imageComment['ImageComment']['id']), null, __('Are you sure you want to delete # %s?', $imageComment['ImageComment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Image Comment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
