<div class="images view">
<h2><?php echo h($image['Image']['name']); ?></h2>
<div>
from album <?php echo $this->Html->link($image['Album']['relativePath'], array('controller' => 'albums', 'action' => 'view', $image['Album']['id'])); ?>
<div><?php echo $this->element('Image/preview',array('image'=>$image))?></div>

   <div><?php echo h(round($image['Image']['fileSize']/1000000*2)/2); ?> Mo</div>
   <img src="http://maps.google.com/maps/api/staticmap?center=50.007739,11.953125&zoom=4&markers=size:mid|<?php echo $image['ImagePosition']['latitudeNumber']; ?>,<?php echo $image['ImagePosition']['longitudeNumber']; ?>&maptype=hybrid&size=500x300&sensor=false" />
</div>

<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit Image'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
    <li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Image Positions'), array('controller' => 'image_positions', 'action' => 'index')); ?> </li>
  </ul>
</div>

  <div class="related">
  <h3><?php echo __('Related Image Comments'); ?></h3>
  <?php if (!empty($image['ImageComment'])): ?>
  <table cellpadding = "0" cellspacing = "0">
  <tr>
    <th><?php echo __('Type'); ?></th>
    <th><?php echo __('Language'); ?></th>
    <th><?php echo __('Author'); ?></th>
    <th><?php echo __('Date'); ?></th>
    <th><?php echo __('Comment'); ?></th>
    <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  <?php
    $i = 0;
    foreach ($image['ImageComment'] as $imageComment): ?>
    <tr>
      <td><?php echo $imageComment['type']; ?></td>
      <td><?php echo $imageComment['language']; ?></td>
      <td><?php echo $imageComment['author']; ?></td>
      <td><?php echo $imageComment['date']; ?></td>
      <td><?php echo $imageComment['comment']; ?></td>
      <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'image_comments', 'action' => 'view', $imageComment['id'])); ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php endif; ?>

</div>
<div class="related">
  <h3><?php echo __('Related Image Copyrights'); ?></h3>
  <?php if (!empty($image['ImageCopyright'])): ?>
  <table cellpadding = "0" cellspacing = "0">
  <tr>
    <th><?php echo __('Property'); ?></th>
    <th><?php echo __('Value'); ?></th>
    <th><?php echo __('ExtraValue'); ?></th>
    <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  <?php
    $i = 0;
    foreach ($image['ImageCopyright'] as $imageCopyright): ?>
    <tr>
      <td><?php echo $imageCopyright['property']; ?></td>
      <td><?php echo $imageCopyright['value']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php endif; ?>
</div>
<div class="related">
  <h3><?php echo __('Related Image Informations'); ?></h3>
  <?php if (!empty($image['ImageInformation'])): ?>
  <table cellpadding = "0" cellspacing = "0">
  <tr>
    <th><?php echo __('Rating'); ?></th>
    <th><?php echo __('CreationDate'); ?></th>
    <th><?php echo __('DigitizationDate'); ?></th>
    <th><?php echo __('Orientation'); ?></th>
    <th><?php echo __('Width'); ?></th>
    <th><?php echo __('Height'); ?></th>
    <th><?php echo __('Format'); ?></th>
    <th><?php echo __('ColorDepth'); ?></th>
    <th><?php echo __('ColorModel'); ?></th>
    <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  
    <tr>
      <td><?php echo $image['ImageInformation']['rating']; ?>

      
      </td>
      <td><?php echo $image['ImageInformation']['creationDate']; ?></td>
      <td><?php echo $image['ImageInformation']['digitizationDate']; ?></td>
      <td><?php echo $image['ImageInformation']['orientation']; ?></td>
      <td><?php echo $image['ImageInformation']['width']; ?></td>
      <td><?php echo $image['ImageInformation']['height']; ?></td>
      <td><?php echo $image['ImageInformation']['format']; ?></td>
      <td><?php echo $image['ImageInformation']['colorDepth']; ?></td>
      <td><?php echo $image['ImageInformation']['colorModel']; ?></td>
    </tr>
  </table>
<?php endif; ?>
</div>
<div class="related">
  <h3><?php echo __('Related Image Properties'); ?></h3>
  <?php if (!empty($image['ImageProperty'])): ?>
  <table cellpadding = "0" cellspacing = "0">
  <tr>
    <th><?php echo __('Property'); ?></th>
    <th><?php echo __('Value'); ?></th>
    <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  <?php
    $i = 0;
    foreach ($image['ImageProperty'] as $imageProperty): ?>
    <tr>
      <td><?php echo $imageProperty['property']; ?></td>
      <td><?php echo $imageProperty['value']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php endif; ?>
</div>
</div>
