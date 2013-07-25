<?php

function displaySubTree($myHtml, $subTree, &$stack = null)
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
      $output .= '<li><span id="draggableTag_'.$data['Tag']['id'].'" class="tag label label-success draggableTag availableTag">'.$myHtml->link($data['Tag']['name'], '/tags/view/'.$data['Tag']['id']).'</span><ul>';
      $output .= displaySubtree($myHtml, $data['children'], $stack);
      $output .= '</ul></li>';
   	}
   }
   return $output;
}
  
?>
<div class="tagTree" >
<?php echo displaySubTree($this->MyHtml, $tagsTree); ?>
</div>
