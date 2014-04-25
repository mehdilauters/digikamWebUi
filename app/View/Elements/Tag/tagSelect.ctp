<?php

function displaySubTreeSelect($myHtml, $subTree, $currentPath = '', &$stack = null)
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
	  $output .= '<option value="'.$data['Tag']['id'].'" >'.$currentPath.' / '.$data['Tag']['name'].'</option>';
      $output .= displaySubTreeSelect($myHtml, $data['children'],$currentPath.' / '.$data['Tag']['name'],  $stack);
   	}
   }
   return $output;
}
  
?>
<option value=""></option>
<?php echo displaySubTreeSelect($this->MyHtml, $tagsTree); ?>

