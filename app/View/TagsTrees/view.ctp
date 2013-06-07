<div class="tagsTrees view">
<h2><?php  echo __('Tags Tree'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tagsTree['TagsTree']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pid'); ?></dt>
		<dd>
			<?php echo h($tagsTree['TagsTree']['pid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tags Tree'), array('action' => 'edit', $tagsTree['TagsTree']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tags Tree'), array('action' => 'delete', $tagsTree['TagsTree']['id']), null, __('Are you sure you want to delete # %s?', $tagsTree['TagsTree']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags Trees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tags Tree'), array('action' => 'add')); ?> </li>
	</ul>
</div>
