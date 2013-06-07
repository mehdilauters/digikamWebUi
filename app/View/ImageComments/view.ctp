<div class="imageComments view">
<h2><?php  echo __('Image Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($imageComment['ImageComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageComment['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageComment['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($imageComment['ImageComment']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo h($imageComment['ImageComment']['language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($imageComment['ImageComment']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($imageComment['ImageComment']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($imageComment['ImageComment']['comment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Comment'), array('action' => 'edit', $imageComment['ImageComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Comment'), array('action' => 'delete', $imageComment['ImageComment']['id']), null, __('Are you sure you want to delete # %s?', $imageComment['ImageComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
