<div class="imageHaarMatrices index">
	<h2><?php echo __('Image Haar Matrices'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('imageid'); ?></th>
			<th><?php echo $this->Paginator->sort('modificationDate'); ?></th>
			<th><?php echo $this->Paginator->sort('uniqueHash'); ?></th>
			<th><?php echo $this->Paginator->sort('matrix'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imageHaarMatrices as $imageHaarMatrix): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($imageHaarMatrix['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageHaarMatrix['Image']['id'])); ?>
		</td>
		<td><?php echo h($imageHaarMatrix['ImageHaarMatrix']['modificationDate']); ?>&nbsp;</td>
		<td><?php echo h($imageHaarMatrix['ImageHaarMatrix']['uniqueHash']); ?>&nbsp;</td>
		<td><?php echo h($imageHaarMatrix['ImageHaarMatrix']['matrix']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imageHaarMatrix['ImageHaarMatrix']['imageid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imageHaarMatrix['ImageHaarMatrix']['imageid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imageHaarMatrix['ImageHaarMatrix']['imageid']), null, __('Are you sure you want to delete # %s?', $imageHaarMatrix['ImageHaarMatrix']['imageid'])); ?>
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
		<li><?php echo $this->Html->link(__('New Image Haar Matrix'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
