<div id="mapHeader" >
	<div>
		<div id="buttonGroupLeft" >
			<button type="button" class="btn btn-default btn-lg" onclick="return autoplay();">
			  <span class="glyphicon glyphicon-glyphicon-backward"></span> |&lt;
			</button>
			<button type="button" class="btn btn-default btn-lg" onclick="return autoplay();">
			  <span class="glyphicon glyphicon-play"></span> &gt;
			</button>
			<button type="button" class="btn btn-default btn-lg" onclick="return autoplay();">
			  <span class="glyphicon glyphicon-glyphicon-step-forward"></span> &gt;|
			</button>
			<?php echo $minDate->format('d/m/Y') ?></div>
		<div id="sliderContainer">
			<div id="mapSlider" ></div>
			<div id="sliderSteps" class="steps"></div>
		</div>
		<div id="buttonGroupRight" ><?php echo $maxDate->format('d/m/Y') ?></div>
	</div>
	<div>
		<div id="sliderCurrentDate" ></div>
		<div id="sliderCurrentDistance" ></div>
	</div>
	<div></div>
</div>

<script>var boundingBox = new google.maps.LatLngBounds();

var zoomLevel = 1;
var initIcon = [];
function updateMarkersIcon()
{
	var prevZoomLevel = zoomLevel;
	


	var zoom = map_canvas.getZoom();
	if( zoom > 15 )
	{
		zoomLevel = 3;
	}
	else
	{
		if( zoom >  10 )
		{
			zoomLevel = 2;
		}
		else
		{
				zoomLevel = 1;
		}
	}
	 if (prevZoomLevel !== zoomLevel) {	

		for (i = 0; i < markers.length; i++) {
			var iconUrl = markers[i].getIcon();
			if (typeof initIcon[i] == 'undefined')
			{
				initIcon[i] = iconUrl;
			}
			iconUrl = initIcon[i];
			
			switch(zoomLevel)
			{
				case 3:
					iconUrl += 'Big'
				break;
				case 2:
				break;
				
				case 1:
					iconUrl += 'Small'
				break;
			}
		  markers[i].setIcon(iconUrl);
		 }
	 }
}


</script>

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
    'marker' => false,
    //'markerTitle' => 'This is my position',
    //'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
    //'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
   // 'infoWindow' => true,
    //'windowText' => 'My Position'
  );

echo $this->GoogleMap->map($map_options); 

$imgIdJs = array();
$imgDatesJs = array();
$directionsIdJs = array();
$directionsDistanceJs = array();

$nbDaysDifference = array();

$i = 0;
$lastPos = NULL;
$lastDate = NULL;


foreach($images as $image)
 {
	$data = $image;
	if(isset($image['Image']))
	{
		$data = $image['Image'];
	}
	
	 if(isset($image['ImagePosition']) && $image['ImagePosition']['latitudeNumber'] != '' && $image['ImagePosition']['longitudeNumber'] != '')
	{
	
  $imgIdJs[] = $data['id'];
  $imgDate = new DateTime($image['ImageInformation']['creationDate']);
  $imgDatesJs[] = 'new Date('.$imgDate->getTimestamp().'* 1000)';
  
  $pos = array('latitude' => $image['ImagePosition']['latitudeNumber'],
			  'longitude' => $image['ImagePosition']['longitudeNumber']
			  );
	?>

   <script>boundingBox.extend(new google.maps.LatLng(<?php echo $image['ImagePosition']['latitudeNumber'] ?>, <?php echo $image['ImagePosition']['longitudeNumber'] ?>));</script>
   <?php
   echo $this->GoogleMap->addMarker('map_canvas', 'imageMarker_'.$data['id'], 
		$pos
			  , array(
			'markerTitle' => $data['name'],
			'markerIcon' => Router::url('/images/download/'.$data['id'].'/icon', true),
			 'infoWindow' => false,
			// 'windowText' => preg_replace('/\s+/', ' ',$this->element('Image/preview', array('image'=>$image))),
		)
		);
		
		
		
			?>
	
	<script>
	google.maps.event.addListener(markers[<?php echo $i ?>], 'click', function() {
		$('#imageLink_<?php echo $data['id'] ?>').trigger("click");
		
  });

	</script>
	
	<?php
		
		
	if($i > 0)
	{
		$position = array('from'=>
								join(',',$lastPos),
						'to'=>
								join(',',$pos));
		echo $this->GoogleMap->getDirections('map_canvas', 'direction_'.$i, $position);
		$directionsIdJs[] = 'direction_'.$i.'Display';
		$directionsDistanceJs[] = 'direction_'.$i.'Distance';
		
		$curDate = new DateTime($image['ImageInformation']['creationDate']);
		$imgDateDiff = $lastDate->diff($curDate);
		
		$nbDaysDifference[] = $imgDateDiff->days;
		
	}
	$lastPos = $pos;
	$lastDate = new DateTime($image['ImageInformation']['creationDate']);
	$i ++;
	
	}
 }
 ?>
 
 <script>
	var imgIds = [<?php echo join(',', $imgIdJs) ?>];
	var imgDates = [<?php echo join(',', $imgDatesJs) ?>];
	var directionsId = [<?php echo join(',', $directionsIdJs) ?>];
	var directionsDistance;
	var nbDaysDifference = [<?php echo join(',', $nbDaysDifference) ?>];
 </script>
<div style="display:none;" >
	
	
	
  <?php foreach($images as $image)
 {
 	$data = $image;
	if(isset($image['Image']))
	{
		$data = $image['Image'];
	}
 ?>
 <img class="imageLoading" src="<?php echo $this->webroot ?>images/download/<?php echo $data['id'] ?>/iconBig" />
 <img class="imageLoading" src="<?php echo $this->webroot ?>images/download/<?php echo $data['id'] ?>/icon" />
 <img class="imageLoading" src="<?php echo $this->webroot ?>images/download/<?php echo $data['id'] ?>/iconSmall" />
 <img class="imageLoading" src="<?php echo $this->webroot ?>images/download/<?php echo $data['id'] ?>/big" />
 <?php
   echo $this->element('Image/preview', array('image'=>$image));
 }
 ?>
</div>

 <script>
var minDate = new Date(<?php echo $minDate->getTimestamp() ?> * 1000);
var maxDate = new Date(<?php echo $maxDate->getTimestamp() ?> * 1000);
 
 <?php 
	$dateDiff = $minDate->diff($maxDate);
 ?>
 
 function slideUpdated(event, ui)
{
	var nbDays = ui.value * 24 *60 *60 * 1000; // ms
	var currentDate = new Date( minDate.getTime() + nbDays );
	directionsDistance = [<?php echo join(',', $directionsDistanceJs) ?>];
	
	var totalDistance = 0; //meters
	
	
	var imgIdsNb = imgIds.length;
	for (var i = 0; i < imgIdsNb; i++) {
		imgId = imgIds[i];
		imgDate = imgDates[i];
		
		if(imgDate <= currentDate )
		{
			if(markers[i].getMap() == null)
			{
				markers[i].setMap(map_canvas);
			}
			if(  i > 0 )
			{
				if(directionsId[i-1].getMap() == null)
				{
					directionsId[i-1].setMap(map_canvas);
				}
				totalDistance += directionsDistance[i-1]
			}
		}
		else
		{
			markers[i].setMap(null);
			if(  i > 0   )
			{
				directionsId[i-1].setMap(null);
			}
		}
		
	}
	
	$('#sliderCurrentDate').html(currentDate.getDate() + '/' + currentDate.getMonth() + '/' + currentDate.getFullYear() );
	$('#sliderCurrentDistance').html(Math.round(totalDistance, 2) + ' km');
	
}

var periode = 100;
var timer1 = null;

function slideUp()
{
	var current = $('#mapSlider').slider('value' );
	$('#mapSlider').slider('value', current + <?php echo $dateDiff->days ?>/periode );
	if($('#mapSlider').slider('value') == <?php echo $dateDiff->days+1 ?>)
	{
		clearInterval(timer1);
	}
}


function autoplay()
{
	if(timer1 != null )
	{
		clearInterval(timer1);
	}
	timer1 = setInterval(slideUp, periode);
	return false;
}

var nbLoadedImages = 0;

$(function() {

map_canvas.fitBounds(boundingBox);


/*
$(".imageLoading").load(function() {
  nbLoadedImages ++;
  if(nbLoadedImages == <?php echo count($images) ?>)
  {
	setTimeout(function(){autoplay();}, 10000);
  }
}).each(function() {
  if(this.complete) $(this).load();
});
*/

var nbDaysDifferenceCount = nbDaysDifference.length;
	for (var i = 0; i < nbDaysDifferenceCount-1; i++) {
		max = <?php echo $dateDiff->days ?>;
		percent = nbDaysDifference[i]*100/max;
		$('#sliderSteps').append('<span style="display:inline-block;position:absolute;;margin-left: '+percent+'%;">|</span>');
	}



$( "#mapSlider" ).slider({
		slide:slideUpdated,
		change:slideUpdated,
		value: <?php echo $dateDiff->days+1 ?>,
        min: 0,
        max: <?php echo $dateDiff->days+1 ?>,
		});
		
});


google.maps.event.addListener(map_canvas, 'zoom_changed', updateMarkersIcon);

</script>