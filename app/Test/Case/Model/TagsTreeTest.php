<?php
App::uses('TagsTree', 'Model');

/**
 * TagsTree Test Case
 *
 */
class TagsTreeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tags_tree'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TagsTree = ClassRegistry::init('TagsTree');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TagsTree);

		parent::tearDown();
	}

}
