<?php
App::uses('ImagePosition', 'Model');

/**
 * ImagePosition Test Case
 *
 */
class ImagePositionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_position'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImagePosition = ClassRegistry::init('ImagePosition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImagePosition);

		parent::tearDown();
	}

}
