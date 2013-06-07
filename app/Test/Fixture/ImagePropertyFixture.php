<?php
/**
 * ImagePropertyFixture
 *
 */
class ImagePropertyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ImageProperties';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'imageid' => array('type' => 'integer', 'null' => false),
		'property' => array('type' => 'text', 'null' => false),
		'value' => array('type' => 'text', 'null' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => array('imageid', 'property'), 'unique' => 1)
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
			'property' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
