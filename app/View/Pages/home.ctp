<h2>Welcome</h2>
You can now
<ul>
	<li>Access albums from the left panel</li>
	<li>Access tags from the right panel</li>
<?php
if( AuthComponent::user('id') == 1 )
{?>
	<li><a href="<?php echo $this->webroot ?>users" >Manage users</a></li>
	<li><a href="<?php echo $this->webroot ?>images/add" >Add image</a></li>
	<li><a href="<?php echo $this->webroot ?>albums/add" >Add album</a></li>
	<li><a href="<?php echo $this->webroot ?>tag/add" >Add tag</a></li>
	<?php
}
 ?>
	</ul>