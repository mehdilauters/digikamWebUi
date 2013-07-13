<div class="userManagementContainer" rel="<?php echo $user['User']['id']; ?>" >
<h2>Manage users</h2>
<h3><?php echo $user['User']['username']; ?></h3>
<div class="droppableAvailableAlbum" id="availableAlbum_<?php echo $user['User']['id']; ?>">
  <span>UsersAvailableAlbum</span>
  <div>
  <ul>
   <?php
foreach ($user['UsersAvailableAlbum'] as $userAvailableAlbum) {
  echo '<li>'.$this->element('Album/preview', array('album'=>$userAvailableAlbum, 'class'=>'userAvailableAlbum')).'</li>';
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
