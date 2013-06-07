<div class="tagProperties index">
	<h2><?php echo __('Tag Properties'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('tagid'); ?></th>
			<th><?php echo $this->Paginator->sort('property'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tagProperties as $tagProperty): ?>
	<tr>
		<td><?php echo h($tagProperty['TagProperty']['tagid']); ?>&nbsp;</td>
		<td><?php echo h($tagProperty['TagProperty']['property']); ?>&nbsp;</td>
		<td><?php echo h($tagProperty['TagProperty']['value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tagProperty['TagProperty']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tagProperty['TagProperty']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tagProperty['TagProperty']['id']), null, __('Are you sure you want to delete # %s?', $tagProperty['TagProperty']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tag Property'), array('action' => 'add')); ?></li>
	</ul>
</div>
