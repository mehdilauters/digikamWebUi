<div class="tagProperties view">
<h2><?php  echo __('Tag Property'); ?></h2>
	<dl>
		<dt><?php echo __('Tagid'); ?></dt>
		<dd>
			<?php echo h($tagProperty['TagProperty']['tagid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property'); ?></dt>
		<dd>
			<?php echo h($tagProperty['TagProperty']['property']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($tagProperty['TagProperty']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tag Property'), array('action' => 'edit', $tagProperty['TagProperty']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tag Property'), array('action' => 'delete', $tagProperty['TagProperty']['id']), null, __('Are you sure you want to delete # %s?', $tagProperty['TagProperty']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tag Properties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag Property'), array('action' => 'add')); ?> </li>
	</ul>
</div>
