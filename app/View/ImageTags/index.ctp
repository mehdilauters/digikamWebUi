<div class="imageTags index">
	<h2><?php echo __('Image Tags'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('imageid'); ?></th>
			<th><?php echo $this->Paginator->sort('tagid'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imageTags as $imageTag): ?>
	<tr>
		<td><?php echo h($imageTag['ImageTag']['imageid']); ?>&nbsp;</td>
		<td><?php echo h($imageTag['ImageTag']['tagid']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imageTag['ImageTag']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imageTag['ImageTag']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imageTag['ImageTag']['id']), null, __('Are you sure you want to delete # %s?', $imageTag['ImageTag']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Image Tag'), array('action' => 'add')); ?></li>
	</ul>
</div>
