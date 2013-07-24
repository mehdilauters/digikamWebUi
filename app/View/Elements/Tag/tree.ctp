<?php

function displaySubTree($webroot, $subTree, &$stack = null)
{
	if($stack == null)
	{
		$stack = array();
	}
  $output = '';
   foreach($subTree as $id => $data)
   {
   	$displayTag = true;
   	if( isset($data['Tag']['TagProperty']) )
   	{
	   	foreach ($data['Tag']['TagProperty'] as $property)
	   	{
	   		if($property['property'] == 'internalTag')
	   		{
	   			$displayTag = false;
	   			break;
	   		}
	   	}
   	}
   	if( in_array($data['Tag']['id'], $stack))
   	{
   		$displayTag = false;
   	}
   	if($displayTag)
   	{
   	  $stack[] = $data['Tag']['id'];
      $output .= '<li><span id="draggableTag_'.$data['Tag']['id'].'" class="tag label label-success draggableTag availableTag"><a href="'.$webroot.'tags/view/'.$data['Tag']['id'].'" >'.$data['Tag']['name'].'</a></span><ul>';
      $output .= displaySubtree($webroot, $data['children'], $stack);
      $output .= '</ul></li>';
   	}
   }
   return $output;
}
  
?>
<div class="tagTree" >
<?php echo displaySubTree($this->webroot, $tagsTree); ?>
</div>
