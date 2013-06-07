<div class="imageProperties index">
	<h2><?php echo __('Image Properties'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('imageid'); ?></th>
			<th><?php echo $this->Paginator->sort('property'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imageProperties as $imageProperty): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($imageProperty['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageProperty['Image']['id'])); ?>
		</td>
		<td><?php echo h($imageProperty['ImageProperty']['property']); ?>&nbsp;</td>
		<td><?php echo h($imageProperty['ImageProperty']['value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imageProperty['ImageProperty']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imageProperty['ImageProperty']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imageProperty['ImageProperty']['id']), null, __('Are you sure you want to delete # %s?', $imageProperty['ImageProperty']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Image Property'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
