<?php
/**
 * ImageFixture
 *
 */
class ImageFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Images';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'album' => array('type' => 'integer', 'null' => true),
		'name' => array('type' => 'text', 'null' => false),
		'status' => array('type' => 'integer', 'null' => false),
		'category' => array('type' => 'integer', 'null' => false),
		'modificationDate' => array('type' => 'datetime', 'null' => true),
		'fileSize' => array('type' => 'integer', 'null' => true),
		'uniqueHash' => array('type' => 'text', 'null' => true),
		'indexes' => array(
			'image_name_index' => array('column' => 'name', 'unique' => 0),
			'hash_index' => array('column' => 'uniqueHash', 'unique' => 0),
			'dir_index' => array('column' => 'album', 'unique' => 0),
			'PRIMARY' => array('column' => array('album', 'name'), 'unique' => 1)
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
			'album' => 1,
			'name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'status' => 1,
			'category' => 1,
			'modificationDate' => '2013-05-30 11:49:25',
			'fileSize' => 1,
			'uniqueHash' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
