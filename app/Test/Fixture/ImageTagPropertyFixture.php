<?php
/**
 * ImageTagPropertyFixture
 *
 */
class ImageTagPropertyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ImageTagProperties';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'imageid' => array('type' => 'integer', 'null' => true),
		'tagid' => array('type' => 'integer', 'null' => true),
		'property' => array('type' => 'text', 'null' => true),
		'value' => array('type' => 'text', 'null' => true),
		'indexes' => array(
			'imagetagproperties_tagid_index' => array('column' => 'tagid', 'unique' => 0),
			'imagetagproperties_imageid_index' => array('column' => 'imageid', 'unique' => 0),
			'imagetagproperties_index' => array('column' => array('imageid', 'tagid'), 'unique' => 0)
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
			'tagid' => 1,
			'property' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
