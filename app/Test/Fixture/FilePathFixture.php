<?php
/**
 * FilePathFixture
 *
 */
class FilePathFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'FilePaths';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'path' => array('type' => 'text', 'null' => true),
		'thumbId' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'id_filePaths' => array('column' => 'thumbId', 'unique' => 0),
			'PRIMARY' => array('column' => 'path', 'unique' => 1)
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
			'path' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'thumbId' => 1
		),
	);

}
