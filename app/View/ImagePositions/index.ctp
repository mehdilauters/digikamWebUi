<div class="imagePositions index">
	<h2><?php echo __('Image Positions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('imageid'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('latitudeNumber'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitudeNumber'); ?></th>
			<th><?php echo $this->Paginator->sort('altitude'); ?></th>
			<th><?php echo $this->Paginator->sort('orientation'); ?></th>
			<th><?php echo $this->Paginator->sort('tilt'); ?></th>
			<th><?php echo $this->Paginator->sort('roll'); ?></th>
			<th><?php echo $this->Paginator->sort('accuracy'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($imagePositions as $imagePosition): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($imagePosition['Image']['name'], array('controller' => 'images', 'action' => 'view', $imagePosition['Image']['id'])); ?>
		</td>
		<td><?php echo h($imagePosition['ImagePosition']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['latitudeNumber']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['longitudeNumber']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['altitude']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['orientation']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['tilt']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['roll']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['accuracy']); ?>&nbsp;</td>
		<td><?php echo h($imagePosition['ImagePosition']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imagePosition['ImagePosition']['imageid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imagePosition['ImagePosition']['imageid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imagePosition['ImagePosition']['imageid']), null, __('Are you sure you want to delete # %s?', $imagePosition['ImagePosition']['imageid'])); ?>
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
		<li><?php echo $this->Html->link(__('New Image Position'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
