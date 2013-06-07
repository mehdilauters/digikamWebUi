<?php
App::uses('ImageTag', 'Model');

/**
 * ImageTag Test Case
 *
 */
class ImageTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageTag = ClassRegistry::init('ImageTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageTag);

		parent::tearDown();
	}

}
