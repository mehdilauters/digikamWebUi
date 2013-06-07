<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('jquery-ui/jquery-ui-1.10.3.custom.min');
		echo $this->Html->css('main');
		echo $this->Html->css('bootstrap.min');
		
		echo $this->Html->script(
				array( 	'jquery-1.9.1.min',
						'jquery.rating.pack',
						'jquery.MetaData',
						'jquery-ui-1.10.3.custom.min',
						'bootstrap.min'
				),
				array('inline' => 'false')
		);
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->css('rating/jquery.rating');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
<!--
$(function(){ // wait for document to load
	$('.imageRate').rating({
		callback: function(value, link){
			photoId = $(this).attr('rel');
			
			if(value == undefined)
			{
				value = -1;
			}
			url = "<?php echo $this->webroot; ?>images/rate/"+photoId;
			$("#rate_container_"+photoId).fadeTo(600, 0.4, function() {
		        $.ajax({
		            url: url,
		            type: "POST",
		            data: 'rating=' + value,
		            complete: function(req) {
		                if (req.status == 200) { //success
		                	$("#rate_container_"+photoId).fadeTo(600, 1);
		                } else { //failure
		                    alert(req.responseText);
		                    $("#rate_container_"+photoId).fadeTo(2200, 1);
		                }
		            }
		        });
			});
		},
			cancelValue: '-1',
			
			});

	/******TAGS******/
	//tag
	 $( ".draggableTag" ).draggable({containment: '#content', helper: 'clone'  });
	 $( ".droppableImageTag" ).droppable({
		 accept: ".availableTag",
	 drop: function( event, ui ) {
		 element = $(this);
		 element.fadeTo(600, 0.5);
		 tagId = ui.draggable.attr('id').replace('draggableTag_','');
		 imageId = $(this).attr('id').replace('previewContainer_','');
		 $.ajax({
	            url: '<?php echo $this->webroot; ?>images/tag/'+imageId,
	            type: "POST",
	            data: 'tagId=' + tagId,
	            complete: function(req) {
	                if (req.status == 200) { //success
	                	element.fadeTo(600, 1);
	                } else { //failure
	                    alert(req.responseText);
	                    //$("#rate_container_"+photoId).fadeTo(2200, 1);
	                }
	            }
	        });
	 }
	 });

	 /// untag

	 $( ".tagTree" ).droppable({
		 accept: ".taggedTag",
	 drop: function( event, ui ) {
		 splittedId = ui.draggable.attr('id').split(/_/);
		 
		 tagId = splittedId[3];
		 imageId = splittedId[1];
		 $.ajax({
	            url: '<?php echo $this->webroot; ?>images/untag/'+imageId,
	            type: "POST",
	            data: 'tagId=' + tagId,
	            complete: function(req) {
	                if (req.status == 200) { //success
	                	//$("#rate_container_"+photoId).fadeTo(600, 1);
	                } else { //failure
	                    alert(req.responseText);
	                    //$("#rate_container_"+photoId).fadeTo(2200, 1);
	                }
	            }
	        });
	 }
	 });
	});
//-->
</script>
</head>
<body>
	<div id="container" class="container-fluid">
		<div id="header" class="row-fluid">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="header" class="row-fluid">
			<div id="leftPanel" class="span2">
			<?php echo $this->element('Album/tree', array('albumTree'=> $albumTree, /*'selectedAlbum'=>$selectedAlbum*/)); ?>
			</div>
			<div id="content" class="span8">
				<?php echo $this->Session->flash(); ?>
	
				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="rightPanel" class="span2"><?php echo $this->element('Tag/tree',array('tagsTree'=>$tagsTree))?></div>
		</div>
		<div id="footer" class="row-fluid">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
