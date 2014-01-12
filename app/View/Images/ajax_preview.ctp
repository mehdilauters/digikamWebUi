<div class="images view">
<h2><?php echo h($image['Image']['name']); ?></h2>
<div>
from album <?php echo $this->Html->link($image['Album']['relativePath'], array('controller' => 'albums', 'action' => 'view', $image['Album']['id'])); ?>
<div><?php echo $this->element('Image/preview',array('image'=>$image, 'size' => 'max' ))?></div>

   <div><?php echo h(round($image['Image']['fileSize']/1000000*2)/2); ?> Mo</div>
</div>


  
</div>
