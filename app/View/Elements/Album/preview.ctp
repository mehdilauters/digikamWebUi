<?php 
if( ! isset($class) )
{
  $class = '';
}
?>
<li class="album preview label label-success <?php echo $class ?>"  id="album_<?php echo $album  ['Album']['id'] ?>">
     <a href="<?php echo $this->webroot.'albums/view/'.$album['Album']['id'] ?>" >
     <?php   
     echo $album ['Album']['relativePath']; 
     ?>
     </a>
     
</li> 