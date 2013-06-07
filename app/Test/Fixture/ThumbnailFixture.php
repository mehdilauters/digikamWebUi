<?php
/**
 * ThumbnailFixture
 *
 */
class ThumbnailFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Thumbnails';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'type' => array('type' => 'integer', 'null' => true),
		'modificationDate' => array('type' => 'datetime', 'null' => true),
		'orientationHint' => array('type' => 'integer', 'null' => true),
		'data' => array('type' => 'binary', 'null' => true),
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
			'id' => 1,
			'type' => 1,
			'modificationDate' => '2013-05-31 16:33:05',
			'orientationHint' => 1,
			'data' => 'Lorem ipsum dolor sit amet'
		),
	);

}
