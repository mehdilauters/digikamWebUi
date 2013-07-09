<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Users Available Albums'); ?></h3>
	<?php if (!empty($user['UsersAvailableAlbum'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Album Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UsersAvailableAlbum'] as $usersAvailableAlbum): ?>
		<tr>
			<td><?php echo $usersAvailableAlbum['id']; ?></td>
			<td><?php echo $usersAvailableAlbum['user_id']; ?></td>
			<td><?php echo $usersAvailableAlbum['album_id']; ?></td>
			<td><?php echo $usersAvailableAlbum['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_available_albums', 'action' => 'view', $usersAvailableAlbum['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_available_albums', 'action' => 'edit', $usersAvailableAlbum['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_available_albums', 'action' => 'delete', $usersAvailableAlbum['id']), null, __('Are you sure you want to delete # %s?', $usersAvailableAlbum['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Users Available Album'), array('controller' => 'users_available_albums', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users Available Tags'); ?></h3>
	<?php if (!empty($user['UsersAvailableTag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tag Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UsersAvailableTag'] as $usersAvailableTag): ?>
		<tr>
			<td><?php echo $usersAvailableTag['id']; ?></td>
			<td><?php echo $usersAvailableTag['user_id']; ?></td>
			<td><?php echo $usersAvailableTag['tag_id']; ?></td>
			<td><?php echo $usersAvailableTag['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_available_tags', 'action' => 'view', $usersAvailableTag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_available_tags', 'action' => 'edit', $usersAvailableTag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_available_tags', 'action' => 'delete', $usersAvailableTag['id']), null, __('Are you sure you want to delete # %s?', $usersAvailableTag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Users Available Tag'), array('controller' => 'users_available_tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users Forbidden Albums'); ?></h3>
	<?php if (!empty($user['UsersForbiddenAlbum'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Album Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UsersForbiddenAlbum'] as $usersForbiddenAlbum): ?>
		<tr>
			<td><?php echo $usersForbiddenAlbum['id']; ?></td>
			<td><?php echo $usersForbiddenAlbum['user_id']; ?></td>
			<td><?php echo $usersForbiddenAlbum['album_id']; ?></td>
			<td><?php echo $usersForbiddenAlbum['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_forbidden_albums', 'action' => 'view', $usersForbiddenAlbum['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_forbidden_albums', 'action' => 'edit', $usersForbiddenAlbum['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_forbidden_albums', 'action' => 'delete', $usersForbiddenAlbum['id']), null, __('Are you sure you want to delete # %s?', $usersForbiddenAlbum['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Users Forbidden Album'), array('controller' => 'users_forbidden_albums', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users Forbidden Tags'); ?></h3>
	<?php if (!empty($user['UsersForbiddenTag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tag Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UsersForbiddenTag'] as $usersForbiddenTag): ?>
		<tr>
			<td><?php echo $usersForbiddenTag['id']; ?></td>
			<td><?php echo $usersForbiddenTag['user_id']; ?></td>
			<td><?php echo $usersForbiddenTag['tag_id']; ?></td>
			<td><?php echo $usersForbiddenTag['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_forbidden_tags', 'action' => 'view', $usersForbiddenTag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_forbidden_tags', 'action' => 'edit', $usersForbiddenTag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_forbidden_tags', 'action' => 'delete', $usersForbiddenTag['id']), null, __('Are you sure you want to delete # %s?', $usersForbiddenTag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Users Forbidden Tag'), array('controller' => 'users_forbidden_tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
