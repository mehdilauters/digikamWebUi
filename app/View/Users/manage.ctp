<div class="userManagementContainer" rel="<?php echo $user['User']['id']; ?>" >
<h2>Manage users</h2>

<div class="droppableAvailableAlbum" id="availableAlbum_<?php echo $user['User']['id']; ?>">
  <span>UsersAvailableAlbum</span>
  <div>
  <ul>
   <?php
foreach ($user['UsersAvailableAlbum'] as $availableAlbum) {
  echo ('<li>'.$availableAlbum['Album']['relativePath'].'</li>');
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
  echo ('<li>'.$userForbiddenAlbum['Album']['relativePath'].'</li>');
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
  <span>UsersAvailableTag</span>
  <div>
  <ul>
   <?php
foreach ($user['UsersForbiddenTag'] as $forbiddenTag) {
  echo ('<li>'.$forbiddenTag['Tag']['name'].'</li>');
}
  
  ?> 
  </ul></div>
</div>
  </div>
