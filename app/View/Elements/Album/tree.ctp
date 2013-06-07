	<script type="text/javascript">
$(document).ready(function() {

	$('.jsHide').hide();
});
</script>
<?php
function getHtmlSubMenu($webroot, $selectedAlbum, $rootNode, &$rootIds)
{
	
	
	if($rootNode == array() || $rootNode == null)
		return '';
	$html = '<ul>';
// 	if($selectedAlbum != null)
// 	{
// 		$currentSelectedPath = array_shift($selectedAlbum);
// 	}
	
	foreach ($rootNode as $nodeName => $node) {
		$albumId = array_shift($rootIds);
			$html .= '<li>';
			if($node != null)
			{
				$html .= '<span onClick="$(\'#album_'.$albumId.'\').toggle();" >+</span>';
			}
			$html .= '<a href="'.$webroot.'albums/view/'.$albumId.'" >'.$nodeName.'</a>';
			if($node != null)
			{
				$class = '';
// 				if($selectedAlbum != null)
// 				{
// 					if($currentSelectedPath == '' )
// 					{
// 						$currentSelectedPath = 'root';
// 					}
					
// 					if($currentSelectedPath != $nodeName)
// 					{
// 						$class = 'jsHide';
// // 						debug('hide '.$nodeName);
// 					}
// 					else
// 					{
// // 						debug('show '.$nodeName);
// 					}
// 				}
				$html .= '<div class="'.$class.' albumContent" id="album_'.$albumId.'" >';
// 				debug($selectedAlbum);
// 				debug($nodeName);
				$html .= getHtmlSubMenu($webroot, null/*array_values($selectedAlbum)*/, $node, $rootIds);
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