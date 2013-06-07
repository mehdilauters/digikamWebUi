<?php
/**
 * ImageInformationFixture
 *
 */
class ImageInformationFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ImageInformation';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'imageid' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'rating' => array('type' => 'integer', 'null' => true),
		'creationDate' => array('type' => 'datetime', 'null' => true),
		'digitizationDate' => array('type' => 'datetime', 'null' => true),
		'orientation' => array('type' => 'integer', 'null' => true),
		'width' => array('type' => 'integer', 'null' => true),
		'height' => array('type' => 'integer', 'null' => true),
		'format' => array('type' => 'text', 'null' => true),
		'colorDepth' => array('type' => 'integer', 'null' => true),
		'colorModel' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'creationdate_index' => array('column' => 'creationDate', 'unique' => 0)
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
			'rating' => 1,
			'creationDate' => '2013-05-30 11:49:24',
			'digitizationDate' => '2013-05-30 11:49:24',
			'orientation' => 1,
			'width' => 1,
			'height' => 1,
			'format' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'colorDepth' => 1,
			'colorModel' => 1
		),
	);

}
