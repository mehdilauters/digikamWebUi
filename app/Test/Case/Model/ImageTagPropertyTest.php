<?php
App::uses('ImageTagProperty', 'Model');

/**
 * ImageTagProperty Test Case
 *
 */
class ImageTagPropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_tag_property'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageTagProperty = ClassRegistry::init('ImageTagProperty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageTagProperty);

		parent::tearDown();
	}

}
