<?php
/**
 * ImageHaarMatrixFixture
 *
 */
class ImageHaarMatrixFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ImageHaarMatrix';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'imageid' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'modificationDate' => array('type' => 'datetime', 'null' => true),
		'uniqueHash' => array('type' => 'text', 'null' => true),
		'matrix' => array('type' => 'binary', 'null' => true),
		'indexes' => array(
			
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
			'modificationDate' => '2013-05-30 11:49:23',
			'uniqueHash' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'matrix' => 'Lorem ipsum dolor sit amet'
		),
	);

}
