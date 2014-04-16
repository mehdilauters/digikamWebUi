<?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
<?php 
$map_options = array(
    'id' => 'map_canvas',
    'width' => '100%',
    'height' => '100%',
    'style' => '',
    'zoom' => 7,
    'type' => 'HYBRID',
    'custom' => null,
    'localize' => false,
    'latitude' => 47.385342,
    'longitude' => 0.682428,
   // 'address' => '35 rue lakanal, 37000 tours',
  //  'marker' => true,
    //'markerTitle' => 'This is my position',
    //'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
    //'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
   // 'infoWindow' => true,
    //'windowText' => 'My Position'
  );

echo $this->GoogleMap->map($map_options); 

$i = 1;
foreach($tag['ImageTag'] as $imageTag)
 {
   echo $this->GoogleMap->addMarker('map_canvas', $i, 
		array('latitude' => $imageTag['ImagePosition']['latitudeNumber'],
			  'longitude' => $imageTag['ImagePosition']['longitudeNumber']
			  )
			  , array(
			'markerTitle' => $imageTag['Image']['name']
		)
		);
	$i++;
 }
 ?>


<div class="tags view">
<h2><?php  echo __('Tag'); ?></h2>
  <dl>
    <dt><?php echo __('Name'); ?></dt>
    <dd>
      <?php echo h($tag['Tag']['name']); ?>
      &nbsp;
    </dd>
  </dl>
   <div>number of pictures <?php echo count($tag['ImageTag']) ?></div>

  </div>
</div>