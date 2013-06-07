<?php
/**
 * UniqueHashFixture
 *
 */
class UniqueHashFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'UniqueHashes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'uniqueHash' => array('type' => 'text', 'null' => true),
		'fileSize' => array('type' => 'integer', 'null' => true),
		'thumbId' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'id_uniqueHashes' => array('column' => 'thumbId', 'unique' => 0),
			'PRIMARY' => array('column' => array('uniqueHash', 'fileSize'), 'unique' => 1)
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
			'uniqueHash' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'fileSize' => 1,
			'thumbId' => 1
		),
	);

}
