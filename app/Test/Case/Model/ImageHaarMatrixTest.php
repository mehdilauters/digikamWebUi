<?php
App::uses('ImageHaarMatrix', 'Model');

/**
 * ImageHaarMatrix Test Case
 *
 */
class ImageHaarMatrixTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_haar_matrix'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageHaarMatrix = ClassRegistry::init('ImageHaarMatrix');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageHaarMatrix);

		parent::tearDown();
	}

}
