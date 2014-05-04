<div id="slideshowContainer">	
  <?php foreach($images as $image)
 {
 	$data = $image;
	if(isset($image['Image']))
	{
		$data = $image['Image'];
	}
 ?>
 <div class="imageSlideshow" style="background-image: url(&quot;<?php echo $this->webroot ?>images/download/<?php echo $data['id'].'/big' ?>&quot;)" >
	<div class="slideshowImageInfo">
		<div class="date">
		<?php $date = new DateTime($image['ImageInformation']['creationDate']); ?>
			<span class="day"><?php echo $date->format('d') ?></span>
			<br>
			<span class="month"><?php echo $date->format('M') ?></span>
			<br>
			<span class="year"><?php echo $date->format('Y') ?></span>
		</div>
		<div class="content">
			<div>
				<a href="#" onclick="$('#previewContainer_<?php echo $data['id'] ?>').toggle(); return false;" ><?php echo $data['name'] ?></a>
			</div>
			<?php echo $this->element('Image/preview', array('image'=>$image)) ?>
			<?php if(isset($image['ImagePosition']['latitudeNumber']))
			{ ?>
				<img src="http://maps.google.com/maps/api/staticmap?zoom=4&markers=size:mid|<?php echo $image['ImagePosition']['latitudeNumber']; ?>,<?php echo $image['ImagePosition']['longitudeNumber']; ?>&maptype=hybrid&size=250x150&sensor=false" />
			<?php } ?>
		</div>
		<div style="clear: both"></div>
	</div>
 </div>
<?php } ?>
</div>