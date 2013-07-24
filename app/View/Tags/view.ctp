<div class="tags view">
<h2><?php  echo __('Tag'); ?></h2>
  <dl>
    <dt><?php echo __('Name'); ?></dt>
    <dd>
      <?php echo h($tag['Tag']['name']); ?>
      &nbsp;
    </dd>
  </dl>
  <?php foreach($tag['ImageTag'] as $imageTag)
 {
   echo $this->element('Image/preview', array('image'=>$imageTag));
 }
 ?>
  </div>
</div>
