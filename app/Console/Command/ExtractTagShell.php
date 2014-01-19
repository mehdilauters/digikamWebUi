<?php
class ExtractTagShell extends AppShell {
  public $uses = array('Tag', 'ImageTagProperty', 'Image');

public function getOptionParser() {
    return ConsoleOptionParser::buildFromArray(array(
        'description' => array(
            __("Export images containing a given Tag cropped"),
        ),
        'arguments' => array(
            'dest' => array('help' => __('path where will be stored output images'), 'required' => true),
            'tagId' => array('help' => __('Tag Id'))
        ),
        'options' => array(
//             'destination' => array('help' => __('path where will be stored output images'), 'required' => true),
//             'tagId' => array('help' => __('Tag Id'))
        ),
    ));
}


public function getSubTree($subTree, &$stack = null)
{
  $options = array();
	if($stack == null)
	{
		$stack = array();
	}
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
	  $options[$data['Tag']['id']] = $data['Tag']['name'];
	  $subOptions = $this->getSubTree( $data['children'], $stack);
	  $subOptions = preg_replace ( '/^/', '--' , $subOptions );
	  $options += $subOptions;
	  
   	}
   }
   return $options;
}




    public function main() {
        $this->out('Hello world.');
	debug($this->args);
	$tagsTree = $this->requestAction('/tagsTrees/getTree', array('pass'=>array(true)));
	$options = $this->getSubTree($tagsTree);
	$tagId = -1;
	$dstPath = $this->args[0];
	if(!(isset($this->args[1]) && $options[$this->args[1]]))
	{
	    foreach($options as $id => $name)
	    {
	      $this->out($id.'	'.$name);
	    }
	    $tagId = $this->in('Select the tag?', array_keys($options));
	}
	else
	{
	  $tagId = $this->args[1];
	}

	if (!$this->Tag->exists($tagId)) {
	      throw new NotFoundException(__('Invalid tag'));
	 }
// 	$this->ImageTagProperty->contain('Tag','Image');
	$this->ImageTagProperty->contain('Tag','Image.Album.AlbumRoot');
	$imageTagProperties = $this->ImageTagProperty->find('all', array('conditions'=>array('ImageTagProperty.tagid'=>$tagId)));
// 	debug($imageTagProperties);
      

      $i = 0;


      $nbImages = count($imageTagProperties);
      $this->out('number of images '.$nbImages.' for tag '.$options[$tagId]);
      foreach($imageTagProperties as $imageTagProperty)
      {
	$tagName = $imageTagProperty['Tag']['name'];
	$tagName = str_replace(' ','_',$tagName);
	if($imageTagProperty['ImageTagProperty']['property'] == 'tagRegion')
	{
// 	  <rect x="2333" y="1388" width="918" height="918"/>
	  list($x, $y, $width, $height) = sscanf($imageTagProperty['ImageTagProperty']['value'], "<rect x=\"%d\" y=\"%d\" width=\"%d\" height=\"%d\"/>");
// 	  debug($x);

	  $this->Image->getPath($imageTagProperty);
	  $src = $imageTagProperty['Image']['fullPath'];
	  $dst = $dstPath.$tagName.'_'.$i.'.jpg';
	  $this->Image->crop($src, $dst, $x, $y, $width, $height);
	  $this->out($i.'/'.$nbImages.' processed');
// 	  debug($imageTagProperty['Image']['fullPath']);
	  $i++;
	}
      }

    }
} 
?>