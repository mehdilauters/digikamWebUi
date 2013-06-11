<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users Available Albums'), array('controller' => 'users_available_albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Available Album'), array('controller' => 'users_available_albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Available Tags'), array('controller' => 'users_available_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Available Tag'), array('controller' => 'users_available_tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Forbidden Albums'), array('controller' => 'users_forbidden_albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Forbidden Album'), array('controller' => 'users_forbidden_albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Forbidden Tags'), array('controller' => 'users_forbidden_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Forbidden Tag'), array('controller' => 'users_forbidden_tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
