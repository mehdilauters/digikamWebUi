<?php
/**
 * TagsTreeFixture
 *
 */
class TagsTreeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'TagsTree';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary'),
		'pid' => array('type' => 'integer', 'null' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'pid'), 'unique' => 1)
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
			'pid' => 1
		),
	);

}
