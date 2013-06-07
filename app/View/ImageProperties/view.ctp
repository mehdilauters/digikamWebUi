<div class="imageProperties view">
<h2><?php  echo __('Image Property'); ?></h2>
	<dl>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageProperty['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageProperty['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property'); ?></dt>
		<dd>
			<?php echo h($imageProperty['ImageProperty']['property']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($imageProperty['ImageProperty']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Property'), array('action' => 'edit', $imageProperty['ImageProperty']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Property'), array('action' => 'delete', $imageProperty['ImageProperty']['id']), null, __('Are you sure you want to delete # %s?', $imageProperty['ImageProperty']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Properties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Property'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
