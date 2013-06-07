<div class="imageHaarMatrices view">
<h2><?php  echo __('Image Haar Matrix'); ?></h2>
	<dl>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageHaarMatrix['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageHaarMatrix['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ModificationDate'); ?></dt>
		<dd>
			<?php echo h($imageHaarMatrix['ImageHaarMatrix']['modificationDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('UniqueHash'); ?></dt>
		<dd>
			<?php echo h($imageHaarMatrix['ImageHaarMatrix']['uniqueHash']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matrix'); ?></dt>
		<dd>
			<?php echo h($imageHaarMatrix['ImageHaarMatrix']['matrix']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Haar Matrix'), array('action' => 'edit', $imageHaarMatrix['ImageHaarMatrix']['imageid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Haar Matrix'), array('action' => 'delete', $imageHaarMatrix['ImageHaarMatrix']['imageid']), null, __('Are you sure you want to delete # %s?', $imageHaarMatrix['ImageHaarMatrix']['imageid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Haar Matrices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Haar Matrix'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
