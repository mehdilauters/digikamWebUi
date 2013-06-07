<?php
App::uses('ImageProperty', 'Model');

/**
 * ImageProperty Test Case
 *
 */
class ImagePropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_property'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageProperty = ClassRegistry::init('ImageProperty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageProperty);

		parent::tearDown();
	}

}
