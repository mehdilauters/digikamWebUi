<div class="imageHistories view">
<h2><?php  echo __('Image History'); ?></h2>
	<dl>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageHistory['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageHistory['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uuid'); ?></dt>
		<dd>
			<?php echo h($imageHistory['ImageHistory']['uuid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('History'); ?></dt>
		<dd>
			<?php echo h($imageHistory['ImageHistory']['history']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image History'), array('action' => 'edit', $imageHistory['ImageHistory']['imageid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image History'), array('action' => 'delete', $imageHistory['ImageHistory']['imageid']), null, __('Are you sure you want to delete # %s?', $imageHistory['ImageHistory']['imageid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
