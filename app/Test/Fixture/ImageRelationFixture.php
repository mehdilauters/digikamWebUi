<?php
/**
 * ImageRelationFixture
 *
 */
class ImageRelationFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ImageRelations';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'subject' => array('type' => 'integer', 'null' => true),
		'object' => array('type' => 'integer', 'null' => true),
		'type' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'object_relations_index' => array('column' => 'object', 'unique' => 0),
			'subject_relations_index' => array('column' => 'subject', 'unique' => 0),
			'PRIMARY' => array('column' => array('subject', 'object', 'type'), 'unique' => 1)
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
			'subject' => 1,
			'object' => 1,
			'type' => 1
		),
	);

}
