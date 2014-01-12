<?php
if(isset($tag['Tag']) && !empty($tag['Tag']))
{
if( ! isset($class) )
{
  $class = '';
}
?>
<li class="tag label label-success <?php echo $class ?>"  id="tag_<?php echo $tag['Tag']['id'] ?>">
     <a href="<?php echo $this->webroot.'tags/view/'.$tag['Tag']['id'] ?>" >
     <?php   
     echo $tag ['Tag']['name']; 
     ?>
     </a>
     
</li> 
<?php } ?>
