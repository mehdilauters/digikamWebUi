<?php
/**
 * TagFixture
 *
 */
class TagFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Tags';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'pid' => array('type' => 'integer', 'null' => true),
		'name' => array('type' => 'text', 'null' => false),
		'icon' => array('type' => 'integer', 'null' => true),
		'iconkde' => array('type' => 'text', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => array('name', 'pid'), 'unique' => 1)
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
			'id' => 1,
			'pid' => 1,
			'name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'icon' => 1,
			'iconkde' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
