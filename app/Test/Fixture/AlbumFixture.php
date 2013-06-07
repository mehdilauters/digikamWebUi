<?php
/**
 * AlbumFixture
 *
 */
class AlbumFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Albums';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'albumRoot' => array('type' => 'integer', 'null' => false),
		'relativePath' => array('type' => 'text', 'null' => false),
		'date' => array('type' => 'date', 'null' => true),
		'caption' => array('type' => 'text', 'null' => true),
		'collection' => array('type' => 'text', 'null' => true),
		'icon' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => array('albumRoot', 'relativePath'), 'unique' => 1)
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
			'albumRoot' => 1,
			'relativePath' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'date' => '2013-05-30',
			'caption' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'collection' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'icon' => 1
		),
	);

}
