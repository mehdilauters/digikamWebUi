<div class="imageInformations view">
<h2><?php  echo __('Image Information'); ?></h2>
	<dl>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageInformation['Image']['name'], array('controller' => 'images', 'action' => 'view', $imageInformation['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CreationDate'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['creationDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DigitizationDate'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['digitizationDate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orientation'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['orientation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Width'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['width']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Format'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['format']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ColorDepth'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['colorDepth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ColorModel'); ?></dt>
		<dd>
			<?php echo h($imageInformation['ImageInformation']['colorModel']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Information'), array('action' => 'edit', $imageInformation['ImageInformation']['imageid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Information'), array('action' => 'delete', $imageInformation['ImageInformation']['imageid']), null, __('Are you sure you want to delete # %s?', $imageInformation['ImageInformation']['imageid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Informations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Information'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
