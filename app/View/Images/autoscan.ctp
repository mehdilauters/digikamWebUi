
 <style type="text/css">
  .status_nok {
    background-color: red;
	}
	
	.status_ok {
    background-color: green; 
	}
  </style>
  
<ul>
<?php
foreach($addedPictures as $file)
{ ?>
	<li class="status_<?php if($file['status']) { echo 'ok'; } else { echo 'nok';} ?>" ><?php echo $file['file'] ?></li>
<?php
}

?>
</ul>
