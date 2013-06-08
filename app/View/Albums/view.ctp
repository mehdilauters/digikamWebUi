<div class="albums view">
<?php $path = explode('/',$album['Album']['relativePath']);
$lastName = $path[ count($path) - 1 ];
?>
<h2><?php echo h($lastName); ?></h2>
	<dl>
		<dt><?php echo __('path'); ?></dt>
		<dd>
			<?php echo h($album['Album']['relativePath']); ?>
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
