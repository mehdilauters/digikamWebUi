<?php
App::uses('ImageCopyright', 'Model');

/**
 * ImageCopyright Test Case
 *
 */
class ImageCopyrightTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_copyright'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageCopyright = ClassRegistry::init('ImageCopyright');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageCopyright);

		parent::tearDown();
	}

}
