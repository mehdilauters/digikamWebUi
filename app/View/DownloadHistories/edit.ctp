<div class="downloadHistories form">
<?php echo $this->Form->create('DownloadHistory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Download History'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('identifier');
		echo $this->Form->input('filename');
		echo $this->Form->input('filesize');
		echo $this->Form->input('filedate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DownloadHistory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DownloadHistory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Download Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
