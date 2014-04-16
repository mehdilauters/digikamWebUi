<div class="images form">
<?php echo $this->Form->create('Image'); ?>
	<fieldset>
		<legend><?php echo __('Edit Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('album');
		echo $this->Form->input('name', array("type"=>"text"));

	?>
	<input type="hidden" id="ImagePositionId" value="<?php echo $this->request->data['Image']['id'] ?>" name="data[ImagePosition][imageid]">
	<input type="hidden" id="ImagePositionLat" value="<?php echo $this->request->data['ImagePosition']['latitudeNumber'] ?>" name="data[ImagePosition][latitudeNumber]">
	<input type="hidden" id="ImagePositionLng" value="<?php echo $this->request->data['ImagePosition']['longitudeNumber'] ?>" name="data[ImagePosition][longitudeNumber]">
	</fieldset>
	
	
<?php echo $this->Form->end(__('Submit')); ?>
<form onSubmit="return getLatLngFromAddress()">
<label>Search address</label>
<input type="text" id="address" >
<input type="submit" >
</form>
<?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
<?php 
$map_options = array(
    'id' => 'map_canvas',
    'width' => '400px',
    'height' => '200px',
    'style' => '',
    'zoom' => 7,
    'type' => 'HYBRID',
    'custom' => null,
    'localize' => false,
    'latitude' => $this->request->data['ImagePosition']['latitudeNumber'],
    'longitude' => $this->request->data['ImagePosition']['longitudeNumber'],
    'address' => '',
    'marker' => true,
    'markerTitle' => 'This is my position',
  //  'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
    'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
    'infoWindow' => true,
    'windowText' => 'My Position'
  );

echo $this->GoogleMap->map($map_options); ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Image.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Image.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Haar Matrices'), array('controller' => 'image_haar_matrices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Haar Matrix'), array('controller' => 'image_haar_matrices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Positions'), array('controller' => 'image_positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Position'), array('controller' => 'image_positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Comments'), array('controller' => 'image_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Comment'), array('controller' => 'image_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Copyrights'), array('controller' => 'image_copyrights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Copyright'), array('controller' => 'image_copyrights', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Informations'), array('controller' => 'image_informations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Information'), array('controller' => 'image_informations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Properties'), array('controller' => 'image_properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Property'), array('controller' => 'image_properties', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script>


function getLatLngFromAddress()
{
	var address = $('#address').val();
	
	geocoder.geocode( { 'address': address}, function(results, status) {
	if (status == google.maps.GeocoderStatus.OK) {
	setCenterMap(results[0].geometry.location);
	setPosition(results[0].geometry.location.lat(), results[0].geometry.location.lng());
	
	}
	} );
	
	return false;
}


function setPosition(lat, lng)
{
	$('#ImagePositionLat').val(lat);
	$('#ImagePositionLng').val(lng);
	
	
	point = new google.maps.LatLng(lat,lng);

	 var marker = new google.maps.Marker(  {
		position: point,
		map: map_canvas,
		title:'new position'
		});
	  
	

	
}

google.maps.event.addListener(map_canvas, "click", function(event) {
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    // populate yor box/field with lat, lng
	if(confirm("Are you sure to change the image location?"))
	{
		setPosition(lat, lng);
	}
});
</script>