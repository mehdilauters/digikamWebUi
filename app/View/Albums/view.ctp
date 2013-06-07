<div class="albums view">
<h2><?php echo h($album['Album']['relativePath']); ?></h2>
	<dl>
		<dt><?php echo __('Album Root'); ?></dt>
		<dd>
			<?php echo $this->Html->link($album['AlbumRoot']['id'], array('controller' => 'album_roots', 'action' => 'view', $album['AlbumRoot']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($album['Album']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caption'); ?></dt>
		<dd>
			<?php echo h($album['Album']['caption']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Collection'); ?></dt>
		<dd>
			<?php echo h($album['Album']['collection']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon'); ?></dt>
		<dd>
			<?php echo h($album['Album']['icon']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Albums'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Album Roots'), array('controller' => 'album_roots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Images'); ?></h3>
	<?php if (!empty($album['Image'])): ?>
	<ul class="thumbnails">
	<?php foreach ($album['Image'] as $image): ?>
		<li class="span4"><?php echo $this->element('Image/preview',array('image'=>$image))?></li>
		
	<?php endforeach; ?>
    </ul>

<?php endif; ?>
</div>
