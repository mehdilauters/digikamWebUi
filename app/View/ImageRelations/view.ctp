<div class="imageRelations view">
<h2><?php  echo __('Image Relation'); ?></h2>
	<dl>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($imageRelation['ImageRelation']['subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Object'); ?></dt>
		<dd>
			<?php echo h($imageRelation['ImageRelation']['object']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($imageRelation['ImageRelation']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Relation'), array('action' => 'edit', $imageRelation['ImageRelation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Relation'), array('action' => 'delete', $imageRelation['ImageRelation']['id']), null, __('Are you sure you want to delete # %s?', $imageRelation['ImageRelation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Relations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Relation'), array('action' => 'add')); ?> </li>
	</ul>
</div>
