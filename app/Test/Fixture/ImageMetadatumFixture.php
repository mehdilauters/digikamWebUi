<?php
/**
 * ImageMetadatumFixture
 *
 */
class ImageMetadatumFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ImageMetadata';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'imageid' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'make' => array('type' => 'text', 'null' => true),
		'model' => array('type' => 'text', 'null' => true),
		'lens' => array('type' => 'text', 'null' => true),
		'aperture' => array('type' => 'text', 'null' => true),
		'focalLength' => array('type' => 'text', 'null' => true),
		'focalLength35' => array('type' => 'text', 'null' => true),
		'exposureTime' => array('type' => 'text', 'null' => true),
		'exposureProgram' => array('type' => 'integer', 'null' => true),
		'exposureMode' => array('type' => 'integer', 'null' => true),
		'sensitivity' => array('type' => 'integer', 'null' => true),
		'flash' => array('type' => 'integer', 'null' => true),
		'whiteBalance' => array('type' => 'integer', 'null' => true),
		'whiteBalanceColorTemperature' => array('type' => 'integer', 'null' => true),
		'meteringMode' => array('type' => 'integer', 'null' => true),
		'subjectDistance' => array('type' => 'text', 'null' => true),
		'subjectDistanceCategory' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'imageid' => 1,
			'make' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'lens' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'aperture' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'focalLength' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'focalLength35' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'exposureTime' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'exposureProgram' => 1,
			'exposureMode' => 1,
			'sensitivity' => 1,
			'flash' => 1,
			'whiteBalance' => 1,
			'whiteBalanceColorTemperature' => 1,
			'meteringMode' => 1,
			'subjectDistance' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'subjectDistanceCategory' => 1
		),
	);

}
