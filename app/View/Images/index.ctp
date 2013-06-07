<div class="images index">
	<h2><?php echo __('Images'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th>Preview</th>
			<th><?php echo $this->Paginator->sort('album'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
			<th><?php echo $this->Paginator->sort('modificationDate'); ?></th>
			<th><?php echo $this->Paginator->sort('fileSize'); ?></th>
			<th><?php echo $this->Paginator->sort('uniqueHash'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($images as $image): ?>
	<tr>
		<td><?php echo h($image['Image']['id']); ?>&nbsp;</td>
		<td><?php echo $this->element('Image/preview',array('image'=>$image))?></td>
		<td>
			<?php echo $this->Html->link($image['Album']['id'], array('controller' => 'albums', 'action' => 'view', $image['Album']['id'])); ?>
		</td>
		<td><a href="<?php echo $this->webroot.'images/download/'.$image['Image']['id']; ?>" ><?php echo h($image['Image']['name']); ?><a/>&nbsp;</td>
		<td><?php echo h($image['Image']['status']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['category']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['modificationDate']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['fileSize']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['uniqueHash']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $image['Image']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $image['Image']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Haar Matrices'), array('controller' => 'image_haar_matrices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Haar Matrix'), array('controller' => 'image_haar_matrices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Positions'), array('controller' => 'image_positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Position'), array('controller' => 'image_positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Comments'), array('controller' => 'image_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Comment'), array('controller' => 'image_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Copyrights'), array('controller' => 'image_copyrights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Copyright'), array('controller' => 'image_copyrights', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Informations'), array('controller' => 'image_informations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Information'), array('controller' => 'image_informations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Properties'), array('controller' => 'image_properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Property'), array('controller' => 'image_properties', 'action' => 'add')); ?> </li>
	</ul>
</div>
