<div class="imageTagProperties view">
<h2><?php  echo __('Image Tag Property'); ?></h2>
	<dl>
		<dt><?php echo __('Imageid'); ?></dt>
		<dd>
			<?php echo h($imageTagProperty['ImageTagProperty']['imageid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tagid'); ?></dt>
		<dd>
			<?php echo h($imageTagProperty['ImageTagProperty']['tagid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Property'); ?></dt>
		<dd>
			<?php echo h($imageTagProperty['ImageTagProperty']['property']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($imageTagProperty['ImageTagProperty']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Tag Property'), array('action' => 'edit', $imageTagProperty['ImageTagProperty']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Tag Property'), array('action' => 'delete', $imageTagProperty['ImageTagProperty']['id']), null, __('Are you sure you want to delete # %s?', $imageTagProperty['ImageTagProperty']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Tag Properties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Tag Property'), array('action' => 'add')); ?> </li>
	</ul>
</div>
