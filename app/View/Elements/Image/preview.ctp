<?php
//debug($image);
$rating = false;
if( ! isset($image['Image']) )
{
  $data = $image;
}
else
{
  $data = $image['Image'];
  
}
if(isset($image['ImageInformation']))
{
  $rating = $image['ImageInformation']['rating'];
  
}

  ?>

<div id="previewContainer_<?php echo $data['id']?>" class="imagePreviewContainer droppableImageTag thumbnail">
  <div class="imagePreviewFrame">
  	<a href="#" >
    <img id="imagePreview_<?php echo $data['id']?>" class="imagePreview" src="<?php echo $this->webroot.'/images/download/'.$data['id'].'/preview' ?>" alt="<?php echo $data['name'] ?>" />
    </a>
  </div>
  <?php 
  if($rating)
  {
    ?>
    <div id="rate_container_<?php echo $data['id']?>" class="imageRateContainer">
    <form>
    <?php 
    for($i=1; $i<=5; $i++)
    {
      $checked = '';
      if($rating == $i)
      {
        $checked = 'checked="checked"';
      }
      echo '<input type="radio" rel="'.$data['id'].'" class="imageRate" '.$checked.' value="'.$i.'"/>'; 
    }
    ?>
    </form>
    </div>
    <?php 
  }
  ?>
  <div>&nbsp;</div>
      <div class="tags" >
      <ul>
     <?php

     foreach( $image['ImageTag'] as $tag)
     {
     ?>
<li class="tag" >
     <a href="<?php echo $this->webroot.'tags/view/'.$tag['Tag']['id'] ?>" >
     <span class="draggableTag taggedTag" id="image_<?php echo $data['id'] ?>_tag_<?php echo $tag ['Tag']['id'] ?>">
     <?php   
     echo $tag ['Tag']['name']; 
     ?>
     </span>
     </a>
</li> 
     <?php
     }
     ?>
      </ul>
    </div>
  <div class="imagePreviewInfo">
  	<h3>
    <a href="<?php echo $this->webroot.'images/view/'.$data['id'] ?>" title="" ><?php echo $data['name']?></a>
    </h3>
  </div>
</div>