<div class="imageCopyrights view">
<h2><?php  echo __('Image Copyright'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($imageCopyright['ImageCopyright']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageCopyright['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageCopyright['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property'); ?></dt>
		<dd>
			<?php echo h($imageCopyright['ImageCopyright']['property']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($imageCopyright['ImageCopyright']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ExtraValue'); ?></dt>
		<dd>
			<?php echo h($imageCopyright['ImageCopyright']['extraValue']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Copyright'), array('action' => 'edit', $imageCopyright['ImageCopyright']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Copyright'), array('action' => 'delete', $imageCopyright['ImageCopyright']['id']), null, __('Are you sure you want to delete # %s?', $imageCopyright['ImageCopyright']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Copyrights'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Copyright'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
