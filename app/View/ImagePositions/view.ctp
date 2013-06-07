<div class="imagePositions view">
<h2><?php  echo __('Image Position'); ?></h2>
	<dl>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imagePosition['Image']['name'], array('controller' => 'images', 'action' => 'view', $imagePosition['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LatitudeNumber'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['latitudeNumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LongitudeNumber'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['longitudeNumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Altitude'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['altitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orientation'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['orientation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tilt'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['tilt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Roll'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['roll']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accuracy'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['accuracy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($imagePosition['ImagePosition']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Position'), array('action' => 'edit', $imagePosition['ImagePosition']['imageid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Position'), array('action' => 'delete', $imagePosition['ImagePosition']['imageid']), null, __('Are you sure you want to delete # %s?', $imagePosition['ImagePosition']['imageid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Positions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Position'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
