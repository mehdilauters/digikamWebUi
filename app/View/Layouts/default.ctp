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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    DigikamWebUi
    <?php echo $title_for_layout; ?>
  </title>
  <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('jquery-ui/jquery-ui-1.10.3.custom.min');
    echo $this->Html->css('main');
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('fancy/jquery.fancybox');
    
    echo $this->Html->script(
        array(   'jquery-1.9.1.min',
            'jquery.rating.pack',
            'jquery.MetaData',
            'jquery-ui-1.10.3.custom.min',
            'bootstrap.min',
            'jquery.fancybox.pack'
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

function resize()
{
  winHeight = $(window).height();
  headerHeight = $("#header").height();
  footerHeight = $("#footer").height();

  contentHeight = winHeight - (headerHeight + footerHeight);

  $("#contentRow").height(contentHeight);
/*

  winWidth = $(window).width();
  leftPanelWidth = $("#leftPanel").width();
  rightPanelWidth = $("#right²Panel").width();

  contentWidth = winWidth - (leftPanelWidth + rightPanelWidth );
  $("#content").width(contentWidth); */
  
}

$(function(){ // wait for document to load

// layout definition
 resize();

 

 $(window).resize(resize);
  
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
  
  
   $( ".availableTag" ).draggable({
     revertDuration: 600,
     revert:true,
     helper : 'clone',
     start: function (event, ui) {
       console.log($(this));
           $(ui.helper).css("margin-left", event.clientX - $(event.target).offset().left);
           $(ui.helper).css("margin-top", event.clientY - $(event.target).offset().top);
       },

       });

   $( ".availableAlbum" ).draggable({
     revertDuration: 600,
     revert:true,
     helper : 'clone',
     start: function (event, ui) {
       console.log($(this));
           $(ui.helper).css("margin-left", event.clientX - $(event.target).offset().left);
           $(ui.helper).css("margin-top", event.clientY - $(event.target).offset().top);
       },

       });
    


   $( ".droppableAvailableAlbum" ).droppable({
      activeClass: 'drop-active',
      hoverClass: 'drop-hover',
       accept: ".availableAlbum",
     drop: function( event, ui ) {
       element = $(this);
       element.fadeTo(600, 0.5);
       albumId = ui.draggable.attr('id').replace('draggableAlbum_','');
       userId = $(".userManagementContainer").attr('rel');
       $.ajax({
                url: '<?php echo $this->webroot; ?>users/addAlbum',
                type: "POST",
                data: 'userId='+userId+'&albumId=' + albumId,
                complete: function(req) {
                    if (req.status == 200) { //success
                      element.fadeTo(600, 1);
                      console.log(req.responseText);
                      $("#tagsPhoto_"+imageId).append(req.responseText);
                    } else { //failure
                        alert(req.responseText);
                        //$("#rate_container_"+photoId).fadeTo(2200, 1);
                    }
                }
            });
     }
     });

   
      $( ".droppableAvailableTag" ).droppable({
      activeClass: 'drop-active',
      hoverClass: 'drop-hover',
       accept: ".availableTag",
     drop: function( event, ui ) {
       element = $(this);
       element.fadeTo(600, 0.5);
       tagId = ui.draggable.attr('id').replace('draggableTag_','');
       userId = $(".userManagementContainer").attr('rel');
       $.ajax({
                url: '<?php echo $this->webroot; ?>users/addTag',
                type: "POST",
                data: 'userId='+userId+'&tagId=' + tagId,
                complete: function(req) {
                    if (req.status == 200) { //success
                      element.fadeTo(600, 1);
                      console.log(req.responseText);
                      $("#availableTag_"+userId).append(req.responseText);
                    } else { //failure
                        alert(req.responseText);
                        //$("#rate_container_"+photoId).fadeTo(2200, 1);
                    }
                }
            });
     }
     });
   
   
       
   $( ".droppableImageTag" ).droppable({
    activeClass: 'drop-active',
    hoverClass: 'drop-hover',
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
                    console.log(req.responseText);
                    $("#tagsPhoto_"+imageId).append(req.responseText);
                  } else { //failure
                      alert(req.responseText);
                      //$("#rate_container_"+photoId).fadeTo(2200, 1);
                  }
              }
          });
   }
   });

     $(".userAvailableTag").each(function() {
          tagId = $(this).attr('id').replace('tag_', '');
          userId = <?php echo AuthComponent::user('id') ?>;
          $(this).append('<div oncliCk="removeUserAvailableTag('+userId+', '+tagId+')" >remove</div>')});

  });


  
  function removeUserAvailableTag(userId, tagId)
{
   element = $("#tag_"+tagId);
   element.fadeTo(600, 0.5);
   $.ajax({
           url: '<?php echo $this->webroot; ?>users/removeTag/',
           type: "POST",
           data: 'userId='+ userId +'&tagId=' + tagId,
           complete: function(req) {
               if (req.status == 200) { //success
               element.remove();
               } else { //failure
                   alert(req.responseText);
               }
           }
       });
}
  
  
function removeTag(imageId, tagId)
{
   element = $("#user_"+userId+"_tag_"+tagId);
   element.fadeTo(600, 0.5);
   $.ajax({
           url: '<?php echo $this->webroot; ?>images/untag/'+imageId,
           type: "POST",
           data: 'tagId=' + tagId,
           complete: function(req) {
               if (req.status == 200) { //success
               element.remove();
               } else { //failure
                   alert(req.responseText);
                   //$("#rate_container_"+photoId).fadeTo(2200, 1);
               }
           }
       });
}
  
//-->
</script>
</head>
<body>
  <div id="container" class="container-fluid">
    <div id="header" class="row-fluid">
      <h1>Digikam Web Ui</h1>
      <?php if($this->Session->check('Auth.User')){
  ?>
  <span>logout <a href="<?php echo $this->webroot ?>users/logout"><?php echo AuthComponent::user('username') ?></a></span>
  <?php
}
?>
    </div>
    <div id="contentRow" class="row-fluid">
      <div id="leftPanel" class="span2">
      <h3>Albums</h3>
      <?php echo $this->element('Album/tree', array('albumTree'=> $albumTree, /*'selectedAlbum'=>$selectedAlbum*/)); ?>
      </div>
      <div id="content" class="span8">
        <?php
        echo $this->Session->flash();
        echo $this->Session->flash('auth');
        ?>
  
        <?php echo $this->fetch('content'); ?>
      </div>
      <div id="rightPanel" class="span2">
    <h3>Tags</h3>
      <?php echo $this->element('Tag/tree',array('tagsTree'=>$tagsTree))?></div>
    </div>
    <div id="footer" class="row-fluid">
      <?php echo $this->Html->link(
          $this->Html->image('cake.power.gif', array('alt' => 'Cakephp', 'border' => '0')),
          'http://www.cakephp.org/',
          array('target' => '_blank', 'escape' => false)
        );
      ?>
    </div>
  </div>
  <?php echo $this->element('sql_dump'); ?>
  <script type="text/javascript">
  $(document).ready(function() {
    $(".fancybox").fancybox();
  });
</script>
</body>
</html>