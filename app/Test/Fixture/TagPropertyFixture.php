<?php
/**
 * TagPropertyFixture
 *
 */
class TagPropertyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'TagProperties';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'tagid' => array('type' => 'integer', 'null' => true),
		'property' => array('type' => 'text', 'null' => true),
		'value' => array('type' => 'text', 'null' => true),
		'indexes' => array(
			'tagproperties_index' => array('column' => 'tagid', 'unique' => 0)
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
			'tagid' => 1,
			'property' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
