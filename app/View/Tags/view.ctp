<div class="tags view">
<h2><?php  echo __('Tag'); ?></h2>
<ul>
	<li> View as a <?php echo $this->MyHtml->link('slideshow', '/tags/slideshow/'.$tag['Tag']['id']); ?> </li>
	<li> View as a <?php echo $this->MyHtml->link('map', '/tags/map/'.$tag['Tag']['id']); ?> </li>
</ul>
  <dl>
    <dt><?php echo __('Name'); ?></dt>
    <dd>
      <?php echo h($tag['Tag']['name']); ?>
      &nbsp;
    </dd>
  </dl>
   <div>number of pictures <?php echo count($tag['ImageTag']) ?></div>
  <?php foreach($tag['ImageTag'] as $imageTag)
 {
   echo $this->element('Image/preview', array('image'=>$imageTag));
 }
 ?>
  </div>
</div>
