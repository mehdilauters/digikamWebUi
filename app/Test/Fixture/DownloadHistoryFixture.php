<?php
/**
 * DownloadHistoryFixture
 *
 */
class DownloadHistoryFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'DownloadHistory';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'identifier' => array('type' => 'text', 'null' => true),
		'filename' => array('type' => 'text', 'null' => true),
		'filesize' => array('type' => 'integer', 'null' => true),
		'filedate' => array('type' => 'datetime', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => array('identifier', 'filename', 'filesize', 'filedate'), 'unique' => 1)
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
			'identifier' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'filename' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'filesize' => 1,
			'filedate' => '2013-05-30 11:49:23'
		),
	);

}
