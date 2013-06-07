<?php
App::uses('ImageInformation', 'Model');

/**
 * ImageInformation Test Case
 *
 */
class ImageInformationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_information'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageInformation = ClassRegistry::init('ImageInformation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageInformation);

		parent::tearDown();
	}

}
