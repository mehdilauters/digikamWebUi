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
      <ul id="tagsPhoto_<?php echo $data['id'] ?>">
     <?php

     foreach( $image['ImageTag'] as $tag)
     {
    	echo $this->element('Tag/tagPhoto', array('tag'=>$tag));
     }
     ?>
      </ul>
    </div>
  <div class="imagePreviewInfo">
  	<h4>
    <a href="<?php echo $this->webroot.'images/view/'.$data['id'] ?>" title="" ><?php echo $data['name']?></a>
    </h4>
  </div>
</div>