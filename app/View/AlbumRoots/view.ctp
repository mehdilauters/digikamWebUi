<div class="albumRoots view">
<h2><?php  echo __('Album Root'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($albumRoot['AlbumRoot']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($albumRoot['AlbumRoot']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($albumRoot['AlbumRoot']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($albumRoot['AlbumRoot']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identifier'); ?></dt>
		<dd>
			<?php echo h($albumRoot['AlbumRoot']['identifier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SpecificPath'); ?></dt>
		<dd>
			<?php echo h($albumRoot['AlbumRoot']['specificPath']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Album Root'), array('action' => 'edit', $albumRoot['AlbumRoot']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Album Root'), array('action' => 'delete', $albumRoot['AlbumRoot']['id']), null, __('Are you sure you want to delete # %s?', $albumRoot['AlbumRoot']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Album Roots'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album Root'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Albums'); ?></h3>
	<?php if (!empty($albumRoot['Album'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('AlbumRoot'); ?></th>
		<th><?php echo __('RelativePath'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Caption'); ?></th>
		<th><?php echo __('Collection'); ?></th>
		<th><?php echo __('Icon'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($albumRoot['Album'] as $album): ?>
		<tr>
			<td><?php echo $album['id']; ?></td>
			<td><?php echo $album['albumRoot']; ?></td>
			<td><?php echo $album['relativePath']; ?></td>
			<td><?php echo $album['date']; ?></td>
			<td><?php echo $album['caption']; ?></td>
			<td><?php echo $album['collection']; ?></td>
			<td><?php echo $album['icon']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'albums', 'action' => 'view', $album['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'albums', 'action' => 'edit', $album['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'albums', 'action' => 'delete', $album['id']), null, __('Are you sure you want to delete # %s?', $album['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
