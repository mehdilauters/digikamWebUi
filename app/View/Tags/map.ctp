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

<script>var boundingBox = new google.maps.LatLngBounds();</script>

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


foreach($tag['ImageTag'] as $imageTag)
 {
	
  $imgIdJs[] = $imageTag['Image']['id'];
  $imgDate = new DateTime($imageTag['ImageInformation']['creationDate']);
  $imgDatesJs[] = 'new Date('.$imgDate->getTimestamp().'* 1000)';
  
  $pos = array('latitude' => $imageTag['ImagePosition']['latitudeNumber'],
			  'longitude' => $imageTag['ImagePosition']['longitudeNumber']
			  );
	?>
   <script>boundingBox.extend(new google.maps.LatLng(<?php echo $imageTag['ImagePosition']['latitudeNumber'] ?>, <?php echo $imageTag['ImagePosition']['longitudeNumber'] ?>));</script>
   <?php
   echo $this->GoogleMap->addMarker('map_canvas', 'imageMarker_'.$imageTag['Image']['id'], 
		$pos
			  , array(
			'markerTitle' => $imageTag['Image']['name'],
			'markerIcon' => Router::url('/images/download/'.$imageTag['Image']['id'].'/icon', true),
			'infoWindow' => true,
			'windowText' => preg_replace('/\s+/', ' ',$this->element('Image/preview', array('image'=>$imageTag))),
		)
		);
		
	if($i > 0)
	{
		$position = array('from'=>
								join(',',$lastPos),
						'to'=>
								join(',',$pos));
		echo $this->GoogleMap->getDirections('map_canvas', 'direction_'.$i, $position);
		$directionsIdJs[] = 'direction_'.$i.'Display';
		$directionsDistanceJs[] = 'direction_'.$i.'Distance';
		
		$curDate = new DateTime($imageTag['ImageInformation']['creationDate']);
		$imgDateDiff = $lastDate->diff($curDate);
		
		$nbDaysDifference[] = $imgDateDiff->days;
		
	}
	$lastPos = $pos;
	$lastDate = new DateTime($imageTag['ImageInformation']['creationDate']);
	$i ++;
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
	
	
	
  <?php foreach($tag['ImageTag'] as $imageTag)
 {
 ?>
 <img class="imageLoading" src="<?php echo $this->webroot ?>images/download/<?php echo $imageTag['Image']['id'] ?>/icon" />
 <img class="imageLoading" src="<?php echo $this->webroot ?>images/download/<?php echo $imageTag['Image']['id'] ?>/big" />
 <?php
   echo $this->element('Image/preview', array('image'=>$imageTag));
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



$(".imageLoading").load(function() {
  nbLoadedImages ++;
  if(nbLoadedImages == <?php echo count($tag['ImageTag']) ?>)
  {
	setTimeout(function(){autoplay();}, 10000);
  }
}).each(function() {
  if(this.complete) $(this).load();
});


var nbDaysDifferenceCount = nbDaysDifference.length;
	for (var i = 0; i < nbDaysDifferenceCount-1; i++) {
		max = <?php echo $dateDiff->days ?>;
		percent = nbDaysDifference[i]*100/max;
		$('#sliderSteps').append('<span style="display:inline-block;position:absolute;;margin-left: '+percent+'%;">|</span>');
	}



$( "#mapSlider" ).slider({
		slide:slideUpdated,
		change:slideUpdated,
        min: 0,
        max: <?php echo $dateDiff->days+1 ?>,
		});
		
});
</script>