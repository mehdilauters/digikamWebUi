<?php
/**
 * CustomIdentifierFixture
 *
 */
class CustomIdentifierFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'CustomIdentifiers';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'identifier' => array('type' => 'text', 'null' => true),
		'thumbId' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'id_customIdentifiers' => array('column' => 'thumbId', 'unique' => 0),
			'PRIMARY' => array('column' => 'identifier', 'unique' => 1)
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
			'identifier' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'thumbId' => 1
		),
	);

}
