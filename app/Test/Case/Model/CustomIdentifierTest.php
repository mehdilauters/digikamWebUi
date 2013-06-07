<?php
App::uses('CustomIdentifier', 'Model');

/**
 * CustomIdentifier Test Case
 *
 */
class CustomIdentifierTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.custom_identifier'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CustomIdentifier = ClassRegistry::init('CustomIdentifier');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CustomIdentifier);

		parent::tearDown();
	}

}
