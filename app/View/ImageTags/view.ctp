<div class="imageTags view">
<h2><?php  echo __('Image Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Imageid'); ?></dt>
		<dd>
			<?php echo h($imageTag['ImageTag']['imageid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tagid'); ?></dt>
		<dd>
			<?php echo h($imageTag['ImageTag']['tagid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Tag'), array('action' => 'edit', $imageTag['ImageTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Tag'), array('action' => 'delete', $imageTag['ImageTag']['id']), null, __('Are you sure you want to delete # %s?', $imageTag['ImageTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Tag'), array('action' => 'add')); ?> </li>
	</ul>
</div>
