<div class="tags view">
<h2><?php  echo __('Tag'); ?></h2>
  <dl>
    <dt><?php echo __('Id'); ?></dt>
    <dd>
      <?php echo h($tag['Tag']['id']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Pid'); ?></dt>
    <dd>
      <?php echo h($tag['Tag']['pid']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Name'); ?></dt>
    <dd>
      <?php echo h($tag['Tag']['name']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Icon'); ?></dt>
    <dd>
      <?php echo h($tag['Tag']['icon']); ?>
      &nbsp;
    </dd>
    <dt><?php echo __('Iconkde'); ?></dt>
    <dd>
      <?php echo h($tag['Tag']['iconkde']); ?>
      &nbsp;
    </dd>
  </dl>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit Tag'), array('action' => 'edit', $tag['Tag']['id'])); ?> </li>
    <li><?php echo $this->Form->postLink(__('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?> </li>
    <li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Tag'), array('action' => 'add')); ?> </li>
  </ul>
  
  <div>
  <?php foreach($tag['ImageTag'] as $imageTag)
 {
   echo $this->element('Image/preview', array('image'=>$imageTag));
 }
 ?>
  </div>
</div>
