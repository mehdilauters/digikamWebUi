<?php
/**
 * ImageTagFixture
 *
 */
class ImageTagFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ImageTags';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'imageid' => array('type' => 'integer', 'null' => false),
		'tagid' => array('type' => 'integer', 'null' => false),
		'indexes' => array(
			'tag_id_index' => array('column' => 'imageid', 'unique' => 0),
			'tag_index' => array('column' => 'tagid', 'unique' => 0),
			'PRIMARY' => array('column' => array('imageid', 'tagid'), 'unique' => 1)
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
			'tagid' => 1
		),
	);

}
