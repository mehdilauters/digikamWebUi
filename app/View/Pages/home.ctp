<h2>Welcome</h2>
You can now
<ul>
	<li>Access albums from the left panel</li>
	<li>Access tags from the right panel</li>
<?php
if( AuthComponent::user('id') == 1 )
{?>
	<li><a href="<?php echo $this->webroot ?>users" >Manage users</a></li>
	<?php
}
 ?>
	</ul>