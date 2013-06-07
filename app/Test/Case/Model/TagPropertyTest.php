<?php
App::uses('TagProperty', 'Model');

/**
 * TagProperty Test Case
 *
 */
class TagPropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tag_property'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TagProperty = ClassRegistry::init('TagProperty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TagProperty);

		parent::tearDown();
	}

}
