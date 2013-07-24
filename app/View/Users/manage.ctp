<div class="userManagementContainer" rel="<?php echo $user['User']['id']; ?>" >
<h2>Manage users</h2>
<h3><?php echo $user['User']['username']; ?></h3>
<br/>
you can now drag and drop new tags (right pannel) <br/>
and albums (left pannel), <br/>
or remove already set items
<br/>
<br/>
<div class="droppableAvailableAlbum" id="availableAlbum_<?php echo $user['User']['id']; ?>">
  <span>UsersAvailableAlbum</span>
  <div>
  <ul>
   <?php
foreach ($user['UsersAvailableAlbum'] as $userAvailableAlbum) {
  echo $this->element('Album/preview', array('album'=>$userAvailableAlbum, 'class'=>'userAvailableAlbum'));
}
  
  ?> 
  </ul>
 </div>
</div>


<div class="droppableForbiddenAlbum" id="forbiddenAlbum_<?php echo $user['User']['id']; ?>">
  <span>UsersForbiddenAlbum</span>
  <div>
  <ul>
   <?php
foreach ($user['UsersForbiddenAlbum'] as $userForbiddenAlbum) {
  echo '<li>'.$this->element('Album/preview', array('album'=>$userForbiddenAlbum, 'class'=>'userForbiddenAlbum')).'</li>';
}
  
  ?> 
  </ul></div>
</div>


<div class="droppableAvailableTag" id="availableTag_<?php echo $user['User']['id']; ?>">
  <span>UsersAvailableTag</span>
  <div>
  <ul>
   <?php
foreach ($user['UsersAvailableTag'] as $availableTag) {
  //echo ('<li>'.$availableTag['Tag']['name'].'</li>');
  echo $this->element('Tag/tag', array('tag'=>$availableTag, 'class'=>'userAvailableTag'));
}
  
  ?> 
  </ul></div>
</div>


<div class="droppableForbiddenTag" id="forbiddenTag_<?php echo $user['User']['id']; ?>">
  <span>UsersForbiddenTag</span>
  <div>
  <ul>
   <?php
foreach ($user['UsersForbiddenTag'] as $forbiddenTag) {
  echo $this->element('Tag/tag', array('tag'=>$forbiddenTag, 'class'=>'userForbiddenTag'));
}
  
  ?> 
  </ul></div>
</div>
  </div>
<script type="text/javascript">
<!--
$(document).ready(function() {
$(".userAvailableAlbum").each(function() {
	   albumId = $(this).attr('id').replace('album_', '');
    userId = $(".userManagementContainer").attr('rel');
    $(this).append('<div oncliCk="removeUserElement('+userId+', \'album\', '+albumId+', true)" >remove</div>')});

$(".userForbiddenAlbum").each(function() {
	   albumId = $(this).attr('id').replace('album_', '');
    userId = $(".userManagementContainer").attr('rel');
    $(this).append('<div oncliCk="removeUserElement('+userId+', \'album\', '+albumId+', false)" >remove</div>')});

  $(".userAvailableTag").each(function() {
       tagId = $(this).attr('id').replace('tag_', '');
       userId = $(".userManagementContainer").attr('rel');
       $(this).append('<div oncliCk="removeUserElement('+userId+', \'tag\', '+tagId+', true)" >remove</div>')});

  $(".userForbiddenTag").each(function() {
      tagId = $(this).attr('id').replace('tag_', '');
      userId = $(".userManagementContainer").attr('rel');
      $(this).append('<div oncliCk="removeUserElement('+userId+', \'tag\', '+tagId+', false)" >remove</div>')});
});

$( ".availableAlbum" ).draggable({
    revertDuration: 600,
    revert:true,
    helper : 'clone',
    start: function (event, ui) {
      //console.log($(this));
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
      action = element.attr('rel');
      $.ajax({
               url: '<?php echo $this->webroot; ?>users/addAlbum' ,
               type: "POST",
               data: 'userId='+userId+'&albumId=' + albumId,
               complete: function(req) {
                   if (req.status == 200) { //success
                     element.fadeTo(600, 1);
                     $("#availableAlbum_"+userId).append(req.responseText);
                   } else { //failure
                       alert(req.responseText);
                       //$("#rate_container_"+photoId).fadeTo(2200, 1);
                   }
               }
           });
    }
    });
    
     $( ".droppableForbiddenAlbum" ).droppable({
     activeClass: 'drop-active',
     hoverClass: 'drop-hover',
      accept: ".availableAlbum",
    drop: function( event, ui ) {
      element = $(this);
      element.fadeTo(600, 0.5);
      albumId = ui.draggable.attr('id').replace('draggableAlbum_','');
      userId = $(".userManagementContainer").attr('rel');
      action = element.attr('rel');
      $.ajax({
               url: '<?php echo $this->webroot; ?>users/addAlbum/false' ,
               type: "POST",
               data: 'userId='+userId+'&albumId=' + albumId,
               complete: function(req) {
                   if (req.status == 200) { //success
                     element.fadeTo(600, 1);
                     $("#forbiddenAlbum_"+userId).append(req.responseText);
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
  
  
  
      $( ".droppableForbiddenTag" ).droppable({
     activeClass: 'drop-active',
     hoverClass: 'drop-hover',
      accept: ".availableTag",
    drop: function( event, ui ) {
      element = $(this);
      element.fadeTo(600, 0.5);
      tagId = ui.draggable.attr('id').replace('draggableTag_','');
      userId = $(".userManagementContainer").attr('rel');
      $.ajax({
               url: '<?php echo $this->webroot; ?>users/addTag/false',
               type: "POST",
               data: 'userId='+userId+'&tagId=' + tagId,
               complete: function(req) {
                   if (req.status == 200) { //success
                     element.fadeTo(600, 1);
                     console.log(req.responseText);
                     $("#forbiddenTag_"+userId).append(req.responseText);
                   } else { //failure
                       alert(req.responseText);
                       //$("#rate_container_"+photoId).fadeTo(2200, 1);
                   }
               }
           });
    }
    });



function removeUserElement(userId, elementName, elementId, available)
{
element = $("#"+elementName+"_"+elementId);
element.fadeTo(600, 0.5);
	if(available)
	{
		elementType = ''; 	
	}
	else
	{
		elementType = 'false'
	}

$.ajax({
        url: '<?php echo $this->webroot; ?>users/removeElement/'+elementName+'/'+elementType,
        type: "POST",
        data: 'userId='+ userId +'&id=' + elementId,
        complete: function(req) {
            if (req.status == 200) { //success
            element.remove();
            } else { //failure
                alert(req.responseText);
            }
        }
    });
}
//-->
</script>