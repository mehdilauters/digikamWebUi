  <script type="text/javascript">
$(document).ready(function() {

  $('.jsHide').hide();
});
</script>
<?php
function getHtmlSubMenu($webroot, $selectedAlbum, $rootNode, &$rootIds, $_currentPath = '')
{
  
  
  if($rootNode == array() || $rootNode == null)
    return '';
  $html = '<ul>';
//   if($selectedAlbum != null)
//   {
//     $currentSelectedPath = array_shift($selectedAlbum);
//   }
  
  foreach ($rootNode as $nodeName => $node) {
  	$currentPath = $_currentPath.'/'.$nodeName;

//    $albumId = array_shift($rootIds);
// TODO
  	$albumId = NULL;
  	$idIndice = str_replace('/root','',$currentPath);
  	if( $idIndice == '' )
  	{
  		$idIndice = '/';
  	}
  	
	if( isset($rootIds[ $idIndice ]))
	{
		$albumId = $rootIds[$idIndice];
	}
// 	debug($currentPath);
// 	debug($albumId);
// 	debug($rootIds);
      $html .= '<li>';
      if($node != null)
      {
        $html .= '<span onClick="$(\'#album_'.$albumId.'\').toggle();" >+</span>';
      }
      $html .= '<span class="availableAlbum" id="draggableAlbum_'.$albumId.'">';
      if($albumId != NULL)
      {
      	$html .= '<a href="'.$webroot.'albums/view/'.$albumId.'" >'.$nodeName.'</a>';
      }
      else
      {
      	$html .= '<span >'.$nodeName.'</span>';
      }
      $html .= '</span>';
      if($node != null)
      {
        $class = '';
//         if($selectedAlbum != null)
//         {
//           if($currentSelectedPath == '' )
//           {
//             $currentSelectedPath = 'root';
//           }
          
//           if($currentSelectedPath != $nodeName)
//           {
//             $class = 'jsHide';
// //             debug('hide '.$nodeName);
//           }
//           else
//           {
// //             debug('show '.$nodeName);
//           }
//         }
        $html .= '<div class="'.$class.' albumContent" id="album_'.$albumId.'" >';
//         debug($selectedAlbum);
//         debug($nodeName);
        $html .= getHtmlSubMenu($webroot, null/*array_values($selectedAlbum)*/, $node, $rootIds, $currentPath);
        $html .= '<div/>';
      }
      
      $html .= '</li>';
  }
  $html .= '</ul>';
  return $html;
}
?>
<div id="albumMenuTree" >
<?php 
echo getHtmlSubMenu($this->webroot,null, $albumTree['tree'], $albumTree['ids']);
?>
</div>