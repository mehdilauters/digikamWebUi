<div class="downloadHistories view">
<h2><?php  echo __('Download History'); ?></h2>
	<dl>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($downloadHistory['Image']['name'], array('controller' => 'images', 'action' => 'view', $downloadHistory['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identifier'); ?></dt>
		<dd>
			<?php echo h($downloadHistory['DownloadHistory']['identifier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($downloadHistory['DownloadHistory']['filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filesize'); ?></dt>
		<dd>
			<?php echo h($downloadHistory['DownloadHistory']['filesize']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filedate'); ?></dt>
		<dd>
			<?php echo h($downloadHistory['DownloadHistory']['filedate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Download History'), array('action' => 'edit', $downloadHistory['DownloadHistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Download History'), array('action' => 'delete', $downloadHistory['DownloadHistory']['id']), null, __('Are you sure you want to delete # %s?', $downloadHistory['DownloadHistory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Download Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Download History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
