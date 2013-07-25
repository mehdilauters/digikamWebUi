<?php
// debug($image);

if( ! isset($image['Image']) )
{
  $data = $image;
}
else
{
  $data = $image['Image'];
  
}
  $imageTag = false;
  if( isset($data['ImageTag']))
   {
      $imageTag = $data['ImageTag'];
   }
   
//  if( isset($image['ImageTag']))
//  {
//     $imageTag = $image['ImageTag'];
//  }
//  else
//  {
//   if(isset($image['Image']['ImageTag']))
//   {
//         $imageTag = $image['Image']['ImageTag'];
//   }

//  }

   $rating = false;
   if(isset($data['ImageInformation']))
   {
     $rating = $data['ImageInformation']['rating'];
   
   }
   
   $album = false;
   
   if(isset($data['Album']))
   {
     $album = $data['Album'];
   }
     else
     {
       if(isset($image['Album']))
       {
         $album = $image['Album'];
       }
     }
   //debug($album);
   
   
// if(isset($image['ImageInformation']))
// {
//   $rating = $image['ImageInformation']['rating'];
  
// }

  ?>

<div id="previewContainer_<?php echo $data['id']?>" class="imagePreviewContainer droppableImageTag thumbnail">
  <div class="imagePreviewFrame">
    <a id="imageLink_<?php echo $data['id']?>" href="<?php echo $this->webroot.'images/download/'.$data['id'].'/' ?>" title="<?php echo $data['name'] ?>"  rel="album" class="fancybox" >
    <img id="imagePreview_<?php echo $data['id']?>" class="imagePreview" src="<?php echo $this->webroot.'images/download/'.$data['id'].'/preview' ?>" alt="<?php echo $data['name'] ?>" />
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

     if( $imageTag != false)
     {
        foreach($imageTag as $tag)
        {
         echo $this->element('Tag/tagPhoto', array('tag'=>$tag));
        }
     }
     ?>
      </ul>
    </div>
  <div class="imagePreviewInfo">
    <h4>
    <a href="<?php echo $this->webroot.'images/view/'.$data['id'] ?>" title="" ><?php echo $data['name']?></a>
    </h4>
    <a href="<?php echo $this->webroot.'albums/view/'.$data['album'] ?>" title="" ><?php echo $album['relativePath']?></a>
  </div>
</div>