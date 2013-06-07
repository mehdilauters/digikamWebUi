<?php
/**
 * SettingFixture
 *
 */
class SettingFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Settings';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'keyword' => array('type' => 'text', 'null' => false),
		'value' => array('type' => 'text', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => 'keyword', 'unique' => 1)
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
			'keyword' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
