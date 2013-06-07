<?php
App::uses('ImageMetadatum', 'Model');

/**
 * ImageMetadatum Test Case
 *
 */
class ImageMetadatumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.image_metadatum'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImageMetadatum = ClassRegistry::init('ImageMetadatum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImageMetadatum);

		parent::tearDown();
	}

}
